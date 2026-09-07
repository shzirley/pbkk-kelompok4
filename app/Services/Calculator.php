<?php

namespace App\Services;

class Calculator
{
    public const OPERATIONS = ['tambah' => '+', 'kurang' => '−', 'kali' => '×', 'bagi' => '÷'];

    public function calculate(string $first, string $second, string $operation): array
    {
        $error = null;
        $result = null;
        $pattern = '/^-?(?:\d+(?:\.\d*)?|\.\d+)$/D';
        if (! array_key_exists($operation, self::OPERATIONS)) {
            $error = 'Pilih operasi tambah, kurang, kali, atau bagi.';
        } elseif (strlen($first) > 32 || strlen($second) > 32 || ! preg_match($pattern, $first) || ! preg_match($pattern, $second)) {
            $error = 'Masukkan dua angka yang valid. Gunakan titik untuk desimal.';
        } elseif (abs((float) $first) > 1e12 || abs((float) $second) > 1e12) {
            $error = 'Gunakan angka antara −1 triliun dan 1 triliun.';
        } elseif ($operation === 'bagi' && (float) $second === 0.0) {
            $error = 'Tidak bisa membagi dengan nol. Ubah angka kedua lalu coba lagi.';
        } else {
            $value = match ($operation) {
                'tambah' => (float) $first + (float) $second,
                'kurang' => (float) $first - (float) $second,
                'kali' => (float) $first * (float) $second,
                'bagi' => (float) $first / (float) $second,
            };
            $result = sprintf('%.12g', $value == 0 ? 0 : $value);
        }

        return ['result' => $result, 'calculationError' => $error, 'symbol' => self::OPERATIONS[$operation] ?? '?'];
    }
}
