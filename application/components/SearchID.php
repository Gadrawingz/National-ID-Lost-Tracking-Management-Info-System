        <!-- row -->
        <!--ADVANCED FILE INPUT-->
        <div class="row">
          <div class="col-lg-12">
            <h3 style="margin-left: 10px;">Search for ID online (in Lost IDs)</h4>
            <div class="form-panel">
              <?php
              if(isset($_POST['search_in_lost'])) {
                 echo "<script>window.location='../res_lost/".$_POST['key_id']."'</script>";
              }
              ?>
              <form method="POST" class="form-horizontal style-form">
                <div class="form-group">
                  <label class="control-label col-md-5"><b>Find ID Card By ID Names</b></label>
                  <div class="col-md-4">
                    <input type="text" name="key_id" class="form-control" placeholder="Someone..."/>
                  </div>

                  <div class="col-md-3">
                    <button type="submit" class="btn btn-md btn-theme03" name="search_in_lost">Search</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div><br><hr><br>

        <div class="row">
          <div class="col-lg-12">
            <h4 style="margin-left: 10px;">Search for ID online (in Found IDs)</h4>
            <div class="form-panel">
              <?php
              if(isset($_POST['search_in_found'])) {
                 echo "<script>window.location='../res_found/".$_POST['key_id']."'</script>";
              }
              ?>
              <form method="POST" class="form-horizontal style-form">
                <div class="form-group">
                  <label class="control-label col-md-5"><b>Find ID Card By ID Names</b></label>
                  <div class="col-md-4">
                    <input type="text" name="key_id" class="form-control" placeholder="Someone..."/>
                  </div>
                  <div class="col-md-3">
                    <button type="submit" class="btn btn-md btn-theme03" name="search_in_found">Search</button>
                  </div>
                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- row -->