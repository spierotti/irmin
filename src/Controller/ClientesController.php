<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Clientes Controller
 *
 * @property \App\Model\Table\ClientesTable $Clientes
 *
 * @method \App\Model\Entity\Cliente[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ClientesController extends AppController
{

    public $paginate = [
        'limit' => 5,
        'order' => [
            'Pedidos.id' => 'desc'
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
            if($this->request->action == 'index' and $user['role']['ver_clientes'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'add' and $user['role']['nuevo_cliente'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'edit' and $user['role']['modificar_cliente'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'delete' and $user['role']['eliminar_cliente'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'view' and $user['role']['ver_clientes'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'buscarclientes' and $user['role']['ver_clientes'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'filtrarclientes'and $user['role']['nuevo_cliente'] == true)
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
    public function index($borrado = null)
    {
        if($borrado){
            $clientes = $this->paginate($this->Clientes->find('all')->limit(200));
        }else{
            $clientes = $this->paginate($this->Clientes->find()->where(['borrado' => false]));
        }
        
        $this->set(compact('clientes'));
    }

    /**
     * View method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);

        $this->set('cliente', $cliente);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cliente = $this->Clientes->newEntity();
        if ($this->request->is('post')) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cliente = $this->Clientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());
            if ($this->Clientes->save($cliente)) {
                $this->Flash->success(__('The cliente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The cliente could not be saved. Please, try again.'));
        }
        $this->set(compact('cliente'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // BORRADO LÓGICO
        $this->request->allowMethod(['post']);
        $cliente = $this->Clientes->get($id);
        $cliente->borrado = true;
        if($this->Clientes->save($cliente)){
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Activar method
     *
     * @param string|null $id Cliente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function activar($id = null)
    {
        // VUELVO A ACTIVAR EL CLIENTE
        $this->request->allowMethod(['post']);
        $cliente = $this->Clientes->get($id);
        $cliente->borrado = false;
        if($this->Clientes->save($cliente)){
            $this->Flash->success(__('The cliente has been deleted.'));
        } else {
            $this->Flash->error(__('The cliente could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Buscar Clientes method
     * 
     * @param string|null $term Descripcion parcial de name de cliente
     */
    public function buscarclientes(){
        $term = null;
        if(!empty($this->request->query['term'])){
            $term = $this->request->query['term'];
            $terms = explode(' ', trim($term));
            $terms = array_diff($terms, array(''));
            foreach($terms as $t){
                $conditions[] = array('Clientes.cuit LIKE' => '%' . $t . '%');
            }
            $clientes = $this->Clientes->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 20));
        }
        echo json_encode($clientes);
        $this->autoRender = false;
    }

    /**
     * Filtrar Clientes Method
     * 
     * filtro para buscar clientes en index (AJAX)
     */
    public function filtrarclientes(){

        $this->request->allowMethod(['get']);
        
        $keyword = $this->request->query('keyword');
        $activo = $this->request->query('activo');

        $condiciones = array();

        $condiciones['name like '] = '%'.$keyword.'%';

        if($activo){
            $condiciones['borrado = '] = false;
        }
            
        $query = $this->Clientes->find('all', [
            'conditions' => $condiciones,
            'order' => [
                'Clientes.id' => 'ASC'
            ],
            'limit' => 100
        ]);

        $clientes = $this->paginate($query);
        $this->set(compact('clientes'));
        $this->set('_serialize', 'clientes');
    }
}
