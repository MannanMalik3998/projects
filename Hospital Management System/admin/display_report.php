<?php 
session_start();
if (!isset($_SESSION['admin']))
{
?>
    <script type="text/javascript">
    window.location="login.php";
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
                        <h3>Patient Report</h3>
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
                                <h2>Patient Report</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                               <form name="form1" action="" method="post">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <select name="name" class="form-control">
                                                    <?php
                                                    $res=mysqli_query($DB,"select name from patient");
                                                    while($row=mysqli_fetch_array($res)){
                                                        echo "<option>";
                                                        echo $row["name"];
                                                        echo "</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                                <td>
                                                    <input  name="submit1"  class="form-control" type="submit" placeholder="Display Report">
                                                </td>
                                        </tr>
                                    </table>
                                </form>

                                <?php 

                              

                                if(isset($_POST["submit1"]))
                                { 
                                    $res=mysqli_query($DB,"select * from patientreport where pid='$_POST[name]'");
                                    echo "<table class='table table-bordered'>";
                                        echo "<tr>";
                                        echo "<th>"; echo "Doctor Name"; echo "</th>";
                                        echo "<th>"; echo "Patient Name"; echo "</th>";
                                        echo "<th>"; echo "Report"; echo "</th>";
                                        echo "</tr>";
                                    while($row=mysqli_fetch_array($res)){
                                        echo "<tr>";
                                        echo "<td>"; echo $row["did"]; echo "</td>";
                                        echo "<td>"; echo $row["pid"]; echo "</td>";
                                        echo "<td>"; echo $row["Report"]; echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                            }
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
