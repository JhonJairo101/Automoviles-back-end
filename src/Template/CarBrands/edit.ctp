<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CarBrand $carBrand
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $carBrand->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $carBrand->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Car Brands'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="carBrands form large-9 medium-8 columns content">
    <?= $this->Form->create($carBrand) ?>
    <fieldset>
        <legend><?= __('Edit Car Brand') ?></legend>
        <?php
            echo $this->Form->control('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
