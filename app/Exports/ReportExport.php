<?php
namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromArray;

class ReportExport implements FromArray
{
    protected $report;

    public function __construct(array $report)
    {
        $this->report = $report;
    }

    public function array(): array
    {
        return $this->report;
    }
}
?>