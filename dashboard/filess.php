<?php
include "../unc.php";


//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@//

if(isset($_POST['doc_name_revised']))
{
   
$doc=$_POST['doc_name_revised'];
$ck=$_GET['id'];

$today = date("Y-m-d");
$user=$_SESSION['USER_LOGGED_IN']['Id'];
    $file=$_FILES["file"]["name"];
    
    
    $target_dir = "../../..".$crm_folder_on_server."action/files/";
  
    
    $length = 6;
    $target_file="";
    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    if(strlen($file)>1){
    $target_file = $target_dir .$randomString. basename($_FILES["file"]["name"]);}
 move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
    $target_file="files/".$randomString. basename($_FILES["file"]["name"]);
 $q="INSERT INTO quote_manager(status,user_id, project_id,qdate,file,typ,nam) VALUES ('kickback','$user','$ck','$today','$target_file','r','$doc')";
 $res=mysql_query($q);

    if($res)
        echo "<script>alert('File added!')</script>";
    else
        echo mysql_error();
}
//***********************************************//
if(isset($_POST['note']))
{
$date=$_POST['date'];
$note=$_POST['note'];
$ck=$_GET['id'];
    $file=$_FILES["file"]["name"];
    $target_dir = "uploads/";
    $length = 6;
    $target_file="";
    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    if(strlen($file)>1){
    $target_file = $target_dir .$randomString. basename($_FILES["file"]["name"]);}
 move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
$q="insert into notes (note,user,date,checklist,file,type) values ('$note','$user','$date','$ck','$target_file','1')";
    $res=mysql_query($q);
    if($res)
        echo "<script>alert('Note added!')</script>";
    else
        echo mysql_error();
}

//*****************************************//
if(isset($_POST['doc_name']))
{
$doc=$_POST['doc_name'];
$ck=$_GET['id'];
    $file=$_FILES["file"]["name"];
    $target_dir = "uploads/";
    $length = 6;
    $target_file="";
    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    if(strlen($file)>1){
    $target_file = $target_dir .$randomString. basename($_FILES["file"]["name"]);}
 move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
$q="insert into files (name,file,checklist,user,type) values ('$doc','$target_file','$ck','$user','1')";
    $res=mysql_query($q);
    if($res)
        echo "<script>alert('File added!')</script>";
    else
        echo mysql_error();
}

//*****************************************//
?>

<!-----------------------------------------------------------------------------add notes------------------------------------------------------------------------------------->
<div class="col-md-6">
<h3 style="color: white;
    background-color: #3A8BBA;
    padding: 10px;
    border-radius: 5px;
    text-align: center;">Takeoff file</h3>
<?php
$id=$_GET['id'];
$q="select * from quote_manager where project_id=$id and typ='t' order by id desc";
$res=mysql_query($q);
while($dat=mysql_fetch_array($res))
{
$url=$unc."dashboard/".$dat['file'];
$path=$dat['file'];
if(strlen($path)<1)
{ echo "No takeoff file attached.";} else {
?>
Date Uploaded  <?php echo $dat['qdate']; ?> - <a href="<?php echo $url;  ?>" target="_blank">View</a><br>
<?php
}
}//while
?>
</div>
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--->

  <div class="col-md-6"><h3 style="color: white;
      background-color: #3A8BBA;
      padding: 10px;
      border-radius: 5px;
      text-align: center;">Kickback Files</h3>

 <div class="col-md-6">
<?php
$id=$_GET['id'];
$q="select * from quote_manager where project_id=$pid and status='kickback' and typ='k' ORDER BY id DESC";
$res=mysql_query($q);
while($dat=mysql_fetch_array($res)){
$url=$unc."dashboard/".$dat['file'];
$path=$dat['file'];
if(strlen($path)<1)
{ echo "No takeoff file attached.";} else {
?>
Date Uploaded: <?php echo $dat['qdate']; ?> - <a href="<?php echo $url;  ?>" target="_blank" >View</a><br>
<?php
}}


?></div>
</div>
<!--###############################################################################--->
<!--+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++--->

  <div class="col-md-6"><h3 style="color: white;
      background-color: #3A8BBA;
      padding: 10px;
      border-radius: 5px;
      text-align: center;">Revised Proposal</h3>
      <div class="col-md-6">

  <form action="" method="post" enctype="multipart/form-data">
  <input type="text" name="doc_name_revised" placeholder="Title of Document" required />
  <input type="file" name="file" required />
  <input type="submit"/>
</form>
</div>
 <div class="col-md-6">
