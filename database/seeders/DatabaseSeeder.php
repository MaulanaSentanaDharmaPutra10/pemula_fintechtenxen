<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Role;
use App\Models\Product;
use App\Models\TarikTunai;
use App\Models\Wallet;
use App\Models\TopUp;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::create([
          "name" =>  "Minuman"
        ]);
        
        Category::create([
          "name" =>  "Makanan"
        ]);
  
        Category::create([
          "name" =>  "Stationary"
        ]);

        Role::create([
          "name" => "siswa",
        ]);
        
        Role::create([
            "name" => "bank",
        ]);

        Role::create([
            "name" => "admin",
        ]);

        
        Role::create([
            "name" => "kantin",
        ]);


        User::create([
            "name" => "santana",
            "role_id" => 1,
            "password" => bcrypt("123")
        ]);
        
        User::create([
            "name" => "bank",
            "role_id" => 2,
            "password" => bcrypt("bank123")
        ]);

        User::create([
            "name" => "admin",
            "role_id" => 3,
            "password" => bcrypt("admin123")
        ]);
 
        User::create([
            "name" => "kantin",
            "role_id" => 4,
            "password" => bcrypt("kantin123")
        ]);

        Wallet::create([
            "user_id" => 1,
            "credit" => 500000,
            "debit" => 0
        ]); 


        Product::create([
            "name" => "Es Lemon Tea",
            "category_id" => 1,
            "price" => 5000,
            "stock" => 30,
            "description" => "Es Lemon tea Khas Jawa Barat",
            "thumbnail" => "https://image.setoko.co/image_v2/1696346775534797844.jpg"
        ]);

        Product::create([
            "name" => "Bakso Bakar",
            "category_id" => 2,
            "price" => 15000,
            "stock" => 50,
            "description" => "Bakso bakar khas madura",
            "thumbnail" => "https://i0.wp.com/resepkoki.id/wp-content/uploads/2020/10/Resep-Bakso-Bakar-Pedas-Manis-1.jpg?fit=438%2C496&ssl=1"
        ]);

        Product::create([
            "name" => "Buku PPKN",
            "category_id" => 3,
            "price" => 55000,
            "stock" => 70,
            "description" => "Buku Pelajaran PPKN",
            "thumbnail" => "https://image.slidesharecdn.com/pknkls7revisi2017-180601161143/85/buku-siswa-ppkn-kelas-vii-edisi-revisi-2017-1-320.jpg?cb=1665833569"
        ]);

        
        Product::create([
            "name" => "Pensil 2B",
            "category_id" => 3,
            "price" => 5000,
            "stock" => 70,
            "description" => "Pensil yang biasa dipakai",
            "thumbnail" => "https://images.tokopedia.net/img/cache/700/product-1/2019/10/25/4247590/4247590_3082e5f1-9eeb-4457-8261-2ae65d4c2eb8_700_700.jpg"
        ]);



    }


}
