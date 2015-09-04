<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Gerente'), ['action' => 'edit', $gerente->IDgerente]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Gerente'), ['action' => 'delete', $gerente->IDgerente], ['confirm' => __('Are you sure you want to delete # {0}?', $gerente->IDgerente)]) ?> </li>
        <li><?= $this->Html->link(__('List Gerente'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Gerente'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="gerente view large-10 medium-9 columns">
    <h2><?= h($gerente->IDgerente) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('IDgerente') ?></h6>
            <p><?= $this->Number->format($gerente->IDgerente) ?></p>
            <h6 class="subheader"><?= __('IDfuncionario') ?></h6>
            <p><?= $this->Number->format($gerente->IDfuncionario) ?></p>
        </div>
    </div>
</div>
