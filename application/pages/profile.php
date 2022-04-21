          <?php if(isset($_SESSION['ps_id'])) { ?>
          <div class="col-lg-9">
            <div class="form-panel">
              <div class="border-head text-primary c-bolder">
                <h3>UPDATE PROFILE STATION</h3>
              </div>
              
              <?php
              $ps_id= $_SESSION['ps_id'];
              $ps_stmt= $vlogin->viewPSAccount($ps_id);
              $ps_res= $ps_stmt->FETCH(PDO::FETCH_ASSOC);
              $username = $ps_res['username'];
              $password = $ps_res['password'];

              if(isset($_POST['ps_update'])) {
                echo $vlogin->updatePSAccount(
                  $ps_id,
                  $_POST['username'],
                  $_POST['password']
                );
                echo "<script>window.location='../main/dashboard'</script>";
              }
              ?>
              <form method="POST" class="form-horizontal style-form">
                <div class="form-group">
                  <label class="control-label col-md-6"><b>Username</b></label>
                  <div class="col-md-6">
                    <input type="text" name="username" class="form-control" value="<?php echo $ps_res['username'];?>" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Password </b></label>
                  <div class="col-md-6">
                    <input type="password" name="password" class="form-control" value="<?php echo $ps_res['password'];?>" required/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-md btn-theme03" name="ps_update">Update</button>
                  </div>
                </div>

              </form>
            </div>
            <!-- /form-panel -->
          </div>


          

          <?php } if(isset($_SESSION['v_id'])) { ?>
          <div class="col-lg-9">
            <div class="form-panel">
              <div class="border-head text-primary c-bolder">
                <h3>UPDATE USER ACCOUNT</h3>
              </div>
              
              <?php
              $user_id= $_SESSION['v_id'];
              $us_stmt= $vlogin->viewUserAccount($user_id);
              $us_res= $us_stmt->FETCH(PDO::FETCH_ASSOC);
              
              if(isset($_POST['us_update'])) {
                echo $vlogin->updateUserAccount(
                  $user_id,
                  $_POST['full_name'],
                  $_POST['telephone'],
                  $_POST['password']
                );
                echo "<script>window.location='../main/dashboard'</script>";
              }
              ?>
              <form method="POST" class="form-horizontal style-form">
                <div class="form-group">
                  <label class="control-label col-md-6"><b>Full Name</b></label>
                  <div class="col-md-6">
                    <input type="text" name="full_name" class="form-control" value="<?php echo $us_res['full_name'];?>" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Telephone</b></label>
                  <div class="col-md-6">
                    <input type="text" name="telephone" class="form-control" value="<?php echo $us_res['telephone'];?>" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Password </b></label>
                  <div class="col-md-6">
                    <input type="password" name="password" class="form-control" value="<?php echo $us_res['password'];?>" required/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-md btn-theme03" name="us_update">Update</button>
                  </div>
                </div>

              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <?php } ?>