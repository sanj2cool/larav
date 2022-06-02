<?php

namespace App\Console\Commands;

use App\Imports\UserImporter;
use Illuminate\Console\Command;

class ScheduleImporter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sc:import {filePath}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'schedule importer';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->output->title('Starting import');
        $importer = new UserImporter();
        $importer->import($this->argument('filePath'));
        $this->output->success('Import successful');
        return 0;
    }
}
