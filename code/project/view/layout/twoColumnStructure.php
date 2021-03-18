
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Document</title>
    <style>
        body {
            background: -webkit-linear-gradient(left, #0072ff, #00c6ff);
        }
        html{
            min-height:100%;
   position:relative;
        }

        .contact-form {
            background: #fff;
            margin-top: 5%;
            margin-bottom: 15%;
            width: 100%;
        }

        .contact-form .form-control {
            border-radius: 1rem;
        }
        .tabbar {
            background: #fff;
            margin-top: 20%;
            margin-bottom: 5%;
            width: 100%;
            padding: 10%;
        }

        .tabbar {
            border-radius: 1rem;
        }
        .tabbar-link{
            width:100%;
            margin-top:auto;
            margin-bottom:5px;
        }
       

        .contact-form form {
            padding: 14%;
        }

        .contact-form form .row {
            margin-bottom: 3%;
        }

        .contact-form h3 {
            margin-bottom: 4%;
            margin-top: -4%;
            text-align: center;
            color: #0062cc;
        }

        .contact-form .btnContact {
            width: 50%;
            border: none;
            border-radius: 1rem;
            padding: 1.5%;
            
            font-weight: 600;
            color: #fff;
            cursor: pointer;
        }
        .bt{
            border-radius: 1rem;
        }

        .btnContactSubmit {
            width: 50%;
            border-radius: 1rem;
            padding: 1.5%;
            color: #fff;
            background-color: #0062cc;
            border: none;
            cursor: pointer;
        }
        #container {
  /* min-height:100%;
   position:relative;*/
   width:90%;
}
#footer {
 position:absolute;

   bottom:0;
   width:100%;
   height:60px;   /* Height of the footer */
   background:#6cf;
}
@media (max-width: 600px){
  
  #footer{
    position: static;
  }
}
.fit{
    margin:0;
    width:100%;
}
.navbar{
    width:100%;

}
.alert{
    width:100%;

}


    </style>
    <script type="text/javascript" src="<?php echo $this->getUrl()->baseUrl('skin/js/jquery-3.6.0.min.js'); ?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="fit">
<div class="row fit"><?php print_r($this->children['Header']->toHtml()); ?></div>
<div class="row fit">
    <div class="col-3"><?php print_r($this->children['Left']->toHtml()); ?></div>
    <div class="col-9">
        <?php print_r($this->createBlock('Block\Layout\Message')->toHtml()); ?>    
        <?php print_r($this->children['Content']->toHtml()); ?>
    </div>
</div>

<div class="row fit"><?php print_r($this->children['Footer']->toHtml()); ?></div>
    <script>
        $('#update').click(function(){
            $('#update').closest('form').attr('action','<?php echo $this->getUrl()->getUrl('save', 'product\media') ?>');
        });
        $('#update').click(function(){
            $('#update').closest('form').attr('action','<?php echo $this->getUrl()->getUrl('save', 'product\media') ?>');
        });
        $('#remove').click(function(){
           
            $('#upload').closest('form').attr('action','<?php echo $this->getUrl()->getUrl('remove', 'product\media') ?>');
        });
        $('#priceUpdate').click(function(){
            $('#priceUpdate').closest('form').attr('action','<?php echo $this->getUrl()->getUrl('update', 'product\groupPrice') ?>');
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe"
        crossorigin="anonymous"></script>
</body>

</html>