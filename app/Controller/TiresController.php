<?php
App::uses('AppController', 'Controller');
/**
 * Tires Controller
 *
 * @property Tire $Tire
 * @property PaginatorComponent $Paginator
 */
class TiresController extends AppController {

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
		$this->Tire->recursive = 0;
		$this->set('tires', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tire->exists($id)) {
			throw new NotFoundException(__('Invalid tire'));
		}
		$options = array('conditions' => array('Tire.' . $this->Tire->primaryKey => $id));
		$this->set('tire', $this->Tire->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tire->create();
			if ($this->Tire->save($this->request->data)) {
				$this->Session->setFlash(__('The tire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tire could not be saved. Please, try again.'));
			}
		}
		$cars = $this->Tire->Car->find('list');
		$tireTypes = $this->Tire->TireType->find('list');
		$this->set(compact('cars', 'tireTypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tire->exists($id)) {
			throw new NotFoundException(__('Invalid tire'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tire->save($this->request->data)) {
				$this->Session->setFlash(__('The tire has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tire could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tire.' . $this->Tire->primaryKey => $id));
			$this->request->data = $this->Tire->find('first', $options);
		}
		$cars = $this->Tire->Car->find('list');
		$tireTypes = $this->Tire->TireType->find('list');
		$this->set(compact('cars', 'tireTypes'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tire->id = $id;
		if (!$this->Tire->exists()) {
			throw new NotFoundException(__('Invalid tire'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tire->delete()) {
			$this->Session->setFlash(__('The tire has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tire could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
