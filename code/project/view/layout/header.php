
    <nav class="navbar navbar-expand-lg navbar-dark top" style="background-color: #0D47A1;">
        <div class="container">
            <a class="navbar-brand" href="#">Ecommerce.com</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link  <?php if (ucfirst($_GET['c']) == 'Dashboard' || ucfirst($_GET['c']) == '') echo 'active'; ?>" href="<?php echo $this->getUrl()->getUrl(); ?>" ><b>Dashboard</b></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link  <?php // if (ucfirst($_GET['c']) == 'Product') echo 'active'; ?>" href="javascript:void(0)" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Product', null, true) ?>').resetParams().load()" ><b>Product</b></a>
                  </li>
                  <!--<?php /* <li class="nav-item">
                    <a class="nav-link  <?php if (ucfirst($_GET['c']) == 'Product') echo 'active'; ?>" href="<?php echo $this->getUrl()->getUrl('grid', 'Product', null, true); ?>" ><b>Product</b></a>
                  </li> */ ?>-->
               
                  <li class="nav-item ">
                    <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Category') echo 'active'; ?>" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Category', null, true); ?>').resetParams().load()"><b>Category</b></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Customer') echo 'active'; ?>" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'Customer', null, true); ?>').resetParams().load()"><b>Customer</b></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?php //if (ucfirst($_GET['c']) == 'CustomerGroup') echo 'active'; ?>" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'CustomerGroup', null, true); ?>').resetParams().load()"><b>Customer Group</b></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Shippingmethod') echo 'active'; ?>" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'shippingmethod', null, true); ?>').load()" ><b>Shipping Method</b></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Paymentmethod') echo 'active'; ?>" href="<?php echo $this->getUrl()->getUrl('grid', 'Paymentmethod', null, true); ?>"><b>Payment Method</b></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Admin') echo 'active'; ?>" href="<?php echo $this->getUrl()->getUrl('grid', 'admin', null, true); ?>"><b>Admin</b></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Admin') echo 'active'; ?>" href="<?php echo $this->getUrl()->getUrl('grid', 'admin', null, true); ?>"><b>CMS</b></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Admin') echo 'active'; ?>" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'attribute', null, true); ?>').load()"><b>Attribute</b></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Admin') echo 'active'; ?>" onclick="mage.setUrl('<?php echo $this->getUrl()->getUrl('grid', 'configGroup', null, true); ?>').load()"><b>ConfigGroup</b></a>
                  </li>
                </ul>
            </div>
        </div>
    </nav>