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

$query_list = "SELECT * FROM sources ORDER BY id ASC";
$list = $myData->query($query_list) or die($myData->error);
$row_list = $list->fetch_assoc();
$totalRows_list = $list->num_rows;


?>
 
 <?php do { ?>
<?php echo $row_list['Posting']; ?><br>
		  <a href="detail/<?php echo urlencode($row_list['Source'])?>">detail/<?php echo urlencode($row_list['Source']); ?></a><br>
<?php } while ($row_list = $list->fetch_assoc()); 
$list->free();?>