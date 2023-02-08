<?php

namespace App\Exports;

use App\Models\Campaign;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class DonationsExport implements FromView, ShouldAutoSize, WithStyles
{
    private Campaign $campaign;

    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
    }

    public function view(): View
    {
        return view('exports.donations', [
            'donations' => $this->campaign->donations()->where('status', 'success')->latest()->get(),
            'campaign' => $this->campaign
        ]);
    }

    public function styles(Worksheet $sheet)
    {
        return [
            5 => ['font' => ['bold' => true]],
            'A1' => ['font' => ['bold' => true]],
            'A2' => ['font' => ['bold' => true]],
            'A3' => ['font' => ['bold' => true]],
        ];
    }
}
