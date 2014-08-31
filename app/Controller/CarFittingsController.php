<?php
App::uses('AppController', 'Controller');
/**
 * CarFittings Controller
 *
 * @property CarFitting $CarFitting
 * @property PaginatorComponent $Paginator
 */
class CarFittingsController extends AppController {

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
		$this->CarFitting->recursive = 0;
		$this->set('carFittings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CarFitting->exists($id)) {
			throw new NotFoundException(__('Invalid car fitting'));
		}
		$options = array('conditions' => array('CarFitting.' . $this->CarFitting->primaryKey => $id));
		$this->set('carFitting', $this->CarFitting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CarFitting->create();
			if ($this->CarFitting->save($this->request->data)) {
				$this->Session->setFlash(__('The car fitting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The car fitting could not be saved. Please, try again.'));
			}
		}
		$cars = $this->CarFitting->Car->find('list');
		$this->set(compact('cars'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CarFitting->exists($id)) {
			throw new NotFoundException(__('Invalid car fitting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CarFitting->save($this->request->data)) {
				$this->Session->setFlash(__('The car fitting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The car fitting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CarFitting.' . $this->CarFitting->primaryKey => $id));
			$this->request->data = $this->CarFitting->find('first', $options);
		}
		$cars = $this->CarFitting->Car->find('list');
		$this->set(compact('cars'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CarFitting->id = $id;
		if (!$this->CarFitting->exists()) {
			throw new NotFoundException(__('Invalid car fitting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CarFitting->delete()) {
			$this->Session->setFlash(__('The car fitting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The car fitting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
