<?php 
include("includes/head.php");
   include("../action/connect.php");
$query ="SELECT * FROM projects";
//$projects= mysql_fetch_array($sql);

	 
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result) or die(mysql_error());
?>
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
    <style>
        .multiselect label {
            display:block;
        }
    </style>
<body style="background-color: rgb(189, 189, 189);">
    
    <div class="container-fluid top-bar">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div id="header"><a class="header-logo js-home-via-logo" href="/"><span class="header-logo-loading"></span><span class="header-logo-default" style="color: #000000;">Game Board</span></a>
            <div class="header-boards-button">
          
            <div class="dropdown">
    <button class="dropdown-toggle btn-dash" type="button" data-toggle="dropdown"><span class="header-btn-icon icon-lg icon-board light"></span><span class="">Boards</span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="#">HTML</a></li>
      <li><a href="#">CSS</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>
  </div>
            
          </div>  
            
           <div><a class="header-btn header-woof woof-hide" href="#"><span class="taco-talk-small-icon"></span><span class="header-btn-text"><span class="left-arrow"></span><span class="js-phrase">New stuff!</span></span></a></div>
            <div class="header-user"><a class="header-btn js-open-add-menu" href="#"><span class="header-btn-icon icon-lg icon-add light"></span></a><div class="dropdown user">
    <a class="dropdown-toggle btn-dash btn-user" type="button" data-toggle="dropdown"><i class="fa fa-user"></i><span class="usr-name">USER</span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="#">Profile</a></li>
      <li><a href="#">Settings</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
  </div><a class="header-btn header-notifications js-open-header-notifications-menu" href="#"><span class="header-btn-icon icon-lg icon-notification light"></span></a></div>
        </div>
    </div>
    <div id="content">
        <div class="board-wrapper">
            <div class="board-main-content">
                <div class="board-header u-clearfix js-board-header">
                    <div class="board-header-btns mod-left">

                        <div class="container">
                            <div class="new">
                    <button type="button" data-toggle="modal" data-target="#myModal"><h4 style="color:white">NEW PROJECT</h4></button>

                        <!-- Modal -->
                                 
                        
                             </div>
                             <ul class="nav navbar-nav menu">
        <li class="active"><a href="http://gameboard.neverbluecrm.com/dashboard/">Est-GB <span class="sr-only">(current)</span></a></li>
        <li><a href="q-tracker.php">Q-Tracker</a></li>
        <li><a href="#">PM-GB</a></li>
                                 <li><a href="#">Service-GB</a></li>
                                 <li><a href="#">Action List</a></li>
      </ul>
                              
                            </div>
 </div>
                
                </div>
               
            </div>
            
        </div>
    </div>
