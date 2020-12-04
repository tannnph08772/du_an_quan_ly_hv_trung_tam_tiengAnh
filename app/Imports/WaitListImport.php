<?php

namespace App\Imports;

use App\Models\WaitList;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class WaitListImport implements
ToCollection,
WithHeadingRow,
SkipsOnError,
WithValidation,
SkipsOnFailure,
WithChunkReading,
ShouldQueue,
WithEvents
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;


    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $waitList = WaitList::create([
                'name' => $row['name'],
                'email' => $row['email'],
                'phone_number' => $row['phone_number'],
                'birthday' => $row['birthday'],
                'sex' => $row['sex'],
                'address' => $row['address'],
                'course_id' => $row['course_id'],
                'place_id' => $row['place_id'],
            ]);
        }
    }

    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:wait_list,email']
        ];
    }


    public function chunkSize(): int
    {
        return 1000;
    }
}
