<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>OGS-<?php echo $title; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/semantic/semantic.min.css') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <style type="text/css">
       body {
         background-color: #DADADA;
       }
       body > .grid {
         height: 100%;
       }
       .image {
         margin-top: -100px;
       }
       .column {
         max-width: 450px;
       }
   </style>
   <script src="<?php echo base_url('assets/semantic/jquery.min.js'); ?>" type="text/javascript"></script>
   <script src="<?php echo base_url('assets/semantic/semantic.min.js'); ?>" type="text/javascript"></script>
   <script src="<?php echo base_url('assets/semantic/components/tablesort.js'); ?>" type="text/javascript"></script>
   <script src="<?php echo base_url('assets/semantic/components/printThis.js'); ?>" type="text/javascript"></script>
  </head>
  <body>
      <div class="ui massive menu">
        <div class="item">
            ONLINE GRADING SYSTEM
        </div>
        <a class="<?php echo $usernav; ?> item" href="<?php echo base_url('index.php/UserAccount'); ?>">
            User Accounts
        </a>
        <a class="<?php echo $classnav; ?> item" href="<?php echo base_url('index.php/Classes'); ?>">
            Class
        </a>
        <a class="<?php echo $userlogsnav; ?> item" href="<?php echo base_url('index.php/UserLogs'); ?>">
            Userlogs
        </a>
        <div class="right menu">
          <div class="item">
              <?php echo $_SESSION['Firstname'].' '.$_SESSION['Lastname']; ?>
          </div>
          <div class="item">
              <a class="ui primary button" href="<?php echo base_url('index.php/Login/Logout'); ?>">Logout</a>
          </div>
        </div>
      </div>
