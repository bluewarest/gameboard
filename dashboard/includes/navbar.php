<style>
 .ww
    {
    padding: 15px;
    background: #3A8BBA;
    margin-top: 0;
    color: white;
    border-radius: 4px;
    box-shadow: 4px 4px 1px 1px #7FA8D1;
    }
.menu {
    max-width: 1080px!important;
}
</style>    
<div class="board-header u-clearfix js-board-header">
                    <div class="board-header-btns mod-left">

                        <div class="container">
                            <div class="new">
                            <h4 style="display:none;" class="page-title ww" style="cursor:pointer;" data-toggle="modal" data-target="#newProject">New Project</h4>    
                    <?php
                    $page=$_SERVER['REQUEST_URI'];

                     if (strpos($page,'estimating?id') !== false ||
                        strpos($page,'drafting-checklist?id') !== false ||
                        strpos($page,'production-checklist?id') !== false ||
                        strpos($page,'install-checklist?id') !== false)
                     {
                     $query ="SELECT * FROM projects where id=".$_GET['id'];
                    $result = mysql_query($query) or die(mysql_error());
                    $row = mysql_fetch_array($result) or die(mysql_error());
                    ?>
                    <h4 style="margin-right: 20px;" class="page-title ww">Project Name: <?php echo $row['name'];?></h4>
                    <?php
                     
                     }
                    //echo $page;
                  
                   
                        
                    ?>
                        <!-- Modal -->
                                 
                        
                             </div>
                             <ul class="nav navbar-nav menu">
        
       
        
        <li><a href="<?php echo $unc; ?>dashboard/index.php">Estimating</a></li>
        <li><a href="<?php echo $unc; ?>dashboard/q-tracker.php?type=all">Q-Tracker</a></li>
        <li><a href="<?php echo $unc; ?>dashboard/receive-deposit.php">Receive Deposit</a></li>
        <li><a href="<?php echo $unc; ?>dashboard/pm-gb.php">Drafting</a></li>
        <li><a href="<?php echo $unc; ?>dashboard/pm.php">Production</a></li>
        <li><a href="<?php echo $unc; ?>dashboard/install.php">Installation</a></li>
        <li><a href="<?php echo $unc; ?>dashboard/calendar/index.php">Calendar</a></li>
 
        <!--<li><a href="#">Action List</a></li>
        <li><a href="#">Service-GB</a></li>-->
      </ul>
                              
                            </div>
 </div>
                
                </div>