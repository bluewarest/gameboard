<?php 
include("connect.php");


			$sql1 = mysql_query("SHOW VARIABLES WHERE Variable_name = 'hostname'");
                if(mysql_num_rows($sql1) > 0) {
                    while ($res= mysql_fetch_array($sql1)) {
                        var_dump ($res);
                        
                    }
                }
                else
                    echo "error";
                
               