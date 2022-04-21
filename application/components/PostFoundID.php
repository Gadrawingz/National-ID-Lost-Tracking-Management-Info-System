        <!-- INSIDE ABOVE ROW -->
          <div class="col-lg-12">
            <h4 style="margin-left: 10px;">Add all information of ID you found</h4>
            <div class="form-panel">

              <?php
              // Release a shit
              if(isset($_POST['submit_found'])) {
                echo '<div class="bg-primary text-white warning-box">';
                echo $id_query->postFoundID(
                  $_POST['id_names'], 
                  $_POST['id_number'],
                  $_POST['id_dob'],
                  $_POST['id_sex'],
                  $_POST['issued_dist'],
                  $_POST['issued_sect'],
                  $_FILES['id_image'],
                  $_POST['u_location'],
                  $_SESSION['v_id']
                );
                echo '</div>';
              }
              ?>

              <form method="POST" class="form-horizontal style-form" enctype="multipart/form-data">
                <div class="form-group">
                  <label class="control-label col-md-6"><b>Names</b>/ Amazina</label>
                  <div class="col-md-6">
                    <input type="text" name="id_names" class="form-control" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>National ID No</b>/ Nimero y'Irangamuntu</label>
                  <div class="col-md-6">
                    <input type="number" name="id_number"  maxlength="16" class="form-control" placeholder="16 numbers" required/>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Date of Birth</b>/ Itariki y'amavuko</label>
                  <div class="col-md-6">
                    <input type="text" name="id_dob" class="form-control" placeholder="01/04/1999" required/>
                  </div>
                </div>


                <div class="form-group">
                  <label class="control-label col-md-6"><b>Sex</b>/ Igitsina</label>
                  <div class="col-md-6">
                    <input type="radio" name="id_sex" id="M" value="M" checked/>
                    <label for="M">Male</label>
                    &nbsp; <b>/</b> &nbsp; 
                    <input type="radio" name="id_sex" id="F" value="F"> 
                    <label for="F">Female</label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Place of Issue</b>/ Aho yatangiwe</label>
                  <div class="col-md-6">
                    <div class="input-group input-large">
                      <input type="text" class="form-control" name="issued_dist" placeholder="District" required/>
                      <span class="input-group-addon"> / </span>
                      <input type="text" class="form-control" name="issued_sect" placeholder="Sector" required/>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Upload National ID U find</b></label>
                  <div class="col-md-6">
                    <input type="file" name="id_image" class="form-control" required/>
                  </div>
                </div>

                <div class="form-group" >
                  <label class="control-label col-md-6">
                    <span class="text-primary"><strong>Location where you found Lost ID</span></strong>
                  </label>
                  <div class="col-md-6">
                    <input type="text" name="u_location" class="form-control" placeholder="Ex: Huye - Tumba" required/>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-md btn-theme03" name="submit_found">Submit</button>
                  </div>
                </div>

              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
      