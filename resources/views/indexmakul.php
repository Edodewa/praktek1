<h2> Mata Kuliah </h2>

<a href="tampilmakul/tambahdata" class="btn btn-primary mb-3"> Tambah Data Mata Kuliah</a>
<?php
$model = new App\Models\Makul;

echo "<pre>";
$data=$model->all();
foreach($data as $isi) {
echo "Kode Kelas : ".$isi->kode_kelas."<br />";
echo "Nama Mata Kuliah : ".$isi->nama_makul."<br />";
echo "Ruangan : ".$isi->ruangan."<br />";
echo "Kelas : ".$isi->kelas."<br />";
echo "SKS : ".$isi->sks."<br />";
echo "<hr />";
}

?>