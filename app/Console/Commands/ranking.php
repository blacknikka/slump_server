<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Validator;
use Illuminate\Validation\Rule;
use App\Services\RankingService;

class ranking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ranking:make {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make ranking database.';

    /**
     * @var RankingService
     */
    private $service;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(RankingService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = $this->argument('date');

        $validator = Validator::make([
            'date' => $date,
        ], [
            'date' => ['required', 'regex:/^\d{4}-\d{1,2}$/'],
        ]);

        if ($validator->fails()) {
            $this->error('Please make sure arguments.');
            $this->error('php artisan ' . $this->signature);
        } else {
            $this->info('Start making a Ranking.');
            $data = $this->service->makeRankingData($date);
            $this->comment($data);
            $this->info('Complete.');
        }
    }
}
