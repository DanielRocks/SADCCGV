<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Opcao'), ['action' => 'edit', $opcao->IDopcao]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Opcao'), ['action' => 'delete', $opcao->IDopcao], ['confirm' => __('Are you sure you want to delete # {0}?', $opcao->IDopcao)]) ?> </li>
        <li><?= $this->Html->link(__('List Opcao'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Opcao'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="opcao view large-10 medium-9 columns">
    <h2><?= h($opcao->IDopcao) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('IDopcao') ?></h6>
            <p><?= $this->Number->format($opcao->IDopcao) ?></p>
            <h6 class="subheader"><?= __('IDpergunta') ?></h6>
            <p><?= $this->Number->format($opcao->IDpergunta) ?></p>
        </div>
    </div>
    <div class="row texts">
        <div class="columns large-9">
            <h6 class="subheader"><?= __('Opcao') ?></h6>
            <?= $this->Text->autoParagraph(h($opcao->opcao)) ?>
        </div>
    </div>
</div>
