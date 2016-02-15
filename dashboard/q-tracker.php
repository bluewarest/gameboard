<style>
    .modal-dialog {
    width: 650px!important;
}
#search-f
{
color: white;
    margin: 0 auto;
    height: 40px;
    background-color: #3689B9;
    padding: 10px;
    text-align: center;
    border: 1px solid #6B6161
}
.CSSTableGenerator {
    margin: 50px auto;
    padding: 0px;
    width: 65%;
    border: 1px solid #000000;
    border-top-left-radius: 0px;
}.CSSTableGenerator table{
    border-collapse: collapse;
        border-spacing: 0;
	width:100%;
	height:100px;
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
	background-color:#ffffff;


}
.CSSTableGenerator td{
	vertical-align:middle;

	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#c9c2bb", endColorstr="#ffffff");	background: -o-linear-gradient(top,#c9c2bb,ffffff);

	background-color:#FDFDFD;

	border:1px solid #000000;
	border-width:0px 1px 1px 0px;
	text-align:left;
	padding:5px;
	font-size:13px;
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
		background:-o-linear-gradient(bottom, #8e867f 5%, #8e867f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8e867f), color-stop(1, #8e867f) );
	background:-moz-linear-gradient( center top, #8e867f 5%, #8e867f 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8e867f", endColorstr="#8e867f");	background: -o-linear-gradient(top,#8e867f,8e867f);

	background-color:#8e867f;
	border:0px solid #000000;
	text-align:center;
	border-width:0px 0px 1px 1px;
	font-size:15px;
	font-family:Arial;
	font-weight:bold;
	color:#ffffff;
}
.CSSTableGenerator tr:first-child:hover td{
	background:-o-linear-gradient(bottom, #8e867f 5%, #8e867f 100%);	background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #8e867f), color-stop(1, #8e867f) );
	background:-moz-linear-gradient( center top, #8e867f 5%, #8e867f 100% );
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr="#8e867f", endColorstr="#8e867f");	background: -o-linear-gradient(top,#8e867f,8e867f);

	background-color:#8e867f;
}
.CSSTableGenerator tr:first-child td:first-child{
	border-width:0px 0px 1px 0px;
}
.CSSTableGenerator tr:first-child td:last-child{
	border-width:0px 0px 1px 1px;
}
</style>
<?php
include("includes/head.php");
include("../action/connect.php");
include "../unc.php";
?>

    <style>
        .multiselect label {
            display:block;
        }
    </style>
<body style="background-color: rgb(189, 189, 189);">


  <?php include("includes/topbar.php");?>
    <div id="content">
        <div class="board-wrapper">
            <div class="board-main-content">

                <?php include "includes/navbar.php"; ?>

            </div>

        </div>
    </div>
<br><br>

<div class="row" style="margin:0;">
    <h3  class="page-title">Project Status</h3>
    <h5 id="search-f">Search Filter
        <input onclick="vv('all')" type="radio" name="type" value="all" <?php if(isset($_GET['type']) && $_GET['type']=='all'){ ?> checked <?php }  ?>/>All |
        <input onclick="vv('open')" type="radio" name="type" value="open" <?php if(isset($_GET['type']) && $_GET['type']=='open'){ ?> checked <?php }  ?>/>Open |

        <input onclick="vv('won')" type="radio" name="type" value="win" <?php if(isset($_GET['type']) && $_GET['type']=='won'){ ?> checked <?php }  ?>/>Won |
        <input onclick="vv('lost')" type="radio" name="type" value="lost" <?php if(isset($_GET['type']) && $_GET['type']=='lost'){ ?> checked <?php }  ?>/>Lost |
        <input onclick="vv('archive')" type="radio" name="type" value="archive" <?php if(isset($_GET['type']) && $_GET['type']=='archive'){ ?> checked <?php }  ?> />Archive
    </h5>
    <div class="CSSTableGenerator" >
                <table >
                    <tr>
                        <td>
                            INITIAL QUOTE REQUEST DATE
                        </td>
                        <td >
                            LAST PROPOSAL DATE
                        </td>
                        <td>
                            SALES REP
                        </td>
                        <td>
                            PRODUCT TYPE 1
                        </td>
                        <td>
                            PRODUCT TYPE 2
                        </td>
                        <td>
                            PROJECT NAME
                        </td>
                        <td>
                            PRODUCT BID
                        </td>
                        <td>
                            STATUS
                        </td>
                    </tr>
<?php
//session_start();
$id=$_SESSION['USER_LOGGED_IN']['Id'];
$qq="";
if(isset($_GET['type']))
{
$typ=$_GET['type'];
$qq=" where status='".$typ."'";
    if($_GET['type']=='all')
    {
    $qq="";
    }
}
$q="select * from projects".$qq;
$res=mysql_query($q);
while($proj_res=mysql_fetch_array($res))
{
    $idu=$proj_res['id'];
    $resu=mysql_query("select * from quote_manager where project_id=$idu and status='approved'");
    $ou=mysql_fetch_array($resu);
    //echo mysql_error();
?>
                    <tr>
                        <td >
                           <?php echo $proj_res['initial_date']; ?>
                        </td>
                        <td>
                            <?php  $req=$proj_res['id']; 
                                    $qq="select * from quote_manager where status='approved' and project_id=$req order by id desc"; 
                                    $ress=mysql_query($qq);
                                    $o=mysql_fetch_array($ress);
                                    echo $o['qdate'];
                            
                            ?>
                        </td>
                        <td>
                           <?php echo $proj_res['sales_rep']; ?>
                        </td>
                        <td >
                           <?php echo $proj_res['type1']; ?>
                        </td>
                        <td >
                           <?php echo $proj_res['type2']; ?>
                        </td>
                        <td>
                            <a href="#" class="pro" class="project" value="<?php echo $heading_res['id']; ?>" data-name="<?php echo $proj_res['name']; ?>" data-desc="<?php echo $proj_res['description']; ?>" data-idate="<?php echo $proj_res['initial_date']; ?>" data-reason="<?php echo $proj_res['reason']; ?>" data-type1="<?php echo $proj_res['type1']; ?>" data-type2="<?php echo $proj_res['type2']; ?>" data-uname="<?php echo $uname; ?>" data-status="<?php echo $proj_res['status']; ?>" 
                               data-qq="<?php echo $ou['qdate']; ?>"

                              data-edate="<?php echo $row_status->qdate; ?>" data-sales="<?php echo $proj_res['sales_rep']; ?>" data-bid="<?php echo $proj_res['product_bid']; ?>" data-id="<?php echo $proj_res['id']; ?>" data-step="<?php echo $heading_res['name']; ?>"
                              data-an="<?php echo $proj_res['aname']; ?>"
                              data-bn="<?php echo $proj_res['bname']; ?>"
                              data-hn="<?php echo $proj_res['hname']; ?>"><?php echo $proj_res['name'] ?>
<div style="display:none;" class="project-info" value="<?php echo $heading_res['id']; ?>" data-name="<?php echo $proj_res['name']; ?>" class="project" value="<?php echo $heading_res['id']; ?>" data-desc="<?php echo $proj_res['description']; ?>" data-idate="<?php echo $proj_res['initial_date']; ?>" data-reason="<?php echo $proj_res['reason']; ?>" data-type1="<?php echo $proj_res['type1']; ?>" data-type2="<?php echo $proj_res['type2']; ?>" data-uname="<?php echo $uname; ?>"  data-status="<?php echo $proj_res['status']; ?>"   data-qq="<?php echo $ou['qdate']; ?>"

                              data-edate="<?php echo $row_status->qdate; ?>" data-sales="<?php echo $proj_res['sales_rep']; ?>" data-bid="<?php echo $proj_res['product_bid']; ?>" data-id="<?php echo $proj_res['id']; ?>" data-step="<?php echo $heading_res['name']; ?>"
                              data-an="<?php echo $proj_res['aname']; ?>"
                              data-bn="<?php echo $proj_res['bname']; ?>"
                              data-hn="<?php echo $proj_res['hname']; ?>" >
                            </a>
                        </td>
                        <td>
                            <?php echo "$".$proj_res['product_bid']; ?>
                        </td>
                         <td>
                            <?php echo strtoupper($proj_res['status']); ?>
                        </td>
                    </tr>
<?php
}
?>
                </table>
            </div>

</div>
</div>
<script src="<?php echo $unc;?>js/qtracker.js"></script>
<script type="text/javascript" src="dp/zebra_datepicker.js"></script>
<script>
function vv(data)
{
window.location="<?php echo $unc; ?>dashboard/q-tracker.php?type="+data;
}
</script>
<?php include("includes/footer.php");  ?>