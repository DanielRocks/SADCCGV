<?php
/*App::uses('AppController', 'Controller');
/**
 * Gerentes Controller
 *
 * @property Gerente $Gerente
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class GerenteController extends AppController {

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
		$this->Gerente->recursive = 0;
		$this->set('gerentes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Gerente->exists($id)) {
			throw new NotFoundException(__('Invalid gerente'));
		}
		$options = array('conditions' => array('Gerente.' . $this->Gerente->primaryKey => $id));
		$this->set('gerente', $this->Gerente->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Gerente->create();
			if ($this->Gerente->save($this->request->data)) {
				$this->Session->setFlash(__('The gerente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gerente could not be saved. Please, try again.'));
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
		if (!$this->Gerente->exists($id)) {
			throw new NotFoundException(__('Invalid gerente'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Gerente->save($this->request->data)) {
				$this->Session->setFlash(__('The gerente has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gerente could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Gerente.' . $this->Gerente->primaryKey => $id));
			$this->request->data = $this->Gerente->find('first', $options);
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
		$this->Gerente->id = $id;
		if (!$this->Gerente->exists()) {
			throw new NotFoundException(__('Invalid gerente'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Gerente->delete()) {
			$this->Session->setFlash(__('The gerente has been deleted.'));
		} else {
			$this->Session->setFlash(__('The gerente could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
