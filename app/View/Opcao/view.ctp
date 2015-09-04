<div class="opcaos view">
<h2><?php echo __('Opcao'); ?></h2>
	<dl>
		<dt><?php echo __('IDopcao'); ?></dt>
		<dd>
			<?php echo h($opcao['Opcao']['IDopcao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IDpergunta'); ?></dt>
		<dd>
			<?php echo h($opcao['Opcao']['IDpergunta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Opcao'); ?></dt>
		<dd>
			<?php echo h($opcao['Opcao']['opcao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Opcao'), array('action' => 'edit', $opcao['Opcao']['IDopcao'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Opcao'), array('action' => 'delete', $opcao['Opcao']['IDopcao']), array(), __('Are you sure you want to delete # %s?', $opcao['Opcao']['IDopcao'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Opcaos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Opcao'), array('action' => 'add')); ?> </li>
	</ul>
</div>
