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
              <form id="frmLogin" action="javascript:" class="ui large form">
                <div class="ui stacked segment">
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="user icon"></i>
                      <input type="text" name="Username" placeholder="Email Address">
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="lock icon"></i>
                      <input type="password" name="Password" placeholder="Password">
                    </div>
                  </div>
                  <div class="ui fluid large teal submit button">Login</div>
                </div>
                <div class="ui error message"></div>
              </form>
            </div>
        </div>
        <div id="LoginModal" class="ui small modal">
          <div class="header">
            It seems like it is your first time logging in to our system. You must change you password before you can proceed.
          </div>
          <div class="content">
            <div class="ui form">
                <form class="ui form" id="frmFirstLogin" action="javascript:">
                    <input type="hidden" name="ID" id="UserID">
                <div class="field">
                    <label for="">New Password</label>
                    <input type="password" name="NewPass" >
                </div>
                <div class="field">
                    <label for="">Confirm Password</label>
                    <input type="password" name="CPass" >
                </div>
                <div class="ui error message"></div>
            </div>
          </div>
          <div class="actions">
            <div class="ui negative deny button">
              Cancel
            </div>
            <button class="ui positive submit button">
              Proceed
            </button>
          </div>
          </form>
      </div>
  </body>
  <script src="<?php echo base_url('assets/semantic/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="<?php echo base_url('assets/semantic/semantic.min.js'); ?>" type="text/javascript"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#frmLogin')
              .form({
                fields: {
                  Username : ['empty'],
                  Password : ['minLength[6]', 'empty'],
                }
            });
            $('#frmFirstLogin')
                .form({
                  fields: {
                    NewPass : ['minLength[6]','empty'],
                    CPass : ['minLength[6]', 'empty'],
                  }
              });
            $("#frmLogin").submit(function() {
                if($('#frmLogin').form('is valid')){
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Login/Authenticate"); ?>',
                        data:$("#frmLogin").serialize(),
                        dataType:'json',
                        success:function (response) {
                            if(response.success){
                                if(response.user[0].IsFirstLogin==1){
                                    $("#UserID").val(response.user[0].UserAccountID);
                                    $('#LoginModal')
                                      .modal({
                                        closable  : false,
                                        onApprove : function() {
                                            if($('#frmFirstLogin').form('is valid')){
                                                $.ajax({
                                                    type:'ajax',
                                                    method:'POST',
                                                    url:'<?php echo base_url("index.php/Login/ChangePass"); ?>',
                                                    data:$("#frmFirstLogin").serialize(),
                                                    dataType:'json',
                                                    success:function(response) {
                                                        if(response.success){
                                                            alert('Successfully Changed. Login Again');
                                                            window.location="<?php echo base_url('index.php/UserAccount');?>";
                                                        }else{
                                                            alert('Something went wrong');
                                                            return false;
                                                        }
                                                    }
                                                });
                                            }else{
                                              return false;
                                            }
                                        }
                                      })
                                      .modal('show')
                                    ;
                                }else{
                                    if(response.user[0].RoleID==1){
                                        window.location="<?php echo base_url('index.php/UserAccount') ?>";
                                    }else{
                                        window.location="<?php echo base_url('index.php/Teacher/Classes') ?>";
                                    }
                                }
                            }else{
                                alert("Invalid Credentials");
                            }
                        }
                    })
                }
            });
      });
  </script>

</html>
