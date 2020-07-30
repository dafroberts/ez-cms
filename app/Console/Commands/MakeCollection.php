<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class MakeCollection extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:collection {name : The collection\'s class name} 
        {--a|all : Generate a migration, seeder, factory, and resource controller for the collection} 
        {--c|controller : Create a new controller for the collection} 
        {--f|factory : Create a new factory for the collection}
        {--m|migration : Create a new migration file for the collection} 
        {--s|seed : Create a new seeder file for the collection} 
        {--p|pivot : Indicates if the generated collection should be a custom intermediate table model} 
        {--r|resource : Indicates if the generated controller should be a resource controller}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a collection model';

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
        $collectionName = $this->argument('name');

        if(ctype_lower($collectionName) || Str::singular($collectionName) != $collectionName) {
            $proposedName = Str::singular(ucfirst(strtolower($collectionName)));
            if ($this->confirm('"'.$collectionName.'" does not currently follow the standard naming convention for collections. Would you like to use "'.$proposedName.'" instead?')) {
                $collectionName = $proposedName;
            }
        }

        $options = [
            'name' => 'Collections\\'.$this->argument('name'),
            '-a' => $this->option('all'),
            '-c' => $this->option('controller'),
            '-f' => $this->option('factory'),
            '-m' => $this->option('migration'),
            '-s' => $this->option('seed'),
            '-p' => $this->option('pivot'),
            '-r' => $this->option('resource'),
            '-vvv' => true
        ];

        // Attempt to create the collection model
        $exitCode = Artisan::call('make:model', $options);

        // TODO: Provide a helpful error message
        return ($exitCode) ? 'Something went wrong!' : 'Collection created successfully!';
    }
}
