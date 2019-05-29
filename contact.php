<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<div class="bg-gradient-primary">
 <?php
 
 if(isset($_POST['submit']))
 {
    $to      = "robinkartik@yahoo.com";
    $header  = mysqli_real_escape_string($connection, trim($_POST['email']));
    $subject = mysqli_real_escape_string($connection, trim(wordwrap($_POST['subject'], 70)));
    $body    = mysqli_real_escape_string($connection, trim($_POST['body']));

    mail($to, $subject, $body, "From: " . $header);

    echo "Your email has been sent. :)";
   
 }
  ?>
    <?php  include "includes/navigation.php"; ?>
    <div class="container">
       <section id="section-book">
          <div class="book">
            <div class="conatiner text-center">
               <div class="row">
                   <div class="col-md-4 contact-me">
                    <h2 class="heading-secondary">
                        Contact me
                    </h2>
                     <form role="form" action="" method="post" id="login-form" autocomplete="off">
                    <div class="form_group">
                    <input type="text" class="form_input" placeholder="Full name" id="name" required>
                    </div>
                                 
                    <div class="form_group">
                     <input type="email" class="form_input" placeholder="Email address" id="email" placeholder="somebody@example.com">
                    </div>
                     <div class="form_group">
                    <input type="text" class="form_input" placeholder="Subject" id="name" required>
                    </div>
                    <div class="form_group">
                    <input type="email" class="form_input" placeholder="Contact number" id="body" required placeholder="Your message here...">
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
</div>