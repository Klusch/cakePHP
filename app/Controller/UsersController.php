<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController {

    public $components = array('Paginator');
    private $successfull = array('controller' => 'Pages', 'action' => 'display', 'home');
    private $landingPage = array('controller' => 'Pages', 'action' => 'display', 'home');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('login', 'logout');
    }

// -----------------------------------------------------------------------------
    
    public function login() {
        if ($this->request->is('post')) {

            if ($this->Auth->login()) {

                $this->checkPreferedLanguage();

                $role = $this->Session->read('Auth.User.Group.name');

                // Load Component
                $this->License = $this->Components->load('License');
                if (!$this->License->isLicenseVaild()) {
                    $this->Session->setFlash(__('Sorry, invalid license'), 'failure');
                    if ($role != 'Hagleitner') {
                        $this->Auth->logout();
                    }
                }

                return $this->redirect($this->successfull);
            }

            $this->Session->setFlash(__('Your username or password was incorrect.'), 'failure');
        }
    }

    public function logout() {
        $this->Auth->logout();
        $this->Session->destroy();
        $this->Session->setFlash(__('Good bye'));
        $this->redirect($this->landingPage);
    }

// -----------------------------------------------------------------------------

    public function index($groupActivated = 'hagleitner') {
        $activatedId = 0;
        $usersGrouped = array();
        $groups = $this->User->getPossibleGroups($this->Session->read('Auth.User.group_id'));

        foreach ($groups as $i => $group) {
            $tmp = array();
            $tmp['group'] = $group['Group']['name'];
            if (strcmp($tmp['group'], $groupActivated) == 0) {
                $activatedId = $i;
            }
            $tmp['users'] = $this->getUserForGroup($group['Group']['name']);

            $usersGrouped[] = $tmp;
        }

        $this->set('activatedId', $activatedId);
        $this->set('groups', $groups);
        $this->set('usersGrouped', $usersGrouped);
    }    
    
    public function view($id = null) {
        $this->loadModel('Group');

        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }

        $options = array(
            'conditions' => array('User.' . $this->User->primaryKey => $id),
            'joins' => array(
                array(
                    'table' => 'groups',
                    'alias' => 'Group',
                    'type' => 'INNER',
                    'conditions' => array(
                        'User.group_id = Group.id'
                    )
                ),
                array(
                    'table' => 'company',
                    'alias' => 'Company',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'User.company_id = Company.id'
                    )
                )
            ),
            'fields' => array(
                'User.*',
                'Group.*',
                'Company.*'
            )
        );
        $user = $this->User->find('first', $options);
        $this->set('user', $user);
    }
   
     public function add($selection = null) {
        $this->User->set($this->request->data);
        if ($this->request->is('post')) {
            if ($this->User->validates()) {  // it validated logic
                $this->User->create();
                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash(__('The user has been saved.'), 'success');
                    $this->redirect(array('controller' => 'users', 'action' => 'index'));
                }
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'failure');
            } else {
                // didn't validate logic
                //$errors = $this->User->validationErrors;
                //print_r($errors);
            }
        }
        $myGroup = $this->Session->read('Auth.User');
        $groups = $this->i18n($this->User->Group->find('list', array(
                    'conditions' => array('id >=' => $myGroup['Group']['id'])
                        )
                )
        );
        $companies = $this->User->Company->find('list');
        $languages = $this->User->Language->find('list');

        $this->set(compact('groups', 'companies', 'languages'));
        $this->set('selection', $selection);
    }   
    
     public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is(array('post', 'put'))) {
            $userRequest = $this->request->data['User'];

            if (!isset($userRequest['username'])) {
                $usertmp = $this->User->findById($userRequest['id']);
                $userRequest['username'] = $usertmp['User']['username'];
            }

            if ($this->User->save($userRequest)) {
                $this->Session->setFlash(__('The user has been saved.'), 'success');
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'failure');
            }
        }

        $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
        $user_tmp = $this->User->find('first', $options);
        $user_tmp['User']['password'] = ''; // Remove Passwordhash
        $this->request->data = $user_tmp;

        $this->set('groupsExtended', $this->User->Group->findById($user_tmp['User']['group_id']));

        $groups = $this->i18n($this->User->Group->find('list'));
        $companies = $this->User->Company->find('list');
        $languages = $this->User->Language->find('list');
        $this->set(compact('groups', 'companies', 'languages'));
    }   
    
    public function delete($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('The user has been deleted.'), 'success');
        } else {
            $this->Session->setFlash(__('The user could not be deleted. Please, try again.'), 'failure');
        }
        return $this->redirect(array('action' => 'index'));
    }    
     
// -----------------------------------------------------------------------------    
    
    protected function checkPreferedLanguage() {
        $lang = $this->Session->read('Auth.User.Language.name');
        if (isset($lang)) {
            $this->Session->write('Config.language', $lang);
            $this->Cookie->write('lang', $lang, false, '20 days');
        } else {
            //checking the 1st favorite language of the user's browser
            $browserLanguage = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);

            //available languages
            switch ($browserLanguage) {
                case "en":
                    $this->Session->write('Config.language', 'eng');
                    $this->Cookie->write('lang', 'eng', false, '20 days');
                    break;
                case "de":
                    $this->Session->write('Config.language', 'deu');
                    $this->Cookie->write('lang', 'deu', false, '20 days');
                    break;
                default:
                    $this->Session->write('Config.language', 'eng');
                    $this->Cookie->write('lang', 'eng', false, '20 days');
            }
        }
    }
    
    private function getUserForGroup($groupname) {
        $options = array(
            'conditions' => array('Group.name' => $groupname),
            'joins' => array(
                array(
                    'table' => 'groups',
                    'alias' => 'Group',
                    'type' => 'INNER',
                    'conditions' => array(
                        'User.group_id = Group.id'
                    )
                ),
                array(
                    'table' => 'company',
                    'alias' => 'Company',
                    'type' => 'LEFT',
                    'conditions' => array(
                        'User.company_id = Company.id'
                    )
                )
            ),
            'fields' => array(
                'User.*',
                'Group.*',
                'Company.*'
            )
        );
        $users = $this->User->find('all', $options);
        return $users;
    }

    public function view_filtered($groupname) {
        $users = $this->getUserForGroup($groupname);

        $this->set('users', $users);
        $this->set('group', $this->User->Group->findByName($groupname));
    }

}
