<?php
// View/Banks/index.ctp
$this->start('frameRequest');
   echo 'true';
$this->end(); 
?>

<?php
$this->start('topTiles');
    echo $this->Tile->getCategoryItem('pages');
    echo $this->Tile->addTile();
    //$destination = array('controller' => 'banks', 'action' => 'add');
    //echo $this->Tile->specialTile('icon-chart-alt', $destination, 'bg-yellow', null);
    echo $this->Tile->emptyTilesBar(6);
$this->end();
?>

<?php
$this->start('sideTiles');
    echo $this->Tile->getCategoryItem();
    echo $this->Tile->emptyTilesBar(3);
$this->end(); 
?>

<div class="banks index">
	<h2><?php echo __('Banks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('product'); ?></th>			
			<th><?php echo $this->Paginator->sort('iban'); ?></th>
			<th><?php echo $this->Paginator->sort('bic'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_type_id'); ?></th>
			<th><?php echo $this->Paginator->sort('rate_of_interest'); ?></th>
			<th><?php echo $this->Paginator->sort('rate_available'); ?></th>
			<th><?php echo $this->Paginator->sort('exemption_order_for_capital_gains'); ?></th>
			<th><?php echo $this->Paginator->sort('exemption_order_available'); ?></th>
			<th><?php echo $this->Paginator->sort('exemption_order_used'); ?></th>
			<th><?php echo $this->Paginator->sort('exemption_order_proof'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_balance'); ?></th>
			<th><?php echo $this->Paginator->sort('bank_balance_proof'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>			
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($banks as $bank): ?>
	<tr>
		<td><?php echo h($bank['Bank']['id']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['name']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['product']); ?>&nbsp;</td>		
		<td><?php echo h($bank['Bank']['iban']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['bic']); ?>&nbsp;</td>

		<td>
			<?php echo $this->Html->link($bank['BankType']['id'], array('controller' => 'bank_types', 'action' => 'view', $bank['BankType']['id'])); ?>
		</td>
		<td><?php echo h($bank['Bank']['rate_of_interest']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['rate_available']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['exemption_order_for_capital_gains']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['exemption_order_available']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['exemption_order_used']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['exemption_order_proof']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['bank_balance']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['bank_balance_proof']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['created']); ?>&nbsp;</td>
		<td><?php echo h($bank['Bank']['modified']); ?>&nbsp;</td>		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $bank['Bank']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $bank['Bank']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $bank['Bank']['id']), null, __('Are you sure you want to delete # %s?', $bank['Bank']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Bank'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Bank Types'), array('controller' => 'bank_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Type'), array('controller' => 'bank_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
