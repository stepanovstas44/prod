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

