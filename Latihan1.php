<?php
declare(strict_types=1);
 
// Latihan 1: Constructor Mahasiswa dengan parameter fakultas (default "Belum diisi")
class Mahasiswa {
    public function __construct(
        public string $nim,
        public string $nama,
        public int $semester = 1,
        public string $fakultas = "Belum diisi"
    ) {}
 
    public function profil(): string {
        return "$this->nim - $this->nama (Semester $this->semester) | Fakultas: $this->fakultas";
    }
}
 
// Objek 1: fakultas TIDAK diisi -> memakai nilai default
$mhs1 = new Mahasiswa('231001', 'Alya', 3);
 
// Objek 2: fakultas diisi
$mhs2 = new Mahasiswa('231002', 'Budi', 5, 'Sains dan Teknologi');
 
echo "Objek 1 (tanpa fakultas): " . htmlspecialchars($mhs1->profil()) . "<br>";
echo "Objek 2 (dengan fakultas): " . htmlspecialchars($mhs2->profil()) . "<br>";
