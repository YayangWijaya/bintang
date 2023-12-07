<?php

namespace App\Jobs;

use App\Notifications\CandidateTerminatedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendCandidateTerminatedJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $candidate;

    /**
     * Create a new job instance.
     */
    public function __construct($candidate)
    {
        $this->candidate = $candidate;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->candidate->notify(new CandidateTerminatedNotification());
    }
}
