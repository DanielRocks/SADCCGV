<div class="questionarios view">
<h2><?php echo __('Questionario'); ?></h2>
	<dl>
		<dt><?php echo __('IDquestionario'); ?></dt>
		<dd>
			<?php echo h($questionario['Questionario']['IDquestionario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IDfuncionario'); ?></dt>
		<dd>
			<?php echo h($questionario['Questionario']['IDfuncionario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Titulo'); ?></dt>
		<dd>
			<?php echo h($questionario['Questionario']['titulo']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Questionario'), array('action' => 'edit', $questionario['Questionario']['IDquestionario'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Questionario'), array('action' => 'delete', $questionario['Questionario']['IDquestionario']), array(), __('Are you sure you want to delete # %s?', $questionario['Questionario']['IDquestionario'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionarios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionario'), array('action' => 'add')); ?> </li>
	</ul>
</div>
