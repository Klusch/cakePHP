<div class="additions form">
<?php echo $this->Form->create('Addition'); ?>
	<fieldset>
		<legend><?php echo __('Edit Addition'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('addition');
		echo $this->Form->input('WashingMachine');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Addition.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Addition.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Additions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Washing Machines'), array('controller' => 'washing_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Washing Machine'), array('controller' => 'washing_machines', 'action' => 'add')); ?> </li>
	</ul>
</div>
