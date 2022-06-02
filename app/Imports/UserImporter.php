<?php

namespace App\Imports;

use App\Models\User;
use App\Models\UserEmailSchedule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class UserImporter implements ToModel, WithChunkReading, WithHeadingRow, WithBatchInserts, WithProgressBar
{
    use Importable;

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 1000;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user = User::firstOrCreate(
            ['email' =>  $row['email']],
            [
                'name' => $row['name'],
                'password'=> \Hash::make($row['email'])
            ]
        );
        return new UserEmailSchedule([
            'user_id'=> $user->id,
            'schedule_time'=> $row['schedule_time'],
            'event'=> $row['event']
        ]);
    }
}
