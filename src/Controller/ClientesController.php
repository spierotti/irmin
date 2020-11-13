<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\NotFoundException;
use Cake\Datasource\Exception\RecordNotFoundException;

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
            'Clientes.id' => 'asc'
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
            elseif($this->request->action == 'buscarclientecuit' and $user['role']['ver_clientes'] == true)
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

            $data = $this->request->getData();

            $cantidad = $this->Clientes->find('all', [
                'conditions' => [
                    'Clientes.cuit' => $data['cuit']
                ],
                'order' => [
                    'Clientes.id' => 'ASC'
                ],
            ])->count();

            if ($cantidad == 0){

                //$cliente = $this->Clientes->patchEntity($cliente, $this->request->getData());            
                $cliente = $this->Clientes->patchEntity($cliente, $data);            

                if ($this->Clientes->save($cliente)) {
                    
                    $this->Flash->success(__('Cliente creado con éxito.'));

                    return $this->redirect(['action' => 'index']);

                }

                $this->Flash->error(__('Error al crear el Cliente.'));

            } else {

                $this->Flash->error(__('¡Ese CUIT / DNI ya está registrado!'));

            }
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

                $this->Flash->success(__('Cliente actualizado con éxito.'));

                return $this->redirect(['action' => 'index']);
            }

            $this->Flash->error(__('Error al actualizar el cliente.'));
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

            $this->Flash->success(__('Cliente eliminado con éxito.'));

        } else {

            $this->Flash->error(__('Error al eliminar el cliente.'));
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

            $this->Flash->success(__('Cliente restaurado con éxito.'));

        } else {

            $this->Flash->error(__('Error al restaurar el cliente.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Buscar Clientes method
     * 
     * @param string|null $term Descripcion parcial de name de cliente
     */
    public function buscarclientes()
    {
        $term = null;

        if(!empty($this->request->query['term'])){

            $term = $this->request->query['term'];
            $terms = explode(' ', trim($term));
            $terms = array_diff($terms, array(''));

            foreach($terms as $t){

                $conditions[] = array(
                    'OR' => [
                            'Clientes.cuit LIKE' => '%' . $t . '%',
                            'Clientes.name LIKE' => '%' . $t . '%'
                        ]
                    );
            }

            $clientes = $this->Clientes->find('all', array('recursive' => -1, 'conditions' => $conditions, 'limit' => 20));
        }

        echo json_encode($clientes);

        $this->autoRender = false;
    }

    /**
     *  Buscar Cliente x  CUIT / DNI
     */
    public function buscarclientecuit($cliente = null){

        if(sizeof($this->request->getData()) > 0){

            $data = $this->request->getData();

            if(ctype_digit ($data['id'])){

                $auth = $this->request->session()->read('Auth');

                try {

                    $conditions[] = array('Clientes.cuit = ' => $data['id']);
        
                    $c = $this->Clientes->find(
                        'all', 
                        array('recursive' => -1,
                         'conditions' => $conditions)
                        )->first();

                    if (!is_null($c)){

                        $cliente = $c->toArray();

                        return $this->redirect(['action' => 'view', $cliente['id']]);
                        
                    }else{

                        $this->Flash->error(__('No existe un Cliente con ese CUIT/DNI.'));
                    }

                } catch (RecordNotFoundException $e) {

                    $this->Flash->error(__('No existe un Cliente con ese CUIT/DNI.'));
                }

            }else{

                $this->Flash->error(__('Solo ingresar Numeros sin "." ni "-".'));
            }
        }

        $this->set('cliente', $cliente);
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
