<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use Mailtrap\Helper\ResponseHelper;
use Mailtrap\MailtrapClient;
use Mailtrap\Mime\MailtrapEmail;
use Symfony\Component\Mime\Address;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('sync:coins-value', function () {
    $this->call('app:sync-coins-value');
})->describe('Sync coin-based product values with current market prices')
->emailOutputOnFailure('jgmovale99@gmail.com')->everyMinute();


// Artisan::command('send-mail', function () {
//     $email = (new MailtrapEmail())
//         ->from(new Address('hello@demomailtrap.co', 'Mailtrap Test'))
//         ->to(new Address('jgmovale99@gmail.com'))
//         ->subject('You are awesome!')
//         ->category('Integration Test')
//         ->text('Congrats for sending test email with Mailtrap!')
//     ;

//     $response = MailtrapClient::initSendingEmails(
//         apiKey: '<YOUR_API_TOKEN>'
//     )->send($email);

//     var_dump(ResponseHelper::toArray($response));
// })->purpose('Send Mail');