<div class="electronicParts view">
<h2><?php echo __('Electronic Part'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conrad Number'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['conrad_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Conrad Price'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['conrad_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reichelt Number'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['reichelt_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Reichelt Price'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['reichelt_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Additional Number'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['additional_number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Additional Price'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['additional_price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Selection'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['selection']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Project'); ?></dt>
		<dd>
			<?php echo $this->Html->link($electronicPart['Project']['name'], array('controller' => 'projects', 'action' => 'view', $electronicPart['Project']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($electronicPart['ElectronicPart']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Electronic Part'), array('action' => 'edit', $electronicPart['ElectronicPart']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Electronic Part'), array('action' => 'delete', $electronicPart['ElectronicPart']['id']), null, __('Are you sure you want to delete # %s?', $electronicPart['ElectronicPart']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Electronic Parts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Electronic Part'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add')); ?> </li>
	</ul>
</div>
