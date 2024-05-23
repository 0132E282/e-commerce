<?php

namespace App\Exports;

use App\Models\Products;
use App\Repository\RepositoryMain\ProductsRepository;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class ProductsExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    protected $productsRepository;
    public function __construct()
    {
        $this->productsRepository = new ProductsRepository();
    }
    public function collection()
    {
        return $this->productsRepository->export();
    }
    public function map($invoice): array
    {
        return [];
    }
    public function styles(Worksheet $sheet)
    {
        // border tất cả các bản
        $sheet->getStyle($sheet->calculateWorksheetDataDimension())->getBorders()->getAllBorders()->setBorderStyle('thin');

        //  set tự động chỉnh dộ cao
        $sheet->getDefaultRowDimension()->setRowHeight(-1);
        return [
            // Style the first row as bold text.
            1    => [
                'font' => ['bold' => true, 'size' => '12', 'height' => 40]
            ],
        ];
    }
    public function columnFormats(): array
    {
        return [];
    }

    public function headings(): array
    {
        return ['#', 'Tên Sản phẩm', 'danh mục', 'số lượng', 'màu', 'khích thước', 'giá', 'giá giảm', 'ngày tạo', 'ngày cập nhập'];
    }
}
