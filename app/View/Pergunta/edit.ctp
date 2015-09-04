<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $perguntum->IDpergunta],
                ['confirm' => __('Are you sure you want to delete # {0}?', $perguntum->IDpergunta)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pergunta'), ['action' => 'index']) ?></li>
    </ul>
</div>
<div class="pergunta form large-10 medium-9 columns">
    <?= $this->Form->create($perguntum) ?>
    <fieldset>
        <legend><?= __('Edit Perguntum') ?></legend>
        <?php
            echo $this->Form->input('IDquestionario');
            echo $this->Form->input('pergunta');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
