<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html class="fuelux" ng-app="RedePga">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
      Rede PGA - Aluno
    </title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">

    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed|Montserrat|Raleway|Indie+Flower|Lobster' rel='stylesheet' type='text/css'>

    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') ?>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') ?>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') ?>
    <?= $this->Html->css('/global/scripts/ng-tags-input.min.css'); ?>
    <?= $this->Html->css('/global/scripts/ng-tags-input.bootstrap.min.css'); ?>
    <?= $this->Html->script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js') ?>

    <?= $this->Html->script('//cdn.ckeditor.com/4.4.7/standard/ckeditor.js') ?>
    <?= $this->Html->script('//cdn.ckeditor.com/4.4.7/standard/adapters/jquery.js') ?>

    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css') ?>   
    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.full.min.js') ?> 

    <?= $this->Html->script('http://code.highcharts.com/highcharts.src.js') ?>

    <?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.6/jquery.slimscroll.min.js'); ?>

    <script>var baseUrl = '<?php echo $this->Url->build("/", true); ?>';</script>

    <?= $this->Html->css('aluno.css') ?>
    <?= $this->Html->css('exercicios.css') ?>

    <!-- Angular -->
    <?= $this->Html->script('https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.js') ?>

    <?= $this->Html->script('/global/scripts/highcharts-ng.min.js'); ?>
    <?= $this->Html->script('/global/scripts/ng-file-upload-all.min.js'); ?>
    <?= $this->Html->script('/global/scripts/ng-tags-input.min.js'); ?>

    <?= $this->Html->script('redepga.js') ?>
    <?= $this->Html->script('controllers.js') ?>
    <?= $this->Html->script('services.js') ?>
    <?= $this->Html->script('directives.js') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                

                <div class="seja-bem-vindo">
                    <a href="<?php echo $this->Url->build('/'); ?>" class="btn btn-default">Voltar</a>
                    Olá, <?php echo $admin_logged['full_name']; ?> <i class="fa fa-smile-o"></i> <a href="<?php echo $this->Url->build(['controller' => 'Authentication', 'action' => 'logout', 'plugin' => false]); ?>" class="btn btn-danger">Sair</a>
                </div>

                  <?= $this->Flash->render() ?>

                  <?= $this->fetch('content') ?>


            </div>
        </div>
    </div>


</body>
</html>
