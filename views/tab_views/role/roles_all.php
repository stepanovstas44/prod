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
        <h4>Roles</h4>
        <div class="table-responsive">

            <!-- Waiting -->
            <?php $this->load->view('js_views/waiting'); ?>
            <!-- End Waiting -->

            <table id="roles_table" class="table table-bordred table-striped">

                <thead>

                <th><input type="checkbox" disabled/></th>
                <th>Role</th>
                <th>Key</th>
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

<div class="modal fade" id="edit_role" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <!-- modal content from ajax-->
        <?php if(isset($role)): ?>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                </div>
                <div class="modal-body">
                    <form action="" class="form-horizontal" id="update_role">
                        <fieldset>
                            <div class="col-sm-4 col-sm-offset-4">
                                <div class="form-group">
                                    <input id="role_name_field" class="form-control" type="text" placeholder="Insert new Name" data-id="<?= $role['id']?>" />
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="modal-footer ">
                    <button type="button" form="update_role" class="btn btn-warning btn-lg" style="width: 100%;">
                        <span class="glyphicon glyphicon-ok-sign"></span>Update
                    </button>
                </div>
            </div>
        <?php else: ?>
            <?= 'error'; ?>
        <?php endif; ?>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>