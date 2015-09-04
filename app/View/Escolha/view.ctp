<div class="escolhas view">
<h2><?php echo __('Escolha'); ?></h2>
	<dl>
		<dt><?php echo __('IDescolha'); ?></dt>
		<dd>
			<?php echo h($escolha['Escolha']['IDescolha']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IDfuncionario'); ?></dt>
		<dd>
			<?php echo h($escolha['Escolha']['IDfuncionario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IDopcao'); ?></dt>
		<dd>
			<?php echo h($escolha['Escolha']['IDopcao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Escolha'), array('action' => 'edit', $escolha['Escolha']['IDescolha'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Escolha'), array('action' => 'delete', $escolha['Escolha']['IDescolha']), array(), __('Are you sure you want to delete # %s?', $escolha['Escolha']['IDescolha'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Escolhas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Escolha'), array('action' => 'add')); ?> </li>
	</ul>
</div>
