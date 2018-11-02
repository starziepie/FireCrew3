<?php if(!defined('IN_PHPVMS') && IN_PHPVMS !== true) { die(); } ?>
<section class="content">
    <div class="row">
        <?php 
		if(!$allcategories)
		{
			echo '<div class="col-lg-12 card"><div class="callout callout-info"><h4>No Downloads</h4><p>No downloads have been added yet.</p></div></div>';
		} else {
			foreach($allcategories as $category) {
        ?>
        
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo $category->name?></h3>
                </div>
                <div class="box-body">
                    <?php	
                        # This loops through every download available in the category
                        $alldownloads = DownloadData::GetDownloads($category->id);
                        if(!$alldownloads)
                        {
echo '<p class="text-muted">There are no downloads in this category.</p>';
                            $alldownloads = array();
                        }
                        foreach($alldownloads as $download)
                        {
                    ?>
                    <div class="card" style="padding:1%;">
                        <strong><?php echo $download->name?></strong>
                        <p class="text-muted"><?php echo $download->description?></p>
                        <a href="<?php echo url('/downloads/dl/'.$download->id);?>">Download</a>
                        <br>
                    </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
        <?php
            }
		}
        ?>
    </div>
</section>