<div class="pergunta index">
	<h2><?php echo __('Pergunta'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<!--<th><?php echo $this->Paginator->sort('IDpergunta'); ?></th>-->
			<!--<th><?php echo $this->Paginator->sort('IDquestionario'); ?></th>-->
			<th><?php echo $this->Paginator->sort('pergunta'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($pergunta as $perguntum): ?>
	<tr>
		<!--<td><?php echo h($perguntum['Perguntum']['IDpergunta']); ?>&nbsp;</td>-->
		<!--<td><?php echo h($perguntum['Perguntum']['IDquestionario']); ?>&nbsp;</td>-->
		<td><?php echo h($perguntum['Perguntum']['pergunta']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $perguntum['Perguntum']['IDpergunta'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $perguntum['Perguntum']['IDpergunta'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $perguntum['Perguntum']['IDpergunta']), array(), __('Are you sure you want to delete # %s?', $perguntum['Perguntum']['IDpergunta'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nova Pergunta'), array('action' => 'add')); ?></li>
	</ul>
</div>
