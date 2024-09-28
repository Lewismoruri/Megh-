<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
       MAMBA MAIZE MILLERS
    </title>
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
    <div class="mother-grid">
        <div class="container">
            <div class="temp-padd">
                <!--top nav end here-->
                <!--title start here-->
                <div class="title-main">
                    <a href="index.html">
                        <h4>Tender Request(s)</h4>
                    </a>
                </div>
                <!--title end here-->
                <!--header start here-->
                <div class="header mb-4">
                    <div class="navg">
                        <span class="menu"> <img src="images/icon.png" alt="" /></span>
                        <button><a href="index.php?dashboard">Back</a></button><br><br>
                        <script>
                            $("span.menu").click(function() {
                                $("ul.res").slideToggle("slow", function() {
                                    // Animation complete.
                                });
                            });
                        </script>
                    </div>
                <!--header end here-->

                <h4 class="heading-4 text-center mb-2 text-white bg-primary"> Accepted Tender Record</h4>
                <?php
                require 'dbh.inc.php';

                $Orgid = $_SESSION['EMAIL'];
                $sql =  "SELECT * FROM requests WHERE  supplier = '".$_SESSION['EMAIL']."'and status='Approved' or status='Received' ORDER BY date_created desc";
              
                $query = mysqli_query($conn, $sql);
                ?>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                        <thead class="thead-light">
                            <tr>
                            <th>VARIETY NAME </th>
                             
                                <th>Quantity</th>
                                <th>Required By</th>
                               
                                <th>Status</th>
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
                                        <td><?php echo $row['status'] ?></td>
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