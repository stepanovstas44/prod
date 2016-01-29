<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 22.01.2016
 * Time: 17:06
 */ ?>
<div class="row">
    <div class="col-sm-12">
        <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-tabs-horizontal">
            <li class="active" id="projects_sub_tab"><a href="#projects_all" data-toggle="tab">Projects</a></li>
            <li id="tasks_sub_tab"><a href="#tasks_all" data-toggle="tab">Tasks</a></li>
            <li><a href="#project_create" data-toggle="tab">Create Project</a></li>
            <li><a href="#create_task" data-toggle="tab">Create Task</a></li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="projects_all">
                <!-- Load projects page -->
                <?php $this->load->view('tab_views/project/projects_all'); ?>
                <!-- End To load projects page -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tasks_all">
                <!-- Load project create page -->
                <?php $this->load->view('tab_views/project/tasks_all'); ?>
                <!-- End To load project create page -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="project_create">
                <!-- Load project create page -->
                <?php $this->load->view('tab_views/project/project_create'); ?>
                <!-- End To load project create page -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="create_task">
                <!-- Load project create page -->
                <?php $this->load->view('tab_views/project/create_task'); ?>
                <!-- End To load project create page -->
            </div>
        </div>
    </div>
</div>
