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
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Projects</h3>
                    <div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<i class="glyphicon glyphicon-filter"></i>
							</span>
                    </div>
                </div>
                <div class="panel-body">
                    <input type="text" class="form-control" id="projects-table-filter" data-action="filter" data-filters="#projects-table" placeholder="Filter Developers" />
                </div>
                <table class="table table-hover" id="projects-table">
                    <thead>
                    <tr>
                        <?php if(1 == $this->session->user_info['key']): ?>
                            <th>#</th>
                            <th>Name</th>
                            <th>Creation Date</th>
                            <th>Worker Name</th>
                            <th>Status</th>
                            <th>Save</th>
                            <th>Delete</th>
                        <?php elseif(2 == $this->session->user_info['key']): ?>
                            <th>#</th>
                            <th>Name</th>
                            <th>Creation Date</th>
                            <th>Worker Name</th>
                            <th>Status</th>
                            <th>Save</th>
                        <?php elseif(3 == $this->session->user_info['key']): ?>
                            <th>#</th>
                            <th>Name</th>
                            <th>Creation Date</th>
                            <th>Status</th>
                        <?php endif; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Load common/product from ajax  -->
                    <!-- End Load common/product from ajax  -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row row1">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Project Description</h3>
                </div>
                <div id="edit_project_description">
                    <form action="" class="form-horizontal" id="edit-description">
                        <div>
                            <textarea class="form-control" name="description" style="resize: none"></textarea>
                            <input type="hidden" name="project_id" />
                        </div>
                        <?php if(1 == $this->session->user_info['key']):?>
                            <div>
                                <button id="send_edit_desc_project" class="btn btn-primary btn-md center-block">
                                    <i class="glyphicon glyphicon-saved"></i>Save
                                </button>
                                <div class="clearfix"></div>
                            </div>
                        <?php else: ?>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
