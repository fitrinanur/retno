<?php
namespace App\Exports;
use App\Transaction;
use App\Member;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use DB;



class TransactionReports implements FromQuery, WithMapping, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithEvents
{
    use Exportable;
    private $data;
    
    public function __construct($data)
    {
        $this->data = $data;

        return $this;
    }

    public function query()
    {
        return $this->data;
    }

   

     /**
    * @var Lodging $lodgings
    */
    public function map($data): array
    {
        // dd($data);
        return [
            $data->transaction_code,
            $transactions->member_id->name,
            $transactions->treatmen_id->name,
            $transactions->catatan,
            $transactions->extra,
            $transactions->total,
            $transactions->user_id->name,
            Date::dateTimeToExcel($transactions->created_at),
        ];
    }

    public function headings(): array
    {
        return [
            'transaction_code',
            'member',
            'treatment',
            'catatan',
            'extra',
            'total',
            'user',
            'Tanggal Terdaftar',
        ];
    }

     /**
     * @return array
     */
    public function columnFormats(): array
    {
        return [
            'H' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

     /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $styleArray = [
                    'borders' => [
                        'outline' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                            'color' => ['argb' => 'FFFF0000'],
                        ],
                    ],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => [
                            'argb' => 'FFA0A0A0',
                        ],
                    ],
                ];
                $cellRange = 'A1:H1'; // All headers
                
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
                $event->sheet->getStyle($cellRange)->applyFromArray($styleArray);
            },
        ];
    }
}
