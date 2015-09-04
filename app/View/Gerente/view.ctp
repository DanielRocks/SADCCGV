<div class="gerentes view">
<h2><?php echo __('Gerente'); ?></h2>
	<dl>
		<dt><?php echo __('IDgerente'); ?></dt>
		<dd>
			<?php echo h($gerente['Gerente']['IDgerente']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IDfuncionario'); ?></dt>
		<dd>
			<?php echo h($gerente['Gerente']['IDfuncionario']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gerente'), array('action' => 'edit', $gerente['Gerente']['IDgerente'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Gerente'), array('action' => 'delete', $gerente['Gerente']['IDgerente']), array(), __('Are you sure you want to delete # %s?', $gerente['Gerente']['IDgerente'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Gerentes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gerente'), array('action' => 'add')); ?> </li>
	</ul>
</div>
