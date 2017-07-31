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
<h1>代理店一覧</h1>
<?php echo $this->Flash->render('positive') ?>
<p><?php echo $this->Html->link('代理店登録', array('controller' => 'agencies', 'action' => 'add')); ?></p>
<!--<form action="<?php //echo $this->Html->url('/Users/add'); ?>" method="POST" >
<input type="submit" value="ユーザー登録" >
</form>-->
<p></p>
<table>
    <tr>
        <th>ID</th>
        <th>代理店名</th>
        <th>作成日</th>
        <th>更新日</th>
        <th>操作</th>
    </tr>

    <!-- ここから、$posts配列をループして、投稿記事の情報を表示 -->

    <?php foreach ($agencies as $agency): ?>
    <tr>
        <td><?php echo $agency['Agency']['id']; ?></td>
        <td><?php echo $agency['Agent']['type']; ?></td>
        <td><?php echo $agency['Agency']['created']; ?></td>
        <td><?php echo $agency['Agency']['modified']; ?></td>
        <td>
            <?php echo $this->Html->link('編集',
array('controller' => 'agencies', 'action' => 'edit', $agency['Agency']['id'])); ?>
            <?php echo $this->Form->postLink('削除', array('controller' => 'agencies', 'action' => 'delete', $agency['Agency']['id']),array('confirm' => 'ほんとに削除していいですか？')); ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>