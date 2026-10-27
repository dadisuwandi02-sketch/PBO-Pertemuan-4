<?php
declare(strict_types=1);
 
// Latihan 5: __call() yang hanya mengizinkan satu nama method
class LaporanMahasiswa {
    public function __construct(private string $nama) {}
 
    public function __call(string $method, array $args): mixed {
        // Hanya method "cetakRingkas" tanpa argumen yang diizinkan
        if ($method === 'cetakRingkas' && count($args) === 0) {
            return 'Mahasiswa: ' . $this->nama;
        }
        throw new BadMethodCallException('Method tidak tersedia: ' . $method);
    }
}

$laporan = new LaporanMahasiswa('Alya');
 
// 1. Method yang diizinkan
echo "<b>1. Method yang diizinkan (cetakRingkas)</b><br>";
echo htmlspecialchars($laporan->cetakRingkas()) . "<br><br>";
 
// 2. Method lain yang tidak diizinkan
echo "<b>2. Method lain (cetakLengkap)</b><br>";
try {
    echo $laporan->cetakLengkap();
} catch (BadMethodCallException $e) {
    echo "Exception: " . htmlspecialchars($e->getMessage()) . "<br><br>";
}
 
// 3. Method diizinkan tapi dengan argumen
echo "<b>3. cetakRingkas dengan argumen</b><br>";
try {
    echo $laporan->cetakRingkas('tambahan');
} catch (BadMethodCallException $e) {
    echo "Exception: " . htmlspecialchars($e->getMessage()) . "<br>";
}
