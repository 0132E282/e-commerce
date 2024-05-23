<?php

namespace App\Exports;

use App\Models\Category;
use App\Repository\RepositoryMain\CategoryRepository;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CategoryExport implements FromCollection, WithHeadings, WithColumnFormatting, ShouldAutoSize, WithStyles
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $categoryRepository;
    function __construct()
    {
        $this->categoryRepository = new  CategoryRepository();
    }
    public function collection()
    {
        return $this->categoryRepository->export();
    }
    public function headings(): array
    {
        return ['#', 'tên danh mục', 'mô tả', 'danh mục con', 'sản phẩm', 'đơn hàng', 'ngày tạo', 'ngày cập nhập'];
    }
    public function styles(Worksheet $sheet)
    {
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
}
