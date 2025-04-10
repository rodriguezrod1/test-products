<?php

use Illuminate\Database\Seeder;
use App\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::flushEventListeners();
        DB::table('products')->truncate();

        $chunks = 200;
        $perChunk = 10;

        $this->command->info("Creando 2000 productos en {$chunks} chunks de {$perChunk}...");

        $bar = $this->command->getOutput()->createProgressBar($chunks);

        for ($i = 0; $i < $chunks; $i++) {
            factory(Product::class, $perChunk)->create();
            $bar->advance();
        }

        $bar->finish();
        $this->command->info("\n¡2000 productos creados exitosamente!");
    }
}
