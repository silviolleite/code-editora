<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = \App\Models\Category::all();
        factory(\App\Models\Book::class, 100)->create()->each(function ($book) use ($categories){
            $categoriesRandom = $categories->random(4);
            $book->categories()->sync($categoriesRandom->pluck('id')->all());
        });
    }
}
