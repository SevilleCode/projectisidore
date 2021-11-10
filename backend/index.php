<?php include('password_protect.php'); ?>
<?php require_once('../Connections/myData.php'); ?>
<script src="https://cdn.ckeditor.com/4.15.1/full-all/ckeditor.js"></script>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  global $myData;

  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = $myData->real_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$maxRows_latestEntries = 5;
$pageNum_latestEntries = 0;
if (isset($_GET['pageNum_latestEntries'])) {
  $pageNum_latestEntries = $_GET['pageNum_latestEntries'];
}
$startRow_latestEntries = $pageNum_latestEntries * $maxRows_latestEntries;

$query_latestEntries = "SELECT * FROM sources ORDER BY id DESC";
$query_limit_latestEntries = sprintf("%s LIMIT %d, %d", $query_latestEntries, $startRow_latestEntries, $maxRows_latestEntries);
$latestEntries = $myData->query($query_limit_latestEntries) or die($myData->error);
$row_latestEntries = $latestEntries->fetch_assoc();

if (isset($_GET['totalRows_latestEntries'])) {
  $totalRows_latestEntries = $_GET['totalRows_latestEntries'];
} else {
  $all_latestEntries = $myData->query($query_latestEntries);
  $totalRows_latestEntries = $all_latestEntries->num_rows;
}
$totalPages_latestEntries = ceil($totalRows_latestEntries/$maxRows_latestEntries)-1;

$colname_nav = "-1";
if (isset($_GET['Category'])) {
  $colname_nav = $_GET['Category'];
}
$query_nav = sprintf("SELECT DISTINCT Category FROM sources", GetSQLValueString($colname_nav, "text"));
$nav = $myData->query($query_nav) or die($myData->error);
$row_nav = $nav->fetch_assoc();
$totalRows_nav = $nav->num_rows;

$query_entryList = "SELECT * FROM sources ORDER BY id DESC";
$entryList = $myData->query($query_entryList) or die($myData->error);
$row_entryList = $entryList->fetch_assoc();
$totalRows_entryList = $entryList->num_rows;
?>
<?php include('../header.php') ?>
<div class="jumbotron jumbotron-fluid text-center">
       <h1 class="display-4">Project Isidore&nbsp;</h1>
       <p class="lead">Basic CMS Framework&nbsp;</p>
       <hr class="my-4">
	<a href="update_title.php">Change Site Title</a>
	<hr class="my-4">
	<a href="insert.php">Add New Entry</a><br>
  <?php do { ?>
  <?php echo $row_entryList['id']; ?> <?php echo $row_entryList['Source']; ?> <a href="update.php?id=<?php echo $row_entryList['id']; ?>">Update Entry</a> <a href="delete.php?id=<?php echo $row_entryList['id']; ?>">Delete Entry</a><br>
  <?php } while ($row_entryList = $entryList->fetch_assoc()); ?>
      
  </div>
  <div class="container">
	  

   <div class="row">
         
     <div class="row">
          <div class=" col-md-4"><h3>Daily Readings</h3> <script src="//rss.bloople.net/?url=https%3A%2F%2Fevangelizo.org%2Frss%2Fv2%2Fevangelizo_rss-tra.xml&detail=50&limit=2&type=js"></script> </div>
          <div class="col-md-4 "><h3>Listen to Gregorian Chant and Renaissance Polyphony on SacredMusic.fm!</h3> <script src="https://embed.radio.co/player/481be90.js"></script>	</div>
         <div class="col-md-4 "><h3>Latest Entries</h3>
           <ul><?php do { ?>
          <li><a href="<?php echo $row_latestEntries['URL']; ?>" target="_blank"><?php echo $row_latestEntries['Source']; ?></a><br>
            <?php echo $row_latestEntries['Posting']; ?></li>
			 <?php } while ($row_latestEntries = $latestEntries->fetch_assoc()); ?></ul>
         </div>
     </div>
      
       
     <?php include('../footer.php') ?>
   
<?php
$latestEntries->free();

$nav->free();

$entryList->free();
?>
