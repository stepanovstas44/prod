<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 26.01.2016
 * Time: 9:30
 */
?>
<?php if(isset($roles)): ?>
    <?php foreach($roles as $role): ?>
        <tr>
            <td><input type="checkbox" class="checkthis" disabled/></td>
            <td><?= $role['role'] ?></td>
            <td><?= $role['key'] ?></td>
            <td>
                <p data-placement="top" data-toggle="tooltip" title="Edit">
                    <button class="btn btn-primary btn-xs edit_role_button" id="role-<?= $role['id'] ?>" data-id="<?= $role['id'] ?>" data-title="Edit" data-toggle="modal" data-target="#edit_role" >
                        <span class="glyphicon glyphicon-pencil"></span>
                    </button>
                </p>
            </td>
            <td>
                <p data-placement="top" data-toggle="tooltip" title="Delete">
                    <a href="<?= 'roles/deleteRole/'.$role['id']; ?>" class="btn btn-danger btn-xs delete_role" >
                        <span class="glyphicon glyphicon-trash"></span>
                    </a>
                </p>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
<?php endif; ?>

