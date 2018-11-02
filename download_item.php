<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<section class="content">
    <div class="row">
        <div class="col-lg-12 card">
            <div class="callout callout-info">
                <h4>Starting Download</h4>
                <p>Your download will start in a few seconds. Click <a href="<?php echo $download->link;?>">here</a> to manually start.</p>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    var delay=1000; //1 second
    setTimeout(function() {
        window.location = "<?php echo $download->link;?>";
    }, delay);
</script>