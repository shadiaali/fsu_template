<?php
mysqli_report(MYSQLI_REPORT_STRICT);


include_once "templates/header.php";
//include_once "../../fsudb.config";
//$mysqli = new mysqli($host, $user, $pass, $dbname);

if ($mysqli->connect_error) {
	echo $mysqli->connect_error;
}

$mode="";
$pos="";
$campaign="";
$link="";


if (isset($_GET['mode'])) {
$mode = $_GET['mode'];
}

if($mode == 4)
{
  $query="update campaigns set active=0 where id = ".$_GET['id'];
  $mysqli->query($query);
  header("Location: banner_code_generator.php");
}

if($mode == 5)
{
  $query="update campaigns set active=1 where id = ".$_GET['id'];
  $mysqli->query($query);
  header("Location: banner_code_generator.php");
}

if($mode == 3)
{
  $image = $_FILES['image']['name'];
  if (strlen($_FILES['image']['name']) > 0)
  {
  $size = getimagesize($_FILES['image']['tmp_name']);
  }
  if(strlen($_FILES['image']['name']) == 0)
  {
    $query="SELECT imgname from campaigns where id = ".$_POST['id'].";";
    $rs = $mysqli->query($query)->fetch_row();
	$image = $rs[0];
  }
  elseif ($_POST['pos'] == 1 && $size[0] != 728)
  {
    echo "Incorrect width";
    $mode = 2;
  }
  elseif ($_POST['pos'] == 1 && $size[1] != 90)
  {
    echo "Incorrect height";
    $mode = 2;
  }
  elseif ($_POST['pos'] == 2 && $size[0] != 160)
  {
    echo "Incorrect width";
    $mode = 2;
  }
  elseif ($_POST['pos'] == 2 && $size[1] != 600)
  {
    echo "Incorrect height";
    $mode = 2;
  }
  
  if ($mode == 3)
  {
    if(strlen($_FILES['image']['name']) > 0)
	{
      $image=$_FILES['image']['name'];
      move_uploaded_file($_FILES["image"]["tmp_name"], "../images/webbanners/".$image);
    }
	$campaign = str_replace('"',"&quot;",$_POST["campaign"]);
	$campaign = str_replace("'","&apos;",$campaign);
    $campaign = str_replace('<',"&lt;",$campaign);
    $campaign = str_replace('>',"&gt;",$campaign);
    //$campaign = str_replace('&',"&amp;",$campaign);
	
    $pos = str_replace('"',"&quot;",$_POST['pos']);
	$pos = str_replace("'","&apos;",$pos);
    $pos = str_replace('<',"&lt;",$pos);
    $pos = str_replace('>',"&gt;",$pos);
    //$pos = str_replace('&',"&amp;",$pos);
	
	$link = str_replace('"',"&quot;",$_POST["link"]);
	$link = str_replace("'","&apos;",$link);
    $link = str_replace('<',"&lt;",$link);
    $link = str_replace('>',"&gt;",$link);
    //$link = str_replace('&',"&amp;",$link);

    $endDate = $_POST["endDate"];
    if (strlen($endDate) < 1) {
      $query="update campaigns set campaignname = '".$campaign."',imgname = '".$image."',bannerpos = ".$pos.",linksto = '".$link."',endDate = NULL where id = ".$_POST['id'];
    } else {
      $query="update campaigns set campaignname = '".$campaign."',imgname = '".$image."',bannerpos = ".$pos.",linksto = '".$link."',endDate = '".$endDate."' where id = ".$_POST['id'];
    }
    
    $mysqli->query($query);	

	
    
	header("Location: banner_code_generator.php");
  }
}

