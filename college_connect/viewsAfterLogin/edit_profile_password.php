<!-- Change Password
================================================= -->
<div class="edit-profile-container">
  <div class="block-title">
    <h4 class="grey"><i class="icon ion-ios-locked-outline"></i>Change Password</h4>
    <div class="line"></div>
  </div>

  <div class="edit-block">
    <div class="alert alert-danger" id="passAlert"></div>
      <form id="" class="form-inline" method = "POST">

        <div class="row">
          <div class="form-group col-xs-12">
            <label for="my-password">Old password</label>
            <input class="form-control input-group-lg" type="password" id="old-password" name="old_password" title="Enter password" placeholder="Old password"/>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-xs-6">
            <label>New password</label>
            <input class="form-control input-group-lg" type="password" id="new-password" name="new_password" title="Enter password" placeholder="New password"/>
          </div>
          <div class="form-group col-xs-6">
            <label>Confirm password</label>
            <input class="form-control input-group-lg" type="text" id="conf-password" title="Enter password" placeholder="Confirm password"/>
          </div>
        </div>
        
                    
      </form>
      <button class="btn btn-primary" id="update-pass" type="submit" name="update_pass">Update Password</button>
    </div>
  </div>
</div>
