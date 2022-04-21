              <!-- IDs WHICH WERE FOUND:COMPONENT -->

              <div class="col-md-12 mb">
                
                <h4>All National IDs were found</h4>  
                
                <?php
                $num = 1;
                $stmt= $id_query->viewAllFoundIDs();
                while ($result= $stmt->FETCH(PDO::FETCH_ASSOC)) {
                ?>

                <div class="message-p pn">
                  <div class="message-header">
                    <h4 class="text-success">
                      ID: <?php echo $result['national_id']; ?> 

                      <?php if($result['has_reward']=='0') { ?>
                      <span class="c-danger">Not Verified</span>
                      <?php } else { ?>
                      <span class="c-success">Verified</span>
                      <?php } ?>


                      <?php if(isset($_SESSION['ps_id'])) { 
                        if($result['has_reward']==0) {
                      ?>
                       • <a class="btn btn-primary btn-sm" href="../verify/<?php echo $result['national_id']; ?>">Verify ID <i class="fa fa-check-square"></i></a>
                      <?php } else { ?>
                        • <a class="btn btn-danger btn-sm" href="../cancel/<?php echo $result['national_id']; ?>">Cancel <i class="fa fa-times-circle"></i></a>
                      <?php } }?>

                      <span class="text-muted">
                        • <?php echo $fun->dateToReadableFormat($result['action_date']); ?>
                      </span>
                    </h4>
                    
                  </div>
                  <div class="row" style="color: black!important;">
                    <div class="col-md-6 centered hidden-sm hidden-xs">
                      <img src="../uploads/<?php echo $result['nid_image']; ?>" class="img-rounded" width="140"><br><br>
                      <p>
                        <b>
                          Found by: 
                          <span class="text-primary"><?php echo $result['account_names']; ?></span>
                        </b>
                      </p>
                      <p>
                        <i>
                          Contact Number:
                          <span class="text-primary">
                            <?php echo $result['account_tel']?>
                          </span>
                        </i>
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p>
                        <b>
                          Found at (in) 
                          <span class="text-primary"><?php echo $result['found_location']; ?></span>
                        </b>
                      </p>
                      <p class="text-primary">
                        Did he declare his issue to police? <b>Yes</b>
                      </p>

                      <p class="c-bordered-top-p6"><b>ID Number: </b>
                        <?php echo $result['national_id']; ?>
                      </p>
                      <p><b>Sex:</b> <?php echo $result['nid_sex']; ?></p>
                      <p>
                        <b>Place of Issue:</b>
                        <?php echo $result['issued_dist']." / ".$result['issued_sect']; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <?php } ?>



              </div>
              <!-- /col-md-8  -->