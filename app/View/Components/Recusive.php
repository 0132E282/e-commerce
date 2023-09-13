<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Recusive extends Component
{
    public $viewOption = '';
    public $dataRecusive = [];
    public $parent_id;
    function __construct($data, $parent_id = null)
    {
        $this->dataRecusive = $data;
        $this->parent_id = $parent_id;
    }
    public function filter($parent_id = '', $id = 0, $text = '')
    {

        foreach ($this->dataRecusive as $item) {
            if ($item->parent_id == $id) {
                $selected = $parent_id == $item->id_menus && $parent_id != 0 ? 'selected' : '';
                $this->viewOption .= '<option value="' . $item->id_menus . '" ' . $selected . '>' . $text  . $item->name_menus . '</option>';
                $this->filter($parent_id,  $item->id_menus,  $text . '--|');
            }
        }
        return $this->viewOption;
    }
    public function render(): View|Closure|string
    {
        $view = $this->filter();
        return view('components/recusive', ['view' =>   $view]);
    }
}
