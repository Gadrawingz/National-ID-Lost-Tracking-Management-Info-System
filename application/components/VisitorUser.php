        <!-- INSIDE ABOVE ROW -->
          <div class="col-lg-4 col-md-4 col-sm-4">
            <?php
            // Release a shit
            if(!isset($_GET['act'])){
              if(isset($_POST['login_v'])){
                $vlogin->visitorLogin($_POST['telephone'], $_POST['password']);
              }
            ?>
            <h3 class="title">Login for user(visitor)</h3>
            <form class="contact-form php-mail-form" role="form" method="POST" style="border: 5px solid #2874A6; padding: 4px; border-radius: 5px; padding-top: 20px;">
              <div class="form-group">
                <label>Telephone</label>
                <input type="name" name="telephone" class="form-control" placeholder="Your Telephone" required/>
                <div class="validate"></div>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Your Password" required/>
                <div class="validate"></div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-md btn-theme03" name="login_v">Login</button>
              </div>
            </form>
            <?php } ?>


            <?php if(isset($_GET['act']) && $_GET['act']=='reg'){
              if(isset($_POST['save'])) {
                echo '<div class="bg-primary text-white warning-box">';
                echo $id_query->registerVisitor(
                  $_POST['full_name'], 
                  $_POST['telephone'],
                  $_POST['password']
                );
                echo '</div>';
              }
            ?>
            <h3 class="title">User(visitor) Registration</h3>
            <form class="contact-form php-mail-form" role="form" method="POST" style="border: 5px solid #633974; padding: 4px; border-radius: 5px; padding-top: 20px;">

              <div class="form-group">
                <label>Names</label>
                <input type="name" name="full_name" class="form-control" placeholder="Your Full name" required/>
                <div class="validate"></div>
              </div>

              <div class="form-group">
                <label>Telephone</label>
                <input type="name" name="telephone" class="form-control" placeholder="Your Telephone" required/>
                <div class="validate"></div>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Your Password" required/>
                <div class="validate"></div>
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-md btn-theme03" name="save">Save</button>
                &nbsp;&nbsp;&nbsp;---------------<a href="../main/home" class="btn btn-md btn-secondary right">Back to Login</a>
              </div>
            </form>
            <?php } ?>
          </div>
          <!-- /col-lg-12 -->
      