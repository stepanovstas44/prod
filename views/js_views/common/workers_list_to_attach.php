<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 28.01.2016
 * Time: 10:46
 */
?>
<?php if(is_array($workers) && (!empty($workers))): ?>
<select id="user_id" name="user_id" class="form-control">
    <?php foreach($workers as $worker): ?>
        <option value="<?= $worker['id']; ?>"><?= $worker['name']." ".$worker['surname'] ?></option>
    <?php endforeach; ?>
</select>
<?php endif; ?>