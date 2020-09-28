<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Informe $informe
 */
?>

<?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>

<div class="large-9 medium-8 columns content">
    <legend>Informe número <?= h($informe->id) ?></legend>
    <table class="table table-sm table-hover">
        <tr>
            <th scope="row">Descripcion</th>
            <td><?= h($informe->descripcion) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Fecha Hora Informe') ?></th>
            <td><?= h($informe->fecha_hora_informe) ?></td>
        </tr>
    </table>
    <?php if (!empty($informe->images)): ?>
        <div class="related">
            <h4>Imágenes relacionadas</h4>
            <table class="table table-sm table-hover">
                <tr>
                    <th scope="col"><?= __('Fecha Hora Imagen') ?></th>
                    <th scope="col"><?= __('Photo') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($informe->images as $images): ?>
                <tr>
                    <td><?= h($images->fecha_hora_imagen) ?></td>
                    <td><?= $this->Html->image('../files/images/photo/' . $images->photo_dir . '/square_' . $images->photo); ?></td>
                    <td><?= h($images->created) ?></td>
                    <td class="actions">
                        <?php
                            echo $this->Form->postLink(
                                $this->Html->tag('i', '', array('class' => 'fa fa-eye', 'title' => 'Ver imagen')),
                            array('controller' => 'Images','action' => 'view', $images->id),
                            array('escape'=>false)
                            );
                        ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    <?php endif; ?>
</div>
