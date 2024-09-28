<?php require_once('header1.php'); ?>

<?php
// Check if the customer is logged in or not

?>
<!DOCTYPE html>
<html lang="en">

<head>
</head>
<body >
<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
            <div class="col-md-12">
                <div class="user-content">
                    <center><h3><font color="black">REQUESTED MATERIALS</font></h3></center>
<a href="../index.php"><button class="btn btn-danger btn-round">Back</button></a><br><br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                <th><?php echo '#' ?></th>
                                    <th ><font color="black">Technician</font></th>
                                    <th><font color="black">Material Name</font></th></th>
                                    <th><font color="black">Quantity</font></th></th>
                                    <th><font color="black">Description</font></th></th>
                                    <th><font color="black">Status</font></th></th>
                                    <th><font color="black">ACTION</font></th>
                                </tr>
                            </thead>
                            <tbody>


            <?php
            /* ===================== Pagination Code Starts ================== */
            $adjacents = 5;

            $statement = $pdo->prepare("SELECT * FROM requests_material ");
            $statement->execute();
            $total_pages = $statement->rowCount();

            $targetpage = BASE_URL.'customer-order.php';
            $limit = 10;
            $page = @$_GET['page'];
            if($page) 
                $start = ($page - 1) * $limit;
            else
                $start = 0;
            
            
            $statement = $pdo->prepare("SELECT * FROM requests_material  ");
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
           
            
            if ($page == 0) $page = 1;
            $prev = $page - 1;
            $next = $page + 1;
            $lastpage = ceil($total_pages/$limit);
            $lpm1 = $lastpage - 1;   
            $pagination = "";
            if($lastpage > 1)
            {   
                $pagination .= "<div class=\"pagination\">";
                if ($page > 1) 
                    $pagination.= "<a href=\"$targetpage?page=$prev\">&#171; previous</a>";
                else
                    $pagination.= "<span class=\"disabled\">&#171; previous</span>";    
                if ($lastpage < 7 + ($adjacents * 2))
                {   
                    for ($counter = 1; $counter <= $lastpage; $counter++)
                    {
                        if ($counter == $page)
                            $pagination.= "<span class=\"current\">$counter</span>";
                        else
                            $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                    }
                }
                elseif($lastpage > 5 + ($adjacents * 2))
                {
                    if($page < 1 + ($adjacents * 2))        
                    {
                        for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                        }
                        $pagination.= "...";
                        $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                        $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
                    }
                    elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
                    {
                        $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                        $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                        $pagination.= "...";
                        for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                        }
                        $pagination.= "...";
                        $pagination.= "<a href=\"$targetpage?page=$lpm1\">$lpm1</a>";
                        $pagination.= "<a href=\"$targetpage?page=$lastpage\">$lastpage</a>";       
                    }
                    else
                    {
                        $pagination.= "<a href=\"$targetpage?page=1\">1</a>";
                        $pagination.= "<a href=\"$targetpage?page=2\">2</a>";
                        $pagination.= "...";
                        for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
                        {
                            if ($counter == $page)
                                $pagination.= "<span class=\"current\">$counter</span>";
                            else
                                $pagination.= "<a href=\"$targetpage?page=$counter\">$counter</a>";                 
                        }
                    }
                }
                if ($page < $counter - 1) 
                    $pagination.= "<a href=\"$targetpage?page=$next\">next &#187;</a>";
                else
                    $pagination.= "<span class=\"disabled\">next &#187;</span>";
                $pagination.= "</div>\n";       
            } 
            /* ===================== Pagination Code Ends ================== */
            ?>

                                <?php
                                $tip = $page*10-10;
                                foreach ($result as $row) {
                                    $tip++;
                                    ?>
                                    <tr>
                                        <td><?php echo $tip; ?></td>
                                        <td><?php echo $row['tech']; ?>
                                       </td>
                                        <td><?php echo $row['varietyName']; ?>
                                       </td>
                                       <td>
                                       <?php echo $row['quantity']; ?> Pcs<br>
                                        </td>
                                        <td>
                                       <?php echo $row['remark']; ?> <br>
                                        </td>
                                        <td>                                          
                                        <?php echo $row['status']; ?>
                                        </td>
                                       
                        <td>
                            <?php
                                if($row['status']=='Pending'){
                                    
                                    ?>   <a href="update2.php?varietyName=<?php echo $row['varietyName']; ?>&task=Released" class="btn btn-success btn-md">Release</a>
                                    <?php
                                }
                            ?>
                        </td>
                                    </tr>
                                    <?php
                                } 
                                ?>  
                                                             
                            </tbody>
                        </table>
                        
                        <?php require_once('footer.php'); ?>
                    </div>
        
  </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('footer.php'); ?>
                            </body>
</html>