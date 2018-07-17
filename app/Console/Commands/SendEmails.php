<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use App\JobModel;

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
        //  $transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
        //  $transport = \Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
        //             ->setUsername('cron.shimush@gmail.com')
        //             ->setPassword('cron1234')
        //             ;

        //             // Create the Mailer using your created Transport
        //             $mailer = new Swift_Mailer($transport);

        //             // Create a message
        //             $message = (new Swift_Message('Wonderful Subject'))
        //             ->setFrom(["from@from.com" => "moshe"])
        //             ->setTo(["cron.shimush@gmail.com"])
        //             ->setBody("the message")
        //             ;

        //             // Send the message
        //             $result = $mailer->send($message);
        // $nextJob = JobModel::find(1);

        //  Mail::to("test@test.com")
        //         // ->cc($nextJob->payload["cc"])
        //         // ->bcc($nextJob->payload["bcc"])
        //         ->send(new SendEmail());



        // $email = new \SendGrid\Mail\Mail(); 
        // $email->setFrom("cron.shimush@gmail.com", "me");
        // $email->setSubject("the subject");
        // $email->addTo("cron.shimush@gmail.com", "you");
        // $email->addContent(
        //     "text/plain", "and easy to do anywhere, even with PHP"
        // );
        // $email->addContent(
        //     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
        // );
        // $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        // try {
        //     $response = $sendgrid->send($email);
        //     // print $response->statusCode() . "\n";
        //     // print_r($response->headers());
        //     print $response->body() . "\n";
        // } catch (Exception $e) {
        //     echo 'Caught exception: ',  $e->getMessage(), "\n";
        // }
         Mail::to("ybeck115@gmail.com")
                // ->cc($nextJob->payload["cc"])
                // ->bcc($nextJob->payload["bcc"])
                ->send(new SendEmail("the text"));

        
    }
}
