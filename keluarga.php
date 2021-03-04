<html>
<head><title>Keluarga</title></head>
<body>
<?php 
include "conn.php";
?>
<form action="" method="post">
	<label>Masukan ID Nama</label>
	<input type="text" name="input">
	<button type="submit">Cek</button>
</form>

<?php 
$arrkakek['kakek1'] = '';
$arrkakek['kakek2'] = '';
$arrcucu = array();
$connect = mysqli_connect("localhost", "root", "", "kk");
if (isset($_POST['input']))
$input = $_POST['input'];
else
$input = '';

$sql_gender = "SELECT gender FROM biodata where id =  '".$input."'";
$result = mysqli_query($connect,$sql_gender);
$gender = mysqli_fetch_array($result);

//kakek
$sql = "SELECT g.nama as kakek1, h.nama as kakek2 FROM (SELECT * FROM KETURUNAN WHERE id_anak = '".$input."') a
		left join (SELECT * FROM PERNIKAHAN) b ON b.ID = a.id_pernikahan
		left join (select * from keturunan) c ON c.id_anak = b.id_suami
		left join (select * from keturunan) d ON d.id_anak = b.id_istri
		left join (select * from pernikahan) e ON e.id = c.id_pernikahan
		left join (select * from pernikahan) f ON f.id = d.id_pernikahan
		left join biodata g ON g.id = e.id_suami
		left join biodata h ON h.id = f.id_suami";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) > 0){
	$arrkakek = mysqli_fetch_assoc($result);
}
if(!$arrkakek['kakek1'] && !$arrkakek['kakek2']){
	unset($arrkakek);
	$kakek = 'Tidak ditemukan';
}else{
	if($arrkakek['kakek1'] == '')
	$kakek = $arrkakek['kakek2'];
	if($arrkakek['kakek2'] == '')
	$kakek = $arrkakek['kakek1'];
	if($arrkakek['kakek2'] && $arrkakek['kakek1'])
	$kakek = $arrkakek['kakek1'].', '.$arrkakek['kakek2'];
}

//Orang tua
$orang_tua = '';
$sql = "SELECT c.nama as istri, d.nama as suami FROM keturunan a 
		LEFT JOIN pernikahan b ON b.id = a.id_pernikahan
		LEFT JOIN biodata c ON b.id_istri = c.id
		LEFT JOIN biodata d ON b.id_suami = d.id
		where a.id_anak = '".$input."'";
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) > 0)
	$arrorang_tua = mysqli_fetch_assoc($result);
else
	$orang_tua = 'Tidak ditemukan';
if(!$orang_tua)
$orang_tua = $arrorang_tua['istri'].', '.$arrorang_tua['suami'];

//pasangan
if($gender[0] == 'P'){
	$sql = "SELECT b.nama FROM pernikahan a 
		LEFT JOIN biodata b ON a.id_suami = b.id 
		where a.id_istri = '".$input."'";
}else{
	$sql = "SELECT b.nama FROM pernikahan a 
		LEFT JOIN biodata b ON a.id_istri = b.id
		where a.id_suami = '".$input."'";
}
$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) > 0)
	$arrpasangan = mysqli_fetch_assoc($result);
else
	$arrpasangan['nama'] = 'Tidak ditemukan';
$pasangan = $arrpasangan['nama'];

//anak
$anak = '';
if($gender[0] == 'P'){
	$sql = "SELECT c.nama FROM pernikahan a 
		LEFT JOIN keturunan b ON a.id = b.id_pernikahan
		LEFT JOIN biodata c ON b.id_anak = c.id
		where a.id_istri = '".$input."'";
}else{
	$sql = "SELECT c.nama FROM pernikahan a 
		LEFT JOIN keturunan b ON a.id = b.id_pernikahan
		LEFT JOIN biodata c ON b.id_anak = c.id
		where a.id_suami = '".$input."'";
}

$result = mysqli_query($connect,$sql);
if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result))
	{
		if($row['nama']){
			$arranak[] = $row['nama'];
		}else{
			$arranak[0] = 'Tidak ditemukan';		
		}
	}
}else
	$anak = 'Tidak ditemukan';
if(!$anak){
	for ($i=0; $i < count($arranak); $i++) { 
		$anak .= $arranak[$i].', ';
	}
	$anak = substr($anak, 0, strlen($anak)-2);
}

//cucu
$cucu = '';
if($gender[0] == 'P'){
$sql = "SELECT f.nama FROM (SELECT * FROM PERNIKAHAN WHERE id_istri = '".$input."') a
Left join (SELECT * FROM keturunan) b ON b.id_pernikahan = a.id
Left join (SELECT * FROM pernikahan) c ON c.id_istri = b.id_anak OR c.id_suami = b.id_anak
left join (SELECT * FROM keturunan) d ON d.id_pernikahan = c.id
left join biodata f ON f.id = d.id_anak";
}else{
	$sql = "SELECT f.nama FROM (SELECT * FROM PERNIKAHAN WHERE id_suami = '".$input."') a
Left join (SELECT * FROM keturunan) b ON b.id_pernikahan = a.id
Left join (SELECT * FROM pernikahan) c ON c.id_istri = b.id_anak OR c.id_suami = b.id_anak
left join (SELECT * FROM keturunan) d ON d.id_pernikahan = c.id
left join biodata f ON f.id = d.id_anak";
}
$result = mysqli_query($connect,$sql);

if(mysqli_num_rows($result) > 0){
	while ($row = mysqli_fetch_assoc($result))
	{
		if($row['nama']){
			$arrcucu[] = $row['nama'];
		}
	}
}else
	$cucu = 'Tidak ditemukan';

if(!$arrcucu){
	$cucu = 'Tidak ditemukan';
}else{
	for ($i=0; $i < count($arrcucu); $i++) { 
		$cucu .= $arrcucu[$i].', ';
	}
	$cucu = substr($cucu, 0, strlen($cucu)-2);
}

?>

Input: <br>
>> <?= $input; ?> <br>
Hasil: <br>
>> Kakek: <?= $kakek; ?> <br>
>> Orang Tua: <?= $orang_tua; ?> <br>
>> Pasangan: <?= $pasangan; ?> <br>
>> Anak: <?= $anak; ?> <br>
>> Cucu: <?= $cucu; ?> <br>
</body>
</html>