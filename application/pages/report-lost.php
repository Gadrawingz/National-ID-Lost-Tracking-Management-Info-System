      <?php
      /************************************************************
       * CODING HAND:@gadrawingz/@donnekt : https://www.donnekt.com
       * **********************************************************/
      ?>
          <!-- Inside row defined above all of the app power @donnekt -->
          <div class="col-lg-9">
            <div class="content-panel">
              <div id="report_id">
              <table class="table table-striped table-advance table-hover">
                <p>
                  <button type="button" class="btn btn-primary btn-lg">
                    <?php echo $id_query->countAllLostIDs(); ?> ID(s)
                  </button>
                  <span class="btn btn-default btn-lg">Report of most recent lost declared ID cards</span>
                </p>
                <thead>
                  <tr>
                    <th>No</th>
                    <th class="numeric"><i class="fa fa-male"></i> ID Names</th>
                    <th class="numeric"><i class="fa fa-credit-card"></i> ID Number</th>
                    <th class="numeric"><i class="fa fa-location-arrow"></i> Place of Issue</th>
                    <th class="numeric"><i class="fa fa-minus"></i> Lost Place</th>
                    <th class="numeric"><i class="fa fa-check"></i> Status</th>
                    <th class="numeric"><i class="fa fa-calendar"></i> Declared date</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $num = 1;
                  $stmt= $id_query->viewAllMergedLostIDs();
                  while($result= $stmt->FETCH(PDO::FETCH_ASSOC)) {
                ?>
                  <tr>
                    <td class="numeric"><?php echo $num; ?></a></td>
                    <td class="numeric"><?php echo $result['nid_names']; ?></a></td>
                    <td class="numeric"><?php echo $result['national_id']; ?></td>
                    <td class="numeric"><?php echo $result['issued_dist']." / ".$result['issued_sect']; ?></td>
                    <td class="numeric"><?php echo $result['lost_from']." - ".$result['lost_to']; ?></td>
                    <td class="text-center">
                      <span class="label label-<?php echo $result['is_found']=='1' ? "info":"danger"; ?> label-mini">
                        <?php echo $result['is_found']=='1' ? "Found": "Not Found"; ?> 
                      </span>
                    </td>
                    <td class="numeric"><?php echo $result['action_date']; ?></td>
                  </tr>
                <?php $num++; } ?>
         
                </tbody>
              </table>
              </div>
              <a href="#" onclick="printReport()" class="btn btn-md btn-success btn-rounded btn-fw">Print Report</a>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->