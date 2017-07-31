<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');

    public $components = array('Flash');

    public $layout = 'sampleLayout';

	public function index() {
        //$this->autoLayout = false;
//デフォルトで用意しているレイアウトをオフにする →これを使うと、定義しているsampleLayoutも見れなくなる
        $options = array(
            'conditions' => array(
            	'User.deleted' => 0)
        );


		$this->set('users', $this->User->find('all',$options));
		                    //select * from users
	}

	public function edit($id = null) {
	
	if (!$id) {
//idがなかったら			
			throw new NotFoundException(__('このidはありません'));
//NotFoundに投げて、ErrorHandlerに委ねる			
	}
        $user = $this->User->findById($id);
		if (!$user) {
//その$user記事がなかったら			
			throw new NotFoundException(__('このユーザーはいません'));
		}

		if ($this->request->is(array('post', 'put'))) {
//リクエストがPOSTかPUTであるか   			
            $this->User->id = $id;
// Postモデルのidに引数の$idをセットする          
			if ($this->User->save($this->request->data)) {
//フォームを使ってデータをPOSTした場合、$this->request->dataの中に入ってる
//それをpostモデルにセーブしたら				
				$this->Flash->editSuccess('を再登録できました!', array('key' => 'positive','params' => array(
					'id' => $user['User']['id'], 'name' => $user['User']['username'])));
//Flashヘルパーでサクセスメッセージを出す				
				return $this->redirect(array('action' => 'index'));
//戻る redirectに				
			}
			$this->Flash->editError('再登録できませんでした...',array('key' => 'negative','params' => array('id' => $user['User']['id'])));
//セーブできなかったらFlashヘルパーのerrorメッセージを出す			
		}

		if (!$this->request->data) {
//もしフォームに入力されたデータがからっぽだったら			
			$this->request->data = $user;
//ポストレコードをそのままセットしておく			
		}

	}

	public function add() {
       
        if ($this->request->is('post')) {
            $this->User->create();
//白紙にする INSERT INTO の状態にする UPDATE ではなく            
            if ($this->User->save($this->request->data)) {
                $this->Flash->addSuccess('登録完了です！',array('key' => 'positive'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->addError('登録できませんでした。',array('key' => 'negative'));
        }
    }

    public function beforeFilter() {
        parent::beforeFilter();
    // ユーザー自身による登録とログアウトを許可する
        $this->Auth->allow('add', 'logout');
    }

    public function login() {

        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                 $this->redirect($this->Auth->redirect());
            } else {
                 $this->Flash->set(__('このユーザー名パスワードは使えません。再度入力をお願いします！'));
            } 
        }
    }

    public function logout() {
         $this->redirect($this->Auth->logout());
    }

    public function delete($id) {
        
        $id = $this->request->pass[0];

        $this->User->id = $id;
        $this->User->saveField('deleted',1);

        $meg = sprintf('ユーザー %s を削除しました', $id);

        $this->Flash->set($msg);

        $this->redirect(['controller' => 'users','action' => 'index']);

        return;
    	}
}

?>