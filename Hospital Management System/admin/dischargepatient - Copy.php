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
include "connection.php";
include "header.php";

 ?>

        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3>Discharge Patient</h3>
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
                                <h2>Discharge</h2>

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
                                                    <input  name="submit1"  class="form-control" type="submit" placeholder="Discharge">
                                                </td>
                                        </tr>
                                    </table>
                                </form>
                                <?php
                                if(isset($_POST["submit1"]))
                                {   
                                  

                                    $rom="";
                                    $adate="";
                                    $res=mysqli_query($DB,"select * from patient where name='$_POST[name]'");
                                    while($row=mysqli_fetch_array($res)){
                                        $rom = $row["rid"];
                                    }

                               
                                  

                                    $chrg="";
                                    $res=mysqli_query($DB,"select * from room where type='$rom'");
                                    while($row=mysqli_fetch_array($res)){
                                        $chrg = $row["charges"];
                                    }

                                    ?><strong>Charge:   </strong><?php
                                    echo $chrg;
                                   
                                    mysqli_query($DB,"delete from patient where name='$_POST[name]'");
                                  

                                    
                                    mysqli_query($DB,"update room set available_qty= available_qty+1 where type = '$rom'");

                                         
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

        