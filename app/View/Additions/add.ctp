<div class="additions form">
<?php echo $this->Form->create('Addition'); ?>
	<fieldset>
		<legend><?php echo __('Add Addition'); ?></legend>
	<?php
		echo $this->Form->input('addition');
		echo $this->Form->input('WashingMachine');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Additions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Washing Machines'), array('controller' => 'washing_machines', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Washing Machine'), array('controller' => 'washing_machines', 'action' => 'add')); ?> </li>
	</ul>
</div>
