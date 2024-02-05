<?php

namespace App\Exports;

use App\Models\Gaji\Gaji;
use App\Models\Gaji\GajiSlip;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SheetRecap implements FromView, ShouldAutoSize, WithStyles, WithColumnFormatting, WithTitle, WithEvents
{
    use RegistersEventListeners;

    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
        // dd($this->query->get());
    }
    public function view(): View
    {
        // dd($this->query->gajislip);
        return view('pages.Gaji.Submission.components.ExportViewRec', [
            'collection' => $this->query,
        ]);
    }
    public function title(): string
    {
        return 'All';
    }
    public function styles(Worksheet $sheet)
    {
        // Apply styles to specific cells or ranges
        $sheet->getRowDimension(1)->setRowHeight(25);
        $sheet->getRowDimension(2)->setRowHeight(25);
        $sheet->getStyle('1:2')->getFont()->setBold(true);
        $sheet->getStyle('1:2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER); // Set vertical align
        $sheet->getStyle('1:2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER); // Set horizontal align
        $sheet->getStyle($sheet->calculateWorksheetDimension())->getBorders()->getAllBorders()->setBorderStyle('thin');
        $sheet->getStyle('A2:A2000')->getAlignment();

        // You can add more styling as needed

        return [
            // Add additional styles if necessary
        ];
    }

    public function afterSheet(AfterSheet $event)
    {
        // Get the highest row number where data exists
        $highestRow = $event->sheet->getHighestRow();

        // Set the sum formula at the bottom of the column
        $event->sheet->getCell('F' . $highestRow)->setValue('=SUM(F3:F' . $highestRow - 1 . ')');
    }
    public function columnFormats(): array
    {
        return [];
    }
}
