<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 17:07
 */
?>
<?php
//debug_print($this->session->all_userdata());
?>
<div class="row">
    <div class="col-sm-3">
        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked">
            <li class="active"><a href="#home" data-toggle="tab" id="home_tab">
                    <i class="fa fa-home fa-fw"></i>Home
                </a>
            </li>
            <li>
                <a class="set_hash" href="#workers" data-toggle="tab" id="workers_tab">
                    <i class="fa fa-user fa-fw"></i>Workers
                </a>
            </li>
            <li>
                <a class="set_hash" href="#projects" data-toggle="tab" id="projects_tab">
                    <i class="fa fa-user fa-fw"></i>
                    Projects
                </a>
            </li>
            <li>
                <a class="set_hash" href="#role" data-toggle="tab" id="roles_tab">
                    <i class="fa fa-user fa-fw"></i>Roles
                </a>
            </li>
            <li>
                <a class="set_hash" href="#test" data-toggle="tab">
                    <i class="fa fa-user fa-fw"></i>Test
                </a>
            </li>
        </ul>
    </div>
    <div class="col-sm-9" id="refresh_url">
        <?php $this->load->view('tab_views/tab_content'); ?>
    </div>
</div>



