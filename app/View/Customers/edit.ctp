<div class='customers form'>

<?php echo $this->Form->create('Customer'); ?>
 <fieldset>
 	<legend>顧客情報編集</legend>
    <?php echo $this->Form->input('name');
          echo $this->Form->input('lin_id', array('options' => array('1' => 'Type-A', '2' => 'Type-D')));
          echo $this->Form->input('contract_id', array('options' => array('1' => 'データのみ3GB', '2' => 'データのみ6GB', '3' => 'データのみ10GB', '4' => 'SMS付き3GB', '5' => 'SMS付き6GB', '6' => 'SMS付き10GB', '7' => '音声通話プラン3GB', '8' => '音声通話プラン6GB', '9' => '音声通話プラン10GB')));
          echo $this->Form->input('agent_id', array('options' => array('1' => 'ヒトコム', '2' => 'ビッグカメラ', '3' => 'ヨドバシカメラ', '4' => 'ヤマダ電機')));
          echo $this->Form->input('state_id', array('options' => array('0' => "契約中", '10' => '解約済み'))); ?>
 </fieldset>
 <?php echo $this->Form->end('送信'); ?>
 </div>
