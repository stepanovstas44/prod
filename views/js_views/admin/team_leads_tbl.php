<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 26.01.2016
 * Time: 16:51
 */
$i = 0;
?>
<?php if(isset($team_leads)):?>
    <?php foreach($team_leads as $lead):?>
        <tr class="hover" data-id="<?= $lead['id'] ?>">
            <td><?= ++$i ?></td>
            <td><?= $lead['name'] ?></td>
            <td><?= $lead['surname'] ?></td>
        </tr>
    <?php endforeach;?>
<?php else:?>
<?php endif; ?>

