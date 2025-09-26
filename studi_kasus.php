<?php
class Employee {
    protected $gaji_pokok;
    protected $lama_kerja;

    public function __construct($gaji_pokok, $lama_kerja) {
        $this->gaji_pokok = $gaji_pokok;
        $this->lama_kerja = $lama_kerja;
    }
    public function hitungGajiTotal() {
        return $this->gaji_pokok;
    }

    public function getInfo() {
        return "Gaji Pokok: Rp " . number_format($this->gaji_pokok, 0, ',', '.') . 
                ", Lama Kerja: " . $this->lama_kerja . " tahun";
    }
}

class Programmer extends Employee {
    public function hitungGajiTotal() {
        $bonus = 0;
        
        if ($this->lama_kerja >= 1 && $this->lama_kerja <= 10) {
            $bonus = $this->lama_kerja * 0.01;
        } elseif ($this->lama_kerja > 10) {
            $bonus = $this->lama_kerja * 0.02;
        }
        
        return $this->gaji_pokok + ($this->gaji_pokok * $bonus);
    }
}

class Direktur extends Employee {
    public function hitungGajiTotal() {
        $bonus = $this->lama_kerja * 0.5;
        $tunjangan = $this->lama_kerja * 0.1;

        return $this->gaji_pokok + 
                ($this->gaji_pokok * $bonus) + 
                ($this->gaji_pokok * $tunjangan);
    }
}

class PegawaiMingguan extends Employee {
    protected $harga_barang;
    protected $stok_harus_terjual;
    protected $total_penjualan_input;

    public function __construct($gaji_pokok, $lama_kerja, $harga_barang, $stok_harus_terjual, $total_penjualan_input) {
        parent::__construct($gaji_pokok, $lama_kerja);
        
        $this->harga_barang = $harga_barang;
        $this->stok_harus_terjual = $stok_harus_terjual;
        $this->total_penjualan_input = $total_penjualan_input;
    }

    public function hitungGajiTotal() {
        $target_terjual = $this->stok_harus_terjual * 0.7;
        $gaji_tambahan = 0;
        
        if ($this->total_penjualan_input > $target_terjual) {
            $gaji_tambahan = 0.10 * $this->harga_barang * $this->total_penjualan_input;
        } else {
            $gaji_tambahan = 0.03 * $this->harga_barang * $this->total_penjualan_input;
        }
        
        return $this->gaji_pokok + $gaji_tambahan;
    }
}

$prog = new Programmer(5000000, 5);
$gaji_prog = $prog->hitungGajiTotal();
echo "<h2>Programmer</h2>";
echo $prog->getInfo() . "<br>";
echo "Bonus (0.01 * 5 tahun) = 5% <br>";
echo "Gaji Total: Rp " . number_format($gaji_prog, 0, ',', '.') . "<br><hr>";

$dir = new Direktur(15000000, 15);
$gaji_dir = $dir->hitungGajiTotal();
echo "<h2>Direktur</h2>";
echo $dir->getInfo() . "<br>";
echo "Bonus (0.5 * 15) + Tunjangan (0.1 * 15) = 900% <br>";
echo "Gaji Total: Rp " . number_format($gaji_dir, 0, ',', '.') . "<br><hr>";


$target = 1000 * 0.7;
$mingguan = new PegawaiMingguan(2000000, 2, 10000, 1000, 750); 
$gaji_mingguan = $mingguan->hitungGajiTotal();
echo "<h2>Pegawai Mingguan</h2>";
echo $mingguan->getInfo() . "<br>";
echo "Target Terjual: 70% dari 1000 = 700 unit <br>";
echo "Penjualan Aktual: 750 unit (LULUS TARGET) <br>";
echo "Tambahan Gaji (10% * 10.000 * 750) = Rp 750.000 <br>";
echo "Gaji Total: Rp " . number_format($gaji_mingguan, 0, ',', '.') . "<br><hr>";
?>