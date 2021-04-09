
<div class="container">
                <ul class="navbar-nav ml-auto">
                    
                    <?php
                    $tabs = $this->getTabs();

                    foreach ($tabs as $key => $tab) {
                        ?>
                        <li class="row  bt"><a class="btn btn-primary tabbar-link bt" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl(null, null, ['tab' => $key]); ?>').resetParams().load()" ><?php echo $tab['label'] ?></a></li>

                    <?php
                    if (!$this->getRequest()->getGet('id')) {
                        break;
                    }
                }
                ?>
                  
                </ul>
</div>