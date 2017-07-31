<!DOCTYPE html>
<html lang="ja">
<head>
<?php echo $this->Html->charset(); ?>
<meta name="copyright" content="&copy; atomicbox">
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->meta('icon');?>
<?php echo $this->fetch('meta');?>
<?php echo $this->Html->css('cake.sampleLayout'); ?>
<?php echo $this->fetch('css');?>
<?php echo $this->fetch('script');?>
</head>
<body>
<div class="users form">
<?php echo $this->Flash->render() ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend><?php echo __('管理ユーザー登録'); ?></legend>
        <?php echo $this->Form->input('username');
        echo $this->Form->input('password');
        echo $this->Form->input('role', array(
            'options' => array('admin' => 'Admin', 'author' => 'Author')
        ));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('送信！！')); ?>
</div>
</body>
</html>