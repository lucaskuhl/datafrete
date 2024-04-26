<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\cepDistancia $cepDistancia
 */
?>
<?php $this->extend('/layout/TwitterBootstrap/dashboard'); ?>

<?php $this->start('tb_actions'); ?>
<li><?= $this->Form->postLink(__('Remover'), ['action' => 'delete', $cepDistancia->id], ['confirm' => __('Tem certeza que deseja remover o cep # {0}?', $cepDistancia->id), 'class' => 'nav-link']) ?></li>
<li><?= $this->Html->link(__('Listar Ceps'), ['action' => 'index'], ['class' => 'nav-link']) ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav flex-column">' . $this->fetch('tb_actions') . '</ul>'); ?>

<div class="cepDistancia form content">
    <?= $this->Form->create($cepDistancia) ?>
    <fieldset>
        <legend><?= __('Editar Cep') ?></legend>
        <?php
            echo $this->Form->control('cep_origem');
            echo $this->Form->control('cep_destino');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
