<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:email {to=you@you.com}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send an email';

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
        $to = $this->argument('to');
        $text = "I'm hungary!!!!!!!";
        Mail::to($to)->send(new SendEmail($text));
    }
}
