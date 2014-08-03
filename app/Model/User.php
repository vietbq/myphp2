<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
class User extends AppModel {

    /**
     * Display field
     *
     * @var string
     */
    public $displayField = 'id';

    /**
     * Validation rules
     *
     * @var array
     */
    public function beforeSave($options = array()) {
        parent::beforeSave($options);
        if(isset($this->data[$this->alias]['password'])){
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']);
        }
        return TRUE;
    }
    public $validate = array(
        'password' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'Match passwords' => array(
                'rule' => 'matchPasswords',
                'message' => 'Your passwords do not match'
            )
        ),
        'username' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => 'Enter your username here'
            ),
            'unique' => array(
                'rule' => array('isUnique'),
                'message' => 'This username is existing'
            )
        ),
        'email' => array(
            'email' => array(
                'rule' => array('email'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'role' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );
    public function matchPasswords($data){
        if($data['password']==$this->data['User']['password_comfirm']){
            return TRUE;
        }
        $this->invalidate('password_confirm','Your passwords do not match');
        return FALSE;
    }

}
