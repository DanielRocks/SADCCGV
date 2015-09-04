<?php
/*App::uses('AppController', 'Controller');
/**
 * Escolhas Controller
 *
 * @property Escolha $Escolha
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class EscolhaController extends AppController {

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
		$this->Escolha->recursive = 0;
		$this->set('escolhas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Escolha->exists($id)) {
			throw new NotFoundException(__('Invalid escolha'));
		}
		$options = array('conditions' => array('Escolha.' . $this->Escolha->primaryKey => $id));
		$this->set('escolha', $this->Escolha->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Escolha->create();
			if ($this->Escolha->save($this->request->data)) {
				$this->Session->setFlash(__('The escolha has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The escolha could not be saved. Please, try again.'));
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
		if (!$this->Escolha->exists($id)) {
			throw new NotFoundException(__('Invalid escolha'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Escolha->save($this->request->data)) {
				$this->Session->setFlash(__('The escolha has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The escolha could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Escolha.' . $this->Escolha->primaryKey => $id));
			$this->request->data = $this->Escolha->find('first', $options);
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
		$this->Escolha->id = $id;
		if (!$this->Escolha->exists()) {
			throw new NotFoundException(__('Invalid escolha'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Escolha->delete()) {
			$this->Session->setFlash(__('The escolha has been deleted.'));
		} else {
			$this->Session->setFlash(__('The escolha could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
