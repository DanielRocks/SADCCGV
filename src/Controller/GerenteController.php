<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Gerente Controller
 *
 * @property \App\Model\Table\GerenteTable $Gerente
 */
class GerenteController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('gerente', $this->paginate($this->Gerente));
        $this->set('_serialize', ['gerente']);
    }

    /**
     * View method
     *
     * @param string|null $id Gerente id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $gerente = $this->Gerente->get($id, [
            'contain' => []
        ]);
        $this->set('gerente', $gerente);
        $this->set('_serialize', ['gerente']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $gerente = $this->Gerente->newEntity();
        if ($this->request->is('post')) {
            $gerente = $this->Gerente->patchEntity($gerente, $this->request->data);
            if ($this->Gerente->save($gerente)) {
                $this->Flash->success(__('The gerente has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gerente could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('gerente'));
        $this->set('_serialize', ['gerente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Gerente id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $gerente = $this->Gerente->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $gerente = $this->Gerente->patchEntity($gerente, $this->request->data);
            if ($this->Gerente->save($gerente)) {
                $this->Flash->success(__('The gerente has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The gerente could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('gerente'));
        $this->set('_serialize', ['gerente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Gerente id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $gerente = $this->Gerente->get($id);
        if ($this->Gerente->delete($gerente)) {
            $this->Flash->success(__('The gerente has been deleted.'));
        } else {
            $this->Flash->error(__('The gerente could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
