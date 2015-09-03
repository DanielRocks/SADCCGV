<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pergunta Controller
 *
 * @property \App\Model\Table\PerguntaTable $Pergunta
 */
class PerguntaController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('pergunta', $this->paginate($this->Pergunta));
        $this->set('_serialize', ['pergunta']);
    }

    /**
     * View method
     *
     * @param string|null $id Perguntum id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $perguntum = $this->Pergunta->get($id, [
            'contain' => []
        ]);
        $this->set('perguntum', $perguntum);
        $this->set('_serialize', ['perguntum']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $perguntum = $this->Pergunta->newEntity();
        if ($this->request->is('post')) {
            $perguntum = $this->Pergunta->patchEntity($perguntum, $this->request->data);
            if ($this->Pergunta->save($perguntum)) {
                $this->Flash->success(__('The perguntum has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The perguntum could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('perguntum'));
        $this->set('_serialize', ['perguntum']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Perguntum id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $perguntum = $this->Pergunta->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $perguntum = $this->Pergunta->patchEntity($perguntum, $this->request->data);
            if ($this->Pergunta->save($perguntum)) {
                $this->Flash->success(__('The perguntum has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The perguntum could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('perguntum'));
        $this->set('_serialize', ['perguntum']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Perguntum id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $perguntum = $this->Pergunta->get($id);
        if ($this->Pergunta->delete($perguntum)) {
            $this->Flash->success(__('The perguntum has been deleted.'));
        } else {
            $this->Flash->error(__('The perguntum could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
