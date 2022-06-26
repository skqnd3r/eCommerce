<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i=0;
        // $list=array("Aqualight","Cubico","Eda","Lantana","Lechuza");
        $list=array("Lantana","Nelly","Aqualight","Orchidee","Cubico","Spathiphyllum");
        foreach($list as $item){
            DB::table('products')->insert([
                'title' => $item,
                'price' => random_int(15,100),
                'img' => '/resources/products/'.$item.".jpg",
                'alt' => $item,
                'description' => "Lorem ipsum dolor sit amet. Nam consequatur quia est atque perferendis aut odio nihil. Et incidunt consequatur eos dolore mollitia ad nisi incidunt et rerum voluptatum et unde minima.",
                'quantity' => random_int(1,15),                
            ]);
        }
    }
}
