<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Roles Controller
 *
 * @property \App\Model\Table\RolesTable $Roles
 *
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    public $paginate = [
        'limit' => 5,
        'order' => [
            'Roles.name' => 'asc'
        ]
    ];
    
    /**
     * Is Authorized Method
     * 
     */
    public function isAuthorized($user){

        if(isset($user['role']) and $user['role']['id'] > 1)
        {
            if($this->request->action == 'index' and $user['role']['ver_roles'] == true)
            {
                return true;
            }
            if($this->request->action == 'filtrarroles' and $user['role']['ver_roles'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'add' and $user['role']['nueva_rol'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'edit' and $user['role']['modificar_rol'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'delete' and $user['role']['eliminar_rol'] == true)
            {
                return true;
            }
            elseif($this->request->action == 'view')
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
        $roles = $this->paginate($this->Roles);

        if($borrado){
            $roles = $this->paginate($this->Roles->find()->limit(200));
        }else{
            $roles = $this->paginate($this->Roles->find()->where(['borrado' => false])->limit(200));
        }

        $this->set(compact('roles'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('role', $role);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                if ($this->Auth->user('role_id') == $id){
                    $this->Auth->session->write($this->Auth->sessionKey . '.role', $role->toArray());
                }
                $this->Flash->success(__('The role has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $this->set(compact('role'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        // BORRADO LOGICO
        $this->request->allowMethod(['post', 'delete']);

        $role = $this->Roles->get($id);

        $role->borrado = true;    

        if ($this->Roles->save($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Filtrar Roles Method
     * 
     * filtro para buscar roles en index (AJAX)
     */
    public function filtrarroles(){

        $this->request->allowMethod(['get']);
        
        $keyword = $this->request->query('keyword');
        $activo = $this->request->query('activo');

        $condiciones = array();

        $condiciones['name like '] = '%'.$keyword.'%';

        if($activo){
            $condiciones['borrado = '] = false;
        }
            
        $query = $this->Roles->find('all', [
            'conditions' => $condiciones,
            'order' => [
                'Roles.name' => 'ASC'
            ],
            'limit' => 100
        ]);
        
        $roles = $this->paginate($query);
        $this->set(compact('roles'));
        $this->set('_serialize', 'roles');
    }
}