<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'User']); ?>

<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('username', ['autocomplete' => 'off']);
            echo $this->Form->control('password', ['autocomplete' => 'off']);
            echo $this->Form->control('role_id', ['type'=>'select','options' => $roles, 'id' => 'rol']);
            echo $this->Form->control('cliente', ['label' => 'Cliente' , 'div' => false, 'id' => 's', 'autocomplete' => 'off', 'disabled' => true]);
            echo $this->Form->control('cliente_id', ['type' => 'hidden', 'id' => 'c_id']);
            echo $this->Form->control('email', ['autocomplete' => 'off']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('search.js') ?>
<?= $this->Html->script('enabled-disabled.js') ?>
