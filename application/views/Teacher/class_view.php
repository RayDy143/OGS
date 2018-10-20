<div class="ui container">
    <div class="ui very padded segment">
        <h2 class="ui dividing header">Class</h2>
        <div class="ui divider"></div>
        <div class="ui three stackable cards" id="classContainer">

        </div>
</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function() {
    getClass();
    function getClass() {
        $.ajax({
            type:'ajax',
            url:'<?php echo base_url("index.php/Teacher/getClass"); ?>',
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
                                                +'<a class="ui primary button" href="<?php echo base_url('index.php/Teacher/ClassRecord/'); ?>'+response.class[i].ClassID+'">Open</a>'
                                            +'</div>'
                                        +'</div>'
                    }
                    $("#classContainer").html(_classes);
                }
            }
        });
    }
});
$('#cmbYearLevel').dropdown();
</script>
</html>
