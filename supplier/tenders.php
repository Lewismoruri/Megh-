<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
Allwin   </title>
    <!-- <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" /> -->
    <?php
    include 'links.php'
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Custom Theme files -->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- Custom Theme files -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <meta name="keywords" content="Tender Responsive web template, Bootstrap Web Templates, Flat Web Templates, AndriodCompatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <!--Google Fonts-->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event) {
                event.preventDefault();
                $("html,body").animate({
                        scrollTop: $(this.hash).offset().top
                    },
                    1000
                );
            });
        });
    </script>
    <!-- //end-smoth-scrolling -->
</head>

<body>
    <!--top nav start here-->
    <div class="mother-grid" >
        
        <div class="container">
            <div class="temp-padd">
                <!--top nav end here-->
                <!--title start here-->
                <div class="title-main">
                    <a href="index.php">
                        <h4>SUPPLY REQUEST</h4>
                    </a>
                </div>
                <!--title end here-->
                <!--header start here-->
                <div class="header mb-4">
                    <div class="navg">
                        <span class="menu"> <img src="images/icon.png" alt="" /></span>
                        <button><a href="index.php?dashboard">Back</a></button><br>
                        <script>
                            $("span.menu").click(function() {
                                $("ul.res").slideToggle("slow", function() {
                                    // Animation complete.
                                });
                            });
                        </script>
                    <br>
                <!--header end here-->

                <h4 class="heading-4 text-center mb-4 text-white bg-primary">REQUESTS</h4>
                <?php
                require 'dbh.inc.php';

                $sql = "SELECT * FROM requests WHERE status= 'Active' and supplier = '".$_SESSION['EMAIL']."' ORDER BY date_created desc";
                $query = mysqli_query($conn, $sql);
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                        <thead class="thead-light">
                            <tr>
                               
                                <th>VARIETY NAME </th>
                                <th>Quantity (KGs)</th>
                                <th>Required By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($query) > 0) {
                                while ($row = mysqli_fetch_assoc($query)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['varietyName'] ?></td>                                       
                                        <td><?php echo $row['quantity'] ?></td>
                                        <td><?php echo $row['DueDate'] ?></td>
                                        <td>
                                        <?php
                                if($row['status']=='Active'){
                                    ?>
                                    <a href="acceptorder.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm" style="width:100%;margin-bottom:4px;">Accept</a>
                                    <a href="declineorder.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" style="width:100%;margin-bottom:4px;">Reject</a>
                                   
                                    <?php
                                }
                            ?>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class="mb-8"></div>
            </div>
        </div>
    </div>
</body>

</html>