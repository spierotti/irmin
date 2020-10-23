<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Recuperar contraseña');
?>


    <?= $this->Form->create($user) ?>
    <div class="row justify-content-center">
        <div class="col-sm-10 mt-5">
        	<legend>Recuperar contraseña </legend>
            <div class="form-group row">
                <!--<label for="email" id="email" class="col-sm-2 col-form-label mt-2">E-mail</label>-->
                <div class="col-sm-6">
			        <?php
			            echo $this->Form->control('email', ['label' => false,'class'=>'form-control mt-2', 'placeholder'=> 'Ingrese su email']);
			        ?>
			    </div>
			</div>
			<div class="form-group row">
				<div class="col-sm-6">
				    <?= $this->Form->submit('Recuperar contraseña', [
				        'class' => 'btn btn-primary'
				    ]) ?>
				</div>
			</div>
		</div>
	</div>


<?= $this->Form->end() ?>
</div>
