<!DOCTYPE html>
<html>
<head>
	<title>Cek kebalikan</title>
</head>
<body>
<form action="" method="post">
	<label>Masukan kata </label>
	<input type="text" name="input">
	<button type="submit">Cek</button>
</form>
<?php 
$hasil = 'SAMA';
$kebalikan = '';
if (isset($_POST['input'])){
$input = strtoupper($_POST['input']);
$ptext = strlen($input);
$b = $ptext;
for ($i=0; $i < $ptext ; $i++) { 
	$b--; 
	$input2[] = $input[$b];
}
for ($i=0; $i < count($input2); $i++) { 
	$kebalikan .= $input2[$i];
}

if($kebalikan != $input){
	$hasil = 'TIDAK SAMA';
}
}
else
$input = '';



?>
Input: <br>
>> <?= $input ?><br>
Hasil: <br>
>> <?= $hasil ?>
</body>
</html>