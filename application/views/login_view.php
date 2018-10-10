<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>OGS-Login</title>
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
  </head>
  <body>
          <div class="ui middle aligned center aligned grid">
            <div class="column">
              <h2 class="ui teal image header">
                <div class="content">
                  Log-in to your account
                </div>
              </h2>
              <form class="ui large form">
                <div class="ui stacked segment">
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="user icon"></i>
                      <input type="text" name="email" placeholder="E-mail address">
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="lock icon"></i>
                      <input type="password" name="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="ui fluid large teal submit button">Login</div>
                </div>

                <div class="ui error message"></div>
              </form>
            </div>
          </div>
  </body>
  <script src="<?php echo base_url('assets/semantic/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/semantic/semantic.min.js'); ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/particles/particles.js'); ?>"></script>
  <script src="<?php echo base_url('assets/particles/demo/js/app.js'); ?>"></script>

</html>
