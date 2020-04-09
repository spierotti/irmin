<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\I18n\Time;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 *
 * @method \App\Model\Entity\Pedido[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PedidosController extends AppController
{
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
            $pedidos = $this->paginate($this->Pedidos->find('all')->contain(['Clientes', 'Users', 'Estados', 'Images']));
        }else{
            $pedidos = $this->paginate($this->Pedidos->find('all')->where(['Pedidos.cliente_id =' => $auth['User']['cliente_id']])->contain(['Clientes', 'Users', 'Estados', 'Images']));
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

        $this->set('pedido', $pedido);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedido = $this->Pedidos->newEntity();
        
        if ($this->request->is('post')) {

            // BUSCO IMAGENES PARA EL INTERVALO DE FECHAS DEFINIDAS
            $query = $this->Pedidos->Images->find('all')->where([
                'Images.fecha_hora_imagen >= ' => $this->request->data['fecha_inicio']['year'] . "-" . $this->request->data['fecha_inicio']['month'] . "-" . $this->request->data['fecha_inicio']['day'] . " 00:00:00", 
                'Images.fecha_hora_imagen <= ' => $this->request->data['fecha_fin']['year'] . "-" . $this->request->data['fecha_fin']['month'] . "-" . $this->request->data['fecha_fin']['day'] . " 23:59:59", 
            ]);

            // CARGO EL PEDIDO CON LOS DATOS QUE VIENEN DE LA VIEW
            $pedido = $this->Pedidos->patchEntity($pedido, [
                'cliente_id' => $this->request->data['cliente_id'],
                'estado_id' => 1,
                'fecha_solicitud' => date('Y-m-d H:i:s'),
                'fecha_inicio' => $this->request->data['fecha_inicio'],
                'fecha_fin' => $this->request->data['fecha_fin'],
                'descripcion' => $this->request->data['descripcion'],
                'images' => array()
            ]);

            $i = 0;
            foreach ($query as $row) {
                $pedido->images[$i] = $row;
                $i++;
            }

            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('The pedido has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
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
            $pedido->fecha_evaluacion = Time::now();
            $pedido->estado_id = 3;

           if ($this->Pedidos->save($pedido)) {

               $this->Flash->success(__('The pedido has been saved.'));

               return $this->redirect(['action' => 'index']);
           }

           $this->Flash->error(__('The pedido could not be saved. Please, try again.'));

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
}
