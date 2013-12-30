<div class="temperatures form">
<?php echo $this->Form->create('Temperature'); ?>
	<fieldset>
		<legend><?php echo __('Edit Temperature'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('value');
		echo $this->Form->input('unit_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Temperature.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Temperature.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Temperatures'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Washing Machines'), array('controller' => 'washing_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Washing Machine'), array('controller' => 'washing_machines', 'action' => 'add')); ?> </li>
	</ul>
</div>