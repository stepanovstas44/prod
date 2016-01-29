<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 26.01.2016
 * Time: 16:51
 */
$i = 0;
?>
<?php if($workers):?>
    <?php foreach($workers as $worker):?>
        <tr>
            <td><?= ++$i ?></td>
            <td><?= $worker['name'] ?></td>
            <td><?= $worker['surname'] ?></td>
        </tr>
    <?php endforeach;?>
<?php else:?>
    <tr>
        <td><?= ++$i ?></td>
        <td>No team workers</td>
    </tr>
<?php endif; ?>

