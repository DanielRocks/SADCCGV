<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Escolha Controller
 *
 * @property \App\Model\Table\EscolhaTable $Escolha
 */
class EscolhaController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('escolha', $this->paginate($this->Escolha));
        $this->set('_serialize', ['escolha']);
    }

    /**
     * View method
     *
     * @param string|null $id Escolha id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $escolha = $this->Escolha->get($id, [
            'contain' => []
        ]);
        $this->set('escolha', $escolha);
        $this->set('_serialize', ['escolha']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $escolha = $this->Escolha->newEntity();
        if ($this->request->is('post')) {
            $escolha = $this->Escolha->patchEntity($escolha, $this->request->data);
            if ($this->Escolha->save($escolha)) {
                $this->Flash->success(__('The escolha has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The escolha could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('escolha'));
        $this->set('_serialize', ['escolha']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Escolha id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $escolha = $this->Escolha->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $escolha = $this->Escolha->patchEntity($escolha, $this->request->data);
            if ($this->Escolha->save($escolha)) {
                $this->Flash->success(__('The escolha has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The escolha could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('escolha'));
        $this->set('_serialize', ['escolha']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Escolha id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $escolha = $this->Escolha->get($id);
        if ($this->Escolha->delete($escolha)) {
            $this->Flash->success(__('The escolha has been deleted.'));
        } else {
            $this->Flash->error(__('The escolha could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
