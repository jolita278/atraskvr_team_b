<?php

use App\Models\VRPagesTranslations;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagesTranslationsSeeder extends Seeder
{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
    {
        $pages = [
            ["category_id" => "apie"],
            ["category_id" => "kontaktai"],
            ["category_id" => "patirciu-kambariai"],
        ];

        DB::beginTransaction ();
        try {
            foreach ($pages as $roleData) {
                $role = VRPagesTranslations::where ('id', $roleData['id'])->first ();
                if (!$role)
                    VRPagesTranslations::create ($roleData);
            }
        } catch (\Exception $e) {
            DB::rollback ();
            throw new Exception($e->getMessage ());
        }
        DB::commit ();
    }

}
