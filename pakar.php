<?php
	$penyakit = [
		[ 'nama' => 'Cholera Babi', 'nilai' => 0 ],
		[ 'nama' => 'Influenza Babi', 'nilai' => 0 ],
		[ 'nama' => 'Pox Babi', 'nilai' => 0 ],
		[ 'nama' => 'TBC Babi', 'nilai' => 0 ],
		[ 'nama' => 'Pneumonia Mikroplasma Babi', 'nilai' => 0 ],
		[ 'nama' => 'Wabah Babi', 'nilai' => 0 ],
		[ 'nama' => 'Leptospirosis', 'nilai' => 0 ],
		[ 'nama' => 'Antrax', 'nilai' => 0 ],
		[ 'nama' => 'Agalactia', 'nilai' => 0 ],
		[ 'nama' => 'Demam Afrika', 'nilai' => 0 ],
		[ 'nama' => 'Infeksi', 'nilai' => 0 ],
		[ 'nama' => 'Pleuropneumonia', 'nilai' => 0 ],
		[ 'nama' => 'Pseudorabies', 'nilai' => 0 ],
		[ 'nama' => 'Anemia', 'nilai' => 0 ],
		[ 'nama' => 'Rheumatik', 'nilai' => 0 ],
		[ 'nama' => 'Erysipelas', 'nilai' => 0 ],
		[ 'nama' => 'Gastrosenritis Menular', 'nilai' => 0 ],
		[ 'nama' => 'Enteritis Colibacillosis', 'nilai' => 0 ]
	];

	$gejala = [
		[ 'nama' => 'Nafsu Makan Berkurang', 'penambahan' => [ [ 'penyakit' => 0,1,2,3,4,5,6,7,8,9,10,11,12,14,15,16, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Demam', 'penambahan' => [ [ 'penyakit' => 0,1,2,4,5,6,7,8,9,10,11,12,15, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Diare', 'penambahan' => [ [ 'penyakit' => 6,8,9,12,13,16,17, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Batuk Batuk', 'penambahan' => [ [ 'penyakit' => 1,3,4,5,11, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Lemas', 'penambahan' => [ [ 'penyakit' => 1,4,5,6,10, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Munculnya tonjolan pada kulit perut', 'penambahan' => [ [ 'penyakit' => 2, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Kaki nampak terbuka lebar', 'penambahan' => [ [ 'penyakit' => 4, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Adanya gangguan pernapasan', 'penambahan' => [ [ 'penyakit' => 1,3,4,9,11,12, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Tenggorokan Bengkak', 'penambahan' => [ [ 'penyakit' => 7, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Urat urat kaku dan Lemah', 'penambahan' => [ [ 'penyakit' => 7, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Dari vagina keluar nanah', 'penambahan' => [ [ 'penyakit' => 8, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Sembelit', 'penambahan' => [ [ 'penyakit' => 9, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Gemetar', 'penambahan' => [ [ 'penyakit' => 10,12, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Lumpuh', 'penambahan' => [ [ 'penyakit' => 10,15, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Depresi', 'penambahan' => [ [ 'penyakit' => 11,12, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Muntah muntah', 'penambahan' => [ [ 'penyakit' => 12,16,17, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Pucat', 'penambahan' => [ [ 'penyakit' => 13, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Pertumbuhan Terganggu', 'penambahan' => [ [ 'penyakit' => 13, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Kehilangan Berat Badan', 'penambahan' => [ [ 'penyakit' => 3,13,14,16, 'nilai' => 1 ] ] ],
		[ 'nama' => 'Babi banyak berbaring', 'penambahan' => [ [ 'penyakit' => 14,16,17, 'nilai' => 1 ] ] ]
	];

	if (@$_POST['submit']) {
		$data = $_POST['cb'];

		// Proses memasukkan nilai
		foreach (@$data as $cb) {
			foreach ($gejala[$cb]['penambahan'] as $penambahan) {
				$penyakit[$penambahan['penyakit']]['nilai'] += $penambahan['nilai'];
			}
		}

		// Proses mencari nilai tertinggi
		$nilai_tertinggi = 0;
		$data_penyakit = [];
		for ($i=0; $i < count($penyakit); $i++) {
			if ($penyakit[$i]['nilai'] > $nilai_tertinggi) {
				$data_penyakit = array();
			//	$data_penyakit[0] = $penyakit[$i]['nama'];
				$nilai_tertinggi = $penyakit[$i]['nilai'];
			} else if ($penyakit[$i]['nilai'] == $nilai_tertinggi) {
				$data_penyakit[] = $penyakit[$i]['nama'];
			}
		}

		// Menampilkan Hasil
		for ($i=0; $i < count($data_penyakit); $i++) { 
			echo $data_penyakit[$i];
			if ($i+1 < count($data_penyakit)) echo ', ';
		}
		exit;
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Pakar</title>
</head>
<body>
	<form method="POST">
	<?php 
		for ($i = 0; $i < count($gejala); $i++) {
			echo '<input type="checkbox" name="cb[]" value="'.$i.'"> '.$gejala[$i]['nama'];
			echo '<br>';
		} 
	?>
		<input type="submit" name="submit">
	</form>
</body>
</html>