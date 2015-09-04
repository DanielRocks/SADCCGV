<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('List Questionario'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="questionario form large-10 medium-9 columns">
    <?= $this->Form->create($questionario) ?>
    <fieldset>
        <legend><?= __('Add Questionario') ?></legend>
        <?php
            echo $this->Form->input('IDfuncionario');
            echo $this->Form->input('titulo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
