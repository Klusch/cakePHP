<div class="carFittings view">
<h2><?php echo __('Car Fitting'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($carFitting['CarFitting']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Car'); ?></dt>
		<dd>
			<?php echo $this->Html->link($carFitting['Car']['name'], array('controller' => 'cars', 'action' => 'view', $carFitting['Car']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fitting'); ?></dt>
		<dd>
			<?php echo h($carFitting['CarFitting']['fitting']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($carFitting['CarFitting']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($carFitting['CarFitting']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($carFitting['CarFitting']['created']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Car Fitting'), array('action' => 'edit', $carFitting['CarFitting']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Car Fitting'), array('action' => 'delete', $carFitting['CarFitting']['id']), null, __('Are you sure you want to delete # %s?', $carFitting['CarFitting']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Car Fittings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Car Fitting'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cars'), array('controller' => 'cars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Car'), array('controller' => 'cars', 'action' => 'add')); ?> </li>
	</ul>
</div>
