<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>open source project management</title>

    <!-- Vendor CSS -->
    <link href="/theme/assets/css/animate.min.css" rel="stylesheet">
   

    <!-- CSS -->
    <link href="/theme/assets/css/app.min.css" rel="stylesheet"> 
     <?php //echo $this->uri->uri_string();
     if (strpos($this->uri->uri_string(), "user/profile") !== false){ 
       echo link_tag('theme/assets/css/app.min.1.css');
       }
       if ( $this->uri->uri_string() == 'user/dashboard' ){
       echo link_tag('theme/assets/css/app.min.1.css');
       } 
       if ( $this->uri->uri_string() == 'dashboard/settings' ){
       echo link_tag('theme/assets/css/app.min.1.css');
       }
       if ( $this->uri->uri_string() == 'user/register' ){
       ?>
         <script src='https://www.google.com/recaptcha/api.js'></script>
       <?php
       }
       ?> 
      
      <link rel="stylesheet" href="/theme/assets/css/custom.css" /> 
</head>