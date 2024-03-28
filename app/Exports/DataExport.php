<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class DataExport implements FromView, ShouldAutoSize, WithEvents
{
    private $data, $length, $headerLength;

    public function __construct($data)
    {
        $this->data = $data;
        $this->headerLength = count(max($data)) + 1;
        $this->length = count($data) + 3;
    }

    public function alphToNum($num)
    {
        $alphs = range('A', 'Z');
        return $alphs[$num-1];
    }

    public function registerEvents(): array
    {

        return [
            AfterSheet::class    => function (AfterSheet $event) {
                $styleArray = [
                    'font' => [
                        'bold' => true,
                        'color' => array('rgb' => 'FFFFFF'),
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'color' => [
                            'argb' => '833C0C'
                        ]
                    ],
                ];

                $event->sheet->getDelegate()->getStyle('B3:' . $this->alphToNum($this->headerLength) . '3')->applyFromArray($styleArray);

                $setBorder = "B3:" . $this->alphToNum($this->headerLength) . $this->length;

                $event->sheet->getDelegate()->getStyle($setBorder)->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $event->sheet->getDelegate()->getStyle($setBorder)->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $event->sheet->getDelegate()->getStyle($setBorder)->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $event->sheet->getDelegate()->getStyle($setBorder)->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $event->sheet->getDelegate()->getStyle($setBorder)->getBorders()->getHorizontal()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                $event->sheet->getDelegate()->getStyle($setBorder)->getBorders()->getVertical()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            },
        ];
    }

    public function view(): View
    {
        return view('export.data', [
            'data' => $this->data
        ]);
    }
}
