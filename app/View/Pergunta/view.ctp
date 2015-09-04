<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Perguntum'), ['action' => 'edit', $perguntum->IDpergunta]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Perguntum'), ['action' => 'delete', $perguntum->IDpergunta], ['confirm' => __('Are you sure you want to delete # {0}?', $perguntum->IDpergunta)]) ?> </li>
        <li><?= $this->Html->link(__('List Pergunta'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Perguntum'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="pergunta view large-10 medium-9 columns">
    <h2><?= h($perguntum->IDpergunta) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('IDpergunta') ?></h6>
            <p><?= $this->Number->format($perguntum->IDpergunta) ?></p>
            <h6 class="subheader"><?= __('IDquestionario') ?></h6>
            <p><?= $this->Number->format($perguntum->IDquestionario) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Pergunta') ?></h6>
            <?= $this->Text->autoParagraph(h($perguntum->pergunta)) ?>
        </div>
    </div>
</div>
