<div class="movieCategories form">
<?php echo $this->Form->create('MovieCategory'); ?>
	<fieldset>
		<legend><?php echo __('Add Movie Category'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Movie Categories'), array('action' => 'index')); ?></li>
	</ul>
</div>