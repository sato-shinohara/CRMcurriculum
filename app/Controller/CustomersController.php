<?php
App::uses('AppController', 'Controller');

class CustomersController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');

	public $components = array('Flash');

//	public $layout = 'customerLayout';

	public $uses = [
//CustomersController の中で使うtable を宣言する
		'Contract',
		'Customer',
		'Lin',
		'State',
		'Agent',
		];

	public function index() {

	$layout = 'customerLayout';	

	$this->layout = $layout;

		// $options = array(
  //           'conditions' => array(
  //                 'Customer.deleted' => 0
  //           )
		// );

		$fields = [
//どのレコードをとってくるのか指定する
//'*'を使ってしまうと全てのtableの全レコードが引っ張られ、膨大な数で、とても時間かかる		
			'Customer.id',
			'Customer.name',
			'Lin.type',
			'C.type',
			'A.type',
			'S.type'
		];

		$conditions = [
			'Customer.deleted' => 0
		];

		$joins = [
			[
				'type' => 'LEFT',
			    'table' => 'lins',
			    'alias' => 'Lin',
        //aliasとは、別名という意味			    
			    'conditions' => 'Customer.lin_id = Lin.id',
			],
			[
				'type' => 'LEFT',
				'table' => 'contracts',
				'alias' => 'C',
				'conditions' => 'Customer.contract_id = C.id'
			],
			[   
			    'type' => 'LEFT',
			    'table' => 'agents',
			    'alias' => 'A',
			    'conditions' => 'Customer.agent_id = A.id'
			],
			[
                'type' => 'LEFT',
                'table' => 'states',
                'alias' => 'S',
                'conditions' => 'Customer.state_id = S.id'
			]
		];

		$recursive = -1;
	//$recursive = 0 で１つのテーブルと紐付いている状態
	//$recursive = -1 でどのテーブルとも紐付いてない状態 
	//$joins を使う場合は余計なテーブルとの紐づけを解消するためによく使われる	

		// compact('field','conditions','joins','recursive');

		// $options = [
		// 	0 => $field,
		// 	1 => $condition,
		// 	2 => $joins,
		// 	3 => $recursive
		// ];

		$data = $this->Customer->find('all',compact('fields','conditions','joins','recursive'));
		//第二引数に条件をオプションでいれてる

	//	var_dump($data);

		$contracts = $this->Contract->find('all');
// var_dump($data);exit;
        $lins = $this->Lin->find('all');

        $states = $this->State->find('all');

        $agents = $this->Agent->find('all');

		$this->set('customers', $data);

		$this->set('contracts', $contracts);

		$this->set('lins', $lins);

		$this->set('states', $states);

		$this->set('agents', $agents);


//		$this->set('customers', $this->Customer->find('all', $options));
		//select * from customers
	}

	public function edit($id) {
        $layout = 'sampleLayout';

        $this->layout = $layout;

		if (!$id) {

			throw new NotFoundException(__('このidはありません'));
		}

		$customer = $this->Customer->findById($id);
		if (!$customer) {

			throw new NotFoundException(__('このユーザーはいません'));
		}

		if ($this->request->is(array('post', 'put'))) {

			$this->Customer->id = $id;

			if ($this->Customer->save($this->request->data)) {

				$this->Flash->editSuccess('を再登録しました！', array('key' => 'positive','params' => array('id' => $customer['Customer']['id'], 'name' => $customer['Customer']['name'])));

				return $this->redirect(array('action' => 'index'));
			}

			$this->Flash->editError('再登録できませんでした',array('key' => 'nagative','params' => array('id' => $customer['Customer']['id'])));
		}

		if (!$this->request->data) {

			$this->request->data = $customer;
		}
	}

	public function add() {
	    $layout = 'sampleLayout';

        $this->layout = $layout;

       
        if ($this->request->is('post')) {
            $this->Customer->create();
//白紙にする INSERT INTO の状態にする UPDATE ではなく            
            if ($this->Customer->save($this->request->data)) {
                $this->Flash->addSuccess('登録完了です！',array('key' => 'positive'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->addError('登録できませんでした。',array('key' => 'negative'));
        }
    }



}