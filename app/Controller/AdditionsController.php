<?php
App::uses('AppController', 'Controller');
/**
 * Additions Controller
 *
 * @property Addition $Addition
 * @property PaginatorComponent $Paginator
 */
class AdditionsController extends AppController {

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
		$this->Addition->recursive = 0;
		$this->set('additions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Addition->exists($id)) {
			throw new NotFoundException(__('Invalid addition'));
		}
		$options = array('conditions' => array('Addition.' . $this->Addition->primaryKey => $id));
		$this->set('addition', $this->Addition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Addition->create();
			if ($this->Addition->save($this->request->data)) {
				$this->Session->setFlash(__('The addition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The addition could not be saved. Please, try again.'));
			}
		}
		$washingMachines = $this->Addition->WashingMachine->find('list');
		$this->set(compact('washingMachines'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Addition->exists($id)) {
			throw new NotFoundException(__('Invalid addition'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Addition->save($this->request->data)) {
				$this->Session->setFlash(__('The addition has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The addition could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Addition.' . $this->Addition->primaryKey => $id));
			$this->request->data = $this->Addition->find('first', $options);
		}
		$washingMachines = $this->Addition->WashingMachine->find('list');
		$this->set(compact('washingMachines'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Addition->id = $id;
		if (!$this->Addition->exists()) {
			throw new NotFoundException(__('Invalid addition'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Addition->delete()) {
			$this->Session->setFlash(__('The addition has been deleted.'));
		} else {
			$this->Session->setFlash(__('The addition could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
