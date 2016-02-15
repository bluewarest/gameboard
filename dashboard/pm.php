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
label {
    width: 105px;
}
input[type="text"] {
    width: 150px;
}

#s1,#s2,#s3,#s4
{
    visibility:hidden;
}
#l1,#l2,#l3,#l4
{
text-align: center;
width: 60px;
padding: 5px;
}

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
                    <h3  class="page-title">Production</h3>
                <div class="board-canvas">
                    <div id="board" class="u-fancy-scrollbar js-no-higher-edits js-list-sortable ui-sortable">
                   <div class="step-head row">
                    
                         <?php
                        $r=mysql_query("select * from pro_heading"); $r1=mysql_num_rows($r); $col2=100/$r1; $css2=($r1*10)+50;
                        while($d=mysql_fetch_array($r))
                        {
                        ?>
                                <div class="col-md-2">
                                <h3><?php echo $d['name']; ?></h3>
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

$query1 ="SELECT * FROM pro_heading";
$heading = mysql_query($query1);

while($heading_res = mysql_fetch_array($heading))
{
?>              <div class="col-md-2">
                     <div class="step" id="step-<?php echo $heading_res['id']?>">
                         <?php
                       while($proj_res = mysql_fetch_array($proj))
{ 
                           if($proj_res['pro_step']==$heading_res['id'])
                           {

?>                      <div class="project" value="<?php echo $heading_res['id']; ?>" data-desc="<?php echo $proj_res['description']; ?>" data-idate="<?php echo $proj_res['initial_date']; ?>" data-reason="<?php echo $proj_res['reason']; ?>" data-type1="<?php echo $proj_res['type1']; ?>" data-type2="<?php echo $proj_res['type2']; ?>" data-uname="<?php echo $uname; ?>"
                              
                              data-edate="<?php echo $proj_res['last_date']; ?>" data-sales="<?php echo $proj_res['sales_rep']; ?>" data-bid="<?php echo $proj_res['product_bid']; ?>" data-id="<?php echo $proj_res['id']; ?>" data-step="<?php echo $heading_res['name']; ?>" >
                             <input type="hidden" name="sta" id="sta" value="<?php echo $proj_res['status']; ?>" />
                         <div class="proj-head">
                             <h3 class="sty"><?php echo $proj_res['name']; ?></h3>
                             
                             <!--//********************* display due date of data sets **************************//-->
                             <?php 
                            /* $i=$proj_res['id']; $newdate="";
                                $qqq="select * from boxes_info where type=3 and user=$id and project=$i order by id2 desc";
                                $ress=mysql_query($qqq);
                                $resss=mysql_fetch_array($ress);
                            if(mysql_num_rows($ress)>0)
                            {
                            $ideee=$resss['id2'];
                           $qqq2="select * from admin_data where typee=3 and user_id=$id and project_id=$i and id2>$ideee";
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
                             <!--//*******************************************************************************//-->
                             
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

<div id="newProject" class="modal fade" role="dialog">                             <div class="col-sm-12">
    <form class="form-add" method="post" action="../action/save-proj.php" enctype="multipart/form-data">                          <div class="modal-dialog">                            <!-- Modal content-->                           <div class="modal-content">                              <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>                                   <label for="comment">Project Name:</label><input type="text" name="name"/>

        <label>Initial Date:</label><input type="text" name="d1" id="datepicker1" value="<?php echo date("d/m/Y"); ?>" />
        <label>Quote Date:</label><input type="text" name="d2" id="datepicker2" />
        <label>Sales Rep:</label><input type="text" name="sales" />
        <label>Project Type:</label><input type="text" name="type" />
        <label>Project Bid:</label><input type="text" name="bid" />


        </div><div class="modal-body"><div class="row"><div class="col-sm-9"><div class="form-group"><label for="comment">Description:</label><textarea class="form-control" rows="5" id="desc" name="description"></textarea></div>                                </div>
        </div>                                                                </div>                              <div class="modal-footer">                                <button type="submit" class="btn btn-success" name="add-project" value="submit">Add</button>                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                              </div>                            </div>                          </div>                        </div>                            </form>                                </div>
<div id="req" style="display:none;" /></div>
</body>

 


<script type="text/javascript" src="dp/zebra_datepicker.js"></script>
<script src="<?php echo $unc;?>js/production.js"></script> 
<?php
include("includes/footer.php"); ?>
