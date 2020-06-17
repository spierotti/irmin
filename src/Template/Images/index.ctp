<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image[]|\Cake\Collection\CollectionInterface $images
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in', ['viewName'=>'Image']); ?>

<div class="images index large-9 medium-8 columns content">
    <Legend>Imágenes</legend>
    <div class="col-sm-8">
        <?= $this->Form->create('Images', ['type' => 'get']); ?>
            <div class="form-group row">
                <?//= $this->Form->control('start_date',['class' => 'datepicker', 'value' => $this->request->query('start_date'), 'autocomplete' => 'off']); ?>

                <!--<label for="fechaInicio" id="fechaInicio" class="col-sm-2 col-form-label mt-2">Fecha desde</label>-->
                <?php echo $this->Form->control('start_date', [
                                    'type' => 'text',
                                    'placeholder' => 'Fecha desde',
                                    'class'=>'form-control mt-2',
                                    //'class' => 'datetimepicker',
                                    'data-toggle' => 'datepicker',
                                    'label' => false,
                                    'value' => $this->request->query('start_date'), 'autocomplete' => 'off'] 
                                ) ?>

                <!--<label for="fechaFin" id="fechaFin" class="col-sm-2 col-form-label mt-2">Fecha hasta</label>-->
                <?php echo $this->Form->control('end_date', [
                                    'type' => 'text',
                                    'placeholder' => 'Fecha desde',
                                    'class'=>'form-control mt-2 ml-2',
                                    //'class' => 'datetimepicker',
                                    'data-toggle' => 'datepicker',
                                    'label' => false,
                                    'value' => $this->request->query('end_date'), 'autocomplete' => 'off'] 
                                ) ?>



                <?//= $this->Form->control('end_date',['class' => 'datepicker', 'value' => $this->request->query('end_date'), 'autocomplete' => 'off']); ?>
            </div>
            <?//= $this->Form->button('Buscar'); ?>
            <div class="form-group row">
                <div class="col-sm-10">
                    <?= $this->Form->button('Buscar', [
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
            </div>
        <?= $this->Form->end(); ?>
    </div>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('fecha_hora_imagen') ?></th>
                <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col" class="actions"><?= __('ACCIONES') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($images as $image): ?>
            <tr>
                <td><?= h($image->fecha_hora_imagen) ?></td>
                
                <td><?= $this->Html->image('../files/images/photo/' . $image->get('photo_dir') . '/' . $image->get('photo')); ?></td> <!-- /square_ -->
                <td><?= h($image->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $image->id]) ?>
                    <?= $this->Form->postLink(__('Borrar Imagen'), ['action' => 'delete', $image->id], ['confirm' => __('¿Seguro que desea eliminar la imagen: #{0}?', $image->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
    <nav aria-label="Page navigation">
        <ul class="pagination">
            
            <?php
                $this->Paginator->templates([
                    'prevActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'prevDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'current' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'number' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'nextActive' => '<li class="page-item"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                    'nextDisabled' => '<li class="page-item disabled"><a class="page-link" href="{{url}}">{{text}}</a></li>',
                ]);
            ?>

            <?= $this->Paginator->prev('Anterior') ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next('Siguiente') ?>

        </ul>
    </nav>
</div>
<?= $this->Html->script('filtrar-imagen.js') ?>