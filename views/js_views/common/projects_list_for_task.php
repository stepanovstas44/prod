<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 29.01.2016
 * Time: 15:11
 */
?>
<?php if(is_array($projects) && (!empty($projects))): ?>
    <select id="projects_list_task" name="project_id" class="form-control">
        <?php foreach($projects as $project): ?>
            <option value="<?= $project['id']; ?>"><?= $project['name'] ?></option>
        <?php endforeach; ?>
    </select>
<?php endif; ?>
