<div class="ui container">
    <div class="ui page dimmer">
      <div class="content">
        <h3 class="ui text loader">Loading</h3>
      </div>
    </div>
    <div class="ui very padded segment">
        <h2>Class CI-402PC</h2>
        <div class="ui top attached tabular menu">
          <a class="item active" data-tab="first">Manage</a>
          <a class="item" id="GradeTab" data-tab="second">Grades</a>
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
            <div class="ui divider horizontal">
                Student Grade
            </div>
            <div class="ui segment">
                <div class="field">
                    <label for="GradeFilterGradingPeriod">Grading Period: </label>
                    <select class="ui dropdown" name="GradeFilterGradingPeriod" id="GradeFilterGradingPeriod">
                        <option value="1st Grading">1st Grading</option>
                        <option value="2nd Grading">2nd Grading</option>
                        <option value="3rd Grading">3rd Grading</option>
                        <option value="4th Grading">4th Grading</option>
                        <option value="Final Grade">Final Grade</option>
                    </select>
                    <div class="ui hidden divider"></div>
                    <table id="tblStudentGrade" class="ui celled sortable blue table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>Written Work <?php echo $class->WW.'%'; ?></th>
                                <th>Performance Task <?php echo $class->PT.'%'; ?></th>
                                <th>Quarterly Assessment <?php echo $class->QA.'%'; ?></th>
                                <th class="sorted descending">Grade</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <table id="tblStudentFinalGrade" class="ui sortable celled blue table">
                        <thead>
                            <tr>
                                <th>Student</th>
                                <th>First Grading</th>
                                <th>Second Grading</th>
                                <th>Third Grading</th>
                                <th>Fourth Grading</th>
                                <th class="sort ascending">Final Grade</th>
                                <th>Remarks</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <button type="button" name="btnPrint" id="btnPrint" class="ui right floated primary button">Print</button>
                    <div class="ui clearing hidden divider">

                    </div>
                </div>
            </div>
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
    $(document).ajaxStart(function() {
        $('.page.dimmer:first')
          .dimmer('toggle')
        ;
    });
    $(document).ajaxStop(function() {
        $('.page.dimmer:first')
          .dimmer('toggle')
        ;
    });
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
    $("#btnPrint").click(function() {
        if($("#GradeFilterGradingPeriod").val()=="Final Grade"){
            $("#tblStudentFinalGrade").printThis({
                header:'<h3 class="ui center aligned header">Student '+$("#GradeFilterGradingPeriod").val()+'</h3><div class="ui">Subject : <?php echo $class->Subject; ?></div><div class="ui">Section : <?php echo $class->Section; ?></div><div class="ui">Year Level : <?php echo $class->YearLevel; ?></div>',
                footer:'<h3 class="ui right aligned sub header">Teacher: <?php echo $class->Firstname.' '.$class->Lastname; ?></h3>'
            });
        }else{
            $("#tblStudentGrade").printThis({
                header:'<h3 class="ui center aligned header">Student Grade for '+$("#GradeFilterGradingPeriod").val()+'</h3><div class="ui">Subject : <?php echo $class->Subject; ?></div><div class="ui">Section : <?php echo $class->Section; ?></div><div class="ui">Year Level : <?php echo $class->YearLevel; ?></div>',
                footer:'<h3 class="ui right aligned sub header">Teacher: <?php echo $class->Firstname.' '.$class->Lastname; ?></h3>'
            });
        }

    });
    $("#GradeTab").click(function () {
        if($("#GradeFilterGradingPeriod").val()=="Final Grade"){
            getStudentFinalGrade();
        }else{
            getStudentGrade();
        }
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
    $("#GradeFilterGradingPeriod").change(function() {
        if($(this).val()=="Final Grade"){
            getStudentFinalGrade();
        }else{
            getStudentGrade();
        }
    });
    function getStudentGrade() {
        $("#tblStudentGrade").show();
        $("#tblStudentFinalGrade").hide();
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/ManageClass/getStudent"); ?>',
            data:{ID:$("#ClassID").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _tableContent='';
                    var _writtenWorkPercentage=<?php echo '.'.$class->WW; ?>;
                    var _performanceTaskPercentage=<?php echo '.'.$class->PT; ?>;
                    var _quarterlyAssessmentPercentage=<?php echo '.'.$class->QA; ?>;
                    var _writtenWorkTotal=0;
                    var _performanceTaskTotal=0;
                    var _quarterlyAssessmentTotal=0;
                    var _studentWrittenWorkTotal=0;
                    var _studentPerformanceTaskTotal=0;
                    var _studentQuarterlyAssessmentTotal=0;
                    StudentData=response.stud;
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:$("#GradeFilterGradingPeriod").val(),Type:'Written Work'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _writtenWorkTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:$("#GradeFilterGradingPeriod").val(),Type:'Performance Task'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _performanceTaskTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:$("#GradeFilterGradingPeriod").val(),Type:'Quarterly Assessment'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _quarterlyAssessmentTotal=response.type.total;
                                }
                            }
                        }
                    });
                    for (var i = 0; i < response.stud.length; i++) {
                        var _studid=response.stud[i].StudentID;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:$("#GradeFilterGradingPeriod").val(),Type:'Written Work',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentWrittenWorkTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        var _writtenWorkGrade=((_studentWrittenWorkTotal/_writtenWorkTotal)*_writtenWorkPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:$("#GradeFilterGradingPeriod").val(),Type:'Performance Task',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentPerformanceTaskTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        var _performanceTaskGrade=((_studentPerformanceTaskTotal/_performanceTaskTotal)*_performanceTaskPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:$("#GradeFilterGradingPeriod").val(),Type:'Quarterly Assessment',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentQuarterlyAssessmentTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        var isPending=false;
                        var _quarterlyAssessmentGrade=((_studentQuarterlyAssessmentTotal/_quarterlyAssessmentTotal)*_quarterlyAssessmentPercentage)*100;
                        if(isNaN(_writtenWorkGrade)){
                            _writtenWorkGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_performanceTaskGrade)){
                            _performanceTaskGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_quarterlyAssessmentGrade)){
                            _quarterlyAssessmentGrade=0;
                            isPending=true;
                        }
                        var _studGrade=0;
                        var _error='positive';
                        _studGrade=_writtenWorkGrade+_performanceTaskGrade+_quarterlyAssessmentGrade;
                        if(isPending){
                            _studGrade="Pending";
                        }else{
                            _studGrade=_studGrade.toFixed(2);
                        }
                        if(isPending==true||_studGrade<75){
                            var _error='negative';
                        }
                        _tableContent+='<tr>'
                                            +'<td>'+response.stud[i].Name+'</td>'
                                            +'<td>'+_studentWrittenWorkTotal+'/'+_writtenWorkTotal+' ('+_writtenWorkGrade.toFixed(2)+')</td>'
                                            +'<td>'+_studentPerformanceTaskTotal+'/'+_performanceTaskTotal+' ('+_performanceTaskGrade.toFixed(2)+')</td>'
                                            +'<td>'+_studentQuarterlyAssessmentTotal+'/'+_quarterlyAssessmentTotal+' ('+_quarterlyAssessmentGrade.toFixed(2)+')</td>'
                                            +'<td class="'+_error+'">'+_studGrade+'</td>'
                                       '</tr>';
                    }
                    $("#tblStudentGrade tbody").html(_tableContent);
                    $('table').tablesort();
                }
            }
        });
    }
    function getStudentFinalGrade() {
        $("#tblStudentFinalGrade tbody").html('');
        $("#tblStudentGrade").hide();
        $("#tblStudentFinalGrade").show();
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/ManageClass/getStudent"); ?>',
            data:{ID:$("#ClassID").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _tableContent='';
                    var _writtenWorkPercentage=<?php echo '.'.$class->WW; ?>;
                    var _performanceTaskPercentage=<?php echo '.'.$class->PT; ?>;
                    var _quarterlyAssessmentPercentage=<?php echo '.'.$class->QA; ?>;
                    var _firstWrittenWorkTotal=0;
                    var _firstPerformanceTaskTotal=0;
                    var _firstQuarterlyAssessmentTotal=0;
                    var _secondWrittenWorkTotal=0;
                    var _secondPerformanceTaskTotal=0;
                    var _secondQuarterlyAssessmentTotal=0;
                    var _thirdWrittenWorkTotal=0;
                    var _thirdPerformanceTaskTotal=0;
                    var _thirdQuarterlyAssessmentTotal=0;
                    var _fourthWrittenWorkTotal=0;
                    var _fourthPerformanceTaskTotal=0;
                    var _fourthQuarterlyAssessmentTotal=0;
                    var _studentWrittenWorkTotal=0;
                    var _studentPerformanceTaskTotal=0;
                    var _studentQuarterlyAssessmentTotal=0;
                    StudentData=response.stud;
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'1st Grading',Type:'Written Work'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _firstWrittenWorkTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'1st Grading',Type:'Performance Task'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _firstPerformanceTaskTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'1st Grading',Type:'Quarterly Assessment'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _firstQuarterlyAssessmentTotal=response.type.total;
                                }
                            }
                        }
                    });
                    //second grading type type total
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'2nd Grading',Type:'Written Work'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _secondWrittenWorkTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'2nd Grading',Type:'Performance Task'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _secondPerformanceTaskTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'2nd Grading',Type:'Quarterly Assessment'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _secondQuarterlyAssessmentTotal=response.type.total;
                                }
                            }
                        }
                    });

                    //third grading type total
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'3rd Grading',Type:'Written Work'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _thirdWrittenWorkTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'3rd Grading',Type:'Performance Task'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _thirdPerformanceTaskTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'3rd Grading',Type:'Quarterly Assessment'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _thirdQuarterlyAssessmentTotal=response.type.total;
                                }
                            }
                        }
                    });
                    //Fourth grading type total
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'4th Grading',Type:'Written Work'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _fourthWrittenWorkTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'4th Grading',Type:'Performance Task'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _fourthPerformanceTaskTotal=response.type.total;
                                }
                            }
                        }
                    });
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/getTypeTotal"); ?>',
                        data:{ClassID:$("#ClassID").val(),GradingPeriod:'4th Grading',Type:'Quarterly Assessment'},
                        dataType:'json',
                        async:false,
                        success:function(response) {
                            if(response.success){
                                if(response.type.total!=null){
                                    _fourthQuarterlyAssessmentTotal=response.type.total;
                                }
                            }
                        }
                    });
                    for (var i = 0; i < response.stud.length; i++) {
                        var _studid=response.stud[i].StudentID;
                        //First Grading Student total score
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'1st Grading',Type:'Written Work',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentWrittenWorkTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        var _writtenWorkGrade=((_studentWrittenWorkTotal/_firstWrittenWorkTotal)*_writtenWorkPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'1st Grading',Type:'Performance Task',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentPerformanceTaskTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        var _performanceTaskGrade=((_studentPerformanceTaskTotal/_firstPerformanceTaskTotal)*_performanceTaskPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'1st Grading',Type:'Quarterly Assessment',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentQuarterlyAssessmentTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        var isPending=false;
                        var _quarterlyAssessmentGrade=((_studentQuarterlyAssessmentTotal/_firstQuarterlyAssessmentTotal)*_quarterlyAssessmentPercentage)*100;
                        if(isNaN(_writtenWorkGrade)){
                            _writtenWorkGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_performanceTaskGrade)){
                            _performanceTaskGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_quarterlyAssessmentGrade)){
                            _quarterlyAssessmentGrade=0;
                            isPending=true;
                        }
                        var _studFirstGradingGrade=0;
                        var _firstError='positive';
                        _studFirstGradingGrade=_writtenWorkGrade+_performanceTaskGrade+_quarterlyAssessmentGrade;
                        if(isPending){
                            _studFirstGradingGrade="Pending";
                        }else{
                            _studFirstGradingGrade=_studFirstGradingGrade.toFixed(2);
                        }
                        if(isPending==true||_studFirstGradingGrade<75){
                            var _firstError='negative';
                        }
                        //Second Grading Studet total score
                        _studentWrittenWorkTotal=0;
                        _studentPerformanceTaskTotal=0;
                        _studentQuarterlyAssessmentTotal=0;
                        _writtenWorkGrade=0;
                        _performanceTaskGrade=0;
                        _quarterlyAssessmentGrade=0;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'2nd Grading',Type:'Written Work',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentWrittenWorkTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        _writtenWorkGrade=((_studentWrittenWorkTotal/_secondWrittenWorkTotal)*_writtenWorkPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'2nd Grading',Type:'Performance Task',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentPerformanceTaskTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        _performanceTaskGrade=((_studentPerformanceTaskTotal/_secondPerformanceTaskTotal)*_performanceTaskPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'2nd Grading',Type:'Quarterly Assessment',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentQuarterlyAssessmentTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        isPending=false;
                        _quarterlyAssessmentGrade=((_studentQuarterlyAssessmentTotal/_secondQuarterlyAssessmentTotal)*_quarterlyAssessmentPercentage)*100;
                        if(isNaN(_writtenWorkGrade)){
                            _writtenWorkGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_performanceTaskGrade)){
                            _performanceTaskGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_quarterlyAssessmentGrade)){
                            _quarterlyAssessmentGrade=0;
                            isPending=true;
                        }
                        var _studSecondGradingGrade=0;
                        var _secondError='positive';
                        _studSecondGradingGrade=_writtenWorkGrade+_performanceTaskGrade+_quarterlyAssessmentGrade;
                        if(isPending){
                            _studSecondGradingGrade="Pending";
                        }else{
                            _studSecondGradingGrade=_studSecondGradingGrade.toFixed(2);
                        }
                        if(isPending==true||_studSecondGradingGrade<75){
                            var _secondError='negative';
                        }
                        //Third Grading Student Total Scores
                        _studentWrittenWorkTotal=0;
                        _studentPerformanceTaskTotal=0;
                        _studentQuarterlyAssessmentTotal=0;
                        _writtenWorkGrade=0;
                        _performanceTaskGrade=0;
                        _quarterlyAssessmentGrade=0;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'3rd Grading',Type:'Written Work',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentWrittenWorkTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        _writtenWorkGrade=((_studentWrittenWorkTotal/_thirdWrittenWorkTotal)*_writtenWorkPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'3rd Grading',Type:'Performance Task',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentPerformanceTaskTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        _performanceTaskGrade=((_studentPerformanceTaskTotal/_thirdPerformanceTaskTotal)*_performanceTaskPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'3rd Grading',Type:'Quarterly Assessment',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentQuarterlyAssessmentTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        isPending=false;
                        _quarterlyAssessmentGrade=((_studentQuarterlyAssessmentTotal/_thirdQuarterlyAssessmentTotal)*_quarterlyAssessmentPercentage)*100;
                        if(isNaN(_writtenWorkGrade)){
                            _writtenWorkGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_performanceTaskGrade)){
                            _performanceTaskGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_quarterlyAssessmentGrade)){
                            _quarterlyAssessmentGrade=0;
                            isPending=true;
                        }
                        var _studThirdGradingGrade=0;
                        var _thirdError='positive';
                        _studThirdGradingGrade=_writtenWorkGrade+_performanceTaskGrade+_quarterlyAssessmentGrade;
                        if(isPending){
                            _studThirdGradingGrade="Pending";
                        }else{
                            _studThirdGradingGrade=_studThirdGradingGrade.toFixed(2);
                        }
                        if(isPending==true||_studThirdGradingGrade<75){
                            var _thirdError='negative';
                        }
                        //Fourt Grading
                        _studentWrittenWorkTotal=0;
                        _studentPerformanceTaskTotal=0;
                        _studentQuarterlyAssessmentTotal=0;
                        _writtenWorkGrade=0;
                        _performanceTaskGrade=0;
                        _quarterlyAssessmentGrade=0;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'4th Grading',Type:'Written Work',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentWrittenWorkTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        _writtenWorkGrade=((_studentWrittenWorkTotal/_fourthWrittenWorkTotal)*_writtenWorkPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'4th Grading',Type:'Performance Task',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentPerformanceTaskTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        _performanceTaskGrade=((_studentPerformanceTaskTotal/_fourthPerformanceTaskTotal)*_performanceTaskPercentage)*100;
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentTotalScore"); ?>',
                            data:{ClassID:$("#ClassID").val(),GradingPeriod:'4th Grading',Type:'Quarterly Assessment',StudentID:_studid},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studentscore.total!=null){
                                        _studentQuarterlyAssessmentTotal=response.studentscore.total;
                                    }
                                }
                            }
                        });
                        isPending=false;
                        _quarterlyAssessmentGrade=((_studentQuarterlyAssessmentTotal/_fourthQuarterlyAssessmentTotal)*_quarterlyAssessmentPercentage)*100;
                        if(isNaN(_writtenWorkGrade)){
                            _writtenWorkGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_performanceTaskGrade)){
                            _performanceTaskGrade=0;
                            isPending=true;
                        }
                        if(isNaN(_quarterlyAssessmentGrade)){
                            _quarterlyAssessmentGrade=0;
                            isPending=true;
                        }
                        var _studFourthGradingGrade=0;
                        var _fourthError='positive';
                        _studFourthGradingGrade=_writtenWorkGrade+_performanceTaskGrade+_quarterlyAssessmentGrade;
                        if(isPending){
                            _studFourthGradingGrade="Pending";
                        }else{
                            _studFourthGradingGrade=_studFourthGradingGrade.toFixed(2);
                        }
                        if(isPending==true||_studFourthGradingGrade<75){
                            var _fourthError='negative';
                        }
                        var _studFinalGrade=0;
                        var _remarks='Passed';
                        var _remarksError="positive";
                        var _finalError="positive";
                        if(_studFirstGradingGrade=="Pending"||_studSecondGradingGrade=="Pending"||_studThirdGradingGrade=="Pending"||_studFourthGradingGrade=="Pending"){
                            _studFinalGrade="Pending";
                            _remarks="Pending";
                            _finalError="negative";
                            _remarksError="negative";
                        }else{
                            _studFinalGrade=(parseFloat(_studFirstGradingGrade)+parseFloat(_studSecondGradingGrade)+parseFloat(_studThirdGradingGrade)+parseFloat(_studFourthGradingGrade))/4;
                            if(_studFinalGrade<75){
                                _finalError="negative";
                                _remarks="Failed";
                                var _remarksError="negative";
                            }
                            _studFinalGrade=_studFinalGrade.toFixed(2);
                        }
                        _tableContent+='<tr>'
                                            +'<td>'+response.stud[i].Name+'</td>'
                                            +'<td class="'+_firstError+'">'+_studFirstGradingGrade+'</td>'
                                            +'<td class="'+_secondError+'">'+_studSecondGradingGrade+'</td>'
                                            +'<td class="'+_thirdError+'">'+_studThirdGradingGrade+'</td>'
                                            +'<td class="'+_fourthError+'">'+_studFourthGradingGrade+'</td>'
                                            +'<td class="'+_finalError+'">'+_studFinalGrade+'</td>'
                                            +'<td class="'+_remarksError+'">'+_remarks+'</td>'
                                       '</tr>';
                    }
                    $("#tblStudentFinalGrade tbody").html(_tableContent);
                    $('table').tablesort();
                }
            }
        });
    }
});
</script>
</html>
