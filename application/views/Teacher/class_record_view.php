<div class="ui container">
    <div class="ui very padded segment">
        <h2>Class CI-402PC</h2>
        <div class="ui top attached tabular menu">
          <a class="item active" data-tab="first">Class Record</a>
          <a class="item" data-tab="second">Score</a>
          <a class="item" data-tab="third">Grade</a>
        </div>
        <div class="ui bottom attached tab segment active" data-tab="first">
            <div class="ui vertical segment">
                <div class="ui list">
                    <input type="hidden" name="ID" id="ClassID" value="<?php echo $class->ClassID; ?>">
                    <div class="item">Teacher : <?php echo $class->Firstname.' '.$class->Lastname; ?></div>
                    <div class="item">Subject : <?php echo $class->Subject; ?></div>
                    <div class="item">Section : <?php echo $class->Section; ?></div>
                    <div class="item">Year Level : <?php echo $class->YearLevel; ?></div>
                </div>
            </div>
            <div class="ui vertical segment">
                <div class="ui horizontal divider">Students</div>
                <table id="tblStudent" class="ui celled table">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Gender</th>
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
            <div class="ui horizontal divider">
                Scores
            </div>
            <div class="ui segment">
                <button type="button" class="ui right floated primary button" id="btnAdd">Add Score</button>
                <div class="ui hidden divider">
                </div>
                <div class="field">
                    <label for="FilterType">Type :</label>
                    <select class="ui dropdown filter" name="FilterType" id="FilterType">
                        <option value="Written Work">Written Output</option>
                        <option value="Performance Task">Performance Task</option>
                        <option value="Quarterly Assesment">Quarterly Assesment</option>
                    </select>
                </div>
                <div class="ui hidden divider">

                </div>
                <div class="field">
                    <label for="FilterGradingPeriod">Grading Period :</label>
                    <select class="ui dropdown filter" name="FilterGradingPeriod" id="FilterGradingPeriod">
                        <option value="1st Grading">1st Grading</option>
                        <option value="2nd Grading">2nd Grading</option>
                        <option value="3rd Grading">3rd Grading</option>
                        <option value="4th Grading">4th Grading</option>
                    </select>
                </div>
                <table id="tblScore" class="ui selectable celled blue table">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Perfect Score</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
        <div class="ui bottom attached tab segment" data-tab="third">
            Grade here
        </div>
        <div id="AddScoreModal" class="ui tiny modal">
            <div class="header">
              Add Score
            </div>
            <div class="content">
              <div class="ui form">
                  <form class="ui form" id="frmAddScore" action="javascript:">
                  <input type="hidden" name="ID" value="<?php echo $class->ClassID; ?>">
                  <div class="field">
                    <label>Description</label>
                    <input type="text" name="Description" placeholder="Description">
                  </div>
                  <div class="field">
                    <label>Type</label>
                    <select class="ui dropdown" name="Type" id="Type">
                        <option value="Written Work">Written Work</option>
                        <option value="Performance Task">Performance Task</option>
                        <option value="Quarterly Assessment">Quarterly Assessment</option>
                    </select>
                  </div>
                  <div class="field">
                      <label for="GradingPeriod">Grading Period</label>
                      <select class="ui dropdown" name="GradingPeriod" id="GradingPeriod">
                          <option value="1st Grading">1st Grading</option>
                          <option value="2nd Grading">2nd Grading</option>
                          <option value="3rd Grading">3rd Grading</option>
                          <option value="4th Grading">4th Grading</option>
                      </select>
                  </div>
                  <div class="field">
                    <label>Perfect Score</label>
                    <input type="text" name="PerfectScore" placeholder="Perfect Score">
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
        <div id="StudentScoreModal" class="ui modal">
            <div class="header">
                <input type="hidden" name="ScoreID" id="txtHiddenScoreID">
                Student Scores for <span id="lblScoreDescription"></span> (<span id="lblType"></span>) - <span id="lblGradingPeriod"></span>
            </div>
            <div class="scrolling content">
                <table id="tblStudentScore" class="ui celled selectable blue table">
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Score (Perfect Score: <span id="lblPerfectScore"></span>)</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <div class="actions">
                <button type="button" name="button" class="ui negative button">Cancel</button>
                <button type="button" id="btnSubmit" name="button" class="ui positive button">Submit</button>
            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
