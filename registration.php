<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "/admin/functions.php"; ?>

<div class="bg-gradient-primary">

 <?php
 
 if(isset($_POST['submit']))
 {
    $username       = mysqli_real_escape_string($connection, trim($_POST['username']));
    $email          = mysqli_real_escape_string($connection, trim($_POST['email']));
    $password       = mysqli_real_escape_string($connection, trim($_POST['password']));

    if(username_exists($username))
    {
        echo "<h2 class='text-center text-danger'>User with this username already exists, try different username instead</h2>";
    }
    else
    {
        if(!empty($username) && !empty($email) && !empty($password))
        {
            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));
    
            
    
            $query = "INSERT INTO users (username, password, user_email, user_role) VALUES('$username', '$password', '$email', 'Subscriber')";
            $user_registration_query = mysqli_query($connection, $query);
    
            if(!$user_registration_query)
            {
                die("Query failed " . mysqli_error($connection));
            }
            else
            {
                echo "<h2 class='text-center text-success'>Your registration has been submitted</h2>";
            }
        }
        else
        {
            echo "<script>alert('Fields cannot be empty')</script>";
        }
    }
 }
 
 
 ?>


    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container ">
  
     <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="heading-secondary">Create an Account!</h1>
              </div>
             
              <form class="user" role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user " id="exampleFirstName" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                  </div>
                </div>
             
              <input type="submit" name="submit" id="btn-login" class="btn btn-primary btn-user btn-block " value="Register Account">
                  

                <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.html">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <?php include "includes/footer.php";?>






</div>



