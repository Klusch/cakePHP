<div class="properties view">
<h2><?php echo __('Property'); ?></h2>
	<dl>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Property'), array('action' => 'edit', $property['Property']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Property'), array('action' => 'delete', $property['Property']['id']), null, __('Are you sure you want to delete # %s?', $property['Property']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Properties'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Property'), array('action' => 'add')); ?> </li>
	</ul>
</div>
