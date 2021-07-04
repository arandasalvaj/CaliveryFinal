<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rol = new Role();
        $rol ->name="Customer";
        $rol->label="CT";
        $rol->save();

        $rol1 = new Role();
        $rol1 ->name="Seller";
        $rol1->label="SL";
        $rol1->save();

        $rol2 = new Role();
        $rol2 ->name="Store";
        $rol2->label="ST";
        $rol2->save();

        $rol3 = new Role();
        $rol3 ->name="Delivery";
        $rol3->label="DL";
        $rol3->save();
    }
}
