<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class FirstCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ttud:first-cmd';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'tạo file [storage/app/ttud-first-command.txt]';

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
        $filename = 'ttud-first-command.txt';
        $content = sprintf('%s: first-command content', date('Y-m-d H:i:s'));
        Storage::disk('local')->put($filename, $content);
        return 0;
    }
}
