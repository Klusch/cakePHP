<?php

App::uses('AppModel', 'Model');
App::import('model', 'Group');

/**
 * User Model
 *
 * @property Group $Group
 * @property Company $Company
 * @property Language $Language
 */
class User extends AppModel {

    public $validationDomain = 'validation';
    public $validate = array(
        'username' => array(
            'alphaNumeric' => array(
                'rule' => 'alphaNumeric',
                'required' => true,
                'message' => 'Alphabets and numbers only',
                'last' => false
            ),
            'between' => array(
                'rule' => array('between', 5, 15),
                'message' => 'Username should be between %d and %d characters',
                'last' => false
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'This username has already been taken',
                'last' => true
            )
        ),
        'password' => array(
            'rule' => array('minLength', '8'),
            'allowEmpty' => true,
            'message' => 'Minimum %d characters long'
        ),
    	'group_id' => array(
    		'notempty' => array(
    			'rule' => array('notempty'),
    		),
    	),	
        'email' => array(
            'rule' => 'email',
            'allowEmpty' => true,
            'message' => 'The address is not valid'
        ),
        'first_name' => array(
            'alphaNumeric' => array(
                'rule' => '|^[a-zA-Z -]*$|',
                'required' => true,
                'message' => 'Alphabets only',
                'last' => false
            ),
            'minLength' => array(
                'rule' => array('minLength', '4'),
                'message' => 'Minimum character length not reached'
            )
        ),
        'last_name' => array(
            'alphaNumeric' => array(
                'rule' => '|^[a-zA-Z_-]*$|',
                'required' => true,
                'message' => 'Alphabets only'
            )
        ),
//        'phone' => array(
//            'alphaNumeric' => array(
//                'rule' => array('phone', '/\(?\d{3}\)?[-\/\.\s]?\d{3}[-\/\.\s]?/'),
//                'allowEmpty' => true,
//                'message' => 'Phone number not valid'
//            )
//        ),
//        'cell' => array(
//            'alphaNumeric' => array(
//                'rule' => array('phone', '/\(?\d{3}\)?[-\/\.\s]?\d{3}[-\/\.\s]?/'),
//                'allowEmpty' => true,
//                'message' => 'Phone number not valid'
//            )
//        ),
//        'fax' => array(
//            'alphaNumeric' => array(
//                'rule' => array('phone', '/\(?\d{3}\)?[-\/\.\s]?\d{3}[-\/\.\s]?/'),
//                'allowEmpty' => true,
//                'message' => 'Phone number not valid'
//            )
//        ),
    );
    public $actsAs = array('Acl' => array('type' => 'requester'));

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'username';


    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Group' => array(
            'className' => 'Group',
            'foreignKey' => 'group_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Language' => array(
            'className' => 'Language',
            'foreignKey' => 'language_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Timezone' => array(
            'className' => 'Timezone',
            'foreignKey' => 'timezone_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    // Konstruktor
    function __construct() {
        parent::__construct();
        $this->Group = new Group();
    }

    public function getPossibleGroups($condition) {
        return $this->Group->find('all', array('conditions' => array('Group.id >=' => $condition))
        );
    }

    public function isAdmin($username) {
        $user = $this->findByUsername($username);
        if (!empty($user)) {
            if ($user['User']['group_id'] == 2) {
                return true;
            }
        }
        return false;
    }

    public function changePasswordForUser($username, $password) {
        $user = $this->findByUsername($username);
        $user['User']['password'] = $password;
        
        if ($this->save($user, array('validate' => 'only'))) {
            $this->save($user);
            return true;
        } else {
            return false;
        }      
    }
    
    // enables Passwordhashing	
    public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            if ($this->data['User']['password'] == '') {
                unset($this->data['User']['password']);
            } else {
                $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
            }
        }
        return true;
    }

    public function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }

    // simplified per-group only permissions
    /*
      public function bindNode($user) {
      return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
      }
     */
}
