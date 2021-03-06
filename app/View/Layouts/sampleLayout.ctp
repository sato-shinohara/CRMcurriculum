<!DOCTYPE html>
<html lang="ja">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->meta('icon');?>
<?php echo $this->fetch('meta');?>
<?php echo $this->Html->css('cake.sampleLayout'); ?>
<?php echo $this->fetch('css');?>
<?php echo $this->fetch('script');?>
</head>
<body>
<div id="wrap">
<div id="header">
  <div id="header-left">
   <li>CakePHP</li>
  </div> 
  <div id="header-right"> 
<!--    <li class="customer">  -->
  <a href = "/cakephp-task1/customers/index"><li>顧客情報</li></a>
<!--  </li>   -->
<!--    <li class="customer">  -->
 <a href = "/cakephp-task1/users/index"><li>管理ユーザー</li></a>
<!--  </li>  -->
<!--    <li class="customer">   -->
  <a href = "/cakephp-task1/agencies/index"><li>代理店一覧</li></a>
<!--  </li>   -->
<!--    <li class="customer">   -->
  <a href = "/cakephp-task1/users/index"><li>ログアウト</li></a>
<!--  </li>   -->
</div>  
</div>
<div id="wrapper">
<div id="left">
<!--<h1>ひだり</h1>-->
</div>
<div id="content">
	<?php echo $this->fetch('content'); ?>
</div>
<div id="right">
<!--<h1>みぎ</h1>-->
</div>
</div>
<div id="footer">
    <?php echo $this->fetch('footer'); ?>
</div>
</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>