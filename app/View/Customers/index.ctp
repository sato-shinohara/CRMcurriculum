<h1>顧客一覧</h1>
<?php echo $this->Flash->render('positive') ?>
<p><?php echo $this->Html->link('顧客登録', array('controller' => 'customers', 'action' => 'add')); ?></p>

<p>　</p>
<p>該当件数:</p>

<table>
   <tr>
       <th>会員ID</th>
       <th>契約者氏名</th>
       <th>回線タイプ</th>
       <th>契約タイプ</th>
       <th>代理店</th>
       <th>ステータス</th>
       <th>契約日</th>
       <th></th>
   </tr>

   <?php foreach ($customers as $customer): ?>
   <tr>
       <td><?php echo $customer['Customer']['id']; ?></td>
       <td><?php echo $customer['Customer']['name']; ?></td>
       <td><?php echo $customer['Lin']['type'];?></td>
       <td><?php echo $customer['C']['type']; ?></td>
       <td><?php echo $customer['A']['type']; ?></td>
       <td><?php echo $customer['S']['type']; ?></td>
       <td><?php echo $customer['Customer']['contract_day']; ?></td>
       <td><span><?php echo $this->Html->link('編集',
array('controller' => 'customers', 'action' => 'edit', $customer['Customer']['id'])); ?></span></td>
   </tr>
   <?php endforeach; ?>
</table>
