<?php
App::uses('AppController', 'Controller');
/**
 * Movies Controller
 *
 * @property Movie $Movie
 * @property PaginatorComponent $Paginator
 */
class MoviesController extends AppController {

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
		$this->Movie->recursive = 0;
		$this->set('movies', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Movie->exists($id)) {
			throw new NotFoundException(__('Invalid movie'));
		}
		$options = array('conditions' => array('Movie.' . $this->Movie->primaryKey => $id));
		$this->set('movie', $this->Movie->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Movie->create();
			if ($this->Movie->save($this->request->data)) {
				$this->Session->setFlash(__('The movie has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movie could not be saved. Please, try again.'));
			}
		}
		$imdbs = $this->Movie->Imdb->find('list');
		$movieCategories = $this->Movie->MovieCategory->find('list');
		$statuses = $this->Movie->Status->find('list');
		$this->set(compact('imdbs', 'movieCategories', 'statuses'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Movie->exists($id)) {
			throw new NotFoundException(__('Invalid movie'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Movie->save($this->request->data)) {
				$this->Session->setFlash(__('The movie has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The movie could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Movie.' . $this->Movie->primaryKey => $id));
			$this->request->data = $this->Movie->find('first', $options);
		}
		$imdbs = $this->Movie->Imdb->find('list');
		$movieCategories = $this->Movie->MovieCategory->find('list');
		$statuses = $this->Movie->Status->find('list');
		$this->set(compact('imdbs', 'movieCategories', 'statuses'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Movie->id = $id;
		if (!$this->Movie->exists()) {
			throw new NotFoundException(__('Invalid movie'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Movie->delete()) {
			$this->Session->setFlash(__('The movie has been deleted.'));
		} else {
			$this->Session->setFlash(__('The movie could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
