<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 28.01.2016
 * Time: 9:47
 */
$i = 0; ?>
<?php if(is_array($projects) && (!empty($projects))): ?>
    <?php foreach($projects as $project): ?>
        <tr class="click-all-project">
            <?php if(1 == $this->session->user_info['key']): ?>
                <td class="click-project" data-id="<?= $project['id']; ?>"><?= ++$i; ?></td>
                <td class="click-project" data-id="<?= $project['id']; ?>"><?= $project['name']; ?></td>
                <td class="click-project" data-id="<?= $project['id']; ?>"><?= $project['creation_date']; ?></td>
                <td>
                    <form action="#" id="change_project_user">
                        <div class="form-group">
                            <select id="change_user_id" name="change_user_id" class="form-control">
                                <?php if(isset($users) && (!empty($users))): ?>
                                    <?php foreach($users as $user):?>
                                        <?php if($project['user_id'] == $user['id']): ?>
                                            <option value="<?= $user['id']; ?>" selected><?= $user['name']." ".$user['surname'] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $user['id']; ?>" ><?= $user['name']." ".$user['surname'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <input type="hidden" value="<?= $project['id']; ?>" name="project_id"/>
                    </form>
                </td>
                <td>
                    <div class="form-group">
                        <select id="change_status" name="status" class="form-control">
                            <?php if($project['status']): ?>
                                <option value="1" selected>Complete</option>
                                <option value="0" >In progress</option>
                            <?php else: ?>
                                <option value="1" >Complete</option>
                                <option value="0" selected>In progress</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </td>
                <td>
                    <button id="send_edit_project" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-saved"></i></button>
                </td>
                <td>
                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                        <a href="<?= $project['id']; ?>" class="btn btn-danger btn-xs delete_project">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </p>
                </td>
            <?php elseif(2 == $this->session->user_info['key']): ?>
                <td class="click-project" data-id="<?= $project['id']; ?>"><?= ++$i; ?></td>
                <td class="click-project" data-id="<?= $project['id']; ?>"><?= $project['name']; ?></td>
                <td class="click-project" data-id="<?= $project['id']; ?>"><?= $project['creation_date']; ?></td>
                <td>
                    <form action="#" id="change_project_user">
                        <div class="form-group">
                            <select id="change_user_id" name="change_user_id" class="form-control">
                                <?php if(isset($users) && (!empty($users))): ?>
                                    <?php foreach($users as $user):?>
                                        <?php if($project['user_id'] == $user['id']): ?>
                                            <option value="<?= $user['id']; ?>" selected><?= $user['name']." ".$user['surname'] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $user['id']; ?>" ><?= $user['name']." ".$user['surname'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <input type="hidden" value="" name="project_id"/>
                    </form>
                </td>
                <td>
                    <div class="form-group">
                        <select id="change_status" name="status" class="form-control" form="change_project_user">
                            <?php if($project['status']): ?>
                                <option value="1" selected>Complete</option>
                                <option value="0" >In progress</option>
                            <?php else: ?>
                                <option value="1" >Complete</option>
                                <option value="0" selected>In progress</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </td>
                <td>
                    <button id="send_edit_project" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-saved"></i></button>
                </td>
            <?php elseif(3 == $this->session->user_info['key']): ?>
                <td class="click-project" data-id="<?= $project['id']; ?>"><?= ++$i; ?></td>
                <td class="click-project" data-id="<?= $project['id']; ?>"><?= $project['name']; ?></td>
                <td class="click-project" data-id="<?= $project['id']; ?>"><?= $project['creation_date']; ?></td>
                <td>
                    <div class="form-group">
                        <select id="change_status" name="status" class="form-control" form="change_project_user">
                            <?php if($project['status']): ?>
                                <option value="1" selected >Complete</option>
                                <option value="0" >In progress</option>
                            <?php else: ?>
                                <option value="1" >Complete</option>
                                <option value="0" selected >In progress</option>
                            <?php endif; ?>
                        </select>
                    </div>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
<?php endif; ?>

