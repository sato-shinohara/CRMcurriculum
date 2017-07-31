<!DOCTYPE html>
<html lang="ja">
<head>
<?php echo $this->Html->charset(); ?>
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->meta('icon');?>
<?php echo $this->fetch('meta');?>
<?php echo $this->Html->css('cake.customerLayout'); ?>
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
<p>各種情報</p>
<ul>
<p>回線タイプ</p>
 <li>Type-A</li>
 <li>Type-D</li>
<p>契約タイプ</p>
 <li>データのみ3GB</li>
 <li>データのみ6GB</li>
 <li>データのみ10GB</li>
 <li>SMS付き3GB</li>
 <li>SMS付き6GB</li>
 <li>SMS付き10GB</li>
 <li>音声通話プラン3GB</li>
 <li>音声通話プラン6GB</li>
 <li>音声通話プラン10GB</li>
<p>代理店</p>
 <li>ヒトコム</li>
 <li>ビッグカメラ</li>
 <li>ヨドバシカメラ</li>
 <li>ヤマダ電機</li> 
</ul>
</div>
<div id="content">
	<?php echo $this->fetch('content'); ?>
</div>
<div id="right">
    <?php echo $this->element('rightbar'); ?>
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