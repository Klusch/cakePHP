<?php
App::uses('AppController', 'Controller');
/**
 * MovieCategories Controller
 *
 * @property MovieCategory $MovieCategory
 * @property PaginatorComponent $Paginator
 */
class MovieCategoriesController extends AppController {

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
		$this->MovieCategory->recursive = 0;
		$this->set('movieCategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->MovieCategory->exists($id)) {
			throw new NotFoundException(__('Invalid movie category'));
		}
		$options = array('conditions' => array('MovieCategory.' . $this->MovieCategory->primaryKey => $id));
		$this->set('movieCategory', $this->MovieCategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->MovieCategory->create();
			if ($this->MovieCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The movie category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movie category could not be saved. Please, try again.'));
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
		if (!$this->MovieCategory->exists($id)) {
			throw new NotFoundException(__('Invalid movie category'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->MovieCategory->save($this->request->data)) {
				$this->Session->setFlash(__('The movie category has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movie category could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('MovieCategory.' . $this->MovieCategory->primaryKey => $id));
			$this->request->data = $this->MovieCategory->find('first', $options);
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
		$this->MovieCategory->id = $id;
		if (!$this->MovieCategory->exists()) {
			throw new NotFoundException(__('Invalid movie category'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->MovieCategory->delete()) {
			$this->Session->setFlash(__('The movie category has been deleted.'));
		} else {
			$this->Session->setFlash(__('The movie category could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
