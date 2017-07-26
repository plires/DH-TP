<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\DocumentType;
use App\Image;
use App\Product;
use App\User;

class CreateTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Datos Tabla categories
        $categories = collect(['Cervezas Rubias', 'Cervezas Rojas', 'Cervezas Negras', 'Vasos tipo chop', 'Barriles']);

        $categories->each(function ($value) {
          factory(Category::class)->create([
              'name' => ucfirst($value),
              'slug' => str_slug($value)
          ]);
        });

        // Datos Tabla document_types
        factory(DocumentType::class)->create([
            'name' => 'DNI'
        ]);

        factory(DocumentType::class)->create([
            'name' => 'Pasaporte'
        ]);

        factory(DocumentType::class)->create([
            'name' => 'L. Civica'
        ]);

        factory(DocumentType::class)->create([
            'name' => 'L. Enrrolamiento'
        ]);

        // Datos Tabla users
        factory(User::class, 10)->create();

        factory(User::class)->create([
            'name' => 'Pablo',
            'surname' => 'Lires',
            'email' => 'pablolires@gmail.com',
            'password' => bcrypt('123456'),
            'admin' => 1
        ]); // hago el usuario por default

        // Datos Tabla images
        factory(Image::class, 30)->create();
        
        // Datos Tabla products
        factory(Product::class, 30)->create();


        /*
        //Datos Tabla product_user
        factory(User()->favorites(), 2)->create();
        */       
    }
}
