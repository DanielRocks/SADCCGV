<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Questionario Controller
 *
 * @property \App\Model\Table\QuestionarioTable $Questionario
 */
class QuestionarioController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('questionario', $this->paginate($this->Questionario));
        $this->set('_serialize', ['questionario']);
    }

    /**
     * View method
     *
     * @param string|null $id Questionario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $questionario = $this->Questionario->get($id, [
            'contain' => []
        ]);
        $this->set('questionario', $questionario);
        $this->set('_serialize', ['questionario']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $questionario = $this->Questionario->newEntity();
        if ($this->request->is('post')) {
            $questionario = $this->Questionario->patchEntity($questionario, $this->request->data);
            if ($this->Questionario->save($questionario)) {
                $this->Flash->success(__('The questionario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The questionario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('questionario'));
        $this->set('_serialize', ['questionario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Questionario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $questionario = $this->Questionario->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $questionario = $this->Questionario->patchEntity($questionario, $this->request->data);
            if ($this->Questionario->save($questionario)) {
                $this->Flash->success(__('The questionario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The questionario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('questionario'));
        $this->set('_serialize', ['questionario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Questionario id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $questionario = $this->Questionario->get($id);
        if ($this->Questionario->delete($questionario)) {
            $this->Flash->success(__('The questionario has been deleted.'));
        } else {
            $this->Flash->error(__('The questionario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
