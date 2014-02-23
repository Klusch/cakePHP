<div class="electronicParts form">
<?php echo $this->Form->create('ElectronicPart'); ?>
	<fieldset>
		<legend><?php echo __('Edit Electronic Part'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('conrad_number');
		echo $this->Form->input('conrad_price');
		echo $this->Form->input('reichelt_number');
		echo $this->Form->input('reichelt_price');
		echo $this->Form->input('additional_number');
		echo $this->Form->input('additional_price');
		echo $this->Form->input('selection');
		echo $this->Form->input('project_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ElectronicPart.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ElectronicPart.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Electronic Parts'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
