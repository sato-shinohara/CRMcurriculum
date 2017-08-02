<?php
App::uses('AppController', 'Controller');

class CustomersController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');

	public $components = array('Flash');

	public $layout = 'customerLayout';

	public $uses = [
		'Contract',
		'Customer',
		];

//	var $uses = array('Customer', 'Lin');

	public function index() {

		// $options = array(
  //           'conditions' => array(
  //                 'Customer.deleted' => 0
  //           )
		// );

		$fields = [
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

		// $recursive = -1;

		// compact('field','conditions','joins','recursive');

		// $options = [
		// 	0 => $field,
		// 	1 => $condition,
		// 	2 => $joins,
		// 	3 => $recursive
		// ];

		$data = $this->Customer->find('all',compact('fields','conditions','joins','recursive'));
		var_dump($data);

		$contracts = $this->Contract->find('all');
// var_dump($data);exit;

		$this->set('customers', $data);

		$this->set('contracts', $contracts);


//		$this->set('customers', $this->Customer->find('all', $options));
		//select * from customers
	}

	public function edit($id) {
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