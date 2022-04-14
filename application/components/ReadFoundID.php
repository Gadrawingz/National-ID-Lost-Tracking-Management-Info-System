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
                      <span class="btn btn-warning c-bolder">Not Received</span>
                      <span class="text-muted">
                        &bull; <?php echo $fun->dateToReadableFormat($result['action_date']); ?>
                      </span>
                    </h4>
                    
                  </div>
                  <div class="row" style="color: black!important;">
                    <div class="col-md-6 centered hidden-sm hidden-xs">
                      <img src="../uploads/<?php echo $result['nid_image']; ?>" class="img-rounded" width="140"><br><br>
                      <p>
                        <b>
                          Found at 
                          <span class="text-primary"><?php echo $result['found_location']; ?></span>
                        </b>
                      </p>
                      <p>
                        <b>
                          Found by: 
                          <span class="text-primary"><?php echo $result['finder_fn']." ".$result['finder_ln']; ?></span>
                        </b>
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p class="text-primary">
                        ID Finder Tel: <b><u><?php echo $result['finder_contact']; ?></u></b>
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