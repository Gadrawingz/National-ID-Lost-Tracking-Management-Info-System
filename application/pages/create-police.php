      <?php

      /**********************************
       ** CODING HAND:@gadrawingz/@donnekt
       * ********************************/
      ?>
      
          <!-- Inside row defined above all of the app power @donnekt -->
          <div class="col-lg-9">
            <div class="form-panel">
              <div class="border-head text-primary c-bolder">
                <h3>Register New Police Station</h3>
              </div>
              
              <?php
              // Release stuff
              if(isset($_POST['submit'])) {
                echo '<div class="bg-primary text-white warning-box">';
                echo $police->newPoliceStation(
                  $_POST['station_name'], 
                  $_POST['commander'],
                  $_POST['district'],
                  $_POST['sector'],
                  $_POST['contact'],
                  $_POST['username'],
                  $_POST['password']
                );
                echo '</div>';
              }
              ?>

              <form method="POST" class="form-horizontal style-form" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-md-6"><b>Station Name</b></label>
                  <div class="col-md-6">
                    <input type="text" name="station_name" class="form-control" placeholder="Name" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Station Commander</b></label>
                  <div class="col-md-6">
                    <input type="text" name="commander" class="form-control" placeholder="Commander" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Station Location</b></label>
                  <div class="col-md-6">
                    <div class="input-group input-large">
                      <input type="text" class="form-control" name="district" placeholder="District" required/>
                      <span class="input-group-addon"> - </span>
                      <input type="text" class="form-control" name="sector" placeholder="Sector" required/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Contact Number</b></label>
                  <div class="col-md-6">
                    <input type="text" name="contact" class="form-control" placeholder="Contact Number" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Login information</b></label>
                  <div class="col-md-6">
                    <div class="input-group input-large">
                      <input type="text" class="form-control" name="username" placeholder="Username" required/>
                      <span class="input-group-addon"> - </span>
                      <input type="password" class="form-control" name="password" placeholder="Password" required/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-md btn-theme03" name="submit">Save</button>
                  </div>
                </div>

              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->