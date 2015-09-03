<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Funcionario Controller
 *
 * @property \App\Model\Table\FuncionarioTable $Funcionario
 */
class FuncionarioController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('funcionario', $this->paginate($this->Funcionario));
        $this->set('_serialize', ['funcionario']);
    }

    /**
     * View method
     *
     * @param string|null $id Funcionario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $funcionario = $this->Funcionario->get($id, [
            'contain' => []
        ]);
        $this->set('funcionario', $funcionario);
        $this->set('_serialize', ['funcionario']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $funcionario = $this->Funcionario->newEntity();
        if ($this->request->is('post')) {
            $funcionario = $this->Funcionario->patchEntity($funcionario, $this->request->data);
            if ($this->Funcionario->save($funcionario)) {
                $this->Flash->success(__('The funcionario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The funcionario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('funcionario'));
        $this->set('_serialize', ['funcionario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Funcionario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $funcionario = $this->Funcionario->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $funcionario = $this->Funcionario->patchEntity($funcionario, $this->request->data);
            if ($this->Funcionario->save($funcionario)) {
                $this->Flash->success(__('The funcionario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The funcionario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('funcionario'));
        $this->set('_serialize', ['funcionario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Funcionario id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $funcionario = $this->Funcionario->get($id);
        if ($this->Funcionario->delete($funcionario)) {
            $this->Flash->success(__('The funcionario has been deleted.'));
        } else {
            $this->Flash->error(__('The funcionario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
