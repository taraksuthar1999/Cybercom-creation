
<div class="col-3">
    <div class="tabbar bt">
    <?php 

    $this->getTabHtml();


    ?>
    </div> 
</div>
    
<div class="col-9">
        
    <div class="container contact-edit bt ">

    <form action="<?php echo $this->getUrl()->getUrl('save', 'product') ?>" method="POST" enctype="multipart/form-data">
            
            
                    <?php

                    $this->getTabContent();
                    ?>
    </form>
            
    </div>

</div>
