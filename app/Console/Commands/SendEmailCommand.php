<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Notification;

class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-command {email} {text} {datetime}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $data = [
            'email' => $this->argument('email'),
            'text' => $this->argument('text'),
            'datetime' => $this->argument('datetime'),
        ];

        event(new \App\Events\SendEmailEvent($data));

        Notification::create([
            'title' => 'Command: Send Email',
            'data' => json_encode($data),
        ]);

        $this->info('Email sent!');
    }
}
