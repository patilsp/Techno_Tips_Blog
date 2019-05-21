<?php include "includes/header.php" ?>

  <div id="wrapper">
   
   <?php include "includes/navigation.php" ?>
   
    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

       <?php include "includes/topbar.php" ?>

        <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                        </h1>
                        <?php
                            // Displaying pages based on condition
                            if (isset($_GET['source'])) 
                            {
                                $source = $_GET['source'];
                            }
                            else
                            {
                                $source = "";
                            }

                            switch ($source) {
                                case 'add_post':
                                    include("includes/add_post.php");
                                    break;
                                
                                case 'edit_post':
                                    include("includes/edit_post.php");
                                    break;
                                
                                default:
                                    include("includes/view_all_posts.php");
                                    break;
                            }

                        ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include("includes/footer.php"); ?>
