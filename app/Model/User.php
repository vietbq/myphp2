<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
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
    

    /**
     * Validation rules
     *
     * @var array
     */
   
        public function beforeSave($options = array()) {
    if (isset($this->data[$this->alias]['password'])) {
        $passwordHasher = new SimplePasswordHasher();
        $this->data[$this->alias]['password'] = $passwordHasher->hash(
            $this->data[$this->alias]['password']
        );
    }
    return true;
}
public $displayField = 'id';
    public $validate = array(
        
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            ),
            'That username has already been taken' => array(
                'rule' => 'isUnique',
                'message' => 'That username has already been taken.'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            ),
            'Match passwords'=>array(
                'rule'=>'matchPasswords',
                'message'=>'Your passwords do not match'
            )
        ),
        'password_confirm'=>array(
            'Not empty'=>array(
                'rule' => 'notEmpty',
                'message'=>'Please confirm your password confirm'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'author')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        ),
        'email' =>array(
            'Valid email'=>array(
                'rule' =>   'email',
                'message'=>'Please enter a valid email address'
            )
        )
    );
    public function matchPasswords($data){
        if($data['password']==$this->data['User']['password_comfirm']){
            return TRUE;
        }
        $this->invalidate('password_confirm','Your passwords do not match');
        return FALSE;
    }

}
