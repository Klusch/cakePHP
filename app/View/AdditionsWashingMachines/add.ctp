<div class="additionsWashingMachines form">
<?php echo $this->Form->create('AdditionsWashingMachine'); ?>
	<fieldset>
		<legend><?php echo __('Add Additions Washing Machine'); ?></legend>
	<?php
		echo $this->Form->input('addition_id');
		echo $this->Form->input('washing_machine_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Additions Washing Machines'), array('action' => 'index')); ?></li>
	</ul>
</div>
