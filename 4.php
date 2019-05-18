<?php

function cetak_gambar($n = 5)
{
    if ($n % 2 == 1) {
        for ($i = 0, $y = $n - 1; $i < $n, $y >= 0; $i++, $y--) {
            for ($j = 0; $j < $n; $j++) {
                if ($j == $i || $j == $y) {
                    echo "x";
                } else {
                    echo "=";
                }
            }
            echo "\n";
        }
    } else {
        echo "angka harus ganjil!";
    }
}

cetak_gambar(5);
echo "\n";
cetak_gambar(7);
echo "\n";
cetak_gambar(6);
