<div class="ui container">
    <div class="ui very padded segment">
        <h2 class="ui dividing header">Userlogs</h2>
        <div class="ui divider"></div>
        <table id="tblUserLogs" class="ui celled blue table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Action</th>
                    <th>Date and Time</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if($userlogs){
                        foreach ($userlogs as $row) {
                            echo '<tr>';
                                echo '<td>'.$row['Firstname'].' '.$row['Lastname'].'</td>';
                                echo '<td>'.$row['Action'].'</td>';
                                echo '<td>'.$row['DateAndTime'].'</td>';
                            echo '</tr>';
                        }
                    }
                 ?>
            </tbody>
        </table>
</div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function() {

});
</script>
</html>
