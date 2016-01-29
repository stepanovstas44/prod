<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 10:50
 */
?>
<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
    <link href="<?= base_url('assets/css/bootstrap/bootstrap.min.css');?>" rel='stylesheet' type='text/css'/>
    <link href="<?= base_url('assets/css/bootstrap/bootstrap-theme.min.css');?>" rel='stylesheet' type='text/css'/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <?php if(isset($css)):?>
        <?php Attach_assets::attach_css($css); ?>
    <?php endif;?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="dropdown  pull-right">
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">
                        <i class="fa fa-user fa-fw"></i>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="#">HTML</a></li>
                        <li><a href="#">CSS</a></li>
                        <li><a href="#">JavaScript</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <button id="status_message" class="btn" type="button" data-toggle="collapse" data-target="#status_1" aria-expanded="false" aria-controls="collapseExample" style="visibility: hidden">
        Button with data-target
    </button>
    <div class="collapse" id="status_1">

    </div>

