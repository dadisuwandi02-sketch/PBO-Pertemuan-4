<?php
declare(strict_types=1);
 
// Latihan 2: Class Buku dengan constructor dan method tampilInfo()
class Buku {
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun
    ) {}
 
    public function tampilInfo(): string {
        return "Judul: $this->judul | Penulis: $this->penulis | Tahun: $this->tahun";
    }
}
 
$buku1 = new Buku('Pemrograman Berorientasi Objek dengan PHP', 'Andi Wijaya', 2021);
$buku2 = new Buku('Dasar-Dasar Basis Data', 'Siti Rahmawati', 2019);
$buku3 = new Buku('Algoritma dan Struktur Data', 'Budi Santoso', 2020);

echo "1. " . htmlspecialchars($buku1->tampilInfo()) . "<br>";
echo "2. " . htmlspecialchars($buku2->tampilInfo()) . "<br>";
echo "3. " . htmlspecialchars($buku3->tampilInfo()) . "<br>";
