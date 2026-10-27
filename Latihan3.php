<?php
declare(strict_types=1);
 
// Latihan 3: Destructor pada class Buku + pengaruh alias terhadap unset()
class Buku {
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun
    ) {
        echo "[Constructor] Buku '$this->judul' dibuat<br>";
    }
 
    public function tampilInfo(): string {
        return "Judul: $this->judul | Penulis: $this->penulis | Tahun: $this->tahun";
    }
 
    public function __destruct() {
        echo "[Destructor] Buku '$this->judul' dihancurkan<br>";
    }
}
 
 
// Skenario A: unset TANPA alias
echo "<b>Skenario A: unset tanpa alias</b><br>";
$bukuA = new Buku('Buku A', 'Penulis A', 2020);
unset($bukuA);
echo "Setelah unset(\$bukuA) -> destructor langsung berjalan (sudah tampil di atas)<br><br>";
 
// Skenario B: unset DENGAN alias
echo "<b>Skenario B: unset dengan alias</b><br>";
$bukuB = new Buku('Buku B', 'Penulis B', 2021);
$alias = $bukuB;                 // objek kini punya 2 referensi
unset($bukuB);                   // hanya menghapus 1 referensi
echo "Setelah unset(\$bukuB) -> destructor BELUM berjalan, objek masih bisa diakses lewat alias:<br>";
echo htmlspecialchars($alias->tampilInfo()) . "<br>";
unset($alias);                   // referensi terakhir dihapus
echo "Setelah unset(\$alias) -> destructor berjalan (sudah tampil di atas)<br><br>";
 
// Skenario C: tanpa unset -> destructor jalan di akhir skrip
echo "<b>Skenario C: tanpa unset</b><br>";
$bukuC = new Buku('Buku C', 'Penulis C', 2022);
echo "Akhir skrip... destructor Buku C akan berjalan setelah ini.<br>";
