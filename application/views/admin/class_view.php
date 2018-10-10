<div class="ui container">
    <div class="ui very padded segment">
        <h2 class="ui dividing header">Class</h2>
        <div class="ui three stackable cards">
            <div class="ui card">
              <div class="content">
                <div class="header">Section CI-401CP</div>
              </div>
              <div class="content">
                <h4 class="ui sub header">Class Information</h4>
                <div class="ui small feed">
                  <div class="event">
                    <div class="content">
                        <p>Teacher: Raymundo R. Alfeche Jr.</p>
                        <p>Year Level: 4th Year.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="extra content">
                <button class="ui button">Open</button>
              </div>
            </div>
            <div class="ui card">
              <div class="content">
                <div class="header">Section CI-401CP</div>
              </div>
              <div class="content">
                <h4 class="ui sub header">Class Information</h4>
                <div class="ui small feed">
                  <div class="event">
                    <div class="content">
                        <p>Teacher: Raymundo R. Alfeche Jr.</p>
                        <p>Year Level: 4th Year.</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="extra content">
                <button class="ui button">Open</button>
              </div>
            </div>
        </div>
</div>
<div class="ui modal">
  <div class="header">
    Add teacher
  </div>
  <div class="content">
    <div class="ui form">
        <div class="three fields">
            <div class="field">
              <label>First name</label>
              <input type="text" placeholder="First Name">
            </div>
            <div class="field">
              <label>Middle name</label>
              <input type="text" placeholder="Middle Name">
            </div>
            <div class="field">
              <label>Last name</label>
              <input type="text" placeholder="Last Name">
            </div>
        </div>
        <div class="three fields">
            <div class="field">
              <label>Email</label>
              <input type="text" placeholder="Email">
            </div>
            <div class="field">
              <label>Username</label>
              <input type="text" placeholder="Username">
            </div>
            <div class="field">
              <label>Usertype</label>
                <select name="gender" class="ui dropdown" id="select">
                   <option value="">Usertype</option>
                   <option value="Admin">Admin</option>
                   <option value="Teacher">Teacher</option>
                </select>
            </div>
        </div>
    </div>
  </div>
  <div class="actions">
    <div class="ui negative deny button">
      Cancel
    </div>
    <div class="ui positive button">
      Add
    </div>
  </div>
</div>
</body>
<script type="text/javascript">
$(document).ready(function() {
    // $("#btnAdd").click(function() {
    //     $('.ui.modal')
    //         .modal('show')
    //     ;
    // });
});
$('#select').dropdown();
</script>
</html>
