<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;
class WordOfTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'work:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'enviar un correo a todos los usuarios';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Product::factory(2)->create();
        $this->info('se ha creado 2 producto, con rando users');
    }
}
