<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 23.01.2016
 * Time: 12:01
 */
?>

<div class="col-sm-6">
    <br />
    <form class="form-horizontal" id="user_form">
        <fieldset>
            <!-- Prepended text-->
            <div class="form-group">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">Name</span>
                        <input id="name" name="name" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">Surname</span>
                        <input id="surname" name="surname" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">E-mail</span>
                        <input id="email" name="email" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">Login</span>
                        <input id="login" name="login" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <div class="col-md-8">
                    <div class="input-group">
                        <span class="input-group-addon">Password</span>
                        <input id="password" name="password" class="form-control" type="text">
                    </div>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="role_id">Role</label>
                <div class="col-md-6">
                    <select id="role_id" name="role_id" class="form-control">
                        <?php if(isset($roles)): ?>
                            <?php foreach($roles as $role):?>
                                <option value="<?= $role['id']; ?>" data-key="<?= $role['key']; ?>"><?= $role['role']; ?></option>
                            <?php endforeach;?>
                        <?php else: ?>
                            <option value=""></option>
                        <?php endif; ?>
                    </select>
                </div>
            </div>

            <!-- Select Basic -->
            <div class="form-group">
                <label class="col-md-2 control-label" for="team_id">Team</label>
                <div class="col-md-6">
                    <select id="team_id" name="team_id" class="form-control" style="display: none">
                        <!-- Ajax team options -->

                        <!-- End Ajax team options -->
                    </select>
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="save_user" name="save_user" class="btn btn-success">Create</button>
                    <button id="Clear" name="Clear" class="btn btn-danger">Clear All</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>