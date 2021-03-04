<!DOCTYPE html>
<html>
<head>
	<title>Angka Hilang</title>
</head>
<body>
<?php 
$hilang = "";
$arr1 = array(2,5,3,6,7,1);
$arr1txt = '';
$arr2 = array(1,2,3,4,5,6,7);
for ($i=0; $i < count($arr1) ; $i++) { 
	if($i == count($arr1)-1){
		$arr1txt .= $arr1[$i];	
	}else{
		$arr1txt .= $arr1[$i].',';	
	}
}
//cari angka yang hilang
for ($i=0; $i < count($arr2); $i++) { 
	$cek = false;
	for ($j=0; $j < count($arr1) ; $j++) { 
		if ($arr2[$i] == $arr1[$j]) {
			$cek = true;
		}
	}
	if($cek == false){
		$hilang = $arr2[$i];
	}
}
?>
A = [<?= $arr1txt ?>] <br>
Mencari Angka yang hilang : <?= $hilang; ?><br>
catatan : cara yang saya lakukan adalah mengecek array yang berisi angka 1 sampai 7 ke array A, jika ada angka di array 1 sampai 7 yang tidak ada di array A, maka akan cetak angka yang tidak ada(hilang).
</body>
</html>