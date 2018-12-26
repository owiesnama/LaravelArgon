<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view {name} {--D|dir= : The parent directory for the view}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It\'s create a view';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $viewStub = File::get(app_path('Stubs/view.stub'));


        if (!File::exists($this->path())) {
            File::makeDirectory($this->path(), $mode = 0777, true, true);
        }

        File::put($this->path() . $this->resolveViewName(), $viewStub);

        $this->info('view created : ' . $this->argument('name'));

        $this->info($this->path() . $this->resolveViewName());
    }


    /**
     * It's return the full path for the given view
     *
     * @return string
     */
    public function resolveViewName()
    {
        $viewName = $this->argument('name') . '.blade.php';

        return $viewName;
    }

    public function path()
    {
        $dir = $this->option('dir')
            ? '/' . str_replace('.', '/', $this->option('dir')) . '/'
            : '/';

        return resource_path() . '/views' . $dir;
    }
}
