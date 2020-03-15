<?php
namespace App\Controller;

use App\Controller\AppController;

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
    public function isAuthorized($user){

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
        $pedidos = $this->paginate($this->Pedidos->find('all')->contain(['Clientes', 'Users', 'Estados', 'Images']));

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

            //debug($this->request->getData());
            
            $pedido = $this->Pedidos->patchEntity($pedido, [
                'cliente_id' => $this->request->data['razon_social'],
                'estado_id' => 1,
                'fecha_solicitud' => date('Y-m-d H:i:s'),
                'fecha_inicio' => $this->request->data['fecha_inicio'],
                'fecha_fin' => $this->request->data['fecha_inicio'],
                'descripcion' => $this->request->data['descripcion'],
            ]);

            debug($pedido);
            
            if ($this->Pedidos->save($pedido)) {

                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
        }
        
        //$clientes = $this->Pedidos->Clientes->find('list', ['limit' => 200]);
        $clientes = $this->Pedidos->Clientes->find('list', ['limit' => 200]);
        $this->set('clientes', $clientes);

        //$users = $this->Pedidos->Users->find('list', ['limit' => 200]);
        $estados = $this->Pedidos->Estados->find('list', ['limit' => 200]);
        //$images = $this->Pedidos->Images->find('list', ['limit' => 200]);
        //$this->set(compact('pedido', 'clientes', 'users', 'estados', 'images'));*/
        $this->set(compact('pedido'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
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
        $this->request->allowMethod(['post', 'delete']);

        $pedido = $this->Pedidos->get($id);
        
        if ($this->Pedidos->delete($pedido)) {

            $this->Flash->success(__('The pedido has been deleted.'));

        } else {

            $this->Flash->error(__('The pedido could not be deleted. Please, try again.'));

        }

        return $this->redirect(['action' => 'index']);
    }

    public function searchCliente($term = null){
        
        debug('entre');

        if(!empty($this->request->query['term'])){
            
            $term = $this->request->query['term'];
            $terms = explode(' ', trim($term));
            $terms = array_diff($term, array(''));
            
            foreach($terms as $term){
                $condition[] = array('Cliente.razon_social LIKE' => '%' . $term . '%');
            }

            $clientes = $this->Pedidos->Clientes->find('all', array('recursive' => 1, 'fields' => array('Cliente.id', 'Cliente.name'), 'conditions' => $condition, 'limit' => 20));
            debug($clientes);
        }
        
        echo json_encode($clientes);
       
        $this->autorender = false;
    }
}
