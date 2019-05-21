<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "/admin/functions.php"; ?>



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
    <div class="container">
    
   <section id="section-book">
          <div class="book">
            <div class="conatiner text-center">
               <div class="row">
                   <div class="col-md-4 contact-me">
                    <h2 class="heading-secondary">
                        Register Here
                    </h2>
                     <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                    <div class="form_group">
                    <input type="text" class="form_input" placeholder="Full name" id="username" placeholder="Enter Desired Username" required>
                    </div>
                                 
                    <div class="form_group">
                     <input type="email" class="form_input" placeholder="Email address" id="email" placeholder="somebody@example.com">
                    </div>
                   
                    <div class="form_group">
                    <input type="email" class="form_input" placeholder="Contact number"  id="key" required placeholder="Your message here...">
                    </div>
                     <div class="form_group">
                        <input type="submit" name="submit" id="btn-login" class="btn btn-primary" value="Send Email">
                     </div>
                </form>
             </div>
           </div>
          </div>
        </div>
       </section>















<?php include "includes/footer.php";?>
