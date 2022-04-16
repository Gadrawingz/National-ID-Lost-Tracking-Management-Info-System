      <?php
      /************************************
       *:: CODING HAND:@gadrawingz/@donnekt
       ************************************/
      ?>
      
          <!-- Inside row defined above all of the app power @donnekt -->
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <div class="border-head">
              <h3>DASHBOARD</h3>
            </div>

            <div class="row">
              <!-- col-md-4 -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>LOST ID CARDS</h5>
                  </div>
                  <canvas id="serverstatus01" height="120" width="120"></canvas>
                  <script>
                    var doughnutData = [{
                        value: 70,
                        color: "#CC3B9B"
                      },
                      {
                        value: 30,
                        color: "#DEFFBB"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
                  </script>
                  <h3><?php echo $id_query->countAllLostIDs(); ?> ID(s)</h3>
                </div>
              </div>

              <div class="col-md-4 mb">
                <!-- WHITE PANEL - TOP USER -->
                <div class="white-panel pn">
                  <div class="white-header">
                    <h5>More statistics</h5>
                  </div><hr>
                  <div class="row">
                    <?php if(isset($_SESSION['admin_id'])) { ?>
                    <div class="col-md-12">
                      <p class="mt c-bolder">Total police stations</p>
                      <p><h1>(<?php echo $police->countPoliceStations(); ?>)</h1></p>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <!-- col-md-4 -->
              <div class="col-md-4 col-sm-4 mb">
                <div class="green-panel pn">
                  <div class="green-header">
                    <h5>FOUND ID CARDS</h5>
                  </div>
                  <canvas id="serverstatus02" height="120" width="120"></canvas>
                  <script>
                    var secondData = [{
                        value: 70,
                        color: "#EECCBB"
                      },
                      {
                        value: 30,
                        color: "#CCA666"
                      }
                    ];
                    var myDoughnut = new Chart(document.getElementById("serverstatus02").getContext("2d")).Doughnut(secondData);
                  </script>
                  <h3><?php echo $id_query->countAllFoundIDs(); ?> ID(s)</h3>
                </div>
              </div>
            </div>
          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->
