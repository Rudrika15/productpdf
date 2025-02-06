<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithDrawings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;

class ProductExport implements FromCollection, WithHeadings, WithMapping, WithDrawings, WithColumnWidths, WithEvents
{
    protected $products;
    protected $imageSize = 200; // Increased image size
    protected $rowHeight = 220; // Increased row height
    protected $columnWidth = 40; // Increased column width

    public function __construct($request)
    {
        $this->products = Product::where('category', $request->category)
            ->select('modelno', 'image', 'size', 'color', 'mrp')
            ->get();
    }

    public function collection()
    {
        return $this->products;
    }

    public function headings(): array
    {
        return [
            'Model No',
            'Image',
            'Size',
            'Color',
            'MRP',
        ];
    }

    public function map($product): array
    {
        return [
            $product->modelno,
            '', // Empty cell for image
            $product->size,
            $product->color,
            $product->mrp,
        ];
    }

    /**
     * Generate an array of drawings for each product's image
     *
     * @return array
     */
    public function drawings()
    {
        $drawings = [];

        foreach ($this->products as $index => $product) {
            $imageUrl = $product->image;
            $imagePath = storage_path('app/public/excel_images/' . md5($imageUrl) . '.jpg');

            // Ensure the directory exists
            if (!file_exists(storage_path('app/public/excel_images'))) {
                mkdir(storage_path('app/public/excel_images'), 0775, true);
            }

            // Check if the image exists before trying to download it
            if (!empty($product->image) && filter_var($imageUrl, FILTER_VALIDATE_URL)) {
                $client = new \GuzzleHttp\Client();
                $response = $client->get($imageUrl);
                file_put_contents($imagePath, $response->getBody());

                $drawing = new Drawing();
                $drawing->setName('Product Image');
                $drawing->setDescription('Product Image');
                $drawing->setPath($imagePath);
                $drawing->setWidth($this->imageSize);
                $drawing->setHeight($this->imageSize);
                $drawing->setResizeProportional(true);
                // Center the image in the cell
                $drawing->setOffsetX(20); // Increased offset for better centering
                $drawing->setOffsetY(10);
                $drawing->setCoordinates('B' . ($index + 2));

                $drawings[] = $drawing;
            } else {
                // If the image doesn't exist, don't add a drawing
                continue;
            }
        }

        return $drawings;
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => $this->columnWidth, // Much wider column for images
            'C' => 15,
            'D' => 15,
            'E' => 15,
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $worksheet = $event->sheet->getDelegate();

                // Set row height for header
                $worksheet->getRowDimension(1)->setRowHeight(30);

                // Set row heights for data rows
                foreach ($this->products as $index => $product) {
                    $rowIndex = $index + 2;
                    $worksheet->getRowDimension($rowIndex)->setRowHeight($this->rowHeight);
                }

                // Style header
                $worksheet->getStyle('A1:E1')->applyFromArray([
                    'font' => ['bold' => true],
                    'fill' => [
                        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                        'startColor' => ['rgb' => 'E0E0E0'],
                    ],
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                ]);

                // Style all cells
                $lastRow = count($this->products) + 1;
                $worksheet->getStyle('A1:E' . $lastRow)->applyFromArray([
                    'alignment' => [
                        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                    ],
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['rgb' => '000000'],
                        ],
                    ],
                ]);

                // Adjust column B settings
                $worksheet->getColumnDimension('B')->setAutoSize(false);
                $worksheet->getStyle('B:B')->getAlignment()->setWrapText(true);

                // Ensure proper display
                $worksheet->getSheetView()->setZoomScale(100);
            },
        ];
    }
}