<?php
$id=$_GET['id'];
$q="select * from quote_manager where project_id=$pid and typ='r' ORDER BY id DESC";
$res=mysql_query($q);
while($dat=mysql_fetch_array($res)){
    
$url=$unc_crm."action/".$dat['file']; 
   
    
    
$path=$dat['file'];
if(strlen($path)<1)
{ echo "No Revised Proposal attached.";} else {
?>
     <span>Name: <b><?php echo $dat['nam'];  ?></b><a style="float:right;" href="<?php echo $url;  ?>" target="_blank" >View</a></span><br>
<?php
}}
?>
</div>
</div>
<!--###############################################################################--->



<div class="col-md-6">


    <h3 style="color: white;
    background-color: #3A8BBA;
    padding: 10px;
    border-radius: 5px;
    text-align: center;">Documents</h3>
     <div class="col-md-4">
                                <form action="" method="post" enctype="multipart/form-data">
                                <input type="text" name="doc_name" placeholder="Title of Document" required />
                                <input type="file" name="file" required />
                                <input type="submit"/>
                               </div>  </form>
     <div class="col-md-8">

                                                 <div class="list-notes">
                                                            <table >
                                                                <tr>
                                                                    <td>
                                                                        Name
                                                                    </td>
                                                                    <td >
                                                                        File
                                                                    </td>
                                                                </tr>
                                            <?php
                                            $idd=$_GET['id'];
                                              $q="select * from files where  checklist=$idd order by id desc";
                                            $sql=mysql_query($q);
                                            while($d=mysql_fetch_array($sql))
                                            {
                                            ?>
                                                                <tr>
                                                                    <td >
                                                                       <?php echo $d['name']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if(strlen($d['file'])>6)
                                                                        {
                                                                        echo "<a target='_blank' href='".$d['file']."'>Open</a>";
                                                                        }
                                                                        else
                                                                        {
                                                                         echo "<p>Not Attached</p>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                            <?php } ?>
                                                            </table>
                                                        </div>

    </div></div>

<!--###############################################################################--->


    <div class="col-md-6">
 <form action="" method="post" enctype="multipart/form-data">
    <h3 style="color: white;
    background-color: #3A8BBA;
    padding: 10px;
    border-radius: 5px;
    text-align: center;">Add Notes</h3>
        <div class="col-md-4">
            <textarea style="max-height:50px;" type="text" name="note" placeholder="Enter Note here" required ></textarea>
        <br>
        <div>
            <input type="text" name="date" value="<?php echo date('Y/m/d'); ?>" />
        </div><br>
        <p><input type="hidden" name="user" value="<?php echo $user; ?>"/> <b>  Upload File:</b>  <input name="file" id="file" type="file" multiple /></p>
         <input  type="submit" name="submit" value="Add Note"/>
        </div> </form>
    <div class="col-md-8">

                                                 <div class="list-notes">
                                                            <table >
                                                                <tr>
                                                                    <td>
                                                                        Date of Submission
                                                                    </td>
                                                                    <td >
                                                                        User Email
                                                                    </td>
                                                                    <td>
                                                                        Note
                                                                    </td>
                                                                     <td>
                                                                        File
                                                                    </td>
                                                                </tr>
                                            <?php
                                            $idd=$_GET['id'];
                                              $q="select * from notes where checklist=$idd order by id desc";
                                            $sql=mysql_query($q);
                                            while($d=mysql_fetch_array($sql))
                                            {
                                            ?>
                                                                <tr>
                                                                    <td >
                                                                       <?php echo $d['date']; ?>
                                                                    </td>
                                                                    <td>
                                                                         <?php echo $d['user']; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        //echo $d['note'];
                                                                        $string = $d['note'];

                                                                        if (strlen($string) > 100) {
                                                                            $stringCut = substr($string, 0, 100);
                                                                           echo "<div class='item'>";
                                                                            echo $stringCut;
                                                                     echo "<a href='#' class='read_more'>Read More</a><br/>
                                                                    <span style='display:none;' class='more_text'>".str_replace($stringCut," ",$string)."</span>
                                                                    <a style='display:none;' href='#' class='read_less'>Read less</a>
                                                                    </div>";
                                                                        }
                                                                        else
                                                                        {
                                                                        echo $string;
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php if(strlen($d['file'])>6)
                                                                        {
                                                                        echo "<a target='_blank' href='".$d['file']."'>Open</a>";
                                                                        }
                                                                        else
                                                                        {
                                                                         echo "<p>Not Attached</p>";
                                                                        }
                                                                        ?>
                                                                    </td>
                                                                </tr>
                                            <?php } ?>
                                                            </table>
                                                        </div>

                                                </div>
    </div>
</div>
<!-----------------------------------------------------------------------end add notes------------------------------------------------------------------------------------>
