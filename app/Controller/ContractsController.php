<?php
App::uses('AppController', 'Controller');

class ContractsController extends AppController {
	public $helpers = array('Html', 'Form', 'Flash');

    public $components = array('Flash');

    public $layout = 'sampleLayout';
}