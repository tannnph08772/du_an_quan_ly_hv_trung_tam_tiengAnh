<?php

namespace App\Exports;

use App\Models\Student;
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


class DSHocVienExport implements
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
        return  Student::query()->with('user');
        return  Student::query()->with('class');
        return  Student::query()->with('course');
    }

    public function map($item): array
    {
        return [
            $item->id,
            $item->user->name,
            $item->user->email,
            $item->user->phone_number,
            $item->user->sex == 1 ?'Nam' : 'Nữ',
            $item->user->birthday,
            $item->course->name_course,
            $item->class->name_class,
            $item->user->address,
            $item->status == 1 ?'Chưa đóng' : 'Đã đóng',
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
            'Ngày sinh',
            'Khóa học',
            'Lớp',
            'Địa chỉ',
            'Trạng thái học phí',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->getStyle('A1:J1')->applyFromArray([
                    'font' => [
                        'bold' => true
                    ]
                ]);
            }
        ];
    }
}
