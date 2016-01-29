<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 28.01.2016
 * Time: 9:47
 */
$i = 0;
?>
<?php if(is_array($tasks) && (!empty($tasks))): ?>
    <?php foreach($tasks as $task): ?>
        <tr class="click-all-project">
            <?php if(1 == $this->session->user_info['key']): ?>
                <td data-id="<?= $task['id']; ?>"><?= ++$i; ?></td>
                <td data-id="<?= $task['id']; ?>"><?= $task['name']; ?></td>
                <td data-id="<?= $task['id']; ?>"><?= $task['creation_date']; ?></td>
                <td>
                    <form action="#" id="change_task_user">
                        <div class="form-group">
                            <select id="change_task_user_id" name="change_task_user_id" class="form-control">
                                <?php if(isset($users) && (!empty($users))): ?>
                                    <?php foreach($users as $user):?>
                                        <?php if($task['user_id'] == $user['id']): ?>
                                            <option value="<?= $user['id']; ?>" selected><?= $user['name']." ".$user['surname'] ?></option>
                                        <?php else: ?>
                                            <option value="<?= $user['id']; ?>" ><?= $user['name']." ".$user['surname'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <input type="hidden" value="<?= $task['id']; ?>" name="project_id"/>
                    </form>
                </td>
                <td>
                    <div class="form-group">
                        <select id="change_task_status" name="status" class="form-control">
                            <?php if($task['status']): ?>
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
                    <button id="send_edit_task" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-saved"></i></button>
                </td>
                <td>
                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                        <a href="<?= $task['id']; ?>" class="btn btn-danger btn-xs delete_task">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </p>
                </td>
            <?php elseif(2 == $this->session->user_info['key']): ?>
            <?php elseif(3 == $this->session->user_info['key']): ?>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
