<div class="costs view">
<h2><?php echo __('Cost'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cost['Cost']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($cost['Cost']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($cost['Cost']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cost['Category']['name'], array('controller' => 'categories', 'action' => 'view', $cost['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Category Id'); ?></dt>
		<dd>
			<?php echo h($cost['Cost']['sub_category_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Cost'), array('action' => 'edit', $cost['Cost']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Cost'), array('action' => 'delete', $cost['Cost']['id']), null, __('Are you sure you want to delete # %s?', $cost['Cost']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Costs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cost'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
