<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $gerente->IDgerente],
                ['confirm' => __('Are you sure you want to delete # {0}?', $gerente->IDgerente)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Gerente'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="gerente form large-10 medium-9 columns">
    <?= $this->Form->create($gerente) ?>
    <fieldset>
        <legend><?= __('Edit Gerente') ?></legend>
        <?php
            echo $this->Form->input('IDfuncionario');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
