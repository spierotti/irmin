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
        <legend><?= __('Modificar Usuario') ?></legend>
        <?php
            echo $this->Form->control('username', ['autocomplete' => 'off']);
            echo $this->Form->control('email', ['autocomplete' => 'off']);
            echo $this->Form->control('role_id', ['type'=>'select','options' => $roles, 'id' => 'rol']);
            echo $this->Form->control('cliente.name', [ 'div' => false, 'id' => 's' , 'autocomplete' => 'off']);
            echo $this->Form->control('cliente_id', ['type' => 'hidden', 'id' => 'c_id']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?= $this->Html->script('enabled-disabled.js') ?>
