<?php
App::uses('AppModel','Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class Customer extends AppModel {
	
//    public $belongsTo = array(
//customersテーブル(モデル)だけじゃなく
//    	'Lin','Contract','Agent','State'
//条件を指定せずにLin,Contract,Agent,Stateテーブル(モデル)のデータを全部引っ張ってる
//    );

    

	public $validate = array(
		'name' => array(
		   'required' => array(
            'rule' => 'notBlank',
            'message' => '名前は必須項目です'
		   	)
		),
//		'lin_id' => array(
//            'valid' => array(
//                'rule' => array(
//                   'inList', array('Type-A', 'Type-D')
//                ),
//                'message' => '入力してください',
//                'allowEmpyu' => false
//            )
//		),
//        'contract_id' => array(
//            'valid' => array(
//                'rule' => array(
//                   'inList', array('データのみ3GB', 'データのみ6GB', 'データのみ10GB', 'SMS付き3GB', 'SMS付き6GB', 'SMS付き10GB', '音声通話プラン3GB', '音声通話プラン6GB', '音声通話プラン10GB')
//                ),
//                'message' => '入力してください',
//                'allowEmpyu' => false
//            )
//        ),
//        'agent_id' => array(
//            'valid' => array(
//                'rule' => array(
//                   'inList', array('ヒトコム', 'ビッグカメラ', 'ヨドバシカメラ', 'ヤマダ電機')
//                ),
//                'message' => '入力してください',
//                'allowEmpyu' => false
//            )
//        ),
//        'state_id' => array(
//            'valid' => array(
//                'rule' => array(
//                   'inList', array('契約中', '解約済み')
//                ),
//                'message' => '入力してください',
//                'allowEmpyu' => false
//            )
//        )

	);
}