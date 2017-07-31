<?php
App::uses('AppModel','Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'ユーザー名は入力必須だぞ'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'パスワードの入力必須だよ'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array(
                   'inList', array('admin', 'author')
                ),
                'message' => '入力おねがいします',
                'allowEmpty' => false
            )
        )
	);

	 public function beforeSave($options = array()) {
//セーブする前に    	
        if (isset($this->data[$this->alias]['password'])) {
        	$passwordHasher = new BlowfishPasswordHasher();
        	$this->data[$this->alias]['password'] = $passwordHasher->hash(
        		$this->data[$this->alias]['password']);
        }
        return true;
//パスワードのハッシュ化を行う        
    }

} 

?>