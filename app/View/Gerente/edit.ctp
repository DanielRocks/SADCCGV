<div class="gerentes form">
<?php echo $this->Form->create('Gerente'); ?>
	<fieldset>
		<legend><?php echo __('Edit Gerente'); ?></legend>
	<?php
		echo $this->Form->input('IDgerente');
		echo $this->Form->input('IDfuncionario');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Gerente.IDgerente')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Gerente.IDgerente'))); ?></li>
		<li><?php echo $this->Html->link(__('List Gerentes'), array('action' => 'index')); ?></li>
	</ul>
</div>
