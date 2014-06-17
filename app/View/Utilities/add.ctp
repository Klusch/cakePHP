<div class="utilities form">
<?php echo $this->Form->create('Utility'); ?>
	<fieldset>
		<legend><?php echo __('Add Utility'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('shop_id');
		echo $this->Form->input('price');
		echo $this->Form->input('ordered');
		echo $this->Form->input('delivered');
		echo $this->Form->input('troubleshooting_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Utilities'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Shops'), array('controller' => 'shops', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shop'), array('controller' => 'shops', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Troubleshootings'), array('controller' => 'troubleshootings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Troubleshooting'), array('controller' => 'troubleshootings', 'action' => 'add')); ?> </li>
	</ul>
</div>
