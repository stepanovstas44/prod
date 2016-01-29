<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 24.01.2016
 * Time: 22:22
 */
?>
<div class="col-sm-12">
    <div class="row">
        <h4>Bootstrap Snipp for Datatable</h4>
        <div class="table-responsive">

            <!-- Waiting -->
            <?php $this->load->view('js_views/waiting'); ?>
            <!-- End Waiting -->

            <table id="workers_table" class="table table-bordred table-striped">

                <thead>

                <th><input type="checkbox" id="checkall" disabled/></th>
                <th>Name</th>
                <th>Surname</th>
                <th>Role</th>
                <th>Team Lead</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
                </thead>
                <tbody>

                <!--Attach from ajax-->

                <!--End Attaching from ajax-->

                </tbody>

            </table>

            <div class="clearfix"></div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit_worker_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Worker</h4>
            </div>
            <div class="modal-body">
                <!-- FROM AJAX -->
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>