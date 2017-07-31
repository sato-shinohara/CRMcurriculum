<div class="users form">

<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('管理ユーザー編集'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('id',array('type' => 'hidden'));
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end('送信！！'); ?>
</div>