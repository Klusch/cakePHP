<div class="problemLocations form">
<?php echo $this->Form->create('ProblemLocation'); ?>
	<fieldset>
		<legend><?php echo __('Edit Problem Location'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProblemLocation.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProblemLocation.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Problem Locations'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
	</ul>
</div>
