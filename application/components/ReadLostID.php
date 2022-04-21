              <!-- IDs WHICH WERE FOUND:COMPONENT -->

              <div class="col-md-12 mb">
                
                <h4>All National IDs were lost by different people</h4>  
                
                <?php
                $num = 1;
                $stmt= $id_query->viewAllLostIDs();
                while ($result= $stmt->FETCH(PDO::FETCH_ASSOC)) {
                ?>

                <div class="message-p pn">
                  <div class="message-header">
                    <h3 class="text-primary">
                      ID: <?php echo $result['national_id']; ?> 
                      <span class="c-danger">Not found yet</span>
                    </h3>
                  </div>
                  <div class="row" style="color: black!important;">
                    <div class="col-md-6 centered hidden-sm hidden-xs">
                      <img src="../uploads/<?php echo $result['nid_image']; ?>" class="img-rounded" width="140">
                      <p>
                        <i>Lost from 
                          <strong><?php echo $result['lost_from']." - ".$result['lost_to']; ?></strong> 
                        </i>
                      </p>
                      <p>
                        Rewards: 
                          <strong><?php echo "<u>".$result['reward']."</u> rwfs."; ?></strong>
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p>
                        <name class="text-primary"><?php echo $result['nid_names']; ?></name>
                        lost an ID Card with the following info:
                      </p>
                      <p class="small"><?php echo $fun->dateToReadableFormat($result['action_date']); ?></p>

                      <p class="c-bordered-top"><strong>ID Number: </strong>
                        <?php echo $result['national_id']; ?>
                      </p>
                      <p><strong>Sex:</strong> <?php echo $result['nid_sex']; ?></p>
                      <p>
                        <strong>Place of Issue:</strong>
                        <?php echo $result['issued_dist']." / ".$result['issued_sect']; ?>
                      </p>

                      <p class="c-bordered-top">
                        <span style="color: blue">
                          <strong>Contact Info:</strong> <?php echo $result['account_tel']." (".$result['account_names'].")"; ?>
                        </span>
                      </p>
                    </div>
                  </div>
                </div>
                <?php } ?>



              </div>
              <!-- /col-md-8  -->