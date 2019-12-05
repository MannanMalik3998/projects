<?php 
session_start();
if (!isset($_SESSION['doctor']))
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
                        <h3>Generate Report</h3>
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
                                <h2>Generate Report</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <FORM name="form1" action="" method="post" class="col-lg-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                            <select class="form-control selectpicker" name="pid">
                                            <?php
                                            $res = mysqli_query($DB,"select * from patient where did = '$_SESSION[doctor]'");
                                            // $res=mysqli_query($DB,"select name from patient"); 
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row["name"];
                                                echo "</option>";
                                            }
                                             ?>
                                            }
                                        </select>
                                    </td>
                                        </tr>
                                       
                                            <td>
                                                <textarea name="msg" class="form-control" placeholder="Report"></textarea>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <input type="submit" name="submit1" value="Generate Report">
                                            </td>
                                        </tr>
                                    </table>
                                </FORM>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            if(isset($_POST["submit1"]))
            {
                // echo "$_Session[doctor]";
                mysqli_query($DB,"insert into patientreport values('','$_SESSION[doctor]','$_POST[pid]','$_POST[msg]')");
                ?>
                <script type="text/javascript">
                    alert("Report Generated Successfully");
                </script>
                <?php
            }
        ?>
<?php 
include "footer.php";
 ?>

        