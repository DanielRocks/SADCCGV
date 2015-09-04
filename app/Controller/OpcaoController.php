<?php
/*App::uses('AppController', 'Controller');
/**
 * Opcaos Controller
 *
 * @property Opcao $Opcao
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class OpcaoController extends AppController {

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
		$this->Opcao->recursive = 0;
		$this->set('opcaos', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Opcao->exists($id)) {
			throw new NotFoundException(__('Invalid opcao'));
		}
		$options = array('conditions' => array('Opcao.' . $this->Opcao->primaryKey => $id));
		$this->set('opcao', $this->Opcao->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Opcao->create();
			if ($this->Opcao->save($this->request->data)) {
				$this->Session->setFlash(__('The opcao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opcao could not be saved. Please, try again.'));
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
		if (!$this->Opcao->exists($id)) {
			throw new NotFoundException(__('Invalid opcao'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Opcao->save($this->request->data)) {
				$this->Session->setFlash(__('The opcao has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The opcao could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Opcao.' . $this->Opcao->primaryKey => $id));
			$this->request->data = $this->Opcao->find('first', $options);
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
		$this->Opcao->id = $id;
		if (!$this->Opcao->exists()) {
			throw new NotFoundException(__('Invalid opcao'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Opcao->delete()) {
			$this->Session->setFlash(__('The opcao has been deleted.'));
		} else {
			$this->Session->setFlash(__('The opcao could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
