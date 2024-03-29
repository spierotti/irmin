<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

//$cakeDescription = 'CakePHP: the rapid development php framework';
$cakeDescription = 'Irmin ';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?php echo $this->Html->css([
    'bootstrap.min',
    'bootstrap.icon-large.min',
    'font-awesome.min',
    'datepicker.min',
    'style',
    'jquery-ui',
    'jquery-ui.min'
    ]); ?>

    <?= $this->Html->script([
        'jquery-3.4.1.min.js',
        'bootstrap.min.js',
        'datepicker.js',
        'jquery-ui.min.js',
        'alerts.js'
    ]) ?>

  
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body class="left-menu">
  
    
    <!--<div class="container clearfix" >-->

    <?php echo $this->element('Sidemenu\side_menu_logged_in'); ?>
        <!--<div id="contenedor-sitio">-->
        <div id="wrapper">
            <div class="container mt-5 mb-5">
                <div class="row justify-content-center ml-5">
                    <!--Mensaje de alerta o lo que pase.-->
                    <?= $this->Flash->render() ?>
                </div>
                
                <?= $this->fetch('content') ?>
                
            </div>
        </div>

    <!--</div>-->
    <script type="text/javascript"> 
        $(function () {
            $('[data-toggle="datepicker"]').datepicker({
                format: 'dd/mm/yyyy',
                changeMonth: true,
                changeYear: true
            });
            $('.date').datepicker({ language: "es"});
        });
    </script>
    <footer>
    </footer>
</body>
</html>
