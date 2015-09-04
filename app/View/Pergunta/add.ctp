<div class="pergunta form">
<?php echo $this->Form->create('Perguntum'); ?>
	<fieldset>
		<legend><?php echo __('Add Perguntum'); ?></legend>
	<?php
		echo $this->Form->input('IDquestionario');
		echo $this->Form->input('pergunta');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pergunta'), array('action' => 'index')); ?></li>
	</ul>
</div>
