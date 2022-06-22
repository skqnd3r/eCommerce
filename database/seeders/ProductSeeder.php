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
        $list=array("Aqualight","Cubico","Eda","Lantana","Lechuza");
        while($i != 20){
            foreach($list as $item){
                DB::table('products')->insert([
                    'title' => $item." (".$i.")",
                    'price' => random_int(15,100),
                    'img' => '/resources/products/'.$item.".jpg",
                    'alt' => $item.$i,
                    'description' => Str::random(50),
                    'quantity' => random_int(1,15),                
                ]);
                $i++;
            }
        }
    }
}
