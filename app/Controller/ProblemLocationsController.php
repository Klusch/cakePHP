<?php
App::uses('AppController', 'Controller');
/**
 * ProblemLocations Controller
 *
 * @property ProblemLocation $ProblemLocation
 * @property PaginatorComponent $Paginator
 */
class ProblemLocationsController extends AppController {

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
		$this->ProblemLocation->recursive = 0;
		$this->set('problemLocations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ProblemLocation->exists($id)) {
			throw new NotFoundException(__('Invalid problem location'));
		}
		$options = array('conditions' => array('ProblemLocation.' . $this->ProblemLocation->primaryKey => $id));
		$this->set('problemLocation', $this->ProblemLocation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ProblemLocation->create();
			if ($this->ProblemLocation->save($this->request->data)) {
				$this->Session->setFlash(__('The problem location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem location could not be saved. Please, try again.'));
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
		if (!$this->ProblemLocation->exists($id)) {
			throw new NotFoundException(__('Invalid problem location'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ProblemLocation->save($this->request->data)) {
				$this->Session->setFlash(__('The problem location has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The problem location could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ProblemLocation.' . $this->ProblemLocation->primaryKey => $id));
			$this->request->data = $this->ProblemLocation->find('first', $options);
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
		$this->ProblemLocation->id = $id;
		if (!$this->ProblemLocation->exists()) {
			throw new NotFoundException(__('Invalid problem location'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ProblemLocation->delete()) {
			$this->Session->setFlash(__('The problem location has been deleted.'));
		} else {
			$this->Session->setFlash(__('The problem location could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