$(document).ready(function() {
    $('.menu .item')
      .tab()
    ;
    $("#Type").dropdown();
    $("#GradingPeriod").dropdown();
    $("#FilterGradingPeriod").dropdown();
    $("#frmAddScore").form({
        fields:{
            Description:'empty',
            Type:'empty',
            PerfectScore:['empty','number'],
            GradingPeriod:'empty'
        }
    });
    $("#FilterType").dropdown();
    getScore();
    $("#tblStudentScore tbody").on('focusout','input.scores',function() {
        var _perfectscore=parseInt($('#lblPerfectScore').text());
        if(parseInt($(this).val())>_perfectscore){
            alert("Value must not greater than the perfect score")
            $(this).val('');
        }
    });
    var ScoreData=[];
    function getScore() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/Teacher/getScore") ?>',
            data:{Type:$("#FilterType").val(),ID:$("#ClassID").val(),GradingPeriod:$("#FilterGradingPeriod").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _tableContent='';
                    ScoreData=response.score;
                    for (var i = 0; i < response.score.length; i++) {
                        _tableContent+='<tr>'
                                            +'<td>'+response.score[i].Description+'</td>'
                                            +'<td>'+response.score[i].PerfectScore+'</td>'
                                            +'<td>'+response.score[i].Type+'</td>'
                                            +'<td>'+new Date(response.score[i].Date).toLocaleDateString()+'</td>'
                                            +'<td><button id="'+response.score[i].ScoreID+'" class="ui primary open button">Open</button></td>'
                                       +'</tr>';
                    }
                    $("#tblScore tbody").html(_tableContent);
                }
            }
        });
    }
    $("#tblScore tbody").on('click','button.open',function() {
        var _index=ScoreData.findIndex(x=>x.ScoreID==$(this).attr('id'));
        $("#lblScoreDescription").text(ScoreData[_index].Description);
        $("#lblType").text(ScoreData[_index].Type);
        $("#lblPerfectScore").text(ScoreData[_index].PerfectScore);
        $("#txtHiddenScoreID").val($(this).attr('id'));
        $("#lblGradingPeriod").text(ScoreData[_index].GradingPeriod);
        getStudentScore();
        $('#StudentScoreModal')
          .modal({
            closable  : false,
            onApprove : function() {
                var inputs = $(".scores");
                for(var i = 0; i < inputs.length; i++){
                    if($(inputs[i]).attr('data-stsid')==""){
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/addStudentScore"); ?>',
                            data:{Score:$(inputs[i]).val(),StudID:$(inputs[i]).attr('data-stid'),ScoreID:$("#txtHiddenScoreID").val()},
                            dataType:'json',
                            success:function(response) {
                                if(response.success){

                                }else{
                                    alert("Something went wrong!");
                                }
                            }
                        });
                    }else{
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/updateStudentScore"); ?>',
                            data:{STSID:$(inputs[i]).attr('data-stsid'),Score:$(inputs[i]).val()},
                            dataType:'json',
                            success:function(response) {
                                if(response.success){

                                }else{

                                }
                            }
                        });
                    }
                }
            }
          })
          .modal('show')
        ;

    });
    $(".filter").change(function() {
        getScore();
    });
    $("#btnAdd").click(function() {
        $('#AddScoreModal')
          .modal({
            closable  : false,
            onApprove : function() {
                if($("#frmAddScore").form('is valid')){
                    $.ajax({
                        type:'ajax',
                        method:'POST',
                        url:'<?php echo base_url("index.php/Teacher/addScore"); ?>',
                        data:$("#frmAddScore").serialize(),
                        dataType:'json',
                        success:function(response) {
                            if(response.success){
                                alert("Successfully Added!");
                                getScore();
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
    getStudent();
    function getStudent() {
        $.ajax({
            type:'ajax',
            method:'POST',
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
                                       '</tr>';
                    }
                    $("#tblStudent tbody").html(_tableContent);
                }
            }
        });
    }
    function getStudentScore() {
        $.ajax({
            type:'ajax',
            method:'POST',
            url:'<?php echo base_url("index.php/ManageClass/getStudent"); ?>',
            data:{ID:$("#ClassID").val()},
            dataType:'json',
            success:function(response) {
                if(response.success){
                    var _tableContent='';
                    for (var i = 0; i < response.stud.length; i++) {
                        var _studid=response.stud[i].StudentID;
                        var _studscoreid='';
                        var _studscore='';
                        $.ajax({
                            type:'ajax',
                            method:'POST',
                            url:'<?php echo base_url("index.php/Teacher/getStudentScore"); ?>',
                            data:{StudID:_studid,ScoreID:$("#txtHiddenScoreID").val()},
                            dataType:'json',
                            async:false,
                            success:function(response) {
                                if(response.success){
                                    if(response.studscore!=""){
                                        _studscore=response.studscore.Score;
                                        _studscoreid=response.studscore.StudentScoreID;
                                    }
                                }
                            }
                        })
                        _tableContent+='<tr>'
                                            +'<td>'+response.stud[i].Name+'</td>'
                                            +'<td><div class="ui input"><input class="scores" data-stid="'+response.stud[i].StudentID+'" data-stsid="'+_studscoreid+'" type="text" value="'+_studscore+'" placeholder="Score for '+response.stud[i].Name+'"></div></td>'
                                     +'</tr>';
                    }
                    $("#tblStudentScore tbody").html(_tableContent);
                }
            }
        });
    }
});
</script>
</html>
