<?php
include "connect.php";
 $tabel=mysqli_query($conn,"select * from pizzad");
 $massiiv=[];
 while($rida=mysqli_fetch_assoc($tabel))
 {
    array_push($massiiv,['Nimi'=>$rida['nimi'],
	'Koostis'=>$rida['koostis'],'Hind'=>$rida['hind'],
	'Teravus'=>$rida['teravus']]);
 }
 $result['Pizzad']=$massiiv;
 $Json = json_encode($result);
 echo $Json;
?>
