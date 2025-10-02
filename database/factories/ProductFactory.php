<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    protected $namaProduct = [
        "Makanan" => [
            "Ayam Goreng",
            "Ayam Bakar",
            "Ayam Gulai",
            "Nasi Goreng",
            "Nasi Padang",
            "Nasi Bakar",
            "Martabak Manis",
            "Martabak Manis Coklat",
            "Martabak Manis Keju",
            "Martabak Manis Keju Coklat",
            "Mie Aceh",
            "Mie Goreng",
            "Mie Sedap",
            "Indomie",
            "Bubur Ayam",
            "Bubur Bayi"
        ],
        "Minuman" => [
            "Air Putih",
            "Air Putih Anget",
            "Air Manis",
            "Teh Manis",
            "Es Teh Manis",
            "Es Alpuket",
            "Es Teh Tawar",
            "Teh Tawar",
            "Minuman Beralkohol (18+)",
            "Minuman Bersoda (13+)",
            "Minuman Bayi"
        ]
    ];

    protected $type_product = [
        "Minuman",
        "Makanan"
    ];




    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->type_product[rand(0,1)];
        $products = $this->namaProduct[$type];
        $namaProduct = $this->namaProduct[$type][array_rand($products)];
        return [
           'nama' => $namaProduct,
           'type' => $type,
           'stock' => rand(0,50)
        ];
    }
}
