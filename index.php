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
?>
<?php include('header.php') ?>
    <div class="jumbotron jumbotron-fluid text-center">
       <h1 class="display-4">Project Isidore&nbsp;</h1>
       <p class="lead">Basic CMS Framework&nbsp;</p>
       <hr class="my-4">
       <p class="text-left">Project Isidore is designed to be a basic, bare-bones CMS framework. Have a project that requires a database connection but feel WordPress is too heavy? Worried about how much work it will take to put together your own CMS? Then take Project Isidore and customize it to fit your needs!</p>
		<p class="text-left">This was originally conceived as an idea for the Adobe Creative Residency. I wanted to construct a basic CMS in Dreamweaver, creating a useful tool for other web developers while highlighting how powerful Dreamweaver can be (and hopefully prompting Adobe to pay more attention to it). My proposal was rejected, but I compiled everything anyway. It's not as extensive as I had originally planned, but I think it can still be useful.</p> 
		<p class="text-left">If the content in this demo of Project Isidore feels familiar, it's because I am borrowing the info from another of my sites, <a href="https://compcat.paulaluther.net/" target="_blank">Compendium Catholica</a>. Compendium Catholica uses WordPress, so I thought it would make for a good side-by-side comparison of what Project Isidore can do compared to a more fully-fledged framework.</p>
		<p class="text-left">Some tips and credits:
		<ul class="text-left">
		<li>If you download this to run on your own server, make sure you change the database connection options (found in Connections/data.php). The default values are blank.</li>
		<li>The sample database is included as sources.sql. You can import this into your own database server.</li>
		<li>The text editor is CKEditor 4.</li>
		<li>The backend login script comes from <a href="http://www.zubrag.com/scripts/" target="_blank">Zubrag.com</a>. There are many interesting resources on that site; I highly recommend looking into it.</li></ul></p>
		<p class="text-left">Why call it Project Isidore? St. Isidore of Seville compiled what is widely regarded as the first-ever encyclopedia, and Pope St. John Paul II named him Patron Saint of the Internet in 1997.</p>
		<p><a href="https://commons.wikimedia.org/wiki/File:Isidor_von_Sevilla.jpeg#/media/File:Isidor_von_Sevilla.jpeg"><img src="https://upload.wikimedia.org/wikipedia/commons/7/79/Isidor_von_Sevilla.jpeg" alt="Isidor von Sevilla.jpeg" height="720" width="647"></a><br>By <a href="https://en.wikipedia.org/wiki/en:Bartolom%C3%A9_Esteban_Murillo" class="extiw" title="w:en:Bartolomé Esteban Murillo">Bartolomé Esteban Murillo</a> - <a rel="nofollow" class="external autonumber" href="http://www.museumsyndicate.com/artist.php?artist=442">[2]</a> Public Domain, <a href="https://commons.wikimedia.org/w/index.php?curid=131331">Link</a></p>
       
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
      
       
     <?php include('footer.php') ?>
   
<?php
$latestEntries->free();

$nav->free();
?>
