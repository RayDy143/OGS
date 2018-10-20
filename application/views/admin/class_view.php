<div class="ui container">
    <div class="ui very padded segment">
        <h2 class="ui dividing header">Class</h2>
        <button type="button" name="button" id="btnAdd" class="ui primary button">Add Class</button>
        <div class="ui divider"></div>
        <div class="ui three stackable cards" id="classContainer">

        </div>
</div>
<div id="AddModal" class="ui modal">
  <div class="header">
    Add Class
  </div>
  <div class="content">
    <div class="ui form">
        <form class="ui form" id="frmAddClass" action="javascript:">
        <div class="four fields">
            <div class="field">
              <label>Section</label>
              <input type="text" name="Section" placeholder="Section">
            </div>
            <div class="field">
              <label>Subject</label>
              <input type="text" name="Subject" placeholder="Subject">
            </div>
            <div class="field">
              <label>Year Level</label>
              <select name="YearLevel" class="ui dropdown" id="cmbYearLevel">
                  <option value="1st Year">1st Year</option>
                  <option value="2nd Year">2nd Year</option>
                  <option value="3rd Year">3rd Year</option>
                  <option value="4th Year">4th Year</option>
              </select>
            </div>
            <div class="field">
              <label>Teacher</label>
                <select name="Teacher" class="ui dropdown search" id="cmbTeacher">

                </select>
            </div>
        </div>
        <div class="ui divider">
            Grade Component
        </div>
        <div class="three fields">
            <div class="field">
              <label>Written Work(%)</label>
              <input type="number" name="WrittenWork" placeholder="Writen Work Percentage">
            </div>
            <div class="field">
              <label>Performance Task(%)</label>
              <input type="number" name="PerformanceTask" placeholder="Performance Task Percentage">
            </div>
            <div class="field">
              <label>Quarterly Assessment(%)</label>
              <input type="number" name="QuarterlyAssesment" placeholder="Quarterly Assessment Percentage">
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
</div>
</body>
<script type="text/javascript">
$(document).ready(function() {
    getClass();
    function getClass() {
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url("index.php/Classes/getClass"); ?>',
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _classes='';
                    for (var i = 0; i < response.class.length; i++) {
                        _classes+='<div class="ui card">'
                                            +'<div class="content">'
                                                +'<div class="header">'+response.class[i].Section+'</div>'
                                            +'</div>'
                                            +'<div class="content">'
                                                +'<h4 class="ui sub header">Class Information</h4>'
                                                +'<div class="ui small feed">'
                                                    +'<div class="event">'
                                                        +'<div class="content">'
                                                            +'<p>Teacher: '+response.class[i].Firstname+' '+response.class[i].Lastname+'</p>'
                                                            +'<p>Subject: '+response.class[i].Subject+'</p>'
                                                            +'<p>Year Leve: '+response.class[i].YearLevel+'</p>'
                                                        +'</div>'
                                                    +'</div>'
                                                +'</div>'
                                            +'</div>'
                                            +'<div class="extra content">'
                                                +'<a class="ui primary button" href="<?php echo base_url('index.php/ManageClass/Manage/'); ?>'+response.class[i].ClassID+'">Open</a>'
                                            +'</div>'
                                        +'</div>'
                    }
                    $("#classContainer").html(_classes);
                }
            }
        });
    }
    $("#btnAdd").click(function() {
        $('#AddModal')
          .modal({
            closable  : false,
            onApprove : function() {
                if($('#frmAddClass').form('is valid')){
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Classes/Add"); ?>',
                        data:$("#frmAddClass").serialize(),
                        dataType:'json',
                        success:function(response) {
                            if(response.success){
                                alert('Successfully Added');
                                getClass();
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
    getTeacher();
    function getTeacher() {
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url("index.php/UserAccount/getTeacher"); ?>',
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _dropdowncontent='';
                    for (var i = 0; i < response.teacher.length; i++) {
                        _dropdowncontent+='<option value="'+response.teacher[i].UserAccountID+'">'+response.teacher[i].Firstname+' '+response.teacher[i].Lastname+'</option>';
                    }
                    $("#cmbTeacher").html(_dropdowncontent);
                    $('#cmbTeacher').dropdown();
                }
            }
        });
    }
    $('#frmAddClass')
      .form({
        fields: {
          Section     : 'empty',
          Subject     : 'empty',
          YearLevel   : 'empty',
          Teacher : 'empty',
          WrittenWork : ['number','empty'],
          PerformanceTask : ['number','empty'],
          QuarterlyAssesment : ['number','empty'],
        }
      })
    ;
});
$('#cmbYearLevel').dropdown();
</script>
</html>
