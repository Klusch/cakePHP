<div class="troubleshootings index">
	<h2><?php echo __('Troubleshootings'); ?></h2>
	<table class="table striped bordered hovered">
            <thead>
	        <tr>
			<th class="text-left"><?php echo $this->Paginator->sort('description'); ?></th>
			<th class="text-left"><?php echo __('Actions'); ?></th>
	        </tr>
            </thead>
            <tbody>
	<?php foreach ($troubleshootings as $troubleshooting): ?>
	      <tr>
		<td class="right"><?php echo h($troubleshooting['Troubleshooting']['description']); ?>&nbsp;</td>
		<td class="right">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $troubleshooting['Troubleshooting']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $troubleshooting['Troubleshooting']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $troubleshooting['Troubleshooting']['id']), null, __('Are you sure you want to delete # %s?', $troubleshooting['Troubleshooting']['id'])); ?>
		</td>
	       </tr>
<?php endforeach; ?>
             </tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Troubleshooting'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Utilities'), array('controller' => 'utilities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Utility'), array('controller' => 'utilities', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
	</ul>
</div>
