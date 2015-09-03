<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Escolha'), ['action' => 'edit', $escolha->IDescolha]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Escolha'), ['action' => 'delete', $escolha->IDescolha], ['confirm' => __('Are you sure you want to delete # {0}?', $escolha->IDescolha)]) ?> </li>
        <li><?= $this->Html->link(__('List Escolha'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Escolha'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="escolha view large-10 medium-9 columns">
    <h2><?= h($escolha->IDescolha) ?></h2>
    <div class="row">
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('IDescolha') ?></h6>
            <p><?= $this->Number->format($escolha->IDescolha) ?></p>
            <h6 class="subheader"><?= __('IDfuncionario') ?></h6>
            <p><?= $this->Number->format($escolha->IDfuncionario) ?></p>
            <h6 class="subheader"><?= __('IDopcao') ?></h6>
            <p><?= $this->Number->format($escolha->IDopcao) ?></p>
        </div>
    </div>
</div>
