<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 28.01.2016
 * Time: 10:16
 */?>
<div class="col-sm-12">
    <div class="row row1">
        <form class="form-horizontal" id="create_task_form">
            <div class="col-sm-12">
                <!-- Prepended text-->
                <div class="form-group">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <span class="input-group-addon">Name</span>
                            <input id="task_name" name="name" class="form-control" type="text">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <fieldset>
                    <button id="open_projects_list" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseAttachProject" >
                        Attach To Project
                    </button>
                    <br />
                    <div class="collapse" id="collapseAttachProject">
                        <div class="well">
                            <!-- Select Basic -->
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-4" id="attach_project_to_task">
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
                            <button id="save_task" name="save_task" class="btn btn-success">Create</button>
                            <button id="clear_task" name="clear_task" class="btn btn-danger">Clear</button>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="col-sm-6">
                <fieldset>
                    <button id="open_users_list_task" class="btn btn-default" type="button" data-toggle="collapse" data-target="#collapseAttachUser" >
                        Attach To User
                    </button>
                    <br />
                    <div class="collapse" id="collapseAttachUser">
                        <div class="well">
                            <!-- Select Basic -->
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-4" id="attach_user_to_task">
                                    <!-- From ajax workers_list_to_attach -->
                                    <!-- End workers_list_to_attach -->
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </form>
    </div>
</div>
