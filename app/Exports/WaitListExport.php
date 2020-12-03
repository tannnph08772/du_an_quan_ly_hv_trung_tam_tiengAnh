<?php

namespace App\Exports;

use App\Models\WaitList;
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

class WaitListExport implements
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
        return  WaitList::query()->with('course');
        return  WaitList::query()->with('place');
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->email,
            $item->name,
            $item->phone_number,
            $item->sex == 1 ?'Nam' : 'Nữ',
            $item->course->name_course,
            $item->place->name_place,
            $item->address,
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
            'Giới tính',
            'Khóa học đăng ký',
            'Cơ sở học ',
            'Đại chỉ cá nhân',
            'Ngày đăng ký'

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
