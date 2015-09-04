<?php
/*App::uses('AppController', 'Controller');
/**
 * Pergunta Controller
 *
 * @property Perguntum $Perguntum
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PerguntaController extends AppController {

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
		$this->Perguntum->recursive = 0;
		$this->set('pergunta', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Perguntum->exists($id)) {
			throw new NotFoundException(__('Invalid perguntum'));
		}
		$options = array('conditions' => array('Perguntum.' . $this->Perguntum->primaryKey => $id));
		$this->set('perguntum', $this->Perguntum->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Perguntum->create();
			if ($this->Perguntum->save($this->request->data)) {
				$this->Session->setFlash(__('The perguntum has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perguntum could not be saved. Please, try again.'));
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
		if (!$this->Perguntum->exists($id)) {
			throw new NotFoundException(__('Invalid perguntum'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Perguntum->save($this->request->data)) {
				$this->Session->setFlash(__('The perguntum has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The perguntum could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Perguntum.' . $this->Perguntum->primaryKey => $id));
			$this->request->data = $this->Perguntum->find('first', $options);
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
		$this->Perguntum->id = $id;
		if (!$this->Perguntum->exists()) {
			throw new NotFoundException(__('Invalid perguntum'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Perguntum->delete()) {
			$this->Session->setFlash(__('The perguntum has been deleted.'));
		} else {
			$this->Session->setFlash(__('The perguntum could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
