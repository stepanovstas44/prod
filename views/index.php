<?php
/**
 * Created by PhpStorm.
 * User: Karen
 * Date: 18.01.2016
 * Time: 10:58
 */
?>
<div class="container">
    <div class="row">
        <div class="col-md-offset-5 col-md-3">
            <div class="form-login">
                <form action="<?= base_url('auth/index'); ?>" method="post">
                    <h4>Welcome back.</h4>
                    <input type="text" name="login" class="form-control input-sm chat-input" placeholder="username" />
                    <?php echo form_error('login'); ?>
                    </br>
                    <input type="text" name="password" class="form-control input-sm chat-input" placeholder="password" />
                    <?php echo form_error("password"); ?>
                    </br>
                    <div class="wrapper">
                    <span class="group-btn">
                        <button type="submit" class="btn btn-primary btn-md">Login<i class="fa fa-sign-in"></i></button>
                    </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
