<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Relatorio'), ['action' => 'edit', $relatorio->IDrelatorio]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Relatorio'), ['action' => 'delete', $relatorio->IDrelatorio], ['confirm' => __('Are you sure you want to delete # {0}?', $relatorio->IDrelatorio)]) ?> </li>
        <li><?= $this->Html->link(__('List Relatorio'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Relatorio'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="relatorio view large-10 medium-9 columns">
    <h2><?= h($relatorio->IDrelatorio) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('IDrelatorio') ?></h6>
            <p><?= $this->Number->format($relatorio->IDrelatorio) ?></p>
            <h6 class="subheader"><?= __('IDfuncionario') ?></h6>
            <p><?= $this->Number->format($relatorio->IDfuncionario) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Avaliacao') ?></h6>
            <?= $this->Text->autoParagraph(h($relatorio->avaliacao)) ?>
        </div>
    </div>
</div>
