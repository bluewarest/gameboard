<style>
.col-md-2
{
width: 6.6667%!important;
}
     .sty
    {
    word-wrap: break-word;
    background-color: #3689B9;
    color: white;
    padding: 1px;
    width: 100%;
    margin: 0 auto;
    border-radius: 4px;
    }
</style>    
<?php
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
?>
<body>
<?php include("includes/topbar.php");?>

<div id="content">
        <div class="board-wrapper">
            <div class="board-main-content">
          <?php include("includes/navbar.php");?>
                    <h3  class="page-title">Drafting</h3>
                <div class="board-canvas">
                    <div id="board" class="u-fancy-scrollbar js-no-higher-edits js-list-sortable ui-sortable" style="overflow-x: auto;">
                   <div class="step-head row" style="width:150%;">
                  
                <?php
                $r=mysql_query("select * from dra_heading");
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
                        <div class="row" style="width: 150%;">
                          
                            
<?php
$query ="SELECT * FROM projects where user_id=$id";
$proj = mysql_query($query);

$query1 ="SELECT * FROM dra_heading";
$heading = mysql_query($query1);

while($heading_res = mysql_fetch_array($heading))
{
?>              <div class="col-md-2">
                     <div class="step" id="step-<?php echo $heading_res['id']?>">
                         <?php
                       while($proj_res = mysql_fetch_array($proj))
{ 
                           if($proj_res['dra_step']==$heading_res['id'])
                           {

?>                       <div class="project" value="<?php echo $heading_res['id']; ?>">
                             <input type="hidden" name="sta" id="sta" value="<?php echo $proj_res['status']; ?>" />
                         <div class="proj-head">
                             <h3><?php echo $proj_res['name']; ?></h3>
                             <p class="sty"><?php echo $proj_res['due_date']; ?></p>
                             <?php
                            if($proj_res['assigned_to']==""){
                            ?>
                             <p class="sty" style="margin-top: 4px;" ><?php echo "None"; ?></p>
                             <?php
                            }else{
                                ?>
                             <p class="sty" style="margin-top: 4px;"><?php echo $proj_res['assigned_to']; ?></p>
                             <?php } ?>
                            </div>
                       <div class="project-desc" style="display:none"> <small><p><?php echo $proj_res['description']; ?></p></small>
                            </div>

                           <div class="project-idate" style="display:none"> <small><p><?php echo $proj_res['initial_date']; ?></p></small>
                            </div>
                             <div class="project-edate" style="display:none"> <small><p><?php echo $proj_res['last_date']; ?></p></small>
                            </div>
                             <div class="project-sales" style="display:none"> <small><p><?php echo $proj_res['sales_rep']; ?></p></small>
                            </div>
                             <div class="project-type" style="display:none"> <small><p><?php echo $proj_res['product_type']; ?></p></small>
                            </div>
                             <div class="project-bid" style="display:none"> <small><p><?php echo $proj_res['product_bid']; ?></p></small>
                            </div>
                             <div class="project-id" style="display:none"> <small><p><?php echo $proj_res['id']; ?></p></small>
                            </div>

                             <div class="project-assignedto" style="display:none"> <small><p><?php echo $proj_res['assigned_to']; ?></p></small>
                            </div>
                             <div class="project-duedate" style="display:none"> <small><p><?php echo $proj_res['due_date']; ?></p></small>
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
<script>
 
    var customModal = $('<div id="myModal" class="modal fade" role="dialog">                             <div class="col-sm-12">                    <form class="form-add" method="post" action="../action/update-proj-draf.php" enctype="multipart/form-data">                          <div class="modal-dialog">                            <!-- Modal content-->                           <div class="modal-content">                              <div class="modal-header">                             <button type="button" class="close" data-dismiss="modal">&times;</button>                                   <label for="comment">Project Name:</label>                             <input type="text" name="name" class="proj-name"/>                                                                                                                                                                                                                                                                                                                                                                                                                                                <label>Initial Date:</label><input type="text" name="d1" id="datepicker4" class="datepicker4" /><label>Quote Date:</label><input type="text" name="d2" id="datepicker3" class="datepicker3" /><label>Sales Rep:</label><input type="text" name="sales" class="sales" /><label>Project Type:</label><input type="text" name="type" class="type" /><label>Project Bid:</label><input type="text" name="bid" class="bid" /><hr><label>Assigned to:</label><select class="assigned-to"  name="assigned-to" style="width: 26%;"><option>Gregg</option><option>Tasha</option><option>Josh</option><option>Jimmy</option></select><label>Due Date:</label><input type="text" name="due-date" class="due-date" id="datepicker5" />                                                                                                                                                                             <label style="display:none">Project Type:</label><input type="hidden" name="project-id" class="p-id" />                                                                                                                                                                                                                                                                                                                                                                        </div><div class="modal-body"><div class="row"><div class="col-sm-8"><div class="form-group">              <label for="comment">Description:</label></br><textarea class="form-control desc" rows="5" style="width:100%" name="description"></textarea>                            </div></div><div class="col-sm-4">                                       <label for="comment">Go to:</label><br><a id="check"  href="drafting-checklist" class="btn btn-primary">Checklist</a><br><br>  <a id="takekoff"  href="#" class="btn btn-primary">Take off</a><br><br>                      <a id="pfa"  href="#" class="btn btn-primary">Plans for architect</a>  <br><br>  <a id="appc"  href="#" class="btn btn-primary">Approved contract</a>   <br><br>  <a id="apps"  href="#" class="btn btn-primary">Approved shops</a>                                                                   </div>                   </div>                                                               <div id="status" style="float:left;"><label for="s2" id="l2">Open</label><input type="radio" name="status" id="s2" onClick="cv(2)" value="open">  <label for="s1" id="l1">Won</label><input type="radio" name="status" id="s1" onClick="cv(1)" value="won">  <label for="s4" id="l4">Lost</label><input type="radio" name="status" id="s4" onClick="cv(4)" value="lost"><label for="s3" id="l3">Archive</label><input type="radio" name="status" id="s3" onClick="cv(3)" value="archive"> </div><input type="hidden" name="staa" id="staa" />   </div><br>                                                                                                                                                                                                                                                                     <div class="modal-footer">                                                     <div id="btns" style=""> <button type="button" name="delete-project"  class="btn btn-primary" style="background-color: red;border-color: white; float:left;" onClick="del()">Delete</button> <input type="submit" name="update-project"  class="btn btn-primary">     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div>                             </div>                            </div>                          </div>                        </div>                            </form>                                </div>');

$('.project h3').click(function(){
    $('body').append(customModal);
$('#myModal .proj-name').val($(this).text());
   var id=$(this).parent().siblings('.project-id').find('p').html();
    $('#myModal .desc').text($(this).parent().siblings('.project-desc').find('p').html());



     var aa=$(this).parent().siblings('.project-idate').find('p').html();
    var bb=$(this).parent().siblings('.project-edate').find('p').html();
    var cc=$(this).parent().siblings('.project-sales').find('p').html();
    var dd=$(this).parent().siblings('.project-type').find('p').html();
    var ee=$(this).parent().siblings('.project-bid').find('p').html();
    var ff=$(this).parent().siblings('.project-id').find('p').html();
    var gg=$(this).parent().siblings('.project-assignedto').find('p').html();
    var hh=$(this).parent().siblings('.project-duedate').find('p').html();

    $('#myModal .datepicker4').val(aa);
    $('#myModal .datepicker3').val(bb);
    $('#myModal .sales').val(cc);
    $('#myModal .type').val(dd);
    $('#myModal .bid').val(ee);
    $('#myModal .p-id').val(ff);
    $('#myModal .assigned-to').val(gg);
    $('#myModal .due-date').val(hh);



 $('#myModal .due-date').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});

$('#myModal #datepicker4').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});


 $('#myModal #check').attr('href','drafting-checklist?id='+id);
     $('#myModal #mem').attr('href','members?id='+id);
         $('#myModal #due').attr('href','due?id='+id);
    $('#myModal .hide').show();
    $('#myModal').modal();

  	$('#myModal').on('hidden', function(){
 		console.log("hidden");
    	$('#myModal').remove();
	});
});

    $('.project').click(function(){
    var vv=$(this).children('#sta');
        //alert(vv);
        vv=vv[0].value;
        //console.log(vv);
        switch (vv)
        {
        case "won":
        document.getElementById("s1").checked=true;
        document.getElementById("l1").style.backgroundColor="green";
        document.getElementById("l1").style.color="white";
         document.getElementById("l2").style.backgroundColor="white";
         document.getElementById("l2").style.color="black";
         document.getElementById("l3").style.backgroundColor="white";
         document.getElementById("l3").style.color="black";
         document.getElementById("l4").style.backgroundColor="white";
         document.getElementById("l4").style.color="black";
        break;

        case "open":
        document.getElementById("s2").checked=true;
        document.getElementById("l2").style.backgroundColor="grey";
        document.getElementById("l2").style.color="white";
        document.getElementById("l1").style.backgroundColor="white";
         document.getElementById("l1").style.color="black";
         document.getElementById("l3").style.backgroundColor="white";
         document.getElementById("l3").style.color="black";
         document.getElementById("l4").style.backgroundColor="white";
         document.getElementById("l4").style.color="black";
        break;

        case "archive":
        document.getElementById("s3").checked=true;
        document.getElementById("l3").style.backgroundColor="orange";
        document.getElementById("l3").style.color="white";
        document.getElementById("l1").style.backgroundColor="white";
         document.getElementById("l1").style.color="black";
         document.getElementById("l2").style.backgroundColor="white";
         document.getElementById("l2").style.color="black";
         document.getElementById("l4").style.backgroundColor="white";
         document.getElementById("l4").style.color="black";
        break;

        case "lost":
        document.getElementById("s4").checked=true;
        document.getElementById("l4").style.backgroundColor="red";
        document.getElementById("l4").style.color="white";
        document.getElementById("l1").style.backgroundColor="white";
         document.getElementById("l1").style.color="black";
         document.getElementById("l2").style.backgroundColor="white";
         document.getElementById("l2").style.color="black";
         document.getElementById("l3").style.backgroundColor="white";
         document.getElementById("l3").style.color="black";
        break;
        }//switch

        if(vv.length<1)
        {
            document.getElementById("s1").checked=false;
            document.getElementById("s2").checked=false;
            document.getElementById("s3").checked=false;
            document.getElementById("s4").checked=false;
        document.getElementById("l1").style.backgroundColor="white";
         document.getElementById("l1").style.color="black";
         document.getElementById("l2").style.backgroundColor="white";
         document.getElementById("l2").style.color="black";
         document.getElementById("l3").style.backgroundColor="white";
         document.getElementById("l3").style.color="black";
         document.getElementById("l4").style.backgroundColor="white";
         document.getElementById("l4").style.color="black";

        }



    });

    // waqas code =============================
    function del()
{
    var i=$('#myModal .p-id').val();
   var r = confirm("Are you sure want to Delete this Project?");
    if (r == true) 
    {
        $.ajax({
            type: 'POST',
            url: 'delete.php',
            data: {'i':i},
            success: function(data)
            {
                if(data==1){
            alert("Project Deleted sucessfully!");
            location.reload(); }
                else{
            alert("Delete fails , try after some time!!");  }      
            }
            }); //end ajax
    } else 
    {
    
    }    
}
    

    $(document).ready(function(){
     $('#datepicker2').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});

         $('#datepicker1').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});
        
         
        $('#datepicker4').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});

        //---------------------------------
    $(".project").mousedown(function(){
        document.getElementById("req").innerHTML=$(this).attr("value");
    });
    });// ready fun


    function cv(data)
    {
        var status;
        if(data==1)
        {  status="won";
        document.getElementById("l1").style.backgroundColor="green";
         document.getElementById("l1").style.color="white";
         document.getElementById("l2").style.backgroundColor="white";
         document.getElementById("l2").style.color="black";
         document.getElementById("l3").style.backgroundColor="white";
         document.getElementById("l3").style.color="black";
         document.getElementById("l4").style.backgroundColor="white";
         document.getElementById("l4").style.color="black";
        }
         if(data==2)
        {  status="open";
        document.getElementById("l2").style.backgroundColor="grey";
         document.getElementById("l2").style.color="white";
              document.getElementById("l1").style.backgroundColor="white";
         document.getElementById("l1").style.color="black";
         document.getElementById("l3").style.backgroundColor="white";
         document.getElementById("l3").style.color="black";
         document.getElementById("l4").style.backgroundColor="white";
         document.getElementById("l4").style.color="black";

        }
         if(data==3)
        {  status="archive";
        document.getElementById("l3").style.backgroundColor="orange";
         document.getElementById("l3").style.color="white";
              document.getElementById("l1").style.backgroundColor="white";
         document.getElementById("l1").style.color="black";
         document.getElementById("l2").style.backgroundColor="white";
         document.getElementById("l2").style.color="black";
         document.getElementById("l4").style.backgroundColor="white";
         document.getElementById("l4").style.color="black";
        }
         if(data==4)
        {  status="lost";
        document.getElementById("l4").style.backgroundColor="red";
         document.getElementById("l4").style.color="white";
              document.getElementById("l2").style.backgroundColor="white";
         document.getElementById("l2").style.color="black";
         document.getElementById("l3").style.backgroundColor="white";
         document.getElementById("l3").style.color="black";
         document.getElementById("l1").style.backgroundColor="white";
         document.getElementById("l1").style.color="black";
        }
        document.getElementById("staa").value=status;
    }

    // end waqas code ========================


  </script>
<script type="text/javascript" src="dp/zebra_datepicker.js"></script>
 
<?php
include("includes/footer.php"); ?>
