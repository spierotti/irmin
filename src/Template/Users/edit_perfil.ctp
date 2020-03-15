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
            echo $this->Form->control('username');
            echo $this->Form->control('email');
            if (isset($auth['User']['role_id']) && $auth['User']['role_id'] === 1 && $auth['User']['role']['modificar_usuario'] === true){
                echo $this->Form->control('role_id', ['type'=>'select','options' => $roles]);
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
