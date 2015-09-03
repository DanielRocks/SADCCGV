<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Relatorio Controller
 *
 * @property \App\Model\Table\RelatorioTable $Relatorio
 */
class RelatorioController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('relatorio', $this->paginate($this->Relatorio));
        $this->set('_serialize', ['relatorio']);
    }

    /**
     * View method
     *
     * @param string|null $id Relatorio id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relatorio = $this->Relatorio->get($id, [
            'contain' => []
        ]);
        $this->set('relatorio', $relatorio);
        $this->set('_serialize', ['relatorio']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relatorio = $this->Relatorio->newEntity();
        if ($this->request->is('post')) {
            $relatorio = $this->Relatorio->patchEntity($relatorio, $this->request->data);
            if ($this->Relatorio->save($relatorio)) {
                $this->Flash->success(__('The relatorio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The relatorio could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('relatorio'));
        $this->set('_serialize', ['relatorio']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Relatorio id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relatorio = $this->Relatorio->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relatorio = $this->Relatorio->patchEntity($relatorio, $this->request->data);
            if ($this->Relatorio->save($relatorio)) {
                $this->Flash->success(__('The relatorio has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The relatorio could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('relatorio'));
        $this->set('_serialize', ['relatorio']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Relatorio id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relatorio = $this->Relatorio->get($id);
        if ($this->Relatorio->delete($relatorio)) {
            $this->Flash->success(__('The relatorio has been deleted.'));
        } else {
            $this->Flash->error(__('The relatorio could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
