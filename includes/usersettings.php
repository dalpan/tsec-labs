  <div class="row py-4">
    <div class="col-md-8 order-md-2">
      <form action="includes/userupdate.php" method="post" class="needs-validation" novalidate>
        <div class="row">
          <div class="col-md-12 mb-3">
            <label for="fullname">Full name</label>
            <input type="text" name="username" class="form-control" id="fullname" placeholder="Full name" value="" required>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

        </div>




        <div class="mb-3">
            <label for="oldpassword">Old Password <span class="text-muted"></span></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">#</span>
              </div>
              <input type="password" name="old-password" class="form-control" autocomplete="false" id="password" placeholder="Make sure nobody's behind you ;)">
              <div class="invalid-feedback">
                Please enter a valid password.
              </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="pswd1">Password <span class="text-muted"></span></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">#</span>
              </div>
              <input type="password" name="pswd1" class="form-control" autocomplete="false" id="pswd1" placeholder="Make sure nobody's behind you ;)">
              <div class="invalid-feedback">
                Please enter a valid password.
              </div>
            </div>
        </div>
        <div class="mb-3">
            <label for="pswd2">Confirm Password <span class="text-muted"></span></label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">#</span>
              </div>
              <input type="password" name="pswd2" class="form-control" id="pswd2" placeholder="Are you sure there is no one behind you?">
              <div class="invalid-feedback">
                Please enter a valid Confirm password.
              </div>
            </div>
          </div>


        <!-- <hr class="mb-4">
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="solemnly-swear">
          <label class="custom-control-label" for="solemnly-swear">I solemnly swear that I am up to no good.</label>
        </div>
        <hr class="mb-4"> -->
        <!-- <a href="#!" class="btn btn-outline-primary btn-shadow">Outline Button</a> -->
          <br>
        <button class="btn btn-outline-success btn-shadow btn-lg btn-block" name="update" type="submit"> Update </button>
      </form>
    </div>
    <div class="col-md-2 order-md-1"></div>
    <div class="col-md-2 order-md-3"></div>
  </div>