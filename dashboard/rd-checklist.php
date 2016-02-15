<?php
$admin=1;
error_reporting(1);
include("includes/head.php");
   include("../action/connect.php");
?>
    <?php include("includes/topbar.php");?>

        <body>

            <div id="content">
<?php
include("includes/navbar.php");


$user=$_SESSION['USER_LOGGED_IN']['Email'];
$id=$_SESSION['USER_LOGGED_IN']['Id'];
$pid=$_GET['id'];

//***************************************//


?>
  <h3 class="page-title">
    Installation Checklist
    </h3>

<!--*******************************************************************************************************************************-->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Abeezee:400|Open+Sans:400,600,700|Source+Sans+Pro:400,600">

	<link rel="stylesheet" type="text/css" href="Accordion/demo.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="Accordion/accordion.js"></script>

    <div class="row above-sec" style="padding:50px 0; border-bottom:1px solid grey;">
        <div class="col-md-6">
		<div class="accordion">
 	<?php
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@//
if(isset($_POST['where']))
{
$ck=$_POST['checklist'];
$where=$_POST['where'];
$q="insert into rd_checklists (name,wheree) values ('$ck','$where')";
$res=mysql_query($q);
if($res)
    echo "Added sucessfully";
else
    echo mysql_error();
}


if(isset($_POST['heading']))
{
$h=$_POST['heading'];
$q="insert into rd_heading (name) values ('$h')";
$res=mysql_query($q);
if($res)
    echo "Added sucessfully";
else
    echo mysql_error();
}

