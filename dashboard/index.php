<?php
include "../unc.php";
if(isset($_GET['error']))
{
echo '<div id="error" style="
    bottom: 0;
    width: 100%;
    background-color: red;
    color: white;
    padding: 10px;
    font-weight: bold;
    text-align: center;
    position: absolute;
    z-index: 100;
">Please Fill all Informaton Properly to Add a Project</div>';
}
if(isset($_GET['save-project']) && $_GET['save-project']=='success')
{
echo '<div id="error" style="
    bottom: 0;
    width: 100%;
    background-color: green;
    color: white;
    padding: 10px;
    font-weight: bold;
    text-align: center;
    position: absolute;
    z-index: 100;
">Project Added Sucessfully.</div>';
}
if(isset($_GET['update-proj']) && $_GET['update-proj']=='success')
{
echo '<div id="error" style="
    bottom: 0;
    width: 100%;
    background-color: orange;
    color: white;
    padding: 10px;
    font-weight: bold;
    text-align: center;
    position: absolute;
    z-index: 100;
">Project Updated Sucessfully.</div>';
}
?>
<style>

</style>
<link rel="stylesheet" href="dp/default.css" type="text/css">

<?php
error_reporting(1);
include("includes/head.php");
   include("../action/connect.php");
session_start();
$id=$_SESSION['USER_LOGGED_IN']['Id'];
$uname=$_SESSION['USER_LOGGED_IN']['Firstname']." ".$_SESSION['USER_LOGGED_IN']['Lastname'];
?>
<body>
<?php include("includes/topbar.php");?>
<div id="content">
        <div class="board-wrapper">
            <div class="board-main-content">
          <?php include("includes/navbar.php");?>
                <h3 class="page-title">Estimating</h3>
                <div class="board-canvas">
                    <div id="board" class="u-fancy-scrollbar js-no-higher-edits js-list-sortable ui-sortable">
                <div class="step-head row">
                <?php
                $r=mysql_query("select * from est_heading"); $r1=mysql_num_rows($r); $col2=100/$r1; $css2=($r1*10)+50;
                while($d=mysql_fetch_array($r))
                {
                ?>
                        <div class="col-md-2">
                        <h3 class="step-title"><?php echo $d['name']; ?></h3>
                        </div>
                <?php
                }
                ?>
                </div>

<!--------------------------------------->
<style>
.col-md-2
{
width:<?php  echo $col2; ?>%!important;
}
.step-head
{
width:<?php  echo $css2; ?>%!important;
}
.css3
{
width:<?php  echo $css2; ?>%!important;
}
#board
{
overflow-x: auto;
}
</style>

<!--------------------------------------->
                        <div class="row css3">
<?php
//$query ="SELECT * FROM projects where user_id=$id";
$query ="SELECT * FROM projects";
$proj = mysql_query($query);

$query1 ="SELECT * FROM est_heading";
$heading = mysql_query($query1);

while($heading_res = mysql_fetch_array($heading))
{
?>              <div class="col-md-2">
                     <div class="step" id="step-<?php echo $heading_res['id']?>">
                         <?php
                       while($proj_res = mysql_fetch_array($proj))
{
                           if($proj_res['est_step']==$heading_res['id'])
                           {
                             $status=mysql_query("select * from quote_manager where project_id=".$proj_res['id']." ORDER BY id DESC");
                             $row_status=mysql_fetch_object($status);
?>                       <div class="project" value="<?php echo $heading_res['id']; ?>" data-desc="<?php echo $proj_res['description']; ?>" data-idate="<?php echo $proj_res['initial_date']; ?>" data-reason="<?php echo $proj_res['reason']; ?>" data-type1="<?php echo $proj_res['type1']; ?>" data-type2="<?php echo $proj_res['type2']; ?>" data-uname="<?php echo $uname; ?>"

                              data-edate="<?php echo $row_status->qdate; ?>" data-sales="<?php echo $proj_res['sales_rep']; ?>" data-bid="<?php echo $proj_res['product_bid']; ?>" data-id="<?php echo $proj_res['id']; ?>" data-step="<?php echo $heading_res['name']; ?>"
                              data-an="<?php echo $proj_res['aname']; ?>"
                              data-bn="<?php echo $proj_res['bname']; ?>"
                              data-hn="<?php echo $proj_res['hname']; ?>"
                              >

<input type="hidden" name="qdate" id="qdate" data-date="<?php echo $row_status->qdate;?>" />

                             <input type="hidden" name="sta" id="sta" value="<?php echo $proj_res['status']; ?>" />
                         <div class="proj-head">
                             <h3 class="sty"><?php echo $proj_res['name']; ?></h3>

                             <!--//********************* display due date of data sets **************************//-->
                             <?php
                            /* $i=$proj_res['id']; $newdate="";
                                $qqq="select * from boxes_info where type=1 and user=$id and project=$i order by id2 desc";
                                $ress=mysql_query($qqq);
                                $resss=mysql_fetch_array($ress);
                            if(mysql_num_rows($ress)>0)
                            {
                            $ideee=$resss['id2'];
                           $qqq2="select * from admin_data where typee=1 and user_id=$id and project_id=$i and id2>$ideee";
                                $ress2=mysql_query($qqq2);
                                $resss2=mysql_fetch_array($ress2);
                                $rd=$resss2['due_date'];
                                $time = strtotime($rd);
                                $newdate = date('m/d/Y',$time);
                                //echo $newformat;
                            }
                            else
                            {
                                $newdate=$proj_res['due_date'];
                            }*/
                             ?>
                             <!--//*******************************************************************************
                             <p class="sty"><?php echo $proj_res['due_date']; ?></p>


                             <?php
                           // if($proj_res['assigned_to']==""){
                            ?>
                             <p class="sty" style="margin-top: 4px;" ><?php //echo "None"; ?></p>
                             <?php
                         //   }else{
                                ?>
                             <p class="sty" style="margin-top: 4px;"><?php //echo $proj_res['assigned_to']; ?></p>
                             <?php// } ?> -->


                             </div>


                         </div>

                         <?php }
}
                         mysql_data_seek($proj, 0);
                         ?>
                        </div>
                            </div> <!-- md-2 -->

                     <?php       }
?>

                            </div> <!-- row -->

                    </div>
                </div>
            </div>

        </div>
    </div>


<div id="req" style="display:none;" /></div>
</body>
 <script src="<?php echo $unc;?>js/index.js"></script>
<script type="text/javascript" src="dp/zebra_datepicker.js"></script>

<?php
include("includes/footer.php"); ?>
