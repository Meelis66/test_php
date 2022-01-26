<?php
$teade="";
if(isset($_POST["submit"]))
{
 include "connect.php";
 $title = test_input($_POST["title"]);
 $publisher = test_input($_POST["publisher"]);
 $price = test_input($_POST["price"]);
 $year = test_input($_POST["year"]);
 
 // echo "title: ". $title." publisher: ".$publisher." price: ".$price ." year: ".$year;
 
 $x="insert into books(title,publisher,price,year) values(?,?,?,?)";
 $lause = $conn->prepare($x);
  $lause->bind_param('ssdi',$title,$publisher,$price, $year );
 $a = $lause->execute();
 if($a!=1)
      $teade="Viga andmete lisamisel tabelisse books";
  else 
      $teade= "Yes, andmete lisamine Õnnestus";  
 $lause->close();
 $conn->close();
 
}

function test_input($data){
$data=trim($data);
$data=stripslashes($data);
$data=htmlspecialchars($data);
return $data;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="styles/style1.css" />	
<script>
$(document).ready(function(){ $("#navsiia").load("navbar.html"); });
</script>
<style>
body{padding-top:50px;}
</style>
	    
    <title>Pealkiri</title>
  </head>
  <body>
  <div id="navsiia"></div>
  <header>
  <h1>Lisa andmed</h1>
  </header>
  
  
  <section>
 
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
   Pealkiri<br>
   <input type="text" name="title" required><br>
   Kirjastus<br>
   <input type="text" name="publisher" required><br>
   Hind<br>
   <input type="number" name="price" required><br>
   Aasta<br>
   <input type="number" name="year" required><br>
    <input type="submit" name="submit" value="Saada"> &nbsp;&nbsp;&nbsp;&nbsp;
	<?php       
	echo $teade;
	?>
  </form>
 
 </section>
  
  <footer>
   &copy; Copyright. Fox. All rights reserved.<br>
  Tallinn, Suur-Sõjam&auml;e 10A  
  </footer>
  </body>
</html>