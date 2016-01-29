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
            <li class="active"><a href="#roles_all" data-toggle="tab" id="roles_sub_tab">All Roles</a></li>
            <li><a href="#roles_create" data-toggle="tab">Create Role</a></li>
            <!--<li><a href="#htab3" data-toggle="tab">Tab 3</a></li>-->
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="roles_all">
                <!-- Load projects page -->
                <?php $this->load->view('tab_views/role/roles_all'); ?>
                <!-- End To load projects page -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="roles_create">
                <!-- Load projects page -->
                <?php $this->load->view('tab_views/role/roles_create'); ?>
                <!-- End To load projects page -->
            </div>
            <!--<div role="tabpanel" class="tab-pane fade in" id="htab3">
                <h3>Tab 3</h3>
            </div>-->
        </div>
    </div>
</div>
