<?php
App::uses('AppController', 'Controller');
/**
 * Relatorios Controller
 *
 * @property Relatorio $Relatorio
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class RelatorioController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Relatorio->recursive = 0;
		$this->set('relatorios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Relatorio->exists($id)) {
			throw new NotFoundException(__('Invalid relatorio'));
		}
		$options = array('conditions' => array('Relatorio.' . $this->Relatorio->primaryKey => $id));
		$this->set('relatorio', $this->Relatorio->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Relatorio->create();
			if ($this->Relatorio->save($this->request->data)) {
				$this->Session->setFlash(__('The relatorio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The relatorio could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Relatorio->exists($id)) {
			throw new NotFoundException(__('Invalid relatorio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Relatorio->save($this->request->data)) {
				$this->Session->setFlash(__('The relatorio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The relatorio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Relatorio.' . $this->Relatorio->primaryKey => $id));
			$this->request->data = $this->Relatorio->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Relatorio->id = $id;
		if (!$this->Relatorio->exists()) {
			throw new NotFoundException(__('Invalid relatorio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Relatorio->delete()) {
			$this->Session->setFlash(__('The relatorio has been deleted.'));
		} else {
			$this->Session->setFlash(__('The relatorio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
