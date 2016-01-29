<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 25.01.2016
 * Time: 10:09
 */
?>
<div class="col-sm-12">
    <br />
    <form class="form-horizontal" name="role_form" id="role_form">
        <fieldset>
            <!-- Prepended text-->
            <div class="form-group">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon">Name</span>
                        <input id="role_name" name="role_name" class="form-control" type="text" required="">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon">Key</span>
                        <input id="role_key" name="role_key" class="form-control" type="text" required="">
                    </div>
                    <p> (1 = admin, 2 = team lead, 3 = others)</p>
                </div>
            </div>

            <!-- Button (Double) -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="save_role" name="send_project" class="btn btn-success">Create</button>
                    <button id="clear_role" name="clear_project" class="btn btn-danger">Clear</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>
