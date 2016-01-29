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
        <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Team Leaders</h3>
                    <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                    </div>
                </div>
                <div class="panel-body">
                    <input type="text" class="form-control" id="leads_table-filter" data-action="filter" data-filters="#leads_table" placeholder="Filter Developers" />
                </div>
                <table class="table table-hover" id="leads_table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Load from ajax -->
                    <!-- team_leaders tbl -->
                    <!-- End Load from ajax -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Team Workers</h3>
                    <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                    </div>
                </div>
                <div class="panel-body">
                    <input type="text" class="form-control" id="workers-table-filter" data-action="filter" data-filters="#workers-table" placeholder="Filter Tasks" />
                </div>
                <table class="table table-hover" id="workers-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Load team workers from ajax -->
                    <!-- team_workers tbl -->
                    <!-- End Load team workers from ajax -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
