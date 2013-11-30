<?php
App::uses('AppController', 'Controller');
/**
 * WashingMachines Controller
 *
 * @property WashingMachine $WashingMachine
 * @property PaginatorComponent $Paginator
 */
class WashingMachinesController extends AppController {

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
		$this->WashingMachine->recursive = 0;
		$this->set('washingMachines', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->WashingMachine->exists($id)) {
			throw new NotFoundException(__('Invalid washing machine'));
		}
		$options = array('conditions' => array('WashingMachine.' . $this->WashingMachine->primaryKey => $id));
		$this->set('washingMachine', $this->WashingMachine->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->WashingMachine->create();
			if ($this->WashingMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The washing machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The washing machine could not be saved. Please, try again.'));
			}
		}
		$programs = $this->WashingMachine->Program->find('list');
		$temperatures = $this->WashingMachine->Temperature->find('list');
		$spins = $this->WashingMachine->Spin->find('list');
		$units = $this->WashingMachine->Unit->find('list');
		$additions = $this->WashingMachine->Addition->find('list');
		$this->set(compact('programs', 'temperatures', 'spins', 'units', 'additions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->WashingMachine->exists($id)) {
			throw new NotFoundException(__('Invalid washing machine'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->WashingMachine->save($this->request->data)) {
				$this->Session->setFlash(__('The washing machine has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The washing machine could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('WashingMachine.' . $this->WashingMachine->primaryKey => $id));
			$this->request->data = $this->WashingMachine->find('first', $options);
		}
		$programs = $this->WashingMachine->Program->find('list');
		$temperatures = $this->WashingMachine->Temperature->find('list');
		$spins = $this->WashingMachine->Spin->find('list');
		$units = $this->WashingMachine->Unit->find('list');
		$additions = $this->WashingMachine->Addition->find('list');
		$this->set(compact('programs', 'temperatures', 'spins', 'units', 'additions'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->WashingMachine->id = $id;
		if (!$this->WashingMachine->exists()) {
			throw new NotFoundException(__('Invalid washing machine'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->WashingMachine->delete()) {
			$this->Session->setFlash(__('The washing machine has been deleted.'));
		} else {
			$this->Session->setFlash(__('The washing machine could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
