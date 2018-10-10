    <div class="ui container">
        <div class="ui very padded segment big">
            <h2 class="ui dividing header">User Accounts</h2>
            <table class="ui compact celled table">
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
                <tr>
                    <td>Raymundo R. Alfeche Jr.</td>
                    <td>alfeche492@gmail.com</td>
                    <td>Raydy143@gmail.com</td>
                    <td>Admin</td>
                    <td><button class="negative ui button">Delete</button></td>
                </tr>
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
        $("#btnAdd").click(function() {
            $('.ui.modal')
                .modal('show')
            ;
        });
    });
    $('#select').dropdown();
  </script>
</html>
