<?php include("password_protect.php"); ?>
<?php require_once('../Connections/myData.php'); ?>
<script src="https://cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script>

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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE sources SET Source=%s, URL=%s, Category=%s, `Description`=%s, Posting=%s WHERE id=%s",
                       GetSQLValueString($_POST['Source'], "text"),
                       GetSQLValueString($_POST['URL'], "text"),
                       GetSQLValueString($_POST['Category'], "text"),
                       GetSQLValueString($_POST['Description'], "text"),
                       GetSQLValueString($_POST['Posting'], "text"),
                       GetSQLValueString($_POST['id'], "int"));

  $Result1 = $myData->query($updateSQL) or die($myData->error);

  $updateGoTo = "../index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE name_id SET site_id=%s WHERE `number`=%s",
                       GetSQLValueString($_POST['site_id'], "text"),
                       GetSQLValueString($_POST['number'], "int"));

  $Result1 = $myData->query($updateSQL) or die($myData->error);
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

$colname_update = "-1";
if (isset($_GET['id'])) {
  $colname_update = $_GET['id'];
}
$query_update = sprintf("SELECT * FROM sources WHERE id = %s", GetSQLValueString($colname_update, "int"));
$update = $myData->query($query_update) or die($myData->error);
$row_update = $update->fetch_assoc();
$totalRows_update = $update->num_rows;

$query_name = "SELECT * FROM name_id";
$name = $myData->query($query_name) or die($myData->error);
$row_name = $name->fetch_assoc();
$totalRows_name = $name->num_rows;
?>
<?php include('../header.php') ?>
  <div class="jumbotron jumbotron-fluid text-center">
       <h1 class="display-4">Project Isidore&nbsp;</h1>
       <p class="lead">Basic CMS Framework&nbsp;</p>
       <hr class="my-4">
       <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
         <table align="center">
           <tr valign="baseline">
             <td nowrap align="right">Site_id:</td>
             <td><input type="text" name="site_id" value="<?php echo htmlentities($row_name['site_id'], ENT_COMPAT, 'utf-8'); ?>" size="32"></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">Number:</td>
             <td><?php echo $row_name['number']; ?></td>
           </tr>
           <tr valign="baseline">
             <td nowrap align="right">&nbsp;</td>
             <td><input type="submit" value="Update record"></td>
           </tr>
         </table>
         <input type="hidden" name="MM_update" value="form1">
         <input type="hidden" name="number" value="<?php echo $row_name['number']; ?>">
       </form>
       <p>&nbsp;</p>
<p>&nbsp;</p>
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

$update->free();

$name->free();
?>
