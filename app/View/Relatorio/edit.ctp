<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $relatorio->IDrelatorio],
                ['confirm' => __('Are you sure you want to delete # {0}?', $relatorio->IDrelatorio)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Relatorio'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="relatorio form large-10 medium-9 columns">
    <?= $this->Form->create($relatorio) ?>
    <fieldset>
        <legend><?= __('Edit Relatorio') ?></legend>
        <?php
            echo $this->Form->input('IDfuncionario');
            echo $this->Form->input('avaliacao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
