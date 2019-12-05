<?php 
session_start();
if (!isset($_SESSION['admin']))
{
    ?>
    <script type="text/javascript">
                    window.location = "login.php";
                </script>
    <?php
}
include "header.php";
include "connection.php";
 ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Room Info</h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Room Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post">
                                    <input type="text" name="t1" class="form_control" placeholder="Enter Room type">
                                    <br>
                                    <input type="submit" name="submit1" value="Search Room Avaliability" class="btn btn-default" >
                                    <br>
                                    <input type="submit" name="submit2" value="Display all Rooms" class="btn btn-default" >
                                    
                                </form>
                                 <?php 
                                 if(isset($_POST["submit1"]))
        { 
                                $res = mysqli_query($DB,"select * from room where type like('$_POST[t1]')");
                                echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "Type"; echo "</th>";
                                    echo "<th>"; echo "Charges"; echo "</th>";
                                    echo "<th>"; echo "Quantity"; echo "</th>";
                                    echo "<th>"; echo "Avaliable Quantity"; echo "</th>";
                                    echo "<th>"; echo "Delete Room"; echo "</th>";
                                    
                                    echo "</tr>";
                                while($row=mysqli_fetch_array($res)){
                                    echo "<tr>";
                                    echo "<td>"; echo $row["type"]; echo "</td>";
                                    echo "<td>"; echo $row["charges"]; echo "</td>";
                                    echo "<td>"; echo $row["qty"]; echo "</td>";
                                    echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                     echo "<td>"; ?> <a href="delete_room.php?id=<?php echo $row["id"];?>">Delete Room</a><?php echo "</td>";
                                    echo "</tr>"; }
                                echo "</table>";
        }
        if(isset($_POST["submit2"])){
                                $res = mysqli_query($DB,"select * from room");
                                echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "Type"; echo "</th>";
                                    echo "<th>"; echo "Charges"; echo "</th>";
                                    echo "<th>"; echo "Quantity"; echo "</th>";
                                    echo "<th>"; echo "Avaliable Quantity"; echo "</th>";
                                    echo "<th>"; echo "Delete Room"; echo "</th>";
                                    
                                    
                                    echo "</tr>";
                                while($row=mysqli_fetch_array($res)){
                                    echo "<tr>";
                                     echo "<td>"; echo $row["type"]; echo "</td>";
                                    echo "<td>"; echo $row["charges"]; echo "</td>";
                                    echo "<td>"; echo $row["qty"]; echo "</td>";
                                    echo "<td>"; echo $row["available_qty"]; echo "</td>";
                                     echo "<td>"; ?> <a href="delete_room.php?id=<?php echo $row["id"];?>">Delete Room</a><?php echo "</td>";
                                    echo "</tr>"; }
                                    echo "</tr>";
                                }
                                echo "</table>";
                
                                ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
<?php 
include "footer.php";
 ?>

        