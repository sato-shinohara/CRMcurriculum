<?php
App::uses('AppController', 'Controller');

class AgenciesController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');

    public $components = array('Flash');

    public $layout = 'sampleLayout';

    public function index() {

    	$options = array(
    		'conditions' => array(
    			'Agency.deleted' => 0)
    		);

    	$this->set('agencies', $this->Agency->find('all',$options));
    }
}