if($mode == 2)
{
  if($_GET['mode'] == 3)
  {
  $query="SELECT id,campaignName,imgName,bannerpos,linksto, endDate from campaigns where id = ".$_POST['id'].";";
  }
  else
  {
  $query="SELECT id,campaignName,imgName,bannerpos,linksto, endDate from campaigns where id = ".$_GET['id'].";";
  }
  $rs = $mysqli->query($query)->fetch_row();
  

  ?>
  
 

  <form method="post" action="banner_management.php?mode=3" enctype="multipart/form-data">
  
  Campaign Name: <input type="text" size="50" id="campaign" name="campaign" value="<?php echo $rs[1];?>">
  <br /><br />
  
  Top or Side: <select id="pos" name="pos">
  <option <?php if ($rs[3] == 1){echo "selected "; }?>value="1">Top</option>
  <option <?php if ($rs[3] == 2){echo "selected "; }?>value="2">Side</option>
  </select>
  <br /><br />
  
  Link: <input type="text" size="50" id="link" name="link" value="<?php echo $rs[4];?>">
  <br /><br />
  
  Image: <input type="file" size="50" name="image" id="image">
  <br /><br />

  End Date: <input type="date" name="endDate" id="endDate" value="<?php echo $rs[5]; ?>">
  <br /><br />
  
  <input type="hidden" name="id" id="id" value="<?php if ($_GET['mode'] == 3){echo $_POST['id'];}else{echo$_GET['id'];} ?>"> 
  
  <input type="submit" name="submit" value="Submit">
  </form>
<?php
}
if ($mode == 1)
{
  $query="SELECT id from campaigns order by id desc;";
  $rs = $mysqli->query($query)->fetch_row();
  
  $id = $rs[0] + 1;
  $image = $_FILES['image']['name'];	
  if (!empty($image)) {
  $size = getimagesize($_FILES['image']['tmp_name']);
  }
  if(strlen($_FILES['image']['name']) == 0)
  {
    echo "no image submitted";
	$mode = 0;
  }
  elseif ($_POST['pos'] == 1 && $size[0] != 728)
  {
    echo "Incorrect width";
    $mode = 0;
  }
  elseif ($_POST['pos'] == 1 && $size[1] != 90)
  {
    echo "Incorrect height";
    $mode = 0;
  }
  elseif ($_POST['pos'] == 2 && $size[0] != 160)
  {
    echo "Incorrect width";
    $mode = 0;
  }
  elseif ($_POST['pos'] == 2 && $size[1] != 600)
  {
    echo "Incorrect height";
    $mode = 0;
  }
  else
  {
    $image=$_FILES['image']['name'];
    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/webbanners/".$image);
    $campaign = str_replace('"',"&quot;",$_POST["campaign"]);
	$campaign = str_replace("'","&apos;",$campaign);
    $campaign = str_replace('<',"&lt;",$campaign);
    $campaign = str_replace('>',"&gt;",$campaign);
    $campaign = str_replace('&',"&amp;",$campaign);
	
    $pos = str_replace('"',"&quot;",$_POST['pos']);
	$pos = str_replace("'","&apos;",$pos);
    $pos = str_replace('<',"&lt;",$pos);
    $pos = str_replace('>',"&gt;",$pos);
    $pos = str_replace('&',"&amp;",$pos);
	
	$link = str_replace('"',"&quot;",$_POST["link"]);
	$link = str_replace("'","&apos;",$link);
    $link = str_replace('<',"&lt;",$link);
    $link = str_replace('>',"&gt;",$link);
    $link = str_replace('&',"&amp;",$link);

    $endDate = $_POST["endDate"];

    if (strlen($endDate) < 1) {
      $query="insert into campaigns (id, campaignName, imgName, bannerpos, linksTo,endDate, active) values(".$id.",'".$campaign."','".$image."','".$pos."','".$link."',NULL,1)";
    } else {
      $query="insert into campaigns (id, campaignName, imgName, bannerpos, linksTo,endDate, active) values(".$id.",'".$campaign."','".$image."','".$pos."','".$link."','".$endDate."',1)";
    }
    
    $mysqli->query($query);
	
	header("Location: banner_code_generator.php");
  }
}


if ($mode == 0 || strlen($mode == 0))
{
?>
<form method="post" action="banner_management.php?mode=1" enctype="multipart/form-data">

Campaign Name: <input type="text" size="50" id="campaign" name="campaign" value="<?php if ($mode == 0){echo $campaign;}?>">
<br /><br />

Top or Side: <select id="pos" name="pos">
<option <?php if ($mode == 0 && $pos == 1){echo "selected "; }?>value="1">Top</option>
<option <?php if ($mode == 0 && $pos == 2){echo "selected "; }?>value="2">Side</option>
</select>
<br /><br />

Link: <input type="text" size="50" id="link" name="link" value="<?php if ($mode == 0){echo $link;}?>">
<br /><br />

Image: <input type="file" size="50" name="image" id="image">
<br /><br />

End Date: <input type="date" name="endDate" id="endDate">
<br /><br />

<input type="submit" name="submit" value="Submit">
</form>
<?php
}
?>


<?php include 'templates/footer.php'; ?>