<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $title_for_layout; ?>
  </title>
  <?php echo $this->Html->meta('icon');?>
<?php echo $this->fetch('meta');?>
<?php echo $this->Html->css('cake.sampleLayout'); ?>
<?php echo $this->fetch('css');?>
<?php echo $this->fetch('script');?>
</head>
<h1>管理ユーザー一覧</h1>
<?php echo $this->Flash->render('positive') ?>
<p><?php echo $this->Html->link('ユーザー登録', array('controller' => 'users', 'action' => 'add')); ?></p>
<!--<form action="<?php //echo $this->Html->url('/Users/add'); ?>" method="POST" >
<input type="submit" value="ユーザー登録" >
</form>-->
<table>
    <tr>
        <th>ID</th>
        <th>ユーザー名</th>
        <th>パスワード</th>
        <th>権限</th>
        <th>作成日</th>
        <th>更新日</th>
        <th>操作</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
        <td><?php echo $user['User']['username']; ?></td>
        <td><?php echo $user['User']['password']; ?></td>
        <td><?php echo $user['User']['role']; ?></td>
        <td><?php echo $user['User']['created']; ?></td>
        <td><?php echo $user['User']['modified']; ?></td>
        <td>
            <?php echo $this->Html->link('編集',
array('controller' => 'users', 'action' => 'edit', $user['User']['id'])); ?>
            <?php echo $this->Form->postLink('削除', array('controller' => 'users', 'action' => 'delete', $user['User']['id']),array('confirm' => 'ほんとに削除していいですか？')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
    <?php unset($user); ?>
</table>