<div class="questionarios form">
<?php echo $this->Form->create('Questionario'); ?>
	<fieldset>
		<legend><?php echo __('Edit Questionario'); ?></legend>
	<?php
		echo $this->Form->input('IDquestionario');
		echo $this->Form->input('funcionario_id');
		echo $this->Form->input('titulo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Questionario.IDquestionario')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Questionario.IDquestionario'))); ?></li>
		<li><?php echo $this->Html->link(__('List Questionarios'), array('action' => 'index')); ?></li>
	</ul>
</div>
