<?php

namespace App\Exports;

use App\Models\Gaji\Gaji;
use App\Models\Gaji\GajiSlip;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithProperties;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class GajiExport implements FromView, ShouldAutoSize, WithMultipleSheets, WithProperties
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
        // dd($this->query);
        // $this->query = $query::whereHas('gajislip', function ($querys) {
        //     $querys->where('type', '!=', 'DIREKSI')->where('type', '!=', 'KOMISARIS');
        // });
    }
    public function view(): View
    {
        // dd($this->query->gajislip);
        return view('pages.Gaji.Submission.components.ExportView', [
            'collection' => $this->query,
        ]);
    }
    public function sheets(): array
    {
        return [
            'Sheet 1' => new SheetRecap($this->query),
            'Sheet 2' => new SheetEmploye($this->query),
            'Sheet 3' => new SheetDireksi($this->query),
            'Sheet 4' => new SheetKomisaris($this->query),
        ];
    }
    public function properties(): array
    {
        return [
            'creator'        => 'PelabuhanBukitPrima',
            'lastModifiedBy' => 'PelabuhanBukitPrima',
            'title'          => 'Invoices Export',
            'subject'        => 'Invoices',
            'keywords'       => 'invoices,export,spreadsheet',
            'category'       => 'Invoices',
            'manager'        => 'PelabuhanBukitPrima',
            'company'        => 'PelabuhanBukitPrima',
        ];
    }
    // public function styles(Worksheet $sheet)
    // {
    //     // Apply styles to specific cells or ranges
    //     $sheet->getRowDimension(1)->setRowHeight(25);
    //     $sheet->getRowDimension(2)->setRowHeight(25);
    //     $sheet->getStyle('1:2')->getFont()->setBold(true);
    //     $sheet->getStyle('1:2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER); // Set vertical align
    //     $sheet->getStyle('1:2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Set horizontal align
    //     $sheet->getStyle($sheet->calculateWorksheetDimension())->getBorders()->getAllBorders()->setBorderStyle('thin');
    //     $sheet->getStyle('A2:A2000')->getAlignment();

    //     // You can add more styling as needed

    //     return [
    //         // Add additional styles if necessary
    //     ];
    // }
    // public function columnFormats(): array
    // {
    //     return [];
    // }




    // /**
    //  * @return \Illuminate\Support\Collection
    //  */
    // public function collection()
    // {
    //     // return $this->query;
    //     // Retrieve data from different models and combine them
    //     $users = User::all();
    //     $gaji = Gaji::all();
    //     $slips = GajiSlip::all();

    //     // Combine the data as needed
    //     $combinedData = [
    //         'users' => $users,
    //         'gaji' => $gaji,
    //         'slips' => $slips,
    //     ];

    //     return collect($combinedData);
    // }
}
