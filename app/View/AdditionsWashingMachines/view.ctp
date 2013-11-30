<div class="additionsWashingMachines view">
<h2><?php echo __('Additions Washing Machine'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($additionsWashingMachine['AdditionsWashingMachine']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Addition Id'); ?></dt>
		<dd>
			<?php echo h($additionsWashingMachine['AdditionsWashingMachine']['addition_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Washing Machine Id'); ?></dt>
		<dd>
			<?php echo h($additionsWashingMachine['AdditionsWashingMachine']['washing_machine_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Additions Washing Machine'), array('action' => 'edit', $additionsWashingMachine['AdditionsWashingMachine']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Additions Washing Machine'), array('action' => 'delete', $additionsWashingMachine['AdditionsWashingMachine']['id']), null, __('Are you sure you want to delete # %s?', $additionsWashingMachine['AdditionsWashingMachine']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Additions Washing Machines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Additions Washing Machine'), array('action' => 'add')); ?> </li>
	</ul>
</div>
