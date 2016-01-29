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
            <li class="active"><a href="#workers_all" data-toggle="tab" id="workers_sub_tab">All Workers</a></li>
            <li><a href="#worker_create" data-toggle="tab">Create Worker</a></li>
            <li><a href="#team_leaders_all" data-toggle="tab" id="team_leaders_sub">Team Leaders</a></li>
            <!--<li><a href="#teams_all" data-toggle="tab">All Teams</a></li>-->
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="workers_all">
                <!-- Load all workers page -->
                <?php $this->load->view('tab_views/workers/workers_all'); ?>
                <!-- End all workers creating page -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="worker_create">
                <!-- Load workers creating page -->
                <?php $this->load->view('tab_views/workers/create', ['roles' => $roles]); ?>
                <!-- End Load workers creating page -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="team_leaders_all">
                <!-- Load team leaders creating page -->
                <?php $this->load->view('tab_views/workers/team_leaders_all'); ?>
                <!-- End team leaders creating page -->
            </div>
            <div role="tabpanel" class="tab-pane fade" id="teams_all">
                <!-- Load team leaders creating page -->
                <?php $this->load->view('tab_views/workers/teams_all'); ?>
                <!-- End team leaders creating page -->
            </div>
        </div>
    </div>
</div>
