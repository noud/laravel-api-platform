<?php

namespace API\Platform\Console\Commands;

use API\Platform\Services\ModelsService;
use Illuminate\Console\Command;

class GenerateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api-platform:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate everything, Models and end-points';

    /**
     * The Models service.
     *
     * @var ModelsService
     */
    protected $modelsService;

    /**
     * Create a new command instance.
     *
     * @param  ModelsService $modelsService
     * @return void
     */
    public function __construct(ModelsService $modelsService)
    {
        parent::__construct();

        $this->modelsService = $modelsService;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->modelsService->generateAll();
    }
}
