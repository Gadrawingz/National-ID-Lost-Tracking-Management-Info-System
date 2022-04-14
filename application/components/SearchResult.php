              <!-- IDs WHICH WERE FOUND:COMPONENT -->

              <div class="col-md-12 mb">

                <?php
                if(isset($_GET['side']) && $_GET['side']=='lost') {
                ?>
                <h3>
                  "<?php echo $id_query->countResultInLostIDs($_GET['key_id']); ?>"
                  results in found during search...
                </h3>
                
                <?php
                $num = 1;
                $stmt= $id_query->searchResultInLostIDs($_GET['key_id']);
                while ($result= $stmt->FETCH(PDO::FETCH_ASSOC)) {
                ?>

                <div class="message-p pn">
                  <div class="message-header" style="border: 1px solid #ABC; border-radius: 4px; padding: 3px!important;">
                    <h3 class="text-primary">
                      <span class="btn btn-danger">LOST ID</span> : <?php echo $result['nid_number']; ?>
                    </h3>
                  </div>

                  <div class="row" style="color: black!important;">
                    <div class="col-md-6 centered hidden-sm hidden-xs">
                      <img src="../uploads/<?php echo $result['nid_image']; ?>" class="img-rounded" width="140"><br><br>
                      <p>
                        <b>
                          Lost from 
                          <span class="text-primary"><?php echo $result['lost_from']." (to) ".$result['lost_to']; ?></span>
                        </b>
                      </p>
                    </div>
                    <div class="col-md-6">
                      <p class="text-primary">
                        Did he declare his issue to police? <b>Yes</b>
                      </p>

                      <p class="c-bordered-top-p6"><b>Names: </b>
                        <?php echo $result['nid_names']; ?>
                      </p>

                      <p><b>ID Number: </b>
                        <?php echo $result['nid_number']; ?>
                      </p>

                      <p><b>Sex:</b> <?php echo $result['nid_sex']; ?></p>
                      <p>
                        <b>Place of Issue:</b>
                        <?php echo $result['issued_dist']." / ".$result['issued_sect']; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <?php } 



                // Side: Search results from FOUND IDs
                } if(isset($_GET['side']) && $_GET['side']=='found') {
                ?>
                <h3>
                  "<?php echo $id_query->countResultInFoundIDs($_GET['key_id']); ?>"
                  results in found during search...
                </h3>
                <?php
                $num = 1;
                $stmt= $id_query->searchResultInFoundIDs($_GET['key_id']);
                while ($result= $stmt->FETCH(PDO::FETCH_ASSOC)) {
                ?>

                <div class="message-p pn">
                  <div class="message-header" style="border: 1px solid #ABC; border-radius: 4px; padding: 3px!important;">
                    <h3 class="text-primary">
                      <span class="btn btn-success">FOUND ID</span> : <?php echo $result['nid_number']; ?>
                    </h3>
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
                    </div>
                    <div class="col-md-6">
                      <p class="text-primary">
                        Did he declare his issue to police? <b>Yes</b>
                      </p>

                      <p class="c-bordered-top-p6"><b>Names: </b>
                        <?php echo $result['nid_names']; ?>
                      </p>

                      <p><b>ID Number: </b>
                        <?php echo $result['nid_number']; ?>
                      </p>

                      <p><b>Sex:</b> <?php echo $result['nid_sex']; ?></p>
                      <p>
                        <b>Place of Issue:</b>
                        <?php echo $result['issued_dist']." / ".$result['issued_sect']; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <?php }
              } 
              ?>

              </div>
              <!-- /col-md-8  -->