
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
        #htmlGrid{
            margin:0;
            width:100%;
        }

        .contact-form {
            background: #fff;
            margin-top: 5%;
            margin-bottom: 15%;
            width: 80%;
        }

        .contact-form .form-control {
            border-radius: 1rem;
        }

        .contact-form form {
            padding: 10%;
        }

        .contact-form form .row {
            margin-bottom: -7%;
        }

        .contact-form h3 {
            margin-bottom: 8%;
            margin-top: -10%;
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
    <script type="text/javascript" src="<?php echo $this->getUrl()->baseUrl('skin/js/mage.js'); ?>"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body class="fit">
<div class="row fit"><?php print_r($this->children['Header']->toHtml()); ?></div>
<div class="row fit"><?php print_r($this->createBlock('Block\Layout\Message')->toHtml()); ?></div>
<div class="row fit"><?php print_r($this->children['Content']->toHtml()); ?></div>
<div class="row fit"><?php print_r($this->children['Footer']->toHtml()); ?></div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js" integrity="sha384-xymdQtn1n3lH2wcu0qhcdaOpQwyoarkgLVxC/wZ5q7h9gHtxICrpcaSUfygqZGOe"
        crossorigin="anonymous"></script>
        
</body>

</html>