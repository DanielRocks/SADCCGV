<div class="pergunta view">
<h2><?php echo __('Perguntum'); ?></h2>
	<dl>
		<dt><?php echo __('IDpergunta'); ?></dt>
		<dd>
			<?php echo h($perguntum['Perguntum']['IDpergunta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('IDquestionario'); ?></dt>
		<dd>
			<?php echo h($perguntum['Perguntum']['IDquestionario']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pergunta'); ?></dt>
		<dd>
			<?php echo h($perguntum['Perguntum']['pergunta']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Perguntum'), array('action' => 'edit', $perguntum['Perguntum']['IDpergunta'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Perguntum'), array('action' => 'delete', $perguntum['Perguntum']['IDpergunta']), array(), __('Are you sure you want to delete # %s?', $perguntum['Perguntum']['IDpergunta'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pergunta'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Perguntum'), array('action' => 'add')); ?> </li>
	</ul>
</div>
