<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;
use Cake\Network\Exception\NotFoundException;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\ORM\TableRegistry;


/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 *
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */

class PedidosController extends AppController
{

    public $paginate = [
        'limit' => 5,
        'order' => [
            'Pedidos.id' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

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
            if($this->request->action == 'buscarpedido' and $user['role']['ver_pedidos'] == true)
            {
                return true;
            }
            if($this->request->action == 'filtrarpedidos' and $user['role']['ver_pedidos'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'add' and $user['role']['nuevo_pedido'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'edit' and $user['role']['modificar_pedido'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'delete' and $user['role']['eliminar_pedido'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'view')
            {
                return true;
            }
            elseif($this->request->action == 'evaluar' and $user['role']['evaluar_pedido'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'searchCliente')
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
    public function index()
    {
        $auth = $this->request->session()->read('Auth');

        if($auth['User']['role_id'] != 4){
            $pedidos = $this->paginate($this->Pedidos->find('all')->where(['estado_id = ' => 1])->contain(['Clientes', 'Users', 'Estados', 'Images'])->limit(200));
        }else{
            $pedidos = $this->paginate($this->Pedidos->find('all')->where(['estado_id = ' => 1, 'Pedidos.cliente_id =' => $auth['User']['cliente_id']])->contain(['Clientes', 'Users', 'Estados', 'Images'])->limit(200));
        }

        $this->set(compact('pedidos'));
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedidos->get($id, ['contain' => ['Clientes', 'Users', 'Estados', 'Images']]);

        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait',
                'filename' => 'Pedido_' . $id . '.pdf'
            ]
        ]);

        $this->set('pedido', $pedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($cliente = null)
    {
        $pedido = $this->Pedidos->newEntity();
        
        if ($this->request->is('post')) {

            $start_date = substr($this->request->data['fecha_inicio'],6,4) . "-" . substr($this->request->data['fecha_inicio'],3,2) . "-" . substr($this->request->data['fecha_inicio'],0, 2); 
            $end_date = substr($this->request->data['fecha_fin'],6,4) . "-" . substr($this->request->data['fecha_fin'],3,2) . "-" . substr($this->request->data['fecha_fin'],0, 2);

            // BUSCO IMAGENES PARA EL INTERVALO DE FECHAS DEFINIDAS
            $query = $this->Pedidos->Images->find('all')->where([
                //'Images.fecha_hora_imagen >= ' => $this->request->data['fecha_inicio']['year'] . "-" . $this->request->data['fecha_inicio']['month'] . "-" . $this->request->data['fecha_inicio']['day'] . " 00:00:00", 
                //'Images.fecha_hora_imagen <= ' => $this->request->data['fecha_fin']['year'] . "-" . $this->request->data['fecha_fin']['month'] . "-" . $this->request->data['fecha_fin']['day'] . " 23:59:59", 
                //'Images.fecha_hora_imagen >= ' => substr($this->request->data['fecha_inicio'],6,4) . "-" . substr($this->request->data['fecha_inicio'],0, 2) . "-" . substr($this->request->data['fecha_inicio'],3,2) . " 00:00:00", 
                //'Images.fecha_hora_imagen <= ' => substr($this->request->data['fecha_fin'],6,4) . "-" . substr($this->request->data['fecha_fin'],0, 2) . "-" . substr($this->request->data['fecha_fin'],3,2) . " 23:59:59", 
                'DATE(Images.fecha_hora_imagen) >= ' => $start_date, 
                'DATE(Images.fecha_hora_imagen) <= ' => $end_date
            ]);

            // CARGO EL PEDIDO CON LOS DATOS QUE VIENEN DE LA VIEW
            /*$pedido = $this->Pedidos->patchEntity($pedido, [
                'cliente_id' => $this->request->data['cliente_id'],
                'estado_id' => 1,
                'fecha_solicitud' => date('Y-m-d H:i:s'),
                //'fecha_inicio' => $this->request->data['fecha_inicio'],
                'fecha_inicio' => substr($this->request->data['fecha_inicio'],6,4) . "-" . substr($this->request->data['fecha_inicio'],0, 2) . "-" . substr($this->request->data['fecha_inicio'],3,2),
                //'fecha_fin' => $this->request->data['fecha_fin'],
                'fecha_fin' => substr($this->request->data['fecha_fin'],6,4) . "-" . substr($this->request->data['fecha_fin'],0, 2) . "-" . substr($this->request->data['fecha_fin'],3,2),
                'descripcion' => $this->request->data['descripcion'],
                'images' => array()
            ]);*/

            $pedido->cliente_id = $this->request->data['cliente_id'];
            $pedido->estado_id = 1;
            $pedido->fecha_inicio = $start_date;
            $pedido->fecha_fin = $end_date;
            //$pedido->fecha_inicio = substr($this->request->data['fecha_inicio'],6,4) . "-" . substr($this->request->data['fecha_inicio'],0, 2) . "-" . substr($this->request->data['fecha_inicio'],3,2);
            //$pedido->fecha_fin = substr($this->request->data['fecha_fin'],6,4) . "-" . substr($this->request->data['fecha_fin'],0, 2) . "-" . substr($this->request->data['fecha_fin'],3,2);
            $pedido->fecha_solicitud = date('Y-m-d H:i:s');
            $pedido->descripcion = $this->request->data['descripcion'];
            $pedido->images = array();

            $i = 0;
            foreach ($query as $row) {
                $pedido->images[$i] = $row;
                $i++;
            }

            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('Pedido guardado con Exito.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Error al guardar el Pedido.'));
        }else{

            if ($this->request->is('get') and !is_null($cliente)) {

                $this->Clientes = TableRegistry::get('Clientes');

                $c = $this->Clientes->get($cliente);

                $this->request->data['cliente'] = $c->name;
                $this->request->data['cliente_id'] = $c->id;

                $this->set($this->request->data);
            }
        }
        $this->set(compact('pedido'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Images']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->getData());
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
        }
        $clientes = $this->Pedidos->Clientes->find('list', ['limit' => 200]);
        $users = $this->Pedidos->Users->find('list', ['limit' => 200]);
        $estados = $this->Pedidos->Estados->find('list', ['limit' => 200]);
        $images = $this->Pedidos->Images->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'clientes', 'users', 'estados', 'images'));
    } */   
    
    /**
    * Evaluar method
    *
    * @param string|null $id Pedido id.
    * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
    * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
    */
   public function evaluar($id = null)
   {
        $pedido = $this->Pedidos->get($id, [
           'contain' => ['Images', 'Clientes', 'Estados']
       ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->getData();

            $pedido->conclusion = $data['conclusion'];
            $pedido->fecha_evaluacion = date('Y-m-d H:i:s');
            $pedido->estado_id = 3;

           if ($this->Pedidos->save($pedido)) {

               $this->Flash->success(__('Pedido actualizado con Exito.'));

               return $this->redirect(['action' => 'index']);
           }

           $this->Flash->error(__('Error al actualizar el Pedido.'));

        }else{

            $auth = $this->request->session()->read('Auth');

            $pedido->experto_id = $auth['User']['id'];
            $pedido->estado_id = 2;

            $this->Pedidos->save($pedido);
        
            $this->set(compact('pedido'));
       }

   }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Images', 'Clientes', 'Estados']
        ]);

        $auth = $this->request->session()->read('Auth');

        if (($pedido['estado_id'] == 1 and (($auth['User']['role']['id'] < 4 and $auth['User']['role']['eliminar_pedido'] == true) or ($auth['User']['role_id'] == 4 and $auth['User']['role']['eliminar_pedido'] == true and $auth['User']['cliente']['id'] == $pedido->cliente_id))) or ($pedido['estado_id'] == 2 and ($auth['User']['role_id'] == 1 and $auth['User']['role']['eliminar_pedido'] == true and $auth['User']['id'] == $pedido->experto_id))){

            if ($this->request->is(['patch', 'post', 'put'])) {

                $data = $this->request->getData();
    
                $pedido->fecha_cancelacion = Time::now();
                $pedido->motivo_cancelacion =  $data['motivo_cancelacion'];
                $pedido->user_cancelacion = $auth['User']['id'];
                $pedido->estado_id = 4;

                if ($this->Pedidos->save($pedido)) {

                    $this->Flash->success(__('Pedido Cancelado con exito.'));

                    return $this->redirect(['action' => 'index']);
                }
                $this->Flash->error(__('El pedido no pudo ser guardado. Por favor, pruebas más tarde.'));
            }
        
            $this->set(compact('pedido'));

        }else{

            $this->Flash->error(__('No puedes eliminar este pedido.'));
        }
    }

    /**
     * Filtrar Peidos Method
     * 
     * filtro para buscar pedidos en index (AJAX)
     * por nombre y rol del usuario y estado del pedido
     */
    public function filtrarpedidos(){

        $this->request->allowMethod(['get']);

        $auth = $this->request->session()->read('Auth');
        $keyword = $this->request->query('keyword');
        $estado = $this->request->query('estado') + 1;

        $condiciones = array();
        if(strlen($keyword) > 0){
            $condiciones['Clientes.name like '] = '%'.$keyword.'%';
        }
        if($estado < 5){
            $condiciones['estado_id = '] = $estado;
        }
        if($auth['User']['role_id'] == 4){
            $condiciones['Pedidos.cliente_id ='] = $auth['User']['cliente_id'];
        }
        
        $query = $this->Pedidos->find('all', [
            'conditions' => $condiciones,
            'order' => [
                'Pedidos.id' => 'DESC'
            ],
            'contain' => [
                'Clientes',
                'Users',
                'Estados',
                'Images'
            ],
            'limit' => 200
        ]);

        $pedidos = $this->paginate($query);
        $this->set(compact('pedidos'));
        $this->set('_serialize', 'pedidos');
    }

    /**
     * Buscar Pedidos Method
     * 
     * busca pedido por numero de id.
     */
    public function buscarpedido(){

        $pedido = null;

        if(sizeof($this->request->getData()) > 0){

            $data = $this->request->getData();

            if(ctype_digit ($data['id'])){

                $auth = $this->request->session()->read('Auth');
                
                $condiciones = null;
                if($auth['User']['role_id'] == 4){
                    $condiciones['Pedidos.cliente_id ='] = $auth['User']['cliente_id'];
                }

                try {

                    $pedido = $this->Pedidos->get($data['id'], [
                        'conditions' => $condiciones,
                        'contain' => ['Clientes', 'Users', 'Estados', 'Images']
                        ]);

                    return $this->redirect(['action' => 'view', $pedido->id]);

                } catch (RecordNotFoundException $e) {

                    $this->Flash->error(__('No existe un pedido con ese numero.'));
                }

            }else{

                $this->Flash->error(__('Entrada Invalida.'));
            }
        }

        $this->set('pedido', $pedido);
    }
}
