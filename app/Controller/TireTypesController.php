<?php
App::uses('AppController', 'Controller');
/**
 * TireTypes Controller
 *
 * @property TireType $TireType
 * @property PaginatorComponent $Paginator
 */
class TireTypesController extends AppController {

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
		$this->TireType->recursive = 0;
		$this->set('tireTypes', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->TireType->exists($id)) {
			throw new NotFoundException(__('Invalid tire type'));
		}
		$options = array('conditions' => array('TireType.' . $this->TireType->primaryKey => $id));
		$this->set('tireType', $this->TireType->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->TireType->create();
			if ($this->TireType->save($this->request->data)) {
				$this->Session->setFlash(__('The tire type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tire type could not be saved. Please, try again.'));
			}
		}
		$tires = $this->TireType->Tire->find('list');
		$this->set(compact('tires'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->TireType->exists($id)) {
			throw new NotFoundException(__('Invalid tire type'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->TireType->save($this->request->data)) {
				$this->Session->setFlash(__('The tire type has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tire type could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('TireType.' . $this->TireType->primaryKey => $id));
			$this->request->data = $this->TireType->find('first', $options);
		}
		$tires = $this->TireType->Tire->find('list');
		$this->set(compact('tires'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->TireType->id = $id;
		if (!$this->TireType->exists()) {
			throw new NotFoundException(__('Invalid tire type'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->TireType->delete()) {
			$this->Session->setFlash(__('The tire type has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tire type could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
