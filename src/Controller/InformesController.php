<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\Datasource\Exception\RecordNotFoundException;

/**
 * Informes Controller
 *
 * @property \App\Model\Table\InformesTable $Informes
 *
 * @method \App\Model\Entity\Informe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformesController extends AppController
{

    public $paginate = [
        'limit' => 6,
        'order' => [
            'Informes.id' => 'desc'
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
            if($this->request->action == 'index' and $user['role']['ver_pedidos'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'view' and $user['role']['ver_pedidos'] == true)
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
    /*public function index()
    {
        $informes = $this->paginate($this->Informes);

        $this->set(compact('informes'));
    }*/
    public function index($start_date = null, $end_date = null)
    {
        $start_date = $this->request->query('start_date');
        $end_date = $this->request->query('end_date');

        $hoy = date('Y-m-d');

        if(is_null($start_date) || strlen($start_date) == 0){
            $date_past = strtotime('-30 day', strtotime($hoy));
            $start_date =  date('Y-m-d', $date_past);
        }

        if(is_null($end_date) || strlen($end_date) == 0){
            $end_date = $hoy;
        }

        $this->paginate ['conditions'] = [
                'DATE(Informes.fecha_hora_informe) <= ' =>  $end_date,
                'DATE(Informes.fecha_hora_informe) >= ' =>  $start_date
            ];

        //debug($this->paginate);

        $informes = $this->paginate($this->Informes);

        $this->set(compact('informes'));
    }

    /**
     * View method
     *
     * @param string|null $id Informe id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $informe = $this->Informes->get($id, [
            'contain' => ['Images']
        ]);

        $this->set('informe', $informe);
    }
    
    /**
     *  Buscar Informe por Id
     */
    public function buscarinforme(){

        $informe = null;

        if(sizeof($this->request->getData()) > 0){

            $data = $this->request->getData();

            if(ctype_digit ($data['id'])){

                try {

                    $informe = $this->Informes->get($data['id'], [
                        'contain' => ['Images']
                        ]);

                    if (!is_null($informe)){

                        return $this->redirect(['action' => 'view', $informe->id]);

                    }else{

                        $this->Flash->error(__('No existe un informe con ese numero.'));
                    }

                } catch (RecordNotFoundException $e) {

                    $this->Flash->error(__('No existe un informe con ese numero.'));
                }

            }else{

                $this->Flash->error(__('Entrada Invalida.'));
            }
        }

        $this->set('informe', $informe);
    }
}
