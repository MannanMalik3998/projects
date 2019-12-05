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
                        <h3>Update Doctor</h3>
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
                                <h2>Update Doctor</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">

                                <form name="form1" action="" method="post" class="col-lg-6">
                                <table class="table table-bordered">


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
                                        <td><input type="text" class="form-control" placeholder="Fees" required="" name="fees"></td>
                                    </tr>
                                
                                
                                    
                                    <tr>
                                       <td> <input class="btn btn-default submit " type="submit" name="submit11" value="Update Fees" class="btn btn-default submit"></td>
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
            mysqli_query($DB,"update doctor set fees='$_POST[fees]' where username='$_POST[did]'");
             
           
        }

             ?>
<?php 
include "footer.php";
 ?>

        