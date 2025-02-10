<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use OpenApi\Generator;
class GenerateSwaggerDocs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-swagger-docs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generar documentación Swagger';
    

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        $openapi = Generator::scan([app_path('Http/Controllers')]);
        file_put_contents(public_path('swagger.json'), $openapi->toJson());
        $this->info('Documentación Swagger generada correctamente.');
    }
}
