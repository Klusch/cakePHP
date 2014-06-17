<div class="problems form">
<?php echo $this->Form->create('Problem'); ?>
	<fieldset>
		<legend><?php echo __('Add Problem'); ?></legend>
	<?php
		echo $this->Form->input('description');
		echo $this->Form->input('problem_location_id');
		echo $this->Form->input('priority_id');
		echo $this->Form->input('troubleshooting_id');
		echo $this->Form->input('solved');
		echo $this->Form->input('Car');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Problems'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Problem Locations'), array('controller' => 'problem_locations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem Location'), array('controller' => 'problem_locations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Priorities'), array('controller' => 'priorities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Priority'), array('controller' => 'priorities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Troubleshootings'), array('controller' => 'troubleshootings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Troubleshooting'), array('controller' => 'troubleshootings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cars'), array('controller' => 'cars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Car'), array('controller' => 'cars', 'action' => 'add')); ?> </li>
	</ul>
</div>
