<?php 

$mode="";
$username="";
$password="";
$message="";


if (isset($_GET['mode'])) {
$mode=$_GET['mode'];
}


if ($mode==1) {
	if (isset($_REQUEST['username'])) {
	$username=stripslashes(htmlspecialchars($_REQUEST['username'], ENT_QUOTES, 'utf-8'));
	}
	if (isset($_REQUEST['password'])) {
	$password=stripslashes(htmlspecialchars($_REQUEST['password'], ENT_QUOTES, 'utf-8'));
	}
	
	if($username=='testing123' && $password=='testingABC') {
		$_SESSION['fsuadminloggedin']=1;
		$mode=2;		
	} else {
		$message="Invalid login";	
	}	
	
} else {
	$username='';
	$password='';
}
?>

 <title>Publications and Communications CMS</title>



	<?php
	if ($message!='') {?><?php echo $message;?><br /><br /></font><?php } 
	
	if ($mode!=2) {?>
    <form name="loginadmin" method="post" action="index.php?mode=1">
    <strong>User Name:</strong><input type="text" name="username" class="contentmain" />
    <strong>Password:</strong><input type="password" name="password" class="contentmain" />
    <input type="submit" class="contentmain" value="Submit" />
	</form><?php } else {?>
		<?php include('templates/header.php'); ?>

	<h1 class="display-4">Welcome</h1>
	<h3>Click on the links to the left to edit the Interrobang and online events calendar.</h3>
	<?php include 'templates/footer.php'; ?>
    <?php }?>


