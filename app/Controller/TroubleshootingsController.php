<?php
App::uses('AppController', 'Controller');
/**
 * Troubleshootings Controller
 *
 * @property Troubleshooting $Troubleshooting
 * @property PaginatorComponent $Paginator
 */
class TroubleshootingsController extends AppController {

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
		$this->Troubleshooting->recursive = 0;
		$this->set('troubleshootings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Troubleshooting->exists($id)) {
			throw new NotFoundException(__('Invalid troubleshooting'));
		}
		$options = array('conditions' => array('Troubleshooting.' . $this->Troubleshooting->primaryKey => $id));
		$this->set('troubleshooting', $this->Troubleshooting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Troubleshooting->create();
			if ($this->Troubleshooting->save($this->request->data)) {
				$this->Session->setFlash(__('The troubleshooting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The troubleshooting could not be saved. Please, try again.'));
			}
		}
		$utilities = $this->Troubleshooting->Utility->find('list');
		$this->set(compact('utilities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Troubleshooting->exists($id)) {
			throw new NotFoundException(__('Invalid troubleshooting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Troubleshooting->save($this->request->data)) {
				$this->Session->setFlash(__('The troubleshooting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The troubleshooting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Troubleshooting.' . $this->Troubleshooting->primaryKey => $id));
			$this->request->data = $this->Troubleshooting->find('first', $options);
		}
		$utilities = $this->Troubleshooting->Utility->find('list');
		$this->set(compact('utilities'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Troubleshooting->id = $id;
		if (!$this->Troubleshooting->exists()) {
			throw new NotFoundException(__('Invalid troubleshooting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Troubleshooting->delete()) {
			$this->Session->setFlash(__('The troubleshooting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The troubleshooting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
