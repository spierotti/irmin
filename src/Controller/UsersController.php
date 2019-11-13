<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Routing\Router;
use Cake\Mailer\Email;
use Cake\ORM\Query;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        //$users = $this->paginate($this->Users);
        $users = $this->paginate($this->Users->find()->contain('Roles'));

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        // Get a list of tags.
        $roles = $this->Users->Roles->find('list');

        //debug($roles);

        // Set tags to the view context
        $this->set('roles', $roles);

        $this->set(compact('user'));
    }

    /**
     * signup method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    /*public function signup()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }*/

    /**
     * login method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function login()
    {
        
        if ($this->Auth->user('id')){

            //usuario ya esta logueado

            $this->Flash->warning(__('¡Ya estas Loggueado!'));

            return $this->redirect(['controller' => 'Images', 'action' => 'index']);

        }else{
    
            if ($this->request->is('post')){
            
                //usuario no esta loggueado

                $user = $this->Auth->identify();
                
                if($user){

                    $this->Auth->setUser($user);

                    $this->Flash->success(__('¡Login Exitoso!'));

                    return $this->redirect(['controller' => 'Images', 'action' => 'index']);
                }

                //error al loguearse

                $this->Flash->error(__('¡Email o Contraseña Icorrectas!'));

            }
        }
    }

    /**
     * Logout method
     */
    public function logout(){

        $this->Flash->success(__('¡Logout Existoso!'));

        return $this->redirect($this->Auth->logout());
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        // Get a list of tags.
        $roles = $this->Users->Roles->find('list');

        //debug($roles);

        // Set tags to the view context
        $this->set('roles', $roles);

        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);

        $user = $this->Users->get($id);

        if ($this->Users->delete($user)) {

            $this->Flash->success(__('The user has been deleted.'));

        } else {

            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
            
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Before Filter Method
     * 
     */
    public function beforeFilter(Event $event){
        $this->Auth->allow(['forgotPassword','resetPassword']);
    }

    /**
     * Enviar email para resetear contraseña
     * 
     */
    public function forgotPassword($user = null){

        if ($this->request->is('post')) {
            
            $query = $this->Users->findByEmail($this->request->data['email']);
            $user = $query->first();

            if (is_null($user)) {

                $this->Flash->error('¡La cuenta de correo no existe!');

            } else {

                $passkey = uniqid();

                $url = Router::Url(['controller' => 'users', 'action' => 'resetPassword'], true) . '/' . $passkey;

                $timeout = time() + DAY;

                 if ($this->Users->updateAll(['passkey' => $passkey, 'timeout' => $timeout], ['id' => $user->id])){

                    $this->sendResetEmail($url, $user);
                    $this->redirect(['action' => 'login']);

                } else {

                    $this->Flash->error('¡Error al guardar!');

                }
            }
        }
        
        $this->set(compact('user'));
    }

    /**
     * Resetea Contraseña a traves de email
     * 
     */
    public function resetPassword($passkey = null){

        if ($passkey) {

            $query = $this->Users->find('all', ['conditions' => ['passkey' => $passkey, 'timeout >' => time()]]);
            $user = $query->first();

            if ($user) {

                if (!empty($this->request->data)) {
                    // Clear passkey and timeout

                    debug($this->request->data);

                    $this->request->data['passkey'] = null;
                    $this->request->data['timeout'] = null;

                    //$user = $this->Users->patchEntity($user, $this->request->data);

                    $user = $this->Users->patchEntity($user, [  
                        'password'      => $this->request->data['password'], 
                        'repetir_nuevo_password'     => $this->request->data['repetir_nuevo_password']
                    ],  
                    ['validate' => 'reset']  
                );

                    if ($this->Users->save($user)) {

                        $this->Flash->set(__('Your password has been updated.'));
                        return $this->redirect(array('action' => 'login'));

                    } else {

                        $this->Flash->error(__('The password could not be updated. Please, try again.'));

                    }
                }

            } else {

                $this->Flash->error('Invalid or expired passkey. Please check your email or try again');
                $this->redirect(['action' => 'password']);

            }

            unset($user->password);
            $this->set(compact('user'));

        } else {

            $this->redirect('/');

        }

    }

    /**
     * Enviar Email de reseteo
     */
    private function sendResetEmail($url, $user) {

        $email = new Email('gmail');
        $email->template('resetpw');
        $email->emailFormat('both');
        $email->from('santiagopierotti@gmail.com');
        $email->to($user->email, $user->full_name);
        $email->subject('IRMIN - RESETEAR CONTRASEÑA');
        $email->viewVars(['url' => $url, 'username' => $user->username]);

        if ($email->send()) {

            $this->Flash->success(__('¡Un email ha sido enviado a tu casilla de correo!'));

        } else {

            $this->Flash->error(__('Error al enviar email: ') . $email->smtpError);

        }
    }

    /**
     * Cambiar Contraseña
     */
    public function changePassword(){

        //$user = $this->Users->get($this->Auth->user('id'));
        $user = $this->Users->newEntity();

        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->get($this->Auth->user('id'));

            /*$hash = new DefaultPasswordHasher();
            
            // CHEQUEO Q LA PASS INGRESADA SEA IGUAL A LA ALMACENADA EN BD y 
            // Q LA NUEVA PASS SEA DIFERENTE A LA ANTERIOR
            if($hash->check($this->request->data['password'], $user['password']) &&
                (!$hash-check($this->reques->data['nuevo_password'], $user['password']))){*/

                //$user = $this->Users->patchEntity($user, $this->request->getData());
                $user = $this->Users->patchEntity($user, [  
                        'viejo_password'  => $this->request->data['viejo_password'], 
                        'password'      => $this->request->data['nuevo_password'], 
                        'nuevo_password'     => $this->request->data['nuevo_password'], 
                        'repetir_nuevo_password'     => $this->request->data['repetir_nuevo_password'] 
                    ],  
                    ['validate' => 'password']  
                );

                if ($this->Users->save($user)) {

                    $this->Flash->success(__('The user has been saved.'));

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('The user could not be saved. Please, try again.'));

            /*}else{

                $this->Flash->error(__('¡Contraseña Erronea!'));                

            }*/
        }

        $this->set(compact('user'));
    }

}
