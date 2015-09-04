<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $escolha->IDescolha],
                ['confirm' => __('Are you sure you want to delete # {0}?', $escolha->IDescolha)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Escolha'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="escolha form large-10 medium-9 columns">
    <?= $this->Form->create($escolha) ?>
    <fieldset>
        <legend><?= __('Edit Escolha') ?></legend>
        <?php
            echo $this->Form->input('IDfuncionario');
            echo $this->Form->input('IDopcao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
