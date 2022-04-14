
          <div class="col-lg-3 ds">
            <!-- RECENT ACTIVITIES SECTION -->
            <h4 class="centered mt">RECENT LOST NATIONAL IDs</h4>
            
            <?php
            $num = 1;
            $stmt= $id_query->viewRecentLostIDs();
            while ($result= $stmt->FETCH(PDO::FETCH_ASSOC)) {
            ?>

            <!-- First Activity -->
            <div class="desc">
              <div class="thumb">
                <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
              </div>
              <div class="details">
                <p style="font-size: 15px!important;">
                  <muted><?php echo $fun->dateToReadableFormat($result['action_date']); ?></muted>
                  <br/>
                  <a href="#" style="color: blue;">
                    <?php echo $result['nid_names']; ?>
                  </a> lost ID card<br/>
                </p>
              </div>
            </div>
            <?php } ?>
            