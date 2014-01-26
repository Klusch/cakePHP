<div class="movieCategories view">
<h2><?php echo __('Movie Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($movieCategory['MovieCategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($movieCategory['MovieCategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($movieCategory['MovieCategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($movieCategory['MovieCategory']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Movie Category'), array('action' => 'edit', $movieCategory['MovieCategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Movie Category'), array('action' => 'delete', $movieCategory['MovieCategory']['id']), null, __('Are you sure you want to delete # %s?', $movieCategory['MovieCategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Movie Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Movie Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
