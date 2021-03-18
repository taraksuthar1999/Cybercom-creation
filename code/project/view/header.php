<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/<?php echo $_GET['a'] ?>.css">
    <title>Document</title>
  <!--  <style>
    .form-container{
        margin:0;
        width:100%;
    }
    form{
        margin-top:5px;
    }
    .tab{
        padding:0;
        margin:auto;
        width:70%;
        
    }
    td{
        width:100%;
    }
    
   
    </style>-->
</head>
<body>
<div class="header">
<div class="top-header"></div>
<nav class="navbar navbar-expand-sm bg-primary navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Product') echo 'active'; ?>" href="<?php echo $this->getUrl('grid', 'Product', null, true); ?>"><b>Product</b></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Category') echo 'active'; ?>" href="<?php echo $this->getUrl('grid', 'Category', null, true); ?>"><b>Category</b></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Customer') echo 'active'; ?>" href="<?php echo $this->getUrl('grid', 'Customer', null, true); ?>"><b>Customer</b></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Shippingmethod') echo 'active'; ?>" href="<?php echo $this->getUrl('grid', 'shippingmethod', null, true); ?>"><b>Shipping Method</b></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Paymentmethod') echo 'active'; ?>" href="<?php echo $this->getUrl('grid', 'Paymentmethod', null, true); ?>"><b>Payment Method</b></a>
    </li>
    <li class="nav-item ">
      <a class="nav-link <?php if (ucfirst($_GET['c']) == 'Admin') echo 'active'; ?>" href="<?php echo $this->getUrl('grid', 'admin', null, true); ?>"><b>Admin</b></a>
    </li>
  </ul>
</nav>
</div>
<div class="container">
