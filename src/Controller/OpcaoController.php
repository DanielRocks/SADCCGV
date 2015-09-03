<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Opcao Controller
 *
 * @property \App\Model\Table\OpcaoTable $Opcao
 */
class OpcaoController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('opcao', $this->paginate($this->Opcao));
        $this->set('_serialize', ['opcao']);
    }

    /**
     * View method
     *
     * @param string|null $id Opcao id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $opcao = $this->Opcao->get($id, [
            'contain' => []
        ]);
        $this->set('opcao', $opcao);
        $this->set('_serialize', ['opcao']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $opcao = $this->Opcao->newEntity();
        if ($this->request->is('post')) {
            $opcao = $this->Opcao->patchEntity($opcao, $this->request->data);
            if ($this->Opcao->save($opcao)) {
                $this->Flash->success(__('The opcao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The opcao could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('opcao'));
        $this->set('_serialize', ['opcao']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Opcao id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $opcao = $this->Opcao->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $opcao = $this->Opcao->patchEntity($opcao, $this->request->data);
            if ($this->Opcao->save($opcao)) {
                $this->Flash->success(__('The opcao has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The opcao could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('opcao'));
        $this->set('_serialize', ['opcao']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Opcao id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $opcao = $this->Opcao->get($id);
        if ($this->Opcao->delete($opcao)) {
            $this->Flash->success(__('The opcao has been deleted.'));
        } else {
            $this->Flash->error(__('The opcao could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
