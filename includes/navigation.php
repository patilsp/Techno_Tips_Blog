<nav id="navigation" class="navbar navbar-expand-lg  fixed-top d-flex justify-content-center">
<a class="navbar-brand" href="index.php">TECHNO<span>TIPS</span></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
<div class="navbar-nav ">
            <?php

                $query = "SELECT * FROM categories LIMIT 5";
                $result = mysqli_query($connection, $query);

                while($row = mysqli_fetch_array($result))
                {
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];

                    $category_class = '';

                    $registration_class = '';

                    $contact_class = '';

                    $pageName = basename($_SERVER['PHP_SELF']);

                    $registration = 'registration.php';

                    $contact = 'contact.php';

                    if(isset($_GET['category']) && $_GET['category'] == $cat_id)
                    {
                        $category_class = 'active';
                    }
                    elseif ($pageName == $registration) 
                    {
                        $registration_class = 'active';
                    }

                    elseif ($pageName == $contact) 
                    {
                        $contact_class = 'active';
                    }
            ?>
                <li class='<?php echo $category_class; ?>'>
                    <a href="category.php?category=<?php echo $cat_id; ?>"><?php echo $cat_title; ?></a>
                </li>
        <?php   }

        ?>



                <li>
                    <a href="admin">Admin</a>
                </li> 

                <?php

                    if(isset($_SESSION['user_role']))
                    {
                        if(isset($_GET['p_id']))
                        {
                            $the_post_id = $_GET['p_id'];
                            echo "<li>
                                    <a href='admin/posts.php?source=edit_post&p_id=$the_post_id'>Edit Post</a>
                                 </li>";
                        }
                    }

                ?>

                <li class='<?php echo $registration_class; ?>'>
                    <a href="registration.php">Registration</a>
                </li>
                <li class='<?php echo $contact_class; ?>'>
                    <a href="contact.php">Contact</a>
              </li>
   
            
   </div>    
 </div>
 
</nav>