<script type='text/javascript'>
    baseUrl = '<?= base_url(); ?>';
</script>
<script type='text/javascript' src="<?= base_url('assets/js/plugins/jquery-1.12.0.min.js');?>" ></script>
<script type='text/javascript' src="<?= base_url('assets/js/plugins/bootstrap.min.js');?>" ></script>
<script type='text/javascript' src="<?= base_url('assets/js/refresh.js');?>" ></script>
<script src="//cdn.ckeditor.com/4.5.6/full/ckeditor.js"></script>
<?php if(isset($js)):?>
    <?php Attach_assets::attach_js($js); ?>
<?php endif;?>
<!--<script>
    $("textarea").each(function(){
        CKEDITOR.replace(this);
    });
</script>-->
</body>
</html>

