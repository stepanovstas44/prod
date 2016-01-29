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
    <form class="form-horizontal" id="create_project_form">
        <fieldset>
            <!-- Prepended text-->
            <div class="form-group">
                <div class="col-md-5">
                    <div class="input-group">
                        <span class="input-group-addon">Name</span>
                        <input id="project_name" name="name" class="form-control" placeholder="" type="text" required="">
                    </div>
                </div>
            </div>

            <!-- Textarea -->
            <div class="form-group">
                <label for="projet_description" style="display: block; margin-left:12px">Description</label>
                <div class="col-md-8">
                    <textarea style="resize: none" rows="15" cols="50" class="form-control" id="projet_description" name="description"></textarea>
                </div>
            </div>

            <button id="open_user_list" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseAttach" >
                Attach To User
            </button>
            <br />
            <div class="collapse" id="collapseAttach">
                <div class="well">
                    <!-- Select Basic -->
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-4" id="attach_user">
                            <!-- From ajax workers_list_to_attach -->
                            <!-- End workers_list_to_attach -->
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <!-- Button (Double) -->
            <div class="form-group">
                <div class="col-md-8">
                    <button id="save_project" name="send_project" class="btn btn-success">Create</button>
                    <button id="clear_project" name="clear_project" class="btn btn-danger">Clear</button>
                </div>
            </div>
        </fieldset>
    </form>

</div>
