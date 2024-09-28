<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Allwin</title>
    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- MetisMenu CSS -->
    <link href="vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/sb-admin-2.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../icofont/icofont.min.css">
</head>

<body style="background-color: #1A4606">
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <center>
                        <h2 class="page-header">UNIT PRICE</h2>
                    </center>
                    <button><a href="ptenders.php">Back</a></button>
                </div><br>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php
                                    include 'dbconnect.php';
                                    $id = $_GET['id'];
                                    $qry = "SELECT * FROM requests WHERE id='$id'";
                                    $result = mysqli_query($conn, $qry);
                                    while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <form role="form" action="submit.php" method="post" onsubmit="return validateForm()">
                                        <label>Selling Price</label>
                                            <input type="text" name="id" id="price" readonly value="<?php echo $row['price']; ?>">
                                            <input class="form-control" type="hidden" readonly name="status" value='Approved' required><br><br>
                                            <div class="form-group">
                                                <label>Price Per Piece (Ksh)</label>
                                                <input name="charges" id="charges" class="form-control" type="number" required>
                                            </div>
                                            <hr>
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </form>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Metis Menu Plugin JavaScript -->
    <script src="vendor/metisMenu/metisMenu.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="dist/js/sb-admin-2.js"></script>
    <script>
        function validateForm() {
            var price = parseFloat(document.getElementById('price').value);
            var charges = parseFloat(document.getElementById('charges').value);

            if (charges > price) {
                alert("Please enter a lower amount than the Selling price.");
                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>
    <style>
        footer {
            background-color: #424558;
            bottom: 0;
            left: 0;
            right: 0;
            height: 35px;
            text-align: center;
            color: #CCC;
        }

        footer p {
            padding: 10.5px;
            margin: 0px;
            line-height: 100%;
        }
    </style>
</body>

</html>
