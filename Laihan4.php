<?php
declare(strict_types=1);
 
// Latihan 4: Atribut dinamis "hobi" dengan __set, __get, __isset, __unset
class MahasiswaDinamis {
    private array $atributTambahan = [];
 
    public function __construct(public string $nim, public string $nama) {}
 
    public function __set(string $key, mixed $value): void {
        $diizinkan = ['hobi'];
        if (!in_array($key, $diizinkan, true)) {
            throw new InvalidArgumentException("Atribut '$key' tidak diizinkan");
        }
        $this->atributTambahan[$key] = $value;
        echo "[__set] atribut '$key' diisi<br>";
    }
 
    public function __get(string $key): mixed {
        echo "[__get] membaca atribut '$key'<br>";
        if (!array_key_exists($key, $this->atributTambahan)) {
            throw new OutOfBoundsException("Atribut '$key' tidak ditemukan");
        }
        return $this->atributTambahan[$key];
    }
 
    public function __isset(string $key): bool {
        echo "[__isset] memeriksa atribut '$key'<br>";
        return isset($this->atributTambahan[$key]);
    }
 
    public function __unset(string $key): void {
        echo "[__unset] menghapus atribut '$key'<br>";
        unset($this->atributTambahan[$key]);
    }
}

$mhs = new MahasiswaDinamis('231001', 'Alya');
 
// 1. Uji __set
echo "<b>1. Uji __set()</b><br>";
$mhs->hobi = 'Membaca';
 
// 2. Uji __get
echo "<b>2. Uji __get()</b><br>";
echo "Hobi: " . htmlspecialchars($mhs->hobi, ENT_QUOTES, 'UTF-8') . "<br>";
 
// 3. Uji __isset
echo "<b>3. Uji __isset()</b><br>";
echo "isset(hobi)? " . (isset($mhs->hobi) ? 'Ya' : 'Tidak') . "<br>";
 
// 4. Uji __unset
echo "<b>4. Uji __unset()</b><br>";
unset($mhs->hobi);
echo "isset(hobi) setelah unset? " . (isset($mhs->hobi) ? 'Ya' : 'Tidak') . "<br>";
 
// 5. Uji atribut yang tidak diizinkan
echo "<b>5. Uji atribut tidak diizinkan</b><br>";
try {
    $mhs->alamat = 'Sukabumi';
} catch (InvalidArgumentException $e) {
    echo "Exception: " . htmlspecialchars($e->getMessage()) . "<br>";
}
 
// 6. Uji membaca atribut yang sudah dihapus
echo "<b>6. Uji membaca hobi setelah di-unset</b><br>";
try {
    echo $mhs->hobi;
} catch (OutOfBoundsException $e) {
    echo "Exception: " . htmlspecialchars($e->getMessage()) . "<br>";
}
