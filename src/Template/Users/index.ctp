<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'User']); ?>
<div class="users index large-9 medium-8 columns content">
    <div class="col-sm-10">
        <div class="col-sm-2">
            <br>
        </div>
        <div class="col-sm-8">
            <legend class="mt-2"> Usuarios </legend>
            <div class="col-sm-6">
                <?= $this->Form->control('Buscar', ['label' => false, 'placeholder' => 'Buscar Usuario', 'autocompelte' => false, 'id' => 'buscar', 'class'=>'form-control']); ?>
            </div>
            <div class="ml-4">
              <table>
                <tbody>
                  <tr>
                    <th scope="row">Solo activos</th>
                      <td>
                        <div class="ml-2">
                            <?= $this->Form->control(' Solo Activos ', ['label' => false,'type' => 'checkbox', 'checked' => true, 'id' => 'activo', 'class'=> 'mt-2']); ?>
                        </div>
                      </td>
                    </th>
                  </tr>
                </tbody>
              </table>
            </div>
        </div>
    </div>
        <div class="row col-sm-18">
            <div class="col-sm-1 border">
                <?= $this->Paginator->sort('ID'); ?>
            </div>
            <div class="col-sm-2 border">
                Nombre
            </div>
            <div class="col-sm-2 border">
                Rol
            </div>
            <div class="col-sm-3 border">
                Email
            </div>
            <div class="col-sm-2 border">
                Fecha de creación
            </div>
            <div class="col-sm-1 border">
                Acciones
            </div>
        </div>
        <?php foreach ($users as $user): ?>
            <div class="row">
                <div class="col-sm-1 border"><?= $this->Number->format($user->id) ?></div>
                <div class="col-sm-2 border"><?= h($user->username) ?></div>
                <div class="col-sm-2 border"><?= $user['role']['name'] ?></div>
                <div class="col-sm-3 border"><?= h($user->email) ?></div>
                <div class="col-sm-2 border"><?= h($user->created) ?></div>
                <div class="col-sm-1 border">
                    <td class="actions">
                    <?//= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                    <a href="../users/view/<?= $user->id?>"><i class="fa fa-user" title="Ver usuario"></i></a>
                    <?//= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                    <a href="../users/edit/<?= $user->id?>"><i class="fa fa-pencil" title="Editar usuario"></i></a>
                    <?//= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                    <?php
                        echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Eliminar usuario')),
                        array('action' => 'delete', $user->id),
                        array('escape'=>false)
                        );
                    ?>
                    </td>
                </div>
            </div>
        <?php endforeach; ?>
        <br>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
<?= $this->Html->script('filtrar-usuario.js') ?>


<div class="clientes index large-9 medium-8 columns content col-lg-12">
    <legend><?= __('Clientes') ?></legend>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Nombre</th>
              <th scope="col">Rol</th>
              <th scope="col">Email</th>
              <th scope="col">Fecha de creación</th>
              <th scope="col">Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $user): ?>
                <tr>

                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>



</div>

