<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 27.01.2016
 * Time: 13:13
 */
?>
<div class="col-sm-6">
    <br />
    <form class="form-horizontal" id="user_edit_form">
        <fieldset>

            <!-- Prepended text-->
            <div class="form-group">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">Login</span>
                        <input id="login" name="login" class="form-control" type="text" value="<?= $worker[0]['login']; ?>">
                    </div>
                </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">New Password</span>
                        <input id="password" name="password" class="form-control" type="password">
                    </div>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="edit_role_id">Role</label>
                <div class="col-md-6">
                    <select id="edit_role_id" name="role_id" class="form-control">
                        <?php if(isset($roles)): ?>
                            <?php foreach($roles as $role):?>
                                <?php if($role['id'] == $worker[0]['role_id']): ?>
                                    <option selected value="<?= $role['id']; ?>" data-key="<?= $role['key']; ?>"><?= $role['role']; ?></option>
                                <?php else: ?>
                                    <option value="<?= $role['id']; ?>" data-key="<?= $role['key']; ?>"><?= $role['role']; ?></option>
                                <?php endif; ?>
                            <?php endforeach;?>
                        <?php else: ?>
                            <option value=""></option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="edit_team_id">Team</label>
                <div class="col-md-6">

                    <?php if($worker[0]['key'] == 3):?>
                    <select id="edit_team_id" name="edit_team_id" class="form-control" style="">

                        <?php foreach($team_lead as $v):?>
                            <?php if($v['id'] == $worker[0]['team_id']):?>
                                <option value="<?= $v['id']; ?>"><?= $v['name']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <?php else: ?>
                        <select id="edit_team_id" name="edit_team_id" class="form-control" style="display: none">
                            <?php endif; ?>
                            <!-- Ajax team options -->

                            <!-- End Ajax team options -->
                        </select>
                </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="edit_user" value="<?= $worker[0]['id'] ?>" />
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="edit_user" class="btn btn-success" data-dismiss="modal">Create</button>
                    <button id="Clear" name="Clear" class="btn btn-danger">Clear All</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>