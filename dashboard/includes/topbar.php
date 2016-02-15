<div class="container-fluid top-bar">
        <!-- Brand and toggle get grouped for better mobile display -->

        <div id="header"><a class="header-logo js-home-via-logo" href="http://gameboard.neverbluecrm.com/dev/dashboard/"><span class="header-logo-loading"></span><span class="header-logo-default" style="color: #000000;">Game Board</span></a>
            <div class="header-boards-button">
          
    <div class="dropdown">
    <button class="dropdown-toggle btn-dash" type="button" data-toggle="dropdown"><span class="header-btn-icon icon-lg icon-board light"></span><span class="">Boards</span>
    </button>
    <ul class="dropdown-menu">
      <li><a href="http://gameboard.neverbluecrm.com/dev/dashboard">Home</a></li>

    </ul>
  </div>
 
<?php

$uname=$_SESSION['USER_LOGGED_IN']['Firstname']." ".$_SESSION['USER_LOGGED_IN']['Lastname'];
if($_SESSION['USER_LOGGED_IN']['Level']==0)
{ ?>              
    <button class="dropdown-toggle btn-dash" type="button" data-toggle="dropdown" onclick="window.open('<?php echo $unc; ?>dashboard/admin/admin.php');"><span class="">Admin</span>
    </button>  
<?php } ?>
            
          </div>  
            
           <div><a class="header-btn header-woof woof-hide" href="#"><span class="taco-talk-small-icon"></span><span class="header-btn-text"><span class="left-arrow"></span><span class="js-phrase">New stuff!</span></span></a></div>
            <div class="header-user">
                
<?php
//session_start();
?>
            
                
                <a style="display:none;" class="header-btn js-open-add-menu" href="#" data-toggle="modal" data-target="#newProject">
                <span class="header-btn-icon icon-lg icon-add light"></span>
                </a>

                <div class="dropdown user">
    <a class="dropdown-toggle btn-dash btn-user" type="button" data-toggle="dropdown"><i class="fa fa-user"></i><span class="usr-name">USER</span>
    </a>
    <ul class="dropdown-menu">
      <li><a href="<?php echo $unc; ?>dashboard/profile.php">Profile</a></li>
      <li style="display:none;"><a href="#">Settings</a></li>
      <li><a href="/logout">Logout</a></li>
    </ul>
  </div><a class="header-btn header-notifications js-open-header-notifications-menu" href="#"><span class="header-btn-icon icon-lg icon-notification light"></span></a></div>
        </div>
    </div>


<div id="newProject" class="modal fade" role="dialog">                             
    <div class="col-sm-12">
    <form class="form-add" method="post" action="../../action/save-proj.php" enctype="multipart/form-data">                          
        <div class="modal-dialog">                           
            <!-- Modal content-->                           
            <div class="modal-content">                              
                <div class="modal-header"><button type="button" class="close" data-dismiss="modal">&times;</button>                                   
                    <label for="comment">Project Name:</label><input type="text" name="name"/>

        <label>Initial Date:</label><input type="text" name="d1" id="datepicker1" value="<?php echo date("Y/m/d"); ?>" />
        <label>Quote Date:</label><input type="text" name="d2" id="datepicker2" />
        <label>Sales Rep:</label><input type="text" name="sales" value="<?php echo $uname; ?>" />
        <label>Project Bid:</label><input type="text" name="bid" />
        <hr>
        <!--<label>Step:</label><input type="text" name="xtep" />-->
       <label>
    Product Type:</label>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <label>Type1</label>
        <select style="width: 26%;" name="t1" id="t1">
            <option>PanoramAH</option>
            <option>TW-WS Alum</option>
            <option>TW-WS Wood</option>
            <option>TW-WS PVC</option>
        </select>
    </div>
</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <label>Type2</label>
        <select style="width: 26%;" name="t2" id="t2">
            <option>PanoramAH</option>
            <option>TW-WS Alum</option>
            <option>TW-WS Wood</option>
            <option>TW-WS PVC</option>
        </select>
    </div>
</div>
                    
            
        <hr>
        </div><div class="modal-body"><div class="row"><div class="col-sm-9"><div class="form-group"><label for="comment">Description:</label><textarea class="form-control" rows="5" id="desc" name="description"></textarea></div>                                
                </div>
        </div>                                                                
                </div>                              
                <div class="modal-footer">   
                    <input type="hidden" name="page" value="est" />
                    <button type="submit" class="btn btn-success" name="add-project" value="submit">Add</button>                                 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                              
                </div>                            
            </div>                          
        </div>                        
        </div>                            
        </form>                                
    </div> 