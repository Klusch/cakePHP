<div class="problemLocations index">
	<h2><?php echo __('Problem Locations'); ?></h2>
	<table class="table striped bordered hovered">
            <thead>
	        <tr>
			<th class="text-left"><?php echo __('Name'); ?></th>
			<th class="text-left"><?php echo __('Actions'); ?></th>
	        </tr>
            </thead>
            <tbody>
	<?php foreach ($problemLocations as $problemLocation): ?>
	      <tr>
		<td class="right"><?php echo h($problemLocation['ProblemLocation']['name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $problemLocation['ProblemLocation']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $problemLocation['ProblemLocation']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $problemLocation['ProblemLocation']['id']), null, __('Are you sure you want to delete # %s?', $problemLocation['ProblemLocation']['id'])); ?>
		</td>
	      </tr>
<?php endforeach; ?>
             </tbody>
	</table>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Problem Location'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Problems'), array('controller' => 'problems', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('controller' => 'problems', 'action' => 'add')); ?> </li>
	</ul>
</div>
