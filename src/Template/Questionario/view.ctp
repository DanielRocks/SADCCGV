<div class="actions columns large-2 medium-3">
    <h3><?= __('Actions') ?></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Edit Questionario'), ['action' => 'edit', $questionario->IDquestionario]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Questionario'), ['action' => 'delete', $questionario->IDquestionario], ['confirm' => __('Are you sure you want to delete # {0}?', $questionario->IDquestionario)]) ?> </li>
        <li><?= $this->Html->link(__('List Questionario'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Questionario'), ['action' => 'add']) ?> </li>
    </ul>
</div>
<div class="questionario view large-10 medium-9 columns">
    <h2><?= h($questionario->IDquestionario) ?></h2>
    <div class="row">
        <div class="large-5 columns strings">
            <h6 class="subheader"><?= __('Titulo') ?></h6>
            <p><?= h($questionario->titulo) ?></p>
        </div>
        <div class="large-2 columns numbers end">
            <h6 class="subheader"><?= __('IDquestionario') ?></h6>
            <p><?= $this->Number->format($questionario->IDquestionario) ?></p>
            <h6 class="subheader"><?= __('IDfuncionario') ?></h6>
            <p><?= $this->Number->format($questionario->IDfuncionario) ?></p>
        </div>
    </div>
</div>
