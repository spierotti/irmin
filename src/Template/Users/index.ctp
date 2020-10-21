<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>

<div class="users index large-9 medium-8 columns content col-lg-12">

    <div class="col-sm-10">
        <div class="col-sm-8">
            <legend> Usuarios </legend>
            <div class="col-sm-6">
                <?= $this->Form->control('Buscar', ['label' => false, 'placeholder' => 'Buscar usuario', 'autocompelte' => false, 'id' => 'buscar', 'class'=>'form-control']); ?>
            </div>
            <div class="ml-4">
                <table>
                <tbody>
                    <tr>
                    <th scope="row">Solo usuarios activos</th>
                    <td>
                        <div class="ml-2">
                            <?= $this->Form->control(' Solo Activos ', ['label' => false,'type' => 'checkbox', 'checked' => true, 'id' => 'activo', 'class'=> 'mt-2']); ?>
                        </div>
                    </td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <div style="overflow-x:auto;">
        <div class="table-content mt-4" id="contenedor-tabla">

        <?php
            $this->Paginator->templates([
            'first' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'current' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            'last' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
            ]);
        ?>
        
        <?php if (!$users->isEmpty()) { ?>
                               
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Id</th>
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
                        <th scope="row"><?= $this->Number->format($user->id) ?></th>
                        <td><?= h($user->username) ?></td>
                        <td><?= $user['role']['name'] ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->created) ?></td>
                        <td>
                            <a href="./users/view/<?= $user->id?>"><i class="fa fa-user" title="Ver usuario"></i></a>
                            <a href="./users/edit/<?= $user->id?>"><i class="fa fa-pencil" title="Editar usuario"></i></a>
                            <?php
                            if($user->borrado){

                                echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-check-circle', 'title' => 'Restaurar usuario')),
                                array('action' => 'activar', $user->id),
                                array('escape'=>false, 'confirm' => __('¿Seguro quiere restaurar el Usuario #{0}?', $user->id))
                                );

                            }else{
                                
                                echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash', 'title' => 'Eliminar usuario')),
                                array('action' => 'delete', $user->id),
                                array('escape'=>false, 'confirm' => __('¿Seguro quiere borrar el Usuario #{0}?', $user->id))
                                );
                            }
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

            <nav aria-label="Page navigation ">
                <ul class="pagination justify-content-center">
                    <?= $this->Paginator->first('<<') ?> 
                    <?= $this->Paginator->prev('<') ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next('>') ?>
                    <?= $this->Paginator->last('>>') ?>
                </ul>
            </nav>

        <?php }else{

            echo '<p>¡No existen registros para el periodo solicitado!</p>';
        }?>
          
        </div>                        
    </div>
</div>
<?= $this->Html->script('filtrar-usuario.js?v=1.1') ?>