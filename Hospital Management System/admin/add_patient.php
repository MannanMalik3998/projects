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
                        <h3>Add Patient</h3>
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
                                <h2>Add Patient</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form name="form1" action="" method="post" class="col-lg-6">
                                <table class="table table-bordered">
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Name" required="" name="name"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="Age" required="" name="age"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="email" class="form-control" placeholder="Email" required="" name="email"></td>
                                    </tr>
                                   <!--  <tr>
                                        <td><input type="date" class="form-control" placeholder="Admit Date" required="" name="addate"></td>
                                    </tr> -->
                                   
                                
                                     
                                   
                                    
                                    <tr>
                                        <td>
                                            <select class="form-control selectpicker" name="did">
                                            <?php
                                            $res=mysqli_query($DB,"select username from doctor"); 
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row["username"];
                                                echo "</option>";
                                            }
                                             ?>
                                            }
                                        </select>
                                    </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <select class="form-control selectpicker" name="rid">
                                            <?php
                                            $res=mysqli_query($DB,"select type from room where available_qty>0"); 
                                            while($row=mysqli_fetch_array($res)){
                                                echo "<option>";
                                                echo $row["type"];
                                                echo "</option>";
                                            }
                                             ?>
                                            }
                                        </select>
                                    </td>
                                    </tr>
                                    
                                    <tr>
                                       <td> <input class="btn btn-default submit " type="submit" name="submit11" value="Add Patient" class="btn btn-default submit"></td>
                                    </tr>

                                </table>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <?php 
        if(isset($_POST["submit11"]))
        {  
            // session_start();
            
        $a = date("d-m-Y");
            mysqli_query($DB,"insert into patient values('','$_POST[name]','$_POST[age]','$_POST[email]','$a','$_POST[did]','$_POST[rid]')");
            mysqli_query($DB,"update room set available_qty=available_qty-1 where type='$_POST[rid]'");
             

            ?>
            <script type="text/javascript">
                alert("Patient Added");
                window.location="add_patient.php";
            </script>

            <?php


             }



             ?>
<?php 
include "footer.php";
 ?>

        