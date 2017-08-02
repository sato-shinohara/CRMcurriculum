<?php
class Contract extends AppModel {
//	public $hasMany = array(
//        'Customer'
//    );

	public function getContract() {

		return $this->find('all');

	}
}

?>