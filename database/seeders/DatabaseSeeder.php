<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Staff;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Staff::create([
            'name'     => 'ali',
            'email'    => 'ali2@gmail.com',
            'password' => '12345678',
        ]);

        Customer::create([
            'name'         => 'omar',
            'email'        => 'omar@gmail.com',
            'password'     => '12345678',
            'phone_number' => '0911111111',
        ]);
        Customer::create([
            'name'         => 'sara',
            'email'        => 'sara@gmail.com',
            'password'     => '12345678',
            'phone_number' => '0922222222',
        ]);

        $cat = Category::create(['name' => 'Fiction', 'description' => 'Novels and stories']);
        Category::create(['name' => 'Science', 'description' => 'Science books']);

        Book::create(['name' => 'Harry Potter', 'author' => 'J.K. Rowling', 'ISBN' => '111-1', 'category_id' => $cat->id]);
        Book::create(['name' => 'The Hobbit',   'author' => 'Tolkien',      'ISBN' => '111-2', 'category_id' => $cat->id]);
    }
}
