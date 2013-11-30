<?php
App::uses('AppController', 'Controller');
/**
 * Spins Controller
 *
 * @property Spin $Spin
 * @property PaginatorComponent $Paginator
 */
class SpinsController extends AppController {

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
		$this->Spin->recursive = 0;
		$this->set('spins', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Spin->exists($id)) {
			throw new NotFoundException(__('Invalid spin'));
		}
		$options = array('conditions' => array('Spin.' . $this->Spin->primaryKey => $id));
		$this->set('spin', $this->Spin->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Spin->create();
			if ($this->Spin->save($this->request->data)) {
				$this->Session->setFlash(__('The spin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The spin could not be saved. Please, try again.'));
			}
		}
		$units = $this->Spin->Unit->find('list');
		$this->set(compact('units'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Spin->exists($id)) {
			throw new NotFoundException(__('Invalid spin'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Spin->save($this->request->data)) {
				$this->Session->setFlash(__('The spin has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The spin could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Spin.' . $this->Spin->primaryKey => $id));
			$this->request->data = $this->Spin->find('first', $options);
		}
		$units = $this->Spin->Unit->find('list');
		$this->set(compact('units'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Spin->id = $id;
		if (!$this->Spin->exists()) {
			throw new NotFoundException(__('Invalid spin'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Spin->delete()) {
			$this->Session->setFlash(__('The spin has been deleted.'));
		} else {
			$this->Session->setFlash(__('The spin could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
