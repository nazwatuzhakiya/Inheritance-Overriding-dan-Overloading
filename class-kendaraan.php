<?php
class kendaraan {
}

class pesawat extends kendaraan {
    private $tinggiMaks;
    private $kecepatanMaks;
    public function setTinggiMaks($tinggi) {
        $this->tinggiMaks = $tinggi;
    }
    public function setKecepatanMaks($kecepatan) {
        $this->kecepatanMaks = $kecepatan;
    }
    public function bacaTinggiMaks() {
        return $this->tinggiMaks;
    }
    public function biayaOperasional($harga) {
        $biaya = 0;
        $tinggi = $this->tinggiMaks;
        $kecepatan = $this->kecepatanMaks;

        if ($tinggi > 5000 && $kecepatan > 800) {
            $biaya = 0.30 * $harga; // 30% dari harga
        } elseif ($tinggi >= 3000 && $tinggi <= 5000 && $kecepatan >= 500 && $kecepatan <= 800) {
            $biaya = 0.20 * $harga; // 20% dari harga
        } elseif ($tinggi < 3000 && $kecepatan < 500) {
            $biaya = 0.10 * $harga; // 10% dari harga
        } else {
            $biaya = 0.05 * $harga; // 5% dari harga
        }
        return $biaya;
    }
}
$pesawatData = [
    'Boeing 737' => ['harga' => 2000000000, 'tinggi' => 7500, 'kecepatan' => 650],
    'Boeing 747' => ['harga' => 3500000000, 'tinggi' => 5800, 'kecepatan' => 750],
    'Cassa' => ['harga' => 750000000, 'tinggi' => 3500, 'kecepatan' => 500],
];

foreach ($pesawatData as $mereks => $data) {
    $pesawat = new pesawat();
    $pesawat->setTinggiMaks($data['tinggi']);
    $pesawat->setKecepatanMaks($data['kecepatan']);
    $biaya = $pesawat->biayaOperasional($data['harga']);
    $hargaFormatted = number_format($data['harga'], 0, ',', '.');
    $biayaFormatted = number_format($biaya, 0, ',', '.');
    echo "Biaya operasional pesawat '{$mereks}' dengan harga Rp {$hargaFormatted} yang memiliki tinggi maksimum {$data['tinggi']} feet dan kecepatan maksimum {$data['kecepatan']} km/jam adalah Rp. {$biayaFormatted}<br>";
}
?>