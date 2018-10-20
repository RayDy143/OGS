    <div class="ui container">
        <div class="ui very padded segment big">
            <h2 class="ui dividing header">User Accounts</h2>
            <table id="tblUser" class="ui compact celled table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Usertype</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                
              </tbody>
              <tfoot class="full-width">
                <tr>
                  <th></th>
                  <th colspan="4">
                    <div id="btnAdd" class="ui right floated small primary labeled icon button">
                      <i class="user icon"></i> Add User
                    </div>
                  </th>
                </tr>
              </tfoot>
            </table>
        </div>
        <div id="updateModal" class="ui modal">
            <div class="header">
              Update User
            </div>
            <div class="content">
              <div class="ui form">
                  <form class="ui form" id="frmUpdateUser" action="javascript:">
                  <div class="three fields">
                      <input type="hidden" name="ID" id="id">
                      <div class="field">
                        <label>First name</label>
                        <input type="text" id="fname" name="Firstname" placeholder="First Name">
                      </div>
                      <div class="field">
                        <label>Middle name</label>
                        <input type="text" id="mname" name="Middlename" placeholder="Middle Name">
                      </div>
                      <div class="field">
                        <label>Last name</label>
                        <input type="text" id="lname" name="Lastname" placeholder="Last Name">
                      </div>
                  </div>
                  <div class="three fields">
                      <div class="field">
                        <label>Email</label>
                        <input type="text" id="email" name="Email" placeholder="Email">
                      </div>
                      <div class="field">
                        <label>Username</label>
                        <input type="text" id="uname" name="Username" placeholder="Username">
                      </div>
                      <div class="field">
                        <label>Usertype</label>
                          <select name="Role" id="role" class="ui dropdown">
                             <option value="">Usertype</option>
                             <option value="1">Admin</option>
                             <option value="2">Teacher</option>
                          </select>
                      </div>
                  </div>
                  <div class="ui error message"></div>
              </div>
            </div>
            <div class="actions">
              <button class="ui negative deny button">
                Cancel
              </button>
              <button class="ui positive submit button">
                Update
              </button>
            </div>
        </div>
        </form>
        <div id="AddModal" class="ui modal">
            <div class="header">
              Add User
            </div>
            <div class="content">
              <div class="ui form">
                  <form class="ui form" id="frmAddUser" action="javascript:">
                  <div class="three fields">
                      <div class="field">
                        <label>First name</label>
                        <input type="text" name="Firstname" placeholder="First Name">
                      </div>
                      <div class="field">
                        <label>Middle name</label>
                        <input type="text" name="Middlename" placeholder="Middle Name">
                      </div>
                      <div class="field">
                        <label>Last name</label>
                        <input type="text" name="Lastname" placeholder="Last Name">
                      </div>
                  </div>
                  <div class="three fields">
                      <div class="field">
                        <label>Email</label>
                        <input type="text" name="Email" placeholder="Email">
                      </div>
                      <div class="field">
                        <label>Username</label>
                        <input type="text" name="Username" placeholder="Username">
                      </div>
                      <div class="field">
                        <label>Usertype</label>
                          <select name="Role" class="ui dropdown" id="select">
                             <option value="">Usertype</option>
                             <option value="1">Admin</option>
                             <option value="2">Teacher</option>
                          </select>
                      </div>
                  </div>
                  <div class="ui error message"></div>
              </div>
            </div>
            <div class="actions">
              <button class="ui negative deny button">
                Cancel
              </button>
              <button class="ui positive submit button">
                Add
              </button>
            </div>
        </div>
        </form>
    </div>
  </body>
  <script type="text/javascript">
    $(document).ready(function() {
        var UserData=[];
        function getUser() {
            $.ajax({
                type:'ajax',
                url:'<?php echo base_url("index.php/UserAccount/getUser"); ?>',
                dataType:'json',
                success:function(response) {
                    if(response.success){
                        var _tableContent='';
                        UserData=response.user;
                        for (var i = 0; i < response.user.length; i++) {
                            _tableContent+='<tr>'
                                                +'<td>'+response.user[i].Firstname+' '+response.user[i].Lastname+'</td>'
                                                +'<td>'+response.user[i].Email+'</td>'
                                                +'<td>'+response.user[i].Username+'</td>'
                                                +'<td>'+response.user[i].Role+'</td>'
                                                +'<td><button id="'+response.user[i].UserAccountID+'" class="primary ui button edit">Edit</button><button id="'+response.user[i].UserAccountID+'" class="negative ui button delete">Delete</button></td>'
                                           '</tr>';
                        }
                        $("#tblUser tbody").html(_tableContent);
                    }
                }
            });
        }
        getUser();
        $("#tblUser tbody").on('click','button.delete',function() {
            var _id=$(this).attr('id');
            $.ajax({
                type:'ajax',
                method:'POST',
                url:'<?php echo base_url("index.php/UserAccount/deleteUser"); ?>',
                data:{ID:_id},
                dataType:'json',
                success:function(response) {
                    if(response.success){
                        alert('Successfully Deleted');
                        getUser();
                    }else{
                        alert('Something went wrong');
                        return false;
                    }
                }
            })
        });
        $("#tblUser tbody").on('click','button.edit',function() {
            var _id=$(this).attr('id');
            var _index=UserData.findIndex(x=>x.UserAccountID==_id);
            $("#fname").val(UserData[_index].Firstname);
            $("#id").val(UserData[_index].UserAccountID);
            $("#mname").val(UserData[_index].Middlename);
            $("#lname").val(UserData[_index].Lastname);
            $("#email").val(UserData[_index].Email);
            $("#uname").val(UserData[_index].Username);
            $("#role").val(UserData[_index].RoleID);
            $('#updateModal')
              .modal({
                closable  : false,
                onApprove : function() {
                    if($('#frmUpdateUser').form('is valid')){
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/UserAccount/updateUser"); ?>',
                            data:$("#frmUpdateUser").serialize(),
                            dataType:'json',
                            success:function(response) {
                                if(response.success){
                                    alert('Successfully Updated');
                                    getUser();
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
        });
        $("#btnAdd").click(function() {
            $('#AddModal')
              .modal({
                closable  : false,
                onApprove : function() {
                    if($('#frmAddUser').form('is valid')){
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/UserAccount/Add"); ?>',
                            data:$("#frmAddUser").serialize(),
                            dataType:'json',
                            success:function(response) {
                                if(response.success){
                                    alert('Successfully Added');
                                    getUser();
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
        });
        $('#frmAddUser')
          .form({
            fields: {
              Firstname     : 'empty',
              Middlename   : 'empty',
              Lastname : 'empty',
              Email : ['empty','email'],
              Username : 'empty',
              Role : 'empty',
            }
          })
        ;
        $('#frmUpdateUser')
          .form({
            fields: {
              Firstname     : 'empty',
              Middlename   : 'empty',
              Lastname : 'empty',
              Email : ['empty','email'],
              Username : 'empty',
              Role : 'empty',
            }
          })
        ;
    });
    $('.ui.dropdown').dropdown();

  </script>
</html>
