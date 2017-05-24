<?php

use Illuminate\Database\Seeder;

class CategoriesTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ["name" => "Apie","slug" => "apie" ],
            ["name" => "Kontaktai","slug" => "kontaktai"],
            ["name" => "The Lab","slug" => "lab"],
            ["name" => "Samsung Irklavimas","slug" => "irklavimas"],
            ["name" => "Fruit Ninja","slug" => "fruit-ninja"],
            ["name" => "KTU Parasparnis","slug" => "parasparnis"],
            ["name" => "Space Pirate Trainer","slug" => "space"],
            ["name" => "HURL","slug" => "hurl"],
            ["name" => "Tilt Bruch","slug" => "tilt"],
            ["name" => "Final Goalie: Football Simulator","slug" => "final"],
            ["name" => "Merry Snowballs","slug" => "merry"],
            ["name" => "Project Cars","slug" => "cars"],
        ];

        DB::beginTransaction ();
        try {
            foreach ($categories as $roleData) {
                $role = VRRoles::where ('id', $roleData['id'])->first ();
                if (!$role)
                    VRRoles::create ($roleData);



            }
        } catch (\Exception $e) {
            DB::rollback ();
            throw new Exception($e->getMessage ());
        }
        DB::commit ();


    }
}
