<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 23.01.2016
 * Time: 10:42
 */
?>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="home">
        <!-- Load Home page -->
        <?php $this->load->view('tab_views/home/content'); ?>
        <!-- End To Load Home page -->
    </div>
    <div role="tabpanel" class="tab-pane fade" id="workers">
        <!-- Load Workers page -->
        <?php $this->load->view('tab_views/workers/content', ['roles' => $roles]); ?>
        <!-- End To Load Workers page -->
    </div>
    <div role="tabpanel" class="tab-pane fade in" id="projects">
        <!-- Load projects page -->
        <?php $this->load->view('tab_views/project/content'); ?>
        <!-- End To load projects page -->
    </div>
    <div role="tabpanel" class="tab-pane fade in" id="role">
        <!-- Load Role page -->
        <?php $this->load->view('tab_views/role/content'); ?>
        <!-- End To Role Workers page -->
    </div>
    <div role="tabpanel" class="tab-pane fade in" id="test">
        test
    </div>
</div>
