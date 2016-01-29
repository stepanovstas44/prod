<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 26.01.2016
 * Time: 9:54
 */
?>
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
                            <input value="<?= $role[0]['role'] ?>" id="role_name_field" class="form-control" type="text" placeholder="Insert new Name" data-id="<?= $role[0]['id']?>" />
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <div class="modal-footer ">
            <button id="update_role_button" type="button" class="btn btn-warning btn-lg" style="width: 100%;" data-dismiss="modal">
                <span class="glyphicon glyphicon-ok-sign"></span>Update
            </button>
        </div>
    </div>
<?php else: ?>
    <?= 'error'; ?>
<?php endif; ?>

