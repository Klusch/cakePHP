<?php
App::uses('AppController', 'Controller');
/**
 * BankTypes Controller
 *
 * @property BankType $BankType
 * @property PaginatorComponent $Paginator
 */
class BankTypesController extends AppController {

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
		$this->BankType->recursive = 0;
		$this->set('bankTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->BankType->exists($id)) {
			throw new NotFoundException(__('Invalid bank type'));
		}
		$options = array('conditions' => array('BankType.' . $this->BankType->primaryKey => $id));
		$this->set('bankType', $this->BankType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->BankType->create();
			if ($this->BankType->save($this->request->data)) {
				$this->Session->setFlash(__('The bank type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bank type could not be saved. Please, try again.'));
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
		if (!$this->BankType->exists($id)) {
			throw new NotFoundException(__('Invalid bank type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->BankType->save($this->request->data)) {
				$this->Session->setFlash(__('The bank type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bank type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('BankType.' . $this->BankType->primaryKey => $id));
			$this->request->data = $this->BankType->find('first', $options);
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
		$this->BankType->id = $id;
		if (!$this->BankType->exists()) {
			throw new NotFoundException(__('Invalid bank type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->BankType->delete()) {
			$this->Session->setFlash(__('The bank type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The bank type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
