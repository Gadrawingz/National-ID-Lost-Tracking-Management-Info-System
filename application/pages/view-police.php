      <?php
      /**********************************
       ** CODING HAND:@gadrawingz/@donnekt
       * ********************************/
      ?>

          <?php if(!isset($_GET['page'])) { ?>
          <!-- Inside row defined above all of the app power @donnekt -->
          <div class="col-lg-9">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> All Registered Police Stations</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-bullhorn"></i> Station name</th>
                    <th><i class="fa fa-road"></i> Location</th>
                    <th><i class=" fa fa-user-md"></i> Commander</th>
                    <th><i class=" fa fa-phone"></i> Contact No.</th>
                    <th><i class=" fa fa-check"></i> Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $num = 1;
                  $stmt= $police->policeStations();
                  while($result= $stmt->FETCH(PDO::FETCH_ASSOC)) {
                    $status = $result['status'];
                ?>
                  <tr>
                    <td>
                      <a href="#"><?php echo $result['station_name']; ?></a>
                    </td>
                    <td><?php echo $result['district']." - ".$result['sector']; ?></td>
                    <td><?php echo $result['station_commander']; ?></td>
                    <td><?php echo $result['contact_number']; ?></td>
                    <td>

                      <span class="label label-<?php echo $status=='1' ? "info":"danger"; ?> label-mini">
                        <?php echo $status=='1' ? "Active": "Inactive"; ?> 
                      </span>
                    </td>
                    <td>
                      <a href="../uid/<?php echo $result['station_id']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                      <a href="../did/<?php echo $result['station_id']; ?>" onclick="return confirm('Do you surely want to remove this record?')" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                <?php } ?>
         
                </tbody>
              </table>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <?php } ?>





          <?php if(isset($_GET['page']) && $_GET['page']=='users') { ?>
          <!-- Inside row defined above all of the app power @donnekt -->
          <div class="col-lg-9">
            <div class="content-panel">
              <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> All Registered Users</h4>
                <hr>
                <thead>
                  <tr>
                    <th><i class="fa fa-group"></i> Names</th>
                    <th><i class="fa fa-phone"></i> Telephone</th>
                    <th><i class=" fa fa-calendar"></i> Date registered</th>
                    <th><i class=" fa fa-check"></i> Status</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $num2 = 1;
                  $user_stmt= $id_query->registeredVisitors();
                  while($user_res= $user_stmt->FETCH(PDO::FETCH_ASSOC)) {
                    $user_status = $user_res['status']=='1' ? "Active":"Inactive";
                ?>
                  <tr>
                    <td>
                      <a href="#"><?php echo $user_res['full_name']; ?></a>
                    </td>
                    <td><?php echo $user_res['telephone']; ?></td>
                    <td><?php echo $user_res['created_at']; ?></td>
                    <td>

                      <span class="label label-<?php echo $user_res['status']=='1' ? "info":"danger";?> label-mini">
                        <?php echo $user_status; ?> 
                      </span>
                    </td>
                    <td>
                      <?php if($user_res['status']=='1') { ?>
                      <a href="../disable/<?php echo $user_res['user_id']; ?>" onclick="return confirm('Do U want to disable this record?')" class="btn btn-danger btn-sm">Disable</i></a>
                      <?php } else { ?>
                      <a href="../enable/<?php echo $user_res['user_id']; ?>" onclick="return confirm('Do U want to enable this record?')" class="btn btn-primary btn-sm">Enable</i></a>
                      <?php } ?>
                    </td>
                  </tr>
                <?php } ?>
         
                </tbody>
              </table>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
          <?php } ?>


          <?php if(isset($_GET['page']) && $_GET['page']=='upd') { ?>
          <div class="col-lg-9">
            <div class="form-panel">
              <div class="border-head text-primary c-bolder">
                <h3>Update Police Station</h3>
              </div>
              
              <?php
              $id= $_GET['uid'];
              $update_stmt= $police->policeStation($id);
              $update_res= $update_stmt->FETCH(PDO::FETCH_ASSOC);
              $upd_status = $update_res['status'];

              if(isset($_POST['submit'])) {
                echo $police->updatePoliceStation(
                  $id,
                  $_POST['station_name'],
                  $_POST['commander'],
                  $_POST['district'],
                  $_POST['sector'],
                  $_POST['contact'],
                  $_POST['status']
                );
                echo "<script>window.location='../police/view'</script>";
              }
              ?>
              <form method="POST" class="form-horizontal style-form">
                <div class="form-group">
                  <label class="control-label col-md-6"><b>Station Name</b></label>
                  <div class="col-md-6">
                    <input type="text" name="station_name" class="form-control" value="<?php echo $update_res['station_name'];?>" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Station Commander</b></label>
                  <div class="col-md-6">
                    <input type="text" name="commander" class="form-control" value="<?php echo $update_res['station_commander'];?>" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Station Location</b></label>
                  <div class="col-md-6">
                    <div class="input-group input-large">
                      <input type="text" class="form-control" name="district" value="<?php echo $update_res['district'];?>" required/>
                      <span class="input-group-addon"> - </span>
                      <input type="text" class="form-control" name="sector" value="<?php echo $update_res['sector'];?>" required/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Contact Number</b></label>
                  <div class="col-md-6">
                    <input type="text" name="contact" class="form-control" value="<?php echo $update_res['contact_number'];?>" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6" for="status"><b>Status</b></label>
                  <div class="col-md-6">
                    <select name="status" class="form-control">
                      <option style="background-color: #0b5345; color: white;" value="<?php echo $update_res['status'];?>"><?php echo $update_res['status']=='1' ? "Activated":"Deactivated"; ?></option>
                      <?php echo $update_res['status']=='1' ? '<option value="0">Deactivate</option>':'<option value="1">Activate</option>'; ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-md btn-theme03" name="submit">Update</button>
                  </div>
                </div>

              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <?php }

          // DEL @gadrawingz
          if(isset($_GET['did'])) { 
            if($police->deletePoliceStation($_GET['did'])) {
              echo "<script>alert('REMOVED SUCCESSFULLY!')</script>";
              echo "<script>window.location='../police/view'</script>";
            } else {
              echo "<script>alert('FAILED TO BE REMOVED!')</script>";
              echo "<script>window.location='../police/view'</script>";
            }
          }
          ?>
