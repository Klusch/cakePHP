<?php
App::uses('AppController', 'Controller');
/**
 * ElectronicParts Controller
 *
 * @property ElectronicPart $ElectronicPart
 * @property PaginatorComponent $Paginator
 */
class ElectronicPartsController extends AppController {

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
		$this->ElectronicPart->recursive = 0;
		$this->set('electronicParts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ElectronicPart->exists($id)) {
			throw new NotFoundException(__('Invalid electronic part'));
		}
		$options = array('conditions' => array('ElectronicPart.' . $this->ElectronicPart->primaryKey => $id));
		$this->set('electronicPart', $this->ElectronicPart->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ElectronicPart->create();
			if ($this->ElectronicPart->save($this->request->data)) {
				$this->Session->setFlash(__('The electronic part has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The electronic part could not be saved. Please, try again.'));
			}
		}
		$projects = $this->ElectronicPart->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ElectronicPart->exists($id)) {
			throw new NotFoundException(__('Invalid electronic part'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ElectronicPart->save($this->request->data)) {
				$this->Session->setFlash(__('The electronic part has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The electronic part could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('ElectronicPart.' . $this->ElectronicPart->primaryKey => $id));
			$this->request->data = $this->ElectronicPart->find('first', $options);
		}
		$projects = $this->ElectronicPart->Project->find('list');
		$this->set(compact('projects'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->ElectronicPart->id = $id;
		if (!$this->ElectronicPart->exists()) {
			throw new NotFoundException(__('Invalid electronic part'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ElectronicPart->delete()) {
			$this->Session->setFlash(__('The electronic part has been deleted.'));
		} else {
			$this->Session->setFlash(__('The electronic part could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
