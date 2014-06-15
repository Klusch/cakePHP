<?php
App::uses('AppController', 'Controller');
/**
 * Utilities Controller
 *
 * @property Utility $Utility
 * @property PaginatorComponent $Paginator
 */
class UtilitiesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Utility->recursive = 0;
		$this->set('utilities', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Utility->exists($id)) {
			throw new NotFoundException(__('Invalid utility'));
		}
		$options = array('conditions' => array('Utility.' . $this->Utility->primaryKey => $id));
		$this->set('utility', $this->Utility->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Utility->create();
			if ($this->Utility->save($this->request->data)) {
				$this->Session->setFlash(__('The utility has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The utility could not be saved. Please, try again.'));
			}
		}
		$shops = $this->Utility->Shop->find('list');
		$this->set(compact('shops'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Utility->exists($id)) {
			throw new NotFoundException(__('Invalid utility'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Utility->save($this->request->data)) {
				$this->Session->setFlash(__('The utility has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The utility could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Utility.' . $this->Utility->primaryKey => $id));
			$this->request->data = $this->Utility->find('first', $options);
		}
		$shops = $this->Utility->Shop->find('list');
		$this->set(compact('shops'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Utility->id = $id;
		if (!$this->Utility->exists()) {
			throw new NotFoundException(__('Invalid utility'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Utility->delete()) {
			$this->Session->setFlash(__('The utility has been deleted.'));
		} else {
			$this->Session->setFlash(__('The utility could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
