<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Informes Controller
 *
 * @property \App\Model\Table\InformesTable $Informes
 *
 * @method \App\Model\Entity\Informe[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InformesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
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
     * Edit method
     *
     * @param string|null $id Informe id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $informe = $this->Informes->get($id, [
            'contain' => ['Images']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $informe = $this->Informes->patchEntity($informe, $this->request->getData());
            if ($this->Informes->save($informe)) {
                $this->Flash->success(__('The informe has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The informe could not be saved. Please, try again.'));
        }
        $images = $this->Informes->Images->find('list', ['limit' => 200]);
        $this->set(compact('informe', 'images'));
    }*/
}
