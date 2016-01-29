<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 26.01.2016
 * Time: 13:44
 */
?>
<?php if(isset($team_leads)): ?>
    <?php foreach($team_leads as $team_lead):?>
        <option value="<?= $team_lead['id']; ?>"><?= $team_lead['name']; ?></option>
    <?php endforeach;?>
<?php else: ?>
    <option value="">None</option>
<?php endif; ?>
