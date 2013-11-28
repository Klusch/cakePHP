<div class="incomes view">
<h2><?php echo __('Income'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($income['Income']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($income['Income']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($income['Income']['price']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($income['Category']['name'], array('controller' => 'categories', 'action' => 'view', $income['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($income['SubCategory']['name'], array('controller' => 'sub_categories', 'action' => 'view', $income['SubCategory']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Income'), array('action' => 'edit', $income['Income']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Income'), array('action' => 'delete', $income['Income']['id']), null, __('Are you sure you want to delete # %s?', $income['Income']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Incomes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Income'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sub Categories'), array('controller' => 'sub_categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sub Category'), array('controller' => 'sub_categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
