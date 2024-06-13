<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    protected $toMail;
    protected $mail;
    public function __construct($toMail, $mail)
    {
        $this->toMail = $toMail;
        $this->mail = $mail;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->toMail)->send($this->mail);
    }
}
