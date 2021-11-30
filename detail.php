<?php require_once('Connections/myData.php'); ?>
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

$query_latestEntries = "SELECT * FROM sources ORDER BY Posting DESC";
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

$colname_categories = "-1";
if (isset($_GET['Category'])) {
  $colname_categories = $_GET['Category'];
}
$query_categories = sprintf("SELECT Source, URL, Category, `Description`, Posting FROM sources WHERE Category = %s ORDER BY Source ASC", GetSQLValueString($colname_categories, "text"));
$categories = $myData->query($query_categories) or die($myData->error);
$row_categories = $categories->fetch_assoc();
$totalRows_categories = $categories->num_rows;

$query_nav = "SELECT DISTINCT Category FROM sources";
$nav = $myData->query($query_nav) or die($myData->error);
$row_nav = $nav->fetch_assoc();
$totalRows_nav = $nav->num_rows;

$colname_details = "-1";
if (isset($_GET['Source'])) {
  $colname_details = $_GET['Source'];
}
$query_details = sprintf("SELECT * FROM sources WHERE Source = %s ORDER BY Source ASC", GetSQLValueString($colname_details, "text"));
$details = $myData->query($query_details) or die($myData->error);
$row_details = $details->fetch_assoc();
$totalRows_details = $details->num_rows;

$query_Recordset1 = "SELECT site_id FROM name_id";
$Recordset1 = $myData->query($query_Recordset1) or die($myData->error);
$row_Recordset1 = $Recordset1->fetch_assoc();
$totalRows_Recordset1 = $Recordset1->num_rows;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <meta name="description" content="<?php echo strip_tags($row_details['Description']); ?>">
<title><?php echo $row_Recordset1['site_id']; ?> | <?php echo $row_details['Source']; ?></title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap-4.4.1.css" rel="stylesheet">

  </head>
  <body class="<?php echo $row_details['Category']; ?>">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="../">Compendium Catholica</a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item">
                <a class="nav-link" href="../">Home <span class="sr-only">(current)</span></a>
             </li>
			  <?php do { ?>
			      <li class="nav-item"><a class="nav-link" id="<?php echo $row_nav['Category']; ?>" href="../category/<?php echo $row_nav['Category']; ?>"><?php echo $row_nav['Category']; ?></a></li>
			  <?php } while ($row_nav = $nav->fetch_assoc()); ?>
            
          </ul>
          <form action="../results.php" method="post" class="form-inline my-2 my-lg-0">
             <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
       </div>
    </nav>


    <div class="jumbotron jumbotron-fluid text-center">
       <h1 class="display-4">Project Isidore</h1>
       <p class="lead">Basic CMS Framework</p>
       <hr class="my-4">
		
		
       <p><?php echo $row_details['Source']; ?><br>
         <a href="<?php echo $row_details['URL']; ?>" target="new"><?php echo $row_details['URL']; ?></a><br>
         <?php echo $row_details['Posting']; ?>	     </p>
		   <p><?php echo $row_details['Description']; ?></p>
    </div>
    <div class="container">
		
      
       <div class="row">
		   <div class="col-md-8 text-left" id="list">
      </div>
		  </div>
         
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
       </div>
      
       
      <?php include('footer.php') ?>
<?php
$latestEntries->free();

$categories->free();

$nav->free();

$details->free();

$Recordset1->free();
?>
