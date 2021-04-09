
<div class="container">
                <ul class="navbar-nav ml-auto">
                    
                    <?php
                    $tabs = $this->getTabs();

                    foreach ($tabs as $key => $tab) {
                        ?>
<li class="row  bt"><a class="btn btn-primary tabbar-link bt" href="<?php echo $this->getUrl()->getUrl(null, null, ['tab' => $key]); ?>"><?php echo $tab['label'] ?></a></li>

<?php
if (!$this->getRequest()->getGet('id')) {
    break;
}
}
?>
                  
                </ul>
</div>
