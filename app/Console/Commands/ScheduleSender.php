<?php

namespace App\Console\Commands;

use App\Models\UserEmailSchedule;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ScheduleSender extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'schedule:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send schedules';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $schedules = UserEmailSchedule::where('schedule_time', 'like', now()->format('Y-m-d H:i').'%')->get();
        foreach ($schedules as $schedule) {
            Mail::send(
                ['text'=>'mails.event-reminder'],
                [
                    'name'=> $schedule->user->name,
                    'schedule_time'=>$schedule->schedule_time,
                ],
                function ($message) use ($schedule) {
                    $message->to($schedule->user->email, $schedule->user->name)->cc('laravel-champagnewebs-com@wolrych.dns-systems.net', 'System')->subject('Event reminder');
                }
            );
        }
        return 0;
    }
}
