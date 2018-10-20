<div class="ui container">
    <div class="ui very padded segment">
        <h2>Class CI-402PC</h2>
        <div class="ui top attached tabular menu">
          <a class="item active" data-tab="first">Manage</a>
          <a class="item" data-tab="second">Grades</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <div class="ui vertical segment">
                <div class="ui list">
                    <div class="item">Teacher : <?php echo $class->Firstname.' '.$class->Lastname; ?></div>
                    <div class="item">Subject : <?php echo $class->Subject; ?></div>
                    <div class="item">Section : <?php echo $class->Section; ?></div>
                    <div class="item">Year Level : <?php echo $class->YearLevel; ?></div>
                </div>
            </div>
            <div class="ui vertical segment">
                <div class="ui horizontal divider">Students</div>
                <button type="button" name="button" id="btnAdd" class="ui primary button">Add Student</button>
                <table id="tblStudent" class="ui celled table">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Gender</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>

                  </tbody>
              </table>
            </div>
            <div class="ui vertical segment">
              <div class="ui horizontal divider">Grading Criteria</div>
              <table class="ui celled table">
                  <thead>
                      <tr>
                          <th>Component</th>
                          <th>Percentage</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr>
                          <td>Written Work</td>
                          <td><?php echo $class->WW; ?>%</td>
                      </tr>
                      <tr>
                          <td>Performance task</td>
                          <td><?php echo $class->PT; ?>%</td>
                      </tr><tr>
                          <td>Quarterly Assessment</td>
                          <td><?php echo $class->QA; ?>%</td>
                      </tr>
                  </tbody>
              </table>
            </div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="second">
          Grades
        </div>
        <div id="AddModal" class="ui modal">
          <div class="header">
            Add Student
          </div>
          <div class="content">
            <div class="ui form">
                <form class="ui form" id="frmAddStudent" action="javascript:">
                <div class="two fields">
                                        <input type="hidden" name="ID" id="ClassID" value="<?php echo $class->ClassID; ?>">
                    <div class="field">
                      <label>Name</label>
                      <input type="text" name="Name" placeholder="Name">
                    </div>
                    <div class="field">
                      <label>Gender</label>
                      <select class="ui dropdown" name="Gender">
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>
                      </select>
                    </div>
                </div>
                <div class="ui error message"></div>
            </div>
          </div>
          <div class="actions">
            <div class="ui negative deny button">
              Cancel
            </div>
            <button class="ui positive submit button">
              Add
            </button>
          </div>
          </form>
          <div id="UpdateModal" class="ui modal">
            <div class="header">
              Update Student
            </div>
            <div class="content">
              <div class="ui form">
                  <form class="ui form" id="frmUpdateStudent" action="javascript:">
                  <div class="two fields">
                      <input type="hidden" name="ID" id="StudentID">
                      <div class="field">
                        <label>Name</label>
                        <input type="text" id="name" name="Name" placeholder="Name">
                      </div>
                      <div class="field">
                        <label>Gender</label>
                        <select class="ui dropdown" id="gender" name="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                      </div>
                  </div>
                  <div class="ui error message"></div>
              </div>
            </div>
            <div class="actions">
              <div class="ui negative deny button">
                Cancel
              </div>
              <button class="ui positive submit button">
                Update
              </button>
            </div>
            </form>
    </div>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $('.menu .item')
      .tab()
    ;
    $("#btnAdd").click(function() {
        $('#AddModal')
          .modal({
            closable  : false,
            onApprove : function() {
                if($('#frmAddStudent').form('is valid')){
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/ManageClass/Add"); ?>',
                        data:$("#frmAddStudent").serialize(),
                        dataType:'json',
                        success:function(response) {
                            if(response.success){
                                alert('Successfully Added');
                                getStudent();
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
    $('.ui.dropdown').dropdown();
    $('#frmAddStudent')
      .form({
        fields: {
          Name     : 'empty',
          Gender     : 'empty',
        }
      })
    ;
    getStudent();
    var StudentData=[];
    function getStudent() {
        $.ajax({
            type:'ajax',
            type:'POST',
            url:'<?php echo base_url("index.php/ManageClass/getStudent"); ?>',
            data:{ID:$("#ClassID").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _tableContent='';
                    StudentData=response.stud;
                    for (var i = 0; i < response.stud.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+response.stud[i].Name+'</td>'
                                            +'<td>'+response.stud[i].Gender+'</td>'
                                            +'<td><button id="'+response.stud[i].StudentID+'" class="primary ui button edit">Edit</button><button id="'+response.stud[i].StudentID+'" class="negative ui button delete">Delete</button></td>'
                                       '</tr>';
                    }
                    $("#tblStudent tbody").html(_tableContent);
                }
            }
        });
    }
    $("#tblStudent tbody").on('click','button.delete',function() {
        var _id=$(this).attr('id');
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/ManageClass/deleteStudent"); ?>',
            data:{ID:_id},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    alert('Successfully Deleted');
                    getStudent();
                }else{
                    alert('Something went wrong');
                    return false;
                }
            }
        });
    });
    $("#tblStudent tbody").on('click','button.edit',function() {
        var _id=$(this).attr('id');
        var _index=StudentData.findIndex(x=>x.StudentID==_id);
        $("#StudentID").val(_id);
        $("#name").val(StudentData[_index].Name);
        $("#gender").val(StudentData[_index].Gender);
        $('#UpdateModal')
          .modal({
            closable  : false,
            onApprove : function() {
                if($('#frmUpdateStudent').form('is valid')){
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/ManageClass/updateStudent"); ?>',
                        data:$("#frmUpdateStudent").serialize(),
                        dataType:'json',
                        success:function(response) {
                            if(response.success){
                                alert('Successfully Updated');
                                getStudent();
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
});
</script>
</html>
