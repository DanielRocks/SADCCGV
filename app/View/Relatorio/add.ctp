<div class="relatorios form">
<?php echo $this->Form->create('Relatorio'); ?>
	<fieldset>
		<legend><?php echo __('Add Relatorio'); ?></legend>
	<?php
		echo $this->Form->input('IDfuncionario');
		echo $this->Form->input('avaliacao');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Relatorios'), array('action' => 'index')); ?></li>
	</ul>
</div>
