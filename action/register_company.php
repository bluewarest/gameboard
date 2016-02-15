<?php session_start();error_reporting(0);
if(isset($_POST)):
	include("connect.php");
	
				//check if username is already in
				$companyname = $_POST['companyname'];
				$sql2 = mysql_query("SELECT * FROM company WHERE name = '".$companyname."'");
					if(mysql_num_rows($sql2) > 0):
					//username is already in
					$_SESSION['REGISTER_ERROR'] = 'Company: Aready Exists';
					header("location:../");					
					else:
					$sql = mysql_query("INSERT INTO company (name) VALUES ('".$companyname."')");
						if($sql):
                        $_SESSION['REGISTER'] = true;
					    unset($_SESSION['REGISTER_POST']);
					    header("location:../company_registration");			
						else:
						$_SESSION['REGISTER_ERROR'] =  'SQL error';
						header("location:../");
						endif;
					endif;	
endif;