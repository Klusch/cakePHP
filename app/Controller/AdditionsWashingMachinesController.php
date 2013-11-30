<?php
App::uses('AppController', 'Controller');
/**
 * AdditionsWashingMachines Controller
 *
 * @property AdditionsWashingMachine $AdditionsWashingMachine
 * @property PaginatorComponent $Paginator
 */
class AdditionsWashingMachinesController extends AppController {

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
		$this->AdditionsWashingMachine->recursive = 0;
		$this->set('additionsWashingMachines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->AdditionsWashingMachine->exists($id)) {
			throw new NotFoundException(__('Invalid additions washing machine'));
		}
		$options = array('conditions' => array('AdditionsWashingMachine.' . $this->AdditionsWashingMachine->primaryKey => $id));
		$this->set('additionsWashingMachine', $this->AdditionsWashingMachine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AdditionsWashingMachine->create();
			if ($this->AdditionsWashingMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The additions washing machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The additions washing machine could not be saved. Please, try again.'));
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
		if (!$this->AdditionsWashingMachine->exists($id)) {
			throw new NotFoundException(__('Invalid additions washing machine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->AdditionsWashingMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The additions washing machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The additions washing machine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('AdditionsWashingMachine.' . $this->AdditionsWashingMachine->primaryKey => $id));
			$this->request->data = $this->AdditionsWashingMachine->find('first', $options);
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
		$this->AdditionsWashingMachine->id = $id;
		if (!$this->AdditionsWashingMachine->exists()) {
			throw new NotFoundException(__('Invalid additions washing machine'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->AdditionsWashingMachine->delete()) {
			$this->Session->setFlash(__('The additions washing machine has been deleted.'));
		} else {
			$this->Session->setFlash(__('The additions washing machine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
