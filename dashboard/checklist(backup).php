<?php
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

                
if(isset($_POST['note']))  
{
$date=$_POST['date'];  
$note=$_POST['note'];  
$ck=$_GET['id'];  
    $file=$_FILES["file"]["name"];
    $target_dir = "uploads/";
    $length = 6;
    $randomString = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
    $target_file = $target_dir .$randomString. basename($_FILES["file"]["name"]);
 move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);   
$q="insert into notes (note,user,date,checklist,file) values ('$note','$user','$date','$ck','$target_file')";
    $res=mysql_query($q);
    if($res)
        echo "<script>alert('Note added!')</script>";
    else
        echo mysql_error();
}
                
?>
<style>
.CSSTableGenerator {
	margin:0px;padding:0px;
	width:100%;
	box-shadow: 10px 10px 5px #888888;
	border:1px solid #000000;
	
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
	
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
	
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
	
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100%;
	margin:0px;padding:0px;
}.CSSTableGenerator tr:last-child td:last-child {
	-moz-border-radius-bottomright:0px;
	-webkit-border-bottom-right-radius:0px;
	border-bottom-right-radius:0px;
}
.CSSTableGenerator table tr:first-child td:first-child {
	-moz-border-radius-topleft:0px;
	-webkit-border-top-left-radius:0px;
	border-top-left-radius:0px;
}
.CSSTableGenerator table tr:first-child td:last-child {
	-moz-border-radius-topright:0px;
	-webkit-border-top-right-radius:0px;
	border-top-right-radius:0px;
}.CSSTableGenerator tr:last-child td:first-child{
	-moz-border-radius-bottomleft:0px;
	-webkit-border-bottom-left-radius:0px;
	border-bottom-left-radius:0px;
}.CSSTableGenerator tr:hover td{
	
}
.CSSTableGenerator tr:nth-child(odd){ background-color:#ffffff; }
.CSSTableGenerator tr:nth-child(even)    { background-color:#c9deea; }.CSSTableGenerator td{
	vertical-align:middle;
	
	
	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:7px;
font-size: inherit;
	font-family:Arial;
	font-weight:normal;
	color:#000000;
}.CSSTableGenerator tr:last-child td{
	border-width:0px 1px 0px 0px;
}.CSSTableGenerator tr td:last-child{
	border-width:0px 0px 1px 0px;
}.CSSTableGenerator tr:last-child td:last-child{
	border-width:0px 0px 0px 0px;
}
.CSSTableGenerator tr:first-child td{
		background:-o-linear-gradient(bottom, #3a8bba 5%, #3a8bba 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3a8bba), color-stop(1, #3a8bba) );
	background:-moz-linear-gradient( center top, #3a8bba 5%, #3a8bba 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#3a8bba", endColorstr="#3a8bba");	background: -o-linear-gradient(top,#3a8bba,3a8bba);

	background-color:#3a8bba;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	    font-size: inherit;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #3a8bba 5%, #3a8bba 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #3a8bba), color-stop(1, #3a8bba) );
	background:-moz-linear-gradient( center top, #3a8bba 5%, #3a8bba 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#3a8bba", endColorstr="#3a8bba");	background: -o-linear-gradient(top,#3a8bba,3a8bba);

	background-color:#3a8bba;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}                
</style>
                <h3 class="page-title">
    Checklist
    </h3>
                

                    <style>
                        .multiselect label {
                            display: block;
                        }

                    #checklist    th {
                            text-align: center;
                            font-size: 12px;
                        }

                       #checklist td {
                            font-size: 12px;
                            padding: 5px;
                        }
                    </style>

                    <body>


                        <table id="checklist" class="table table-hover">
                            <thead>
                                <th>
                                    Project Name
                                </th>
                                <th>
                                 PROJECT INITIATION
                                </th>
                                <th>
                                    DRAFT SET
                                </th>
                                <th>
                                    CLIENT MEETING
                                </th>
                                <th>
                                    COMPLETE FIRST SUBMITTAL SET
                                </th>
                                <th>
                                    INTERNAL REVIEW
                                </th>
                                <th>
                                    SUBMITTAL #1
                                </th>
                                <th>
                                    SALES REP F/U
                                </th>
                                <th>
                                    REDLINES REVIEW
                                </th>
                                <th>
                                    INTERNAL REVIEW OF REVISION
                                </th>
                                <th>
                                    SUBMITAL #2
                                </th>
                                   <th>
                                    SUBMITAL #3
                                </th>
                                   <th>
                                    FINAL SIGNED SET RECD & ORDER PREP

                                </th>

                            </thead>
                         <!--   <tbody>

                                <tr>
                                    <td class="sub-head">Time Frame</td>

                                    <td> 0 Business Days </td>
                                    <td> 4 Business Days </td>
                                    <td> 7 Business Days </td>
                                    <td> 3 Business Days </td>
                                    <td> 2 Business Days </td>
                                    <td> 5 Business Days </td>
                                    <td> 6 Business Days </td>
                                    <td> 2 Business Days </td>
                                    <td> 5 Business Days </td>
                                    <td> 6 Business Days </td>
                                    <td> 5 Business Days </td>
                                    <td> 6 Business Days </td>
                                </tr>
                                <tr>
                                    <td class="sub-head">Person</td>
                                    <td> Tasha </td>
                                    <td> Sales Rep </td>
                                    <td> Tasha </td>
                                    <td> Sales Rep </td>
                                    <td> Tasha </td>
                                    <td> Sales Rep </td>
                                    <td> Tasha </td>
                                    <td> --- </td>
                                    <td> Sales Rep and Peter </td>
                                    <td> --- </td>
                                    <td> Sales Rep </td>
                                    <td> Tasha </td>
                                </tr>
                                <tr>
                                    <td class="sub-head">Sign Up for Completion</td>
                                    <td> Tasha </td>
                                    <td> Peter </td>
                                    <td> Tasha </td>
                                    <td> Peter </td>
                                    <td> Tasha </td>
                                    <td> Peter and Tasha </td>
                                    <td> --- </td>
                                    <td> Peter </td>
                                    <td> --- </td>
                                    <td> Peter </td>

   <td> Tasha </td>
                                    <td> --- </td>
                                </tr> 
                            </tbody> -->

                            <tfoot><div class="final-docs" style="    height: 300px;
    width: 600px;
    position: absolute;
    background: white;
    top: 700px;
    right: 100px;padding:15px;">
    <h1>Final Documents</h1>
                                <form>
<input type="text" name="doc_nam" placeholder="Title of Document" />
                                    <input type="file"/>
                                    <input type="submit"/>
                                 

</form>
                                

</div>
                                <tr class="row-1">
                                    <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" value="Receive Deposit" />Receive Deposit</label>
                                    </td>
                                    <td class="title">
                                        <label>
                                            Draft 1 </label>
                                    </td>
                                     <td class="title">
                                        <label>
                                            Meeting 1 </label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" value="Receive Deposit" />Shops Cover Page </label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" value="Receive Deposit" />Review General Notes </label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" value="Receive Deposit" />Send to Client</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" value="Receive Deposit" />Folow Up w/Client </label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" value="Receive Deposit" />Meet & Discuss </label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" value="Receive Deposit" />Review General Notes </label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" value="Receive Deposit" />Send to Client </label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" value="Receive Deposit" />Send to Client </label>
                                    </td>   <td class="option"><label><input type="checkbox" name="option[]" value="2" /> Rec'v Final Contract
</label></td>
                                </tr>
                                <tr class="row-2">
                                    <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="2" />Email Team</label>
                                    </td>
                                      <td class="option"><label><input type="checkbox" name="option[]" value="1" />Page</label></td>
                                     <td class="option"><label><input type="checkbox" name="option[]" value="1" />Request Meeting</label></td>
                                    <td class="option"><label><input type="checkbox" name="option[]" value="2" />Schedule</label></td>
                                      <td class="option"><label><input type="checkbox" name="option[]" value="2" />Check Elevations</label></td>
                                    <td class="option"><label><input type="checkbox" name="option[]" value="2" />Notify Rep</label></td>
                                    <td class="option"><label><input type="checkbox" name="option[]" value="2" />Receive RedLines</label></td>
                                    <td class="option"><label><input type="checkbox" name="option[]" value="2" />Prepare Revision Set
</label></td>
                                    <td class="option"><label><input type="checkbox" name="option[]" value="2" />Check Unit Elevation</label></td>
                                    <td class="option"><label><input type="checkbox" name="option[]" value="2" />Notify Rep</label></td>
                                    <td class="option"><label><input type="checkbox" name="option[]" value="2" />Notify Rep</label></td>
                                    <td class="option"><label><input type="checkbox" name="option[]" value="2" />Rec'v Signed Shops
</label></td>



                                </tr>
                                <tr class="row-3">

                                </tr>
                                <tr  class="row-4">
                                    <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="4" />Send Thank-You Letter
</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="4" />Prep House Elevations

</label>
                                    </td>

                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="4" />Prep Red Lined Notes



</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="4" />Specifications


</label>
                                    </td>  <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="4" />Check Details



</label>
                                    </td>

                                       <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="4" />Review Red Lines



</label>
                                    </td>
                                      <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="4" />Send Set for Rep Review



</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="4" />Check Details



</label>
                                    </td>
                                    <td>&nbsp;
                                    </td>
                                    <td>&nbsp;
                                    </td>
                                      <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="4" />Rec'v Production Deposit




</label>
                                    </td>

                                </tr>
                                <tr  class= "row-5">
                                    <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="5" />Send Arch-Info Request
</label>
                                    </td><td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="5" />Prep Floor Plans

</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="5" />Create RFI


</label>
                                    </td> <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="5" />General notes



</label>
                                    </td><td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="5" />Notes to Draftsman




</label>
                                    </td>
                                          <td>&nbsp;
                                    </td>
                                          <td>&nbsp;
                                    </td>
                                          <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="5" />Notes to Draftsman




</label>
                                    </td>
                                            <td>(may repeat steps 9-12)

                                    </td>
                                            <td>(may repeat steps 9-12)

                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="5" />Factory Order Prepped






</label>
                                    </td>

                                </tr>
                                <tr  class="row-6">
                                    <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="7" />Create Server Folder
</label>
                                    </td>

                                     <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="7" />Prep Unit Elevations

</label>
                                    </td>
                                       <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="7" />Create F-RFI


</label>
                                    </td>
                                         <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="7" />Terms & conditions



</label>
                                    </td>   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="7" />Confirm to Tasha




</label>
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                       <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="7" />Confirm to Tasha




</label>
                                    </td>
                                     <td>&nbsp;
                                    </td>
                                     <td>&nbsp;
                                    </td>
                                      <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="7" />In Production





</label>
                                    </td>

                                </tr>
                                <tr  class="row-7">
                                    <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="8" />Create Hard Copy Folder
</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="8" />Prep Unit Details

</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="8" />Give Draftsman


</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="8" />House Elevations



</label>
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                       <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="8" />Send Order Confirm

</label>
                                    </td>
                                </tr>
                                <tr  class="row-8">
                                    <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="8" />Rec'v Signed Quote
</label>
                                    </td>
                                      <td>&nbsp;
                                    </td>
                                      <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="8" />House Floor Plans

</label>
                                    </td>

                                </tr>
                                <tr  class="row-9">
                                    <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="10" />Rec'd Signed Contract
</label>
                                    </td>
                                     <td class="title">
                                        <label>
                                            DRAFT 2
</label>
                                    </td>
                                    <td class="title">
                                        <label>
                                            MEETING 2
</label>
                                    </td>
                        <td>&nbsp;
                                    </td>
                                </tr>
                                <tr class="row-10">
                                    <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Latest Factory Quote
</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Shops Cover Page

</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Request Meeting


</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Unit Details



</label>
                                    </td>


                                </tr>
                                <tr  class="row-11">
                                   <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Project Check-In

</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep House Elevations


</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Red Lined Notes



</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Glass Page




</label>
                                    </td>


                                </tr>
                                </tr>
                                <tr  class="row-12">
                                   <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Rec'v Set of Plans


</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Floor Plans



</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Create RFI




</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Hardware Page





</label>
                                    </td>

                                </tr>
                                <tr class="row-13">
                                     <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Rec'v CADs



</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Unit Elevations




</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Create F-RFI





</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Typical install Details






</label>
                                    </td>

                                </tr>
                         <tr class="row-14">
                                     <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Rec'v W&D Schedule




</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Unit Details




</label>
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Give Draftsman






</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Photo release







</label>
                                    </td>

                                </tr>
                        <tr class="row-15">
                                     <td>&nbsp;
                                    </td>
                                    <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Give Draftsman





</label>
                                    </td>
                                      <td>&nbsp;
                                    </td>      <td>&nbsp;
                                    </td>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Terms of approval








</label>
                                    </td>

                                </tr>
             <tr class="row-15">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                    <td class="title">
                                        <label>
                                            DRAFT 3</label>
                 </td>
                                        <td class="title">
                                        <label>
                                            MEETING 3</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
             <tr class="row-16">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Shops Cover Page



</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Request Meeting









</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            <tr class="row-17">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep House Elevations




</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Red Lined Notes










</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            <tr class="row-18">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Floor Plans





</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Create RFI











</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            <tr class="row-18">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Unit Elevations






</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Create F-RFI












</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
              <tr class="row-18">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Unit Details







</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Give Draftsman













</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            <tr class="row-19">
            </tr>
             <tr class="row-20">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="title">
                                        <label>
                                        DRAFT 4

</label>
                                    </td>
                                        <td class="title">
                                        <label>
                                       MEETING 4

</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            <tr class="row-21">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Shops Cover Page








</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Request Meeting














</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            <tr class="row-22">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep House Elevations









</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Red Lined Notes















</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            <tr class="row-23">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Floor Plans










</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Create RFI
















</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            <tr class="row-24">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Unit Elevations











</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Create F-RFI
















</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            <tr class="row-25">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Unit Elevations











</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Create F-RFI
















</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
             <tr class="row-26">
                                     <td>&nbsp;
                                    </td>
                 <td>&nbsp;
                                    </td>
                                   <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Prep Unit Details












</label>
                                    </td>
                                        <td class="option">
                                        <label>
                                            <input type="checkbox" name="option[]" value="11" />Give Draftsman

















</label>
                                    </td>
                       <td>&nbsp;
                                    </td>
                                </tr>
            
                            </tfoot>

                        </table>
<div class="container">
<div class="row">

<div class="col-md-12">
    <h2>Summary of activity on the job
</h2>
    
    <form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-12">
    <h3 style="color: white;
    background-color: #3A8BBA;
    padding: 10px;
    border-radius: 5px;
    text-align: center;">Add Notes</h3>
        <div>
            <textarea type="text" name="note" placeholder="Enter Note here" required ></textarea>
        </div><br>
        <div>
            <input type="text" name="date" value="<?php echo date('d/m/Y'); ?>" />
        </div><br>
        <p><input type="hidden" name="user" value="<?php echo $user; ?>"/> <b>  Upload File:</b>  <input name="file" id="file" type="file" multiple /></p>
        <br> <input style="float: right;" type="submit" name="submit" value="Add Note"/>
    </div>
     
 </form>
    </div></div>

    
     <div class="list-notes">
<br><br>
        <h3 style="color: white;
    background-color: #3A8BBA;
    padding: 10px;
    border-radius: 5px;
    text-align: center;">Notes</h3>
         <div class="CSSTableGenerator" >
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
  $q="select * from notes where checklist='$idd' and user='$user'";  
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
                            <?php echo $d['note']; ?>
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

<div class="test" style="    height: 300px;
    width: 100%;

    background: white;
    top: 800px;
    right: 50px;">
            <div class="col-md-12">
                <h3>Communications</h3>
                  <div class="col-md-6">
                <label><input type="checkbox" name="peter"/> Peter</label></br>
                    <label><input type="checkbox" name="peter"/> John</label></br>
                    <label><input type="checkbox" name="peter"/> Josh</label></br>
                    <label><input type="checkbox" name="peter"/> Tasha</label></br>
<label><input type="checkbox" name="peter"/> Sales Rep</label>
</div>
<div class="col-md-6">
<label><input type="checkbox" name="peter"/> Call</label></br>
                    <label><input type="checkbox" name="peter"/> Text</label></br>
                    <label><input type="checkbox" name="peter"/> Skype</label></br>
                    <label><input type="checkbox" name="peter"/> Email</label></br>

</div>
                </div>
            </div>
        </body>

<?php
include("includes/footer.php"); ?>
