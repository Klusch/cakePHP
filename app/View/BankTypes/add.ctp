<div class="bankTypes form">
<?php echo $this->Form->create('BankType'); ?>
	<fieldset>
		<legend><?php echo __('Add Bank Type'); ?></legend>
	<?php
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bank Types'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Banks'), array('controller' => 'banks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Bank'), array('controller' => 'banks', 'action' => 'add')); ?> </li>
	</ul>
</div>
