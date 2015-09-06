<div class="relatorios view">
<h2><?php echo __('Relatorio'); ?></h2>
	<dl>
		<dt><?php echo __('IDrelatorio'); ?></dt>
		<dd>
			<?php echo h($relatorio['Relatorio']['IDrelatorio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IDfuncionario'); ?></dt>
		<dd>
			<?php echo h($relatorio['Relatorio']['funcionario_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Avaliacao'); ?></dt>
		<dd>
			<?php echo h($relatorio['Relatorio']['avaliacao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Relatorio'), array('action' => 'edit', $relatorio['Relatorio']['IDrelatorio'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Relatorio'), array('action' => 'delete', $relatorio['Relatorio']['IDrelatorio']), array(), __('Are you sure you want to delete # %s?', $relatorio['Relatorio']['IDrelatorio'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Relatorios'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Relatorio'), array('action' => 'add')); ?> </li>
	</ul>
</div>
