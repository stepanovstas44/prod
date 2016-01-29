<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 26.01.2016
 * Time: 15:32
 */
?>
<?php if(is_array($workers)): ?>
    <?php foreach($workers as $worker): ?>
        <tr>
            <td><input type="checkbox" class="checkthis" disabled/></td>
            <td><?= $worker['name'] ?></td>
            <td><?= $worker['surname'] ?></td>
            <td><?= $worker['role'] ?></td>
            <td>
                <?php
                    if(is_array($leads)) {
                        foreach($leads as $v) {
                            if($worker['team_id'] == $v['id']) {
                                echo $v['name'];
                                break;
                            };
                        }
                    }
                ?>
            </td>
            <td><?= $worker['email'] ?></td>
            <td>
                <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <button class="btn btn-primary btn-xs edit_worker" data-id="<?= $worker['id'] ?>" data-toggle="modal" data-target="#edit_worker_modal" >
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </p>
            </td>
            <td>
                <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <a href="<?= 'workers/deleteWorker/'.$worker['id']; ?>" class="btn btn-danger btn-xs delete_worker" >
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
<?php endif; ?>
