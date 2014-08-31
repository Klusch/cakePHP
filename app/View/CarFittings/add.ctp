<div class="carFittings form">
<?php echo $this->Form->create('CarFitting'); ?>
	<fieldset>
		<legend><?php echo __('Add Car Fitting'); ?></legend>
	<?php
		echo $this->Form->input('car_id');
		echo $this->Form->input('fitting');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Car Fittings'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cars'), array('controller' => 'cars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Car'), array('controller' => 'cars', 'action' => 'add')); ?> </li>
	</ul>
</div>
