</div>
<script type='text/javascript' src="<?= base_url('assets/js/plugins/jquery-1.12.0.min.js');?>" ></script>
<script type='text/javascript' src="<?= base_url('assets/js/plugins/bootstrap.min.js');?>" ></script>
<?php if(isset($js)):?>
    <?php Attach_assets::attach_js($js); ?>
<?php endif;?>

</body>
</html>
