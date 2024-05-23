<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class control extends Component
{
    /**
     * Create a new component instance.
     */
    protected $data;

    public function __construct($page = [], $param = [], $sort = [], $sortType = [])
    {
        $this->data['page'] = $page;
        $this->data['param'] = $param;
        $this->data['sort'] = $sort;
        $this->data['sortType'] = $sortType;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $limit = [
            'router_name' => 'admin.products.index',
            'list_actions' => [
                [
                    'name' => '25',
                    'value' => 25,
                ],
                [
                    'name' => '50',
                    'value' => 50,
                ],
                [
                    'name' => '100',
                    'value' => 100,
                ],
                [
                    'name' => '200',
                    'value' => 200,
                ],
                [
                    'name' => '400',
                    'value' => 400,
                ],
            ]
        ];
        $sort_order = [
            [
                'name' => 'desc',
                'value' => 'desc',
            ],
            [
                'name' => 'asc ',
                'value' => 'asc',
            ]
        ];
        return view('components.admin.control', $this->data + ['limit' => $limit, 'sort_order' => $sort_order]);
    }
}
