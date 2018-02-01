<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class HelloWorldCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'hello:world {argumento1 : Esto sera devuelto por pantalla} {--opcion1 : no he pensado en un uso aun}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este es un Hello world con ARTISAN';


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $arg = $this->argument('argumento1');

        $this->line("Argumento de entrada: $arg");
        $this->info("Esto es una INFO de prueba");
        if (true) {
            $this->error("Esto es una ERROR de prueba");
            return -1;
        }
    }
}
