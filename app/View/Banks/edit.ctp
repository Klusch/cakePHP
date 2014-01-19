<?php
$this->start('frameRequest');
   echo 'false';
$this->end(); 
?>

<?php
$this->start('topTiles');
    echo $this->Tile->getCategoryItem('pages');
//    $destination = array('controller' => 'costs', 'action' => 'charts');
//    echo $this->Tile->specialTile('icon-chart-alt', $destination, 'bg-yellow', null);
    echo $this->Tile->emptyTilesBar(6);
$this->end();
?>

<?php
$this->start('sideTiles');
    echo $this->Tile->getCategoryItem();
    echo $this->Tile->specialTile('icon-pencil');
    echo $this->Tile->emptyTilesBar(3);
$this->end(); 
?>

<div class="banks form">
<?php echo $this->Form->create('Bank'); ?>
	<fieldset>
		<legend><?php echo __('Edit Bank'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('iban');
		echo $this->Form->input('bic');
		echo $this->Form->input('bank_type_id');
		echo $this->Form->input('rate_of_interest');
		echo $this->Form->input('rate_available');
		echo $this->Form->input('exemption_order_for_capital_gains');
		echo $this->Form->input('exemption_order_available');
		echo $this->Form->input('exemption_order_used');
		echo $this->Form->input('exemption_order_proof');
		echo $this->Form->input('bank_balance');
		echo $this->Form->input('bank_balance_proof');
		echo $this->Form->input('product');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Bank.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Bank.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Banks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Bank Types'), array('controller' => 'bank_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank Type'), array('controller' => 'bank_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
