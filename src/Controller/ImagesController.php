<?php
namespace App\Controller;

use App\Controller\AppController;
use \Cake\Http\Response;
use Cake\Datasource\ConnectionManager;
use \Datetime;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{

    public $paginate = [
        'limit' => 6,
        'order' => [
            'Images.photo' => 'desc'
        ]
    ];

    /**
     * Is Authorized Method
     * 
     */
    public function isAuthorized($user)
    {

        if(isset($user['role']) and $user['role']['id'] > 1)
        {
            if($this->request->action == 'index' and $user['role']['ver_imagenes'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'view' and ($user['role']['ver_imagenes'] == true or ($user['role']['id'] == 4 and $user['cliente_id'] > 0)))
            {
                return true;
            }
            elseif($this->request->action == 'add' and $user['role']['nueva_imagen'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'ejecutar' and $user['role']['nueva_imagen'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'getProgreso' and $user['role']['nueva_imagen'] == true)
            {
                return true;
            }

            return false;
        }

        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index($start_date = null, $end_date = null)
    {
        $start_date = $this->request->query('start_date');
        $end_date = $this->request->query('end_date');

        $hoy = date('Y-m-d');

        if(!is_null($start_date) && strlen($start_date)>0){
            $start_date = substr($start_date,6,4) . "-" . substr($start_date,3,2) . "-" . substr($start_date,0, 2); 
        }else{
            $date_past = strtotime('-30 day', strtotime($hoy));
            $start_date =  date('Y-m-d', $date_past);
        }

        if(!is_null($end_date) && strlen($end_date)>0){
            $end_date = substr($end_date,6,4) . "-" . substr($end_date,3,2) . "-" . substr($end_date,0, 2);
        }else{
            $end_date = $hoy;
        }
            
        $time1 = strtotime($start_date);
        $time2 = strtotime($end_date);

        if($time1>$time2){

            $start_date = $end_date;

            $this->Flash->error(__('Fecha Desde debe ser anterior o igual a la Fecha Hasta.'));
            
        }

        $this->paginate ['conditions'] = [
                'DATE(images.fecha_hora_imagen) <= ' => $end_date,
                'DATE(images.fecha_hora_imagen) >= ' => $start_date
            ];

        $images = $this->paginate($this->Images);

        $date = new DateTime($start_date);
        $start = $date->format('d/m/Y');

        $date = new DateTime($end_date);
        $end = $date->format('d/m/Y');

        $this->set(compact('images'));
        $this->set('end_date', $end);
        $this->set('start_date', $start);
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
     public function view($id = null)
     {
         $image = $this->Images->get($id, [
             'contain' => []
         ]);
 
         $this->set('image', $image);
     }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        // Obtengo datos de la Tabla ultima_descarga.
        $conn = ConnectionManager::get('default');

        $stmt = $conn->execute("SELECT * FROM `ultima_descarga` order by fecha_hora_actualizacion desc LIMIT 1");

        $row = $stmt->fetch('assoc');
 
        $this->set('row', $row);
    }

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/

    /**
     * Metodo Ejecutar
     * 
     * Ejecuta el script de descarga de imagenes en Py.
     */
    public function ejecutar(){

        session_write_close();

        $respuesta = new Response();

        // ejecuto screipt de descarga
        //exec('C:\Users\User\AppData\Local\Programs\Python\Python38\python.exe C:\Users\User\Desktop\prueba\prueba.py', $salida, $return);

        //$comando = 'C:\Users\User\AppData\Local\Programs\Python\Python38\python.exe ' . WWW_ROOT . 'files\ejecutables\Project_Irmin\Irmin_DownloadImages2.py';
        $comando = 'C:\Users\User\AppData\Local\Programs\Python\Python38\python.exe ' . WWW_ROOT . 'files\ejecutables\Project_Irmin\Irmin_DownloadImagesLocal.py';

        exec($comando, $salida, $return);

        //exec('C:\Users\User\AppData\Local\Programs\Python\Python38\python.exe C:\Users\User\Desktop\Project_Irmin\Irmin_DownloadImages2.py', $salida, $return);

        if (!$return) {

            // Obtengo datos de la Tabla ultima_descarga.
            $conn = ConnectionManager::get('default');

            $stmt = $conn->execute("SELECT * FROM `ultima_descarga` order by fecha_hora_actualizacion desc LIMIT 1");

            $row = $stmt->fetch('assoc');

            //$string = implode("\n", $row['salida']);
            //$string = implode("\n", $salida);

            $respuesta = $respuesta->withType('application/json')->withStringBody(
                json_encode(
                        [
                            'fecha_hora_actualizacion' => $row['fecha_hora_actualizacion'],
                            'salida' => $row['salida']
                            //'salida' => $string
                        ]
                )
            );

        } else {

            $respuesta = $respuesta->withType('application/json')->withStringBody(
                json_encode(
                    [
                        'error' => '¡Ha ocurrido un error al descargar las imagenes!'
                    ]
                )
            );
        }

        return $respuesta;
    }

    /**
     * Metodo get progreso
     * 
     * Obtiene el porcetaje de la descarga de imagenes realizado hasta el momento.
     */
    public function getProgreso(){

        $conn = ConnectionManager::get('default');

        $stmt = $conn->execute("SELECT * FROM `ultima_descarga` order by fecha_hora_actualizacion desc LIMIT 1");

        $row = $stmt->fetch('assoc');

        $procentaje = round(($row['completado'] * 100)/ $row['total'], 2, PHP_ROUND_HALF_EVEN);
 
        $respuesta = new Response();

        if (!is_null($row)) {

            $respuesta = $respuesta->withType('application/json')->withStringBody(json_encode(['porcentaje' => $procentaje]));

        } else {

            $respuesta = $respuesta->withStringBody("Error");
            
        }

        return $respuesta;
    }
}
