<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\JobModel;


class SendPost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:post';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $Job = JobModel::find(22); 
       
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('POST',$Job->destination, [
            'form_params' => 
                $Job->payload
                ]);
                print_r($this->info($result->getBody()));
                
    }
}
