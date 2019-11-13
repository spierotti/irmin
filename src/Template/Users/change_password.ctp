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
        <legend><?= __('Cambiar Contraseña') ?></legend>
        <?php
            echo $this->Form->control('viejo_password', ['type' => 'password']);
            echo $this->Form->control('nuevo_password', ['type' => 'password']);
            echo $this->Form->control('repetir_nuevo_password', ['type' => 'password']);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
