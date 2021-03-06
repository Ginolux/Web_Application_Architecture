<!-- Modal -->
<div class="modal fade" id="register-modal" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="padding:35px 50px;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4><span class="glyphicon glyphicon-lock"></span> Register</h4>
      </div>
      <div class="modal-body" style="padding:40px 50px;">
        <form role="form" id="needs-validation_2" novalidate action="db/register.php" method="post">
          <div class="form-group">
            <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
            <input type="text" class="form-control" id="usrname" placeholder="Enter username" name="username" required>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
          </div>
          <div class="form-group">
            <label for="date-input" class="glyphicon glyphicon-date">Date of birth</label>
            <input class="form-control" type="date" class="form-control" value="2011-08-19" id="date-input" name="dob" required>
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
            <input type="password" class="form-control" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Enter password" name="password" required>
            <p id="passwordHelpBlock" class="form-text text-muted">
              Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.
            </p>
          </div>
          <div class="form-group">
            <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Confirm Password</label>
            <input type="password" class="form-control" id="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="Re-enter password" name="re_password" required>
          </div>
            <button type="submit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Register</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
//disabling form submissions if there are invalid fields
(function() {
  'use strict';

  window.addEventListener('load', function() {
    var form = document.getElementById('needs-validation_2');
    form.addEventListener('submit', function(event) {
      if (form.checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add('was-validated');
    }, false);
  }, false);
})();
</script>
                                                                                                                                                                                                                                                                                                                                 
