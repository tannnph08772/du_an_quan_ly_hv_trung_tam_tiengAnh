<?php

namespace App\Exports;

use App\Models\Tuition;
use DateTime;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;


class HoaDonExport implements
ShouldAutoSize,
WithMapping,
WithHeadings,
WithEvents,
FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return  Tuition::query()->with('student');
        return  Tuition::query()->with('user');
        return  Tuition::query()->with('tuitionDetail');
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->student->user->name,
            $item->student->user->email,
            $item->student->user->phone_number,
            $item->tuitionDetail->sum_money,
            $item->user->name,
            $item->created_at
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Họ và tên',
            'Email',
            'Số điện thoại',
            'Số tiền thu',
            'Người thu',
            'Ngày thu',

        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A8:D8')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
