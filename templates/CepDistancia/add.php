<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CepDistancium $cepDistancia
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Cep Distancia'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="cepDistancia form content">
            <?= $this->Form->create($cepDistancia) ?>
            <fieldset>
                <legend><?= __('Add Cep Distancium') ?></legend>
                <?php
                    echo $this->Form->control('cep_origem');
                    echo $this->Form->control('cep_destino');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
