<div class="washingMachines form">
<?php echo $this->Form->create('WashingMachine'); ?>
	<fieldset>
		<legend><?php echo __('Add Washing Machine'); ?></legend>
	<?php
		echo $this->Form->input('program_id');
		echo $this->Form->input('temperature_id');
		echo $this->Form->input('spin_id');
		echo $this->Form->input('power_consumtion');
		echo $this->Form->input('unit_id');
		echo $this->Form->input('duration');
		echo $this->Form->input('Addition');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Washing Machines'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Programs'), array('controller' => 'programs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Program'), array('controller' => 'programs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Temperatures'), array('controller' => 'temperatures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Temperature'), array('controller' => 'temperatures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Spins'), array('controller' => 'spins', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Spin'), array('controller' => 'spins', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Units'), array('controller' => 'units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Unit'), array('controller' => 'units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Additions'), array('controller' => 'additions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Addition'), array('controller' => 'additions', 'action' => 'add')); ?> </li>
	</ul>
</div>
