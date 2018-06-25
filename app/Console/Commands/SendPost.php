<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


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
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->request('POST','https://jsonplaceholder.typicode.com/posts', [
            'form_params' => [
                "userId" => 1,   
                "title" => "sunt aut facere repellat provident occaecati excepturi optio reprehenderit",
                "body" => "quia et suscipit\nsuscipit recusandae consequuntur expedita et cum\nreprehenderit molestiae ut ut quas totam\nnostrum rerum est autem sunt rem eveniet architecto"
                            ]
                ]);
                $this->info($result->getBody());
                
    }
}
