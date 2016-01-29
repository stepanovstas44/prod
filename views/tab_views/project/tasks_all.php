<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 24.01.2016
 * Time: 23:06
 */
?>
<div class="col-sm-12">
    <div class="row row1">
        <div class="col-sm-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tasks</h3>
                    <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                    </div>
                </div>
                <div class="panel-body">
                    <input type="text" class="form-control" id="task-table-filter" data-action="filter" data-filters="#task-table" placeholder="Filter Tasks" />
                </div>
                <table class="table table-hover" id="task-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Creation date</th>
                        <th>Employee</th>
                        <th>Status</th>
                        <th>Save</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                        <!-- Load from ajax (js_views/common/tasks)  -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
