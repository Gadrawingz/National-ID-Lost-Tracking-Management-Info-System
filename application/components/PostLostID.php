        <!-- INSIDE ABOVE ROW -->
          <div class="col-lg-12">
            <h4 style="margin-left: 10px;">Ads all information of ID you lost</h4>
            <div class="form-panel">

              <?php
              // Release a shit
              if(isset($_POST['submit_found'])) {

                if($_POST['lost_date']=='') {
                  $lost_date= '';
                } else {
                  $lost_date= $_POST['lost_date'];
                }

                echo '<div class="bg-primary text-white warning-box">';
                echo $id_query->postLostID(
                  $_POST['id_names'], 
                  $_POST['id_number'],
                  $_POST['id_dob'],
                  $_POST['id_sex'],
                  $_POST['issued_dist'],
                  $_POST['issued_sect'],
                  $_FILES['id_image'],
                  $_POST['m_from'],
                  $_POST['m_to'],
                  $lost_date,
                  $_POST['reward'],
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
                    <input type="number" name="id_number" class="form-control" placeholder="16 numbers" required/>
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

                <p class="c-centered-title">
                  <b class="text-primary">Additional details</b>
                </p>
                <!-------------------------- Another side ---------------------------->
            

                <div class="form-group">
                  <label class="control-label col-md-6">
                    From - To / Aho yaburiye (aho wavaga - aho wajyaga)
                  </label>
                  <div class="col-md-6">
                    <div class="input-group input-large">
                      <input type="text" class="form-control" name="m_from" placeholder="From..." required/>
                      <span class="input-group-addon">-</span>
                      <input type="text" class="form-control" name="m_to" placeholder="To..." required/>
                    </div>
                    <span class="help-block text-primary">Where were U coming from to when missing it?</span>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Date it lost(Optional)</b> / Itariki yaburiyeho</label>
                  <div class="col-md-6">
                    <input size="16" type="date" placeholder="Select date" name="lost_date" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-6"><b>Reward money in frws</b> / Ibihembo biteganyijwe</label>
                  <div class="col-md-6">
                    <input type="number" name="reward" class="form-control" value="5000" required/>
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