<br><br><br><br><br>

  <div class="row">
    <div class="col-md-1">
        <p>285 Personage Lane</p>
        <p>Time Frame</p>
        <p>Person</p>
        <p>Sign Up for Completion</p>
    </div>
    <div class="col-md-1">
    <p>RECEIVE DEPOSIT/ORDER PACKET/PROJECT INITIATION</p>
        <p>0</p>
        <p>Tasha</p>
        <p><b>Tasha</b></p>
        <div class="multiselect">
            <label><input type="checkbox" name="option[]" value="1" />Receive Deposit</label>
            <label><input type="checkbox" name="option[]" value="2" />Email Team</label>
            <label><input type="checkbox" name="option[]" value="3" />Send Thank-you letter</label>
            <label><input type="checkbox" name="option[]" value="4" />Send Arch-info Request</label>
            <label><input type="checkbox" name="option[]" value="5" />Create Server Folder</label>
            <label><input type="checkbox" name="option[]" value="6" />Create Hard copy Folder</label>
            <label><input type="checkbox" name="option[]" value="7" />Rec'v Signed Quote</label>
            <label><input type="checkbox" name="option[]" value="8" />Rec'v Signed Contract</label>
            <label><input type="checkbox" name="option[]" value="9" />Latest Factory Quote</label>
            <label><input type="checkbox" name="option[]" value="10" />Prep Project Check-in</label>
            <label><input type="checkbox" name="option[]" value="11" />Rec'v Set of Plans</label>
            <label><input type="checkbox" name="option[]" value="12" />Rec'v CADs</label>
            <label><input type="checkbox" name="option[]" value="13" />Rec'v W&D Schedule</label>
            <label><input type="checkbox" name="option[]" value="14" />Give Draftsman</label>
            
        </div>
 
    </div>
    <div class="col-md-1"> 
    <p>DRAFT SET</p>
        <p>4 Business Days</p>
        <p>Peter</p>
        <p><b>----</b></p>
        <div class="multiselect">
            <p>DRAFT 1</p>
            <label><input type="checkbox" name="option[]" value="1" />Page</label>
            <label><input type="checkbox" name="option[]" value="2" />Prep House Elevations</label>
            <label><input type="checkbox" name="option[]" value="3" />Prep Floor Plans</label>
            <label><input type="checkbox" name="option[]" value="4" />Prep Unit Elevations</label>
            <label><input type="checkbox" name="option[]" value="5" />Prep Unit Details</label>
        </div>
        <div class="multiselect">
            <p>DRAFT 2</p>
            <label><input type="checkbox" name="option[]" value="1" />Page</label>
            <label><input type="checkbox" name="option[]" value="2" />Prep House Elevations</label>
            <label><input type="checkbox" name="option[]" value="3" />Prep Floor Plans</label>
            <label><input type="checkbox" name="option[]" value="4" />Prep Unit Elevations</label>
            <label><input type="checkbox" name="option[]" value="5" />Prep Unit Details</label>
        </div>
        <div class="multiselect">
            <p>DRAFT 3</p>
            <label><input type="checkbox" name="option[]" value="1" />Page</label>
            <label><input type="checkbox" name="option[]" value="2" />Prep House Elevations</label>
            <label><input type="checkbox" name="option[]" value="3" />Prep Floor Plans</label>
            <label><input type="checkbox" name="option[]" value="4" />Prep Unit Elevations</label>
            <label><input type="checkbox" name="option[]" value="5" />Prep Unit Details</label>
        </div>
        <div class="multiselect">
            <p>DRAFT 4</p>
            <label><input type="checkbox" name="option[]" value="1" />Page</label>
            <label><input type="checkbox" name="option[]" value="2" />Prep House Elevations</label>
            <label><input type="checkbox" name="option[]" value="3" />Prep Floor Plans</label>
            <label><input type="checkbox" name="option[]" value="4" />Prep Unit Elevations</label>
            <label><input type="checkbox" name="option[]" value="5" />Prep Unit Details</label>
        </div>
    </div>
    <div class="col-md-1">
     <p>CLIENT MEETING</p>
        <p>0</p>
        <p>Sales Rep</p>
        <p><b>----</b></p>
        <div class="multiselect">
            <p>MEETING 1</p>
            <label><input type="checkbox" name="option[]" value="1" />Request Meeting</label>
            <label><input type="checkbox" name="option[]" value="2" />Prep RedLined Notes</label>
            <label><input type="checkbox" name="option[]" value="3" />Create RFI</label>
            <label><input type="checkbox" name="option[]" value="4" />Create F-RFI</label>
            <label><input type="checkbox" name="option[]" value="5" />Give Draftsman</label>
        </div>
        <div class="multiselect">
            <p>MEETING 2</p>
            <label><input type="checkbox" name="option[]" value="1" />Request Meeting</label>
            <label><input type="checkbox" name="option[]" value="2" />Prep RedLined Notes</label>
            <label><input type="checkbox" name="option[]" value="3" />Create RFI</label>
            <label><input type="checkbox" name="option[]" value="4" />Create F-RFI</label>
            <label><input type="checkbox" name="option[]" value="5" />Give Draftsman</label>
        </div>
        <div class="multiselect">
            <p>MEETING 3</p>
            <label><input type="checkbox" name="option[]" value="1" />Request Meeting</label>
            <label><input type="checkbox" name="option[]" value="2" />Prep RedLined Notes</label>
            <label><input type="checkbox" name="option[]" value="3" />Create RFI</label>
            <label><input type="checkbox" name="option[]" value="4" />Create F-RFI</label>
            <label><input type="checkbox" name="option[]" value="5" />Give Draftsman</label>
        </div>
        <div class="multiselect">
            <p>MEETING 4</p>
            <label><input type="checkbox" name="option[]" value="1" />Request Meeting</label>
            <label><input type="checkbox" name="option[]" value="2" />Prep RedLined Notes</label>
            <label><input type="checkbox" name="option[]" value="3" />Create RFI</label>
            <label><input type="checkbox" name="option[]" value="4" />Create F-RFI</label>
            <label><input type="checkbox" name="option[]" value="5" />Give Draftsman</label>
        </div>
      </div>
    <div class="col-md-1">        
        <p>COMPLETE FIRST SUBMITTAL SET</p>
        <p>3 Business Days</p>
        <p>Peter</p>
        <p><b>----</b></p>
        <div class="multiselect">
            <label><input type="checkbox" name="option[]" value="1" />Shops Cover Page</label>
            <label><input type="checkbox" name="option[]" value="2" />Schedule</label>
            <label><input type="checkbox" name="option[]" value="3" />Specifications</label>
            <label><input type="checkbox" name="option[]" value="4" />General Notes</label>
            <label><input type="checkbox" name="option[]" value="5" />Terms & Conditions</label>
            <label><input type="checkbox" name="option[]" value="6" />House Elevations</label>
            <label><input type="checkbox" name="option[]" value="7" />House Floor Plans</label>
            <label><input type="checkbox" name="option[]" value="8" />Unit Elevations</label>
            <label><input type="checkbox" name="option[]" value="9" />Unit Details</label>
            <label><input type="checkbox" name="option[]" value="10" />Glass Page</label>
            <label><input type="checkbox" name="option[]" value="11" />Hardware Page</label>
            <label><input type="checkbox" name="option[]" value="12" />Typical Install Details</label>
            <label><input type="checkbox" name="option[]" value="13" />Photo Release</label>
            <label><input type="checkbox" name="option[]" value="14" />Terms of Approval</label>
        </div>
    </div>
    <div class="col-md-1">        
        <p>INTERNAL REVIEW</p>
        <p>2 Business Days</p>
        <p>Sales Rep</p>
        <p><b>----</b></p>
        <div class="multiselect">
            <label><input type="checkbox" name="option[]" value="1" />Review General Notes</label>
            <label><input type="checkbox" name="option[]" value="2" />Check Elevations</label>
            <label><input type="checkbox" name="option[]" value="3" />Check Details</label>
            <label><input type="checkbox" name="option[]" value="4" />Notes to Draftsman,&/or</label>
            <label><input type="checkbox" name="option[]" value="5" />Confirm to Tasha</label>
        </div>
    </div>
    <div class="col-md-1">
        <p>SUBMITTAL #1</p>
        <p>0</p>
        <p>Tasha</p>
        <p><b>Tasha</b></p>
        <div class="multiselect">
            <label><input type="checkbox" name="option[]" value="1" />Send to Client</label>
            <label><input type="checkbox" name="option[]" value="2" />Notify Rep</label>
        </div>

    </div>
    <div class="col-md-1">
        <p>SALES REP F/U</p>
        <p>0</p>
        <p>Sales Rep</p>
        <p><b>----</b></p>
        <div class="multiselect">
            <label><input type="checkbox" name="option[]" value="1" />Folow Up w/Client</label>
            <label><input type="checkbox" name="option[]" value="2" />receive RedLines</label>
            <label><input type="checkbox" name="option[]" value="3" />Review Redlines</label>
        </div>

    </div>
    <div class="col-md-1"> 
        <p>REDLINES REVIEW</p>
        <p>0</p>
        <p>Sales Rep & Peter</p>
        <p><b>----</b></p>
        <div class="multiselect">
            <label><input type="checkbox" name="option[]" value="1" />Meet & Discuss</label>
            <label><input type="checkbox" name="option[]" value="2" />Prep Revision Set</label>
            <label><input type="checkbox" name="option[]" value="3" />Send Set for Rep Review</label>
        </div>

    </div>
    <div class="col-md-1"> 
        <p>INTERNAL REVIEW OF REVISION</p>
        <p>0</p>
        <p>Sales Rep</p>
        <p><b>----</b></p>
        <div class="multiselect">
            <label><input type="checkbox" name="option[]" value="1" />Review General Notes</label>
            <label><input type="checkbox" name="option[]" value="2" />Check Unit Elevation</label>
            <label><input type="checkbox" name="option[]" value="3" />Check Details</label>
            <label><input type="checkbox" name="option[]" value="4" />Notes of Draftsman,or</label>
            <label><input type="checkbox" name="option[]" value="5" />Confirm to Tasha</label>
        </div>

    </div>
      <div class="col-md-1"> 
        <p>SUBMITAL #2</p>
        <p>0</p>
        <p>Tasha</p>
        <p><b>Tasha</b></p>
        <div class="multiselect">
            <label><input type="checkbox" name="option[]" value="1" />Send to Client</label>
            <label><input type="checkbox" name="option[]" value="2" />Notify Rep</label>
            <p>(may repeat step)</p>
        </div>

    </div>
</div>
    <script>
          jQuery.fn.multiselect = function() {
        $(this).each(function() {
            var checkboxes = $(this).find("input:checkbox");
            checkboxes.each(function() {
                var checkbox = $(this);
                // Highlight pre-selected checkboxes
                if (checkbox.prop("checked"))
                    checkbox.parent().addClass("multiselect-on");

                // Highlight checkboxes that the user selects
                checkbox.click(function() {
                    if (checkbox.prop("checked"))
                        checkbox.parent().addClass("multiselect-on");
                    else
                        checkbox.parent().removeClass("multiselect-on");
                });
            });
        });
    };
        $(function() {
     $(".multiselect").multiselect();
});
</script>

</body>