if($_SESSION['USER_LOGGED_IN']['Level']==0)
{ $admin=0;
?>
            <div class="col-md-6">
            <h3>Add Main Heading</h3>
            <form action="" method="POST">
            <input type="text" name="heading" placeholder="Enter Heading Name" required /><input type="submit" value="Add" />
            </form>
            </div>

            <div class="col-md-6">
            <h3>Add Check List</h3>
                <form action="" method="POST">
                    <input name="checklist" type="text" placeholder="Enter Checklist Name" required />
                    <select name="where">
                        <?php
                        $res=mysql_query("select * from rd_heading");
                        while($data=mysql_fetch_array($res))
                        {
                        ?>
                        <option><?php echo $data['name']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <input type="submit" value="Add" /></form>
            </div> <br><br><br><br><br><br>
<?php
}
//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@//
?>


         <!--########################################################################################################-->
            <?php $cc=0;
            $res=mysql_query("select * from rd_heading");
            while($data=mysql_fetch_array($res))
            { $n=$data['name']; $co=0; $color="";
             //************color work***************//
             $c="select * from rd_checklists where wheree='$n'";
             $cr=mysql_query($c); $f=mysql_num_rows($cr);
             while($cd=mysql_fetch_array($cr))
                 {  $ideee=$cd['id'];
                    $kc="select * from boxes_info where type=2 and project=$pid and id2=$ideee";
                  $res44=mysql_query($kc); $res444=mysql_num_rows($res44);
                  if($res444>0){ $co++; }
                   }
             if($co<$f){ $color="#F1C93A"; }
             if($co==0){ $color="#3689B9"; }
             if($co==$f){ $color="#7FE81F"; }
             //*************************************// ?>

          <div class="accordion-section">
				<a style="background:<?php echo $color; ?>;" class="accordion-section-title" href="#accordion-<?php echo $data['id']; ?>">
                    <?php
                    if($admin==0)
                    {
                    ?>
                    <span onclick="dell(<?php echo $data['id']; ?>,'rd_heading','heading')" style="">&nbsp;X&nbsp;</span>
                    <?php } ?>
                    <?php echo $data['name']; ?>
                  <!--=============================================================================-->
                   <?php
                $n=$data['name'];  $td=date('d'); $td=$td+4; $d=date('Y-m-'); $d=$d.$td; $num_ck=0;  $i=$pid; $r_ids=""; $cp=0; $newdate="";
                $one="select * from rd_checklists where wheree='$n'";
                $one_q=mysql_query($one); $one_r=mysql_num_rows($one_q);
                    while($one_f=mysql_fetch_array($one_q)) ///fetching all data sets of specific heading
                    { $one_id=$one_f['id'];
                     $two="select * from admin_data where typee=2 and user_id=$id and project_id=$i and id2=$one_id and due_date<'$d'";
                     $two_q=mysql_query($two); $two_r=mysql_num_rows($two_q); $two_f=mysql_fetch_array($two_q);
                        if($two_r>0)
                        {
                            $three="select * from boxes_info where type=2 and user=$id and project=$i and id2=$one_id";
                            $three_q=mysql_query($three);
                            $three_r=mysql_num_rows($three_q);
                            if($three_r==0)
                            {
                            $num_ck++; $r_ids=$r_ids.",".$one_id; if($cp==0){ $cp++; $newdate=$two_f['due_date']; $newdate=date("Y/m/d", strtotime($newdate)); }
                            }
                        } //if
                    }//while

                    ?>

                <!--=============================================================================-->

                    <?php if($color=="#F1C93A")
                    {
                      echo "<span style='background:red;border-radius:2px;'>&nbsp;".$num_ck."&nbsp;</span>";
                     echo "<span style='float:right;'>Upcoming Checklist:".$newdate."</span>";
                    } ?>

                    <?php if($color=="#3689B9")
                    {
                      echo "<span style='background:red;border-radius:2px;'>&nbsp;".$num_ck."&nbsp;</span>";
                     echo "<span style='float:right;'>Upcoming Checklist:".$newdate."</span>";
                    } ?>

                </a>
				<div id="accordion-<?php echo $data['id']; ?>" class="accordion-section-content">
                        <div class="col-md-12">
                        <?php
                        $q2="select * from rd_checklists where wheree='$n'";
                        $res2=mysql_query($q2);
                        while($data2=mysql_fetch_array($res2))
                         {  $idee=$data2['id'];
                            $k="select * from boxes_info where type=2 and project=$pid and id2=$idee"; $res3=mysql_query($k); $nums=mysql_num_rows($res3); $arr=mysql_fetch_array($res3);

                        //********************//
                         $k2="select * from additional_email where typee=2 and id2=$idee";
                          $res33=mysql_query($k2);
                          $ae=mysql_fetch_array($res33); $ae=$ae['email'];
                          if(mysql_num_rows($res33)==0)
                            $ae="Nill";
                        //********************//

                            ?>



                    <input <?php if($nums>0) { ?> checked <?php } ?> type="checkbox" id="<?php echo $data2['id']; ?>" onclick="usave('<?php echo $data2['id']; ?>')" />
                <label><label style="display:inline" onclick='show("<?php echo $data2['id']; ?>")'><?php echo $data2['name']; if (strpos($r_ids,$data2['id']) !== false) { echo "<b> *</b>"; } ?>&nbsp;&nbsp;(Default Email: <?php echo $ae; ?> )</label>
                    <?php if($nums>0) { ?> <p style="font-weight: 100;">(Completed by <?php echo $arr['user_name']; ?> on <?php echo $arr['timee']; ?>) </p><?php } ?>
                    <?php if($admin==0)
                    {
                    ?>
                    &nbsp;&nbsp;<span onclick="dell(<?php echo $data2['id']; ?>,'rd_checklists','checklist')" style="background: red;color:white;">&nbsp;X&nbsp;</span>
                    <?php } ?>
                    </label>
                        <?php
                        }
                        ?>
                    </div>
				</div><!--end .accordion-section-content-->
			</div><!--end .accordion-section-->
            <?php
            }
            ?>
        <!--########################################################################################################-->

		</div><!--end .accordion-->
        </div>


<?php include "filess.php"; ?>


    </div>

</div>


        </body>
<link rel="stylesheet" href="popup/style.css" />
<script type="text/javascript" src="popup/tinybox.js"></script>
<script type="text/javascript" src="dp/zebra_datepicker.js"></script>

<script>
function dell(a,b,c)
{
            var r = confirm("Are you sure want to delete this?");
            if (r == true)
            {
            $.ajax({
            type: 'post',
            url: 'admin/del-ck.php',
            data: { type:b , id:a, what:c},
            success: function (data) {
              alert(data);
                location.reload();
            }
            });
            } else
            {

            }

}

//********************************************//
 var id=<?php echo $id; ?>; var pid=<?php echo $pid; ?>;
function show(data)
{  var a,b,c=""; var ne="<p style='display:none;'><input type='checkbox' name='default' id='default'/>Send default Email?</p>"; var at=""; var content2="";


    $.ajax({
            type: 'post',
            url: 'admin/admin-get-info.php',
            data: { data : data, type:'2',pid:pid ,user_id:id },
            success: function (data1) {
              if(data1.length>2)
              {
              data1=data1.split("*");
            a=data1[0];
             b=data1[1];
             c=data1[2];
             d=data1[3]; if(d==1){ne="<p style='display:none;'><input checked type='checkbox' name='default' id='default'/>Send default Email?</p>";}
             e=data1[4];
            f=data1[5];
                             //********************//
                                $.ajax({
                                            type: 'post',
                                            url: 'admin/admin-get-info.php',
                                            data: { getusers:'getusers'},
                                            success: function (data2)
                                            {
                                                at="<select name='assignedto' id='assignedto'><option>Select</option>";
                                              data2=data2.split("*");
                                                for(aa=0 ; aa<(data2.length)-1 ; aa++)
                                                {
                                                t=data2[aa];
                                                t=t.split(",");
                                                 if(a==t[0]) { at=at+"<option selected value="+t[0]+">"+t[1]+"<option>"; }
                                                    else { at=at+"<option value="+t[0]+">"+t[1]+"<option>"; }
                                                }
                                                at=at+"</select>";
                                             content2 = "<form name='myform' id='myform'><label style='width: 100%;'>Assigned to:<span onClick='tin_hide()' style='float: right;background: red;color: white;width: 20px;text-align: center;'>X</span>"+at+"<label class=''>Due Date:<input type='date' name='dd' class='dd' id='dd' value='"+e+"'></label></label>  <label>Who complete:<input type='text' name='whocomplete' id='whocomplete' value='"+b+"'/></label> <label>Type Emails seperated with comma ','<textarea name='emails' style='height: 102px;' id='emails' placeholder='example1@yahoo.com,example2@hotmail.com'>"+c+"</textarea></label><label>Email<input name='a-email' id='a-email' placeholder='example1@yahoo.com' value='"+f+"'></label>"+ne+"<input type='button' style='float:right;' onClick='savee()' value='save'/><input type='hidden' name='query' id='query' value='"+data+"'/><input type='hidden' name='type' id='type' value='2'/><input type='hidden' name='user_id' id='user_id' value="+id+"><input type='hidden' name='pid' id='pid' value="+pid+"></form>";
                                            TINY.box.show(content2,0,0,0,1);
                                            }
                                      });




              }
                else
                {
                     //********************//
                                $.ajax({
                                            type: 'post',
                                            url: 'admin/admin-get-info.php',
                                            data: { getusers:'getusers'},
                                            success: function (data2)
                                            {

                                                at="<select name='assignedto' id='assignedto'><option>Select</option>";
                                              data2=data2.split("*");
                                                for(a=0 ; a<data2.length ; a++)
                                                {
                                                t=data2[a];
                                                t=t.split(",");
                                                 at=at+"<option value="+t[0]+">"+t[1]+"<option>";
                                                }
                                                at=at+"</select>";
                                             content2 = "<form name='myform' id='myform'><label style='width: 100%;'>Assigned to:<span onClick='tin_hide()' style='float: right;background: red;color: white;width: 20px;text-align: center;'>X</span>"+at+"<label class=''>Due Date:<input type='date' class='dd' name='dd' id='dd'></label><label>Who complete:<input type='text' name='whocomplete' id='whocomplete'/></label> <label>Type Emails seperated with comma ','<textarea name='emails' id='emails' style='height: 102px;' placeholder='example1@yahoo.com,example2@hotmail.com'></textarea></label><label>Email<input name='a-email' id='a-email' placeholder='example1@yahoo.com' value='"+f+"'></label><p style='display:none;'><input type='checkbox' name='default' id='default'/>Send default Email?</p><input type='button' style='float:right;' onClick='savee()' value='save'/><input type='hidden' name='query' id='query' value='"+data+"'/><input type='hidden' name='type' id='type' value='2'/><input type='hidden' name='user_id' id='user_id' value="+id+"><input type='hidden' name='pid' id='pid' value="+pid+"></form>";
                                           TINY.box.show(content2,0,0,0,1);
                                            }
                                      });


                }//else
            }
          });


 //******************//


}  //show data

    function tin_hide()
    {
    $('#tinymask').hide(500);
    $('#tinybox').hide(500);
    }


    function savee()
    {
    $.ajax({
            type: 'post',
            url: 'admin/admin-save-info.php',
            data: $('#myform').serialize(),
            success: function (data) {
              alert(data);
            }
          });
    }
</script>


<script>
function usave(data)
{
   if(document.getElementById(data).checked==true)
   { show(data);
            //document.getElementById(data).disabled=true;
            $.ajax({
            type: 'post',
            url: 'admin/user-save-info.php',
            data: { action:'add' , data:data, type:'2',user_id:<?php echo $id; ?>,pid:<?php echo $pid; ?> },
            success: function (data) {
              if(data=="info saved"){}else{ alert(data);}
            }
            });
   }
   else
    {
            $.ajax({
            type: 'post',
            url: 'admin/user-save-info.php',
            data: { action:'remove' , data:data, type:'2' ,user_id:<?php echo $id; ?>,pid:<?php echo $pid; ?>},
            success: function (data) {
              if(data=="info saved"){}else{ alert(data);}
            }
            });
    }

}
    //****************************************//
    $(document).ready(function(){
$('#tinybox #dd').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});
 //******************************//

        $('a.read_more').click(function(event){ /* find all a.read_more elements and bind the following code to them */
        event.preventDefault(); /* prevent the a from changing the url */
        $(this).parents('.item').find('.more_text').show(); /* show the .more_text span */
        $(this).parents('.item').find('.read_more').hide();
        $(this).parents('.item').find('.read_less').show();
        });

        $('a.read_less').click(function(event){ /* find all a.read_more elements and bind the following code to them */
        event.preventDefault(); /* prevent the a from changing the url */
        $(this).parents('.item').find('.more_text').hide(); /* show the .more_text span */
        $(this).parents('.item').find('.read_less').hide();
        $(this).parents('.item').find('.read_more').show();
        });
 });//ready fun
</script>

<?php include("includes/footer.php"); ?>
