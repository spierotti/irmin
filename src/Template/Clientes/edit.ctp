<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
$this->assign('title', 'Modificar cliente');
use Cake\Routing\Router;
?>


<?= $this->Form->create($cliente) ?>
    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="form-group row">
                <legend class="ml-3">Modificar cliente</legend>
                <label for="razonSocial" id="razonSocial" class="col-sm-3 col-form-label mt-2">Razón social</label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('name',['label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="cuit" id="cuit" class="col-sm-3 col-form-label mt-2">Cuit</label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('cuit',['label' => false,'class'=>'form-control mt-2']); ?>
                </div>
                <label for="email" id="email" class="col-sm-3 col-form-label mt-2">E-mail</label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('email',['label' => false,'class'=>'form-control mt-2']); ?>
                </div>
                <label for="telefono" id="telefono" class="col-sm-3 col-form-label mt-2">Teléfono</label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('telefono',['label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="celular" id="celular" class="col-sm-3 col-form-label mt-2">Celular</label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('celular',['label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
                <label for="domicilio" id="domicilio" class="col-sm-3 col-form-label mt-2">Domicilio</label>
                <div class="col-sm-7">
                    <?php echo $this->Form->control('domicilio',['label' => false, 'class'=>'form-control mt-2']); ?>
                </div>
            </div>
            <div class="form-group row mt-4">
                <div class="ml-3 mt-2 mr-2">
                    <?= $this->Form->submit('Guardar cambios', [
                        'class' => 'btn btn-primary'
                    ]) ?>
                </div>
                <div class="ml-3 mt-2">
                    <button type="button" onclick="window.location.href = '<?php echo Router::url(array('controller'=>'Clientes', 'action'=>'index'))?>'" class="btn btn-primary ">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
<?= $this->Form->end() ?>
