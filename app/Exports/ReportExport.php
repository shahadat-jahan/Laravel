<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;

class ReportExport implements FromView, Responsable, WithStyles, ShouldAutoSize
{
    protected $data;
    protected $rowspanArr;
    use Exportable;

    public function __construct(array $report)
    {
        $this->data = $report['data'];
        $this->rowspanArr = $report['rowspanArr'];
    }

    public function view(): View
    {
        return view('orders.include.reportPDF', [
            'data' => $this->data,
            'rowspanArr' => $this->rowspanArr
        ]);
    }

    // public function array(): array
    // {
    //     return $this->report;
    // }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('1')->getFont()->setBold(true)->setSize(18);
        $sheet->getStyle('3')->getFont()->setBold(true);
        $sheet->getStyle('A3:E3')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('green');
        // $sheet->getStyle('1:100')->getBorders()->getAllBorders()
        //     ->setBorders('thin');
        $sheet->getStyle('1:100')->getAlignment()
            ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('1:100')->getAlignment()
            ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    }

    // public function registerEvents(): array
    // {
    //     return [
    //         AfterSheet::class    => function(AfterSheet $event) {
    //             $event->sheet->getDelegate()->getStyle('1:100')
    //                             ->getAlignment()
    //                             ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER)
    //                             ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    //         },
    //     ];
    // }

    // public function headings(): array
    // {
    //     return [
    //         'Order No.',
    //         'Customer ID',
    //         'Customer name',
    //         'Date',
    //     ];
    // }
}
