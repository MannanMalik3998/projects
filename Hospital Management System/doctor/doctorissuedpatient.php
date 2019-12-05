<?php
session_start(); 
// this is temp code
if (isset($_SESSION['doctor']))
{
   

include "connection.php";
include "header.php";
 ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>My Patients</h3>
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
                                <h2>My Patients</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <?php 
                                $res = mysqli_query($DB,"select * from patient where did = '$_SESSION[doctor]'");
                                echo "<table class='table table-bordered'>";
                                    echo "<tr>";
                                    echo "<th>"; echo "Name"; echo "</th>";
                                    echo "<th>"; echo "Age"; echo "</th>";
                                    echo "<th>"; echo "Email"; echo "</th>";
                                    echo "<th>"; echo "AdmitDate"; echo "</th>";
                                    echo "<th>"; echo "Room Assigned"; echo "</th>";
                                    echo "</tr>";
                                while($row=mysqli_fetch_array($res)){
                                    echo "<tr>";
                                    echo "<td>"; echo $row["name"]; echo "</td>";
                                    echo "<td>"; echo $row["age"]; echo "</td>";
                                    echo "<td>"; echo $row["email"]; echo "</td>";
                                    echo "<td>"; echo $row["admitdate"]; echo "</td>";
                                    echo "<td>"; echo $row["rid"]; echo "</td>";
                                    
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
 

        }
else
{?>
    <script type="text/javascript">
    window.location="login.php";
</script>
<?php
    // echo 'Sorry please login first before visiting this page!'; //also a redirect can be made here instead.
}
?>