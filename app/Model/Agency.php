<?php
App::uses('AppModel','Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Agency extends AppModel {

    public $belongsTo = array('Agent');
    

	public $validate = array(
		'agency_name' => array(
			'required' => array(
				'rule' => 'notBlank',
				'message' => '代理店名は必須です'
			)
		)
	);
}

?>