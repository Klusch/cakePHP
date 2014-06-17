<div class="shops index">
	<h2><?php echo __('Shops'); ?></h2>
	<table class="table striped bordered hovered">
            <thead>
	        <tr>
			<th class="text-left"><?php echo __('Name'); ?></th>
			<th class="text-left"><?php echo __('Actions'); ?></th>
	        </tr>
            </thead>
            <tbody>
	<?php foreach ($shops as $shop): ?>
	      <tr class="">
		<td class="right"><?php echo h($shop['Shop']['name']); ?>&nbsp;</td>
		<td class="right">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $shop['Shop']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $shop['Shop']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $shop['Shop']['id']), null, __('Are you sure you want to delete # %s?', $shop['Shop']['id'])); ?>
		</td>
	      </tr>
        <?php endforeach; ?>
            </tbody>
	</table>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Shop'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Utilities'), array('controller' => 'utilities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Utility'), array('controller' => 'utilities', 'action' => 'add')); ?> </li>
	</ul>
</div>
