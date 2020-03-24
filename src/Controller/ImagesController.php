<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Images Controller
 *
 * @property \App\Model\Table\ImagesTable $Images
 *
 * @method \App\Model\Entity\Image[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ImagesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $images = $this->paginate($this->Images);

        $this->set(compact('images'));
    }

    /**
     * View method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    
    /*public function view($fecha_hora_imagen = null)
    {
        $query = $images->find('all')
                        ->where('Images.fecha_hora_imagen = ' => $fecha_hora_imagen);

        $image = $query->first();

        $this->set('image', $image);
    }*/
    
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
        $image = $this->Images->newEntity();

        if ($this->request->is('post')) {

            $img = $this->request->getData();

            $texto = substr($img['photo']['name'], 0,5);

            if ($texto == "topes"){

                $img['fecha_hora_imagen']['year'] = substr($img['photo']['name'], 5,2);
                $img['fecha_hora_imagen']['month'] = substr($img['photo']['name'], 7,2);
                $img['fecha_hora_imagen']['day'] = substr($img['photo']['name'], 9,2);
                $img['fecha_hora_imagen']['hour'] = substr($img['photo']['name'], 12,2);
                $img['fecha_hora_imagen']['minute'] = substr($img['photo']['name'], 14,2);

                //$image = $this->Images->patchEntity($image, $this->request->getData());
                $image = $this->Images->patchEntity($image, $img);

                if ($this->Images->save($image)) {

                    $this->Flash->success(__('LA IMAGEN SE GUARDO CON EXITO.'));

                    return $this->redirect(['action' => 'index']);
                }

                $this->Flash->error(__('ERRO AL GUARDAR IMAGEN. INTENTELO NUEVAMENTE.'));

            }else{

                $this->Flash->error(__('LA IMAGEN DEBE SER DE TOPES NUBOSOS.'));

            }
        }
        $this->set(compact('image'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $image = $this->Images->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $image = $this->Images->patchEntity($image, $this->request->getData());
            if ($this->Images->save($image)) {
                $this->Flash->success(__('The image has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The image could not be saved. Please, try again.'));
        }
        $this->set(compact('image'));
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $image = $this->Images->get($id);
        if ($this->Images->delete($image)) {
            $this->Flash->success(__('The image has been deleted.'));
        } else {
            $this->Flash->error(__('The image could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
