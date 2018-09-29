<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />

  <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame 
       Remove this if you use the .htaccess -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />

  <title>home</title>
  <meta name="description" content="cms" />
  <meta name="author" content="osama" />

 <!-- <meta name="viewport" content="width=device-width; initial-scale=1.0" />

   Replace favicon.ico & apple-touch-icon.png in the root of your domain and delete these references -->
 <!-- <link rel="shortcut icon" href="/favicon.ico" />
  <link rel="apple-touch-icon" href="/apple-touch-icon.png" />
  -->
   <?php $this -> load -> helper('html');
      $this -> load -> helper('url');
    $base= base_url("html/application/modules/app/views/Template/default/");
         
     ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $base?>/css/styles.css" />
  
  
     <!-- Internet Explorer HTML5 enabling script: -->

    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <style type="text/css">

            .clear {
                zoom: 1;
                display: block;
            }

        </style>

    <![endif]-->
</head>

<body>
   
   
    <div id="wrapper">
         <!-- the header and navigation -->
         <div id="header">
           <div id="navigation">
             <ul>
               <li><a href="#">Home</a></li>
               <li><a href="<?php echo base_url("app/contactus");?>">Countact us</a></li>
             </ul>
           </div>
         </div>
         <!-- the sidebar -->
         <div id="sidebar">
           <p>
  <?php 
  //RP    FP   PP
  $optionLogin=array(
  'Page_Register'=>base_url('app/register'),
   'Page_Password'=>base_url('app/restorpass'),
    'Page_Profile'=>base_url('app/profile'),
    'page_Logout'=>base_url('app/logout'),
  );
           
  echo modules::run('api/login_form','ds5&f46#d5s@f4@#0od$0w3fdgdf',$optionLogin);
  
   echo "<hr/>";  
echo modules::run('api/hitCounter','ds5&f46#d5s@f4@#0od$0w3fdgdf');
echo "<hr/>";

echo modules::run('api/visitorOnline','ds5&f46#d5s@f4@#0od$0w3fdgdf');

echo "<hr/><br/>";

echo modules::run('api/email_list','ds5&f46#d5s@f4@#0od$0w3fdgdf','app/elist');


echo "<hr/><br/>";

echo modules::run('ads/banner',56,'ds5&f46#d5s@f4@#0od$0w3fdgdf');
 echo modules::run('ads/banner',102,'ds5&f46#d5s@f4@#0od$0w3fdgdf'); 
 
 echo "<hr/><br/>";
 
  echo modules::run('poll/poll','ds5&f46#d5s@f4@#0od$0w3fdgdf'); 
      ?>         
               
           </p>
         </div>
         <!-- the content -->
         
         
         <div id="content">
           <div>
      <?php
      echo @$container;
      ?>
    </div>
    
    
         </div>
         <!-- the footer -->
         <div id="footer">
           <p>Here is the footer</p>
         </div>
    </div>
   
    
    

   
    
     
</body>
</html>
