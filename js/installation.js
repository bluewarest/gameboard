var customModal = $('<div id="myModal" class="modal fade" role="dialog">                             <div class="col-sm-12">                    <form class="form-add" method="post" action="../action/update-proj.php" enctype="multipart/form-data">                          <div class="modal-dialog">                            <!-- Modal content-->                           <div class="modal-content">                              <div class="modal-header">                             <button type="button" class="close" data-dismiss="modal">&times;</button>                                   <label for="comment">Project Name:</label><input type="text" name="name" class="proj-name"/><label>Initial Date:</label><input disabled type="text" name="d1" id="datepicker4" class="datepicker4" /><label>Quote Date:</label><input disabled type="text" name="d2" id="datepicker3" class="datepicker3" /><label>Sales Rep:</label><input type="text" name="sales" class="sales" /><label>Project Bid:</label><input type="text" name="bid" class="bid" /><hr> <label>Product Type:</label><select style="width: 26%;" name="t1" id="t1"><option>PanoramAH</option><option>TW-WS Alum</option><option>TW-WS Wood</option><option>TW-WS PVC</option></select>      <select style="width: 26%;" name="t2" id="t2"><option>PanoramAH</option><option>TW-WS Alum</option><option>TW-WS Wood</option><option>TW-WS PVC</option></select>                                                                                                                                                                      <br><label style="display:none">Project Type:</label><input type="hidden" name="project-id" class="p-id" />      <label>Stage:</label> <p id="stage" style="max-width:50%;"></p>    <br><label>Step: </label> <p class="step-head" style="max-width:50%;"></p>                                                                                                                                                                                                                                                                                                                                                                 </div><div class="modal-body"><div class="row"><div class="col-sm-8"><div class="form-group">              <label for="comment">Description:</label></br><textarea class="form-control desc" rows="5" style="width:100%" name="description"></textarea>                            </div><div class="form-group" id="reason" style="display:none;">              <label for="reason">Reason of lost project:</label></br><textarea class="form-control reas" rows="5" style="width:100%" name="reason"></textarea>                            </div></div><div class="col-sm-4">                                       <label for="comment">Go to:</label><br><a id="check"  href="estimating" style="width:80%;background: green;" class="btn btn-primary">Checklist</a><br><br>  <a id="takekoff" style="background:#57D2DE;color: black;"  href="#" class="btn btn-primary">Take off</a><br><br>                      <a id="pfa" style="background:#57D2DE;color: black;"  href="#" class="btn btn-primary">Plans for architect</a>  <br><br>  <a id="appc"  href="#" class="btn btn-primary" style="background:#57D2DE;color: black;">Approved contract</a>   <br><br>  <a id="apps" style="background:#57D2DE;color: black;"  href="#" class="btn btn-primary">Approved shops</a>                                                                   </div>                   </div>                                                               <div id="status" style="float:left;"><label for="s2" id="l2">Open</label><input type="radio" name="status" id="s2" onClick="cv(2)" value="open">  <label for="s1" id="l1">Won</label><input type="radio" name="status" id="s1" onClick="cv(1)" value="won">  <label for="s4" id="l4">Lost</label><input type="radio" name="status" id="s4" onClick="cv(4)" value="lost"><label for="s3" id="l3">Archive</label><input type="radio" name="status" id="s3" onClick="cv(3)" value="archive"> </div><input type="hidden" name="staa" id="staa" />   </div><br>                                                                                                                                                                                                                                                                     <div class="modal-footer">                                                     <div id="btns" style=""> <button type="button" name="delete-project"  class="btn btn-primary" style="background-color: red;border-color: white; float:left;" onClick="del()">Delete</button> <input type="submit" name="update-project"  class="btn btn-primary">     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> </div>                             </div>                            </div>                          </div>                        </div>                            </form>                                </div>');

$('.project').click(function(){
    $('body').append(customModal);
$('#myModal .proj-name').val($(this).find('h3').text());
   var id=$(this).data('id');
    $('#myModal .desc').text($(this).data('desc'))      ;
 $('#myModal .reas').text($(this).data('reason'));


    var aa=$(this).data('idate');
    var bb=$(this).data('edate');
    var cc=$(this).data('sales');
    var dd=$(this).data('type');
    var ee=$(this).data('bid');
    var ff=$(this).data('id');
    var t1=$(this).data('type1');
    var t2=$(this).data('type2');
    var hh=$(this).data('duedate');
    var un=$(this).data('uname');
 $('#stage').text($('.page-title').html());
    var step=$(this).data('step');
    $('#myModal .datepicker4').val(aa);
    $('#myModal .datepicker3').val(bb);
    $('#myModal .sales').val(un);
    $('#myModal .type').val(dd);
    $('#myModal .bid').val(ee);
    $('#myModal .p-id').val(ff);
      $('#myModal .step-head').text(step);
    $('#myModal #t1').val(t1);
    $('#myModal #t2').val(t2);
    $('#myModal .due-date').val(hh);
    $('#myModal .datepicker3').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});




$('#myModal .due-date').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});

$('#myModal #datepicker4').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'm/d/Y'              // but starting from today, rather than tomorrow
});


 $('#myModal #check').attr('href','install-checklist?id='+id);
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
                 document.getElementById("reason").style.display="block";
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
    format: 'Y/m/d'              // but starting from today, rather than tomorrow
});

         $('#datepicker1').Zebra_DatePicker({
  direction: 1 ,   // boolean true would've made the date picker future only
    format: 'Y/m/d'              // but starting from today, rather than tomorrow
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
          document.getElementById("reason").style.display="block";
        }
        document.getElementById("staa").value=status;
    }

    // end waqas code ========================
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
