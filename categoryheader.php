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

$query_Recordset1 = "SELECT * FROM name_id";
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
    <title><?php echo $row_Recordset1['site_id']; ?></title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap-4.4.1.css" rel="stylesheet">

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
       <a class="navbar-brand" href="#"><?php echo $row_Recordset1['site_id']; ?></a>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
             <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
             </li>
			  <?php do { ?>
			  <!--<li class="nav-item"><a class="nav-link" href="category.php?Category=<?php echo $row_nav['Category']; ?>"><?php echo $row_nav['Category']; ?></a></li>-->
			      <li class="nav-item"><a class="nav-link" href="<?php echo $row_nav['Category']; ?>"><?php echo $row_nav['Category']; ?></a></li>
			  <?php } while ($row_nav = $nav->fetch_assoc()); ?>
            
          </ul>
          <form action="../results.php" method="post" class="form-inline my-2 my-lg-0">
             <input name="search" id="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
             <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
       </div>
    </nav>
  <?php
$Recordset1->free();
?>
