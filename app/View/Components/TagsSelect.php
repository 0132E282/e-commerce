<?php

namespace App\View\Components;

use App\Models\Tags;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TagsSelect extends Component
{
    public $dataTagsSelect;
    protected $modelTags;
    public function __construct($dataTagsSelect = [])
    {
        $this->dataTagsSelect = $dataTagsSelect;
        $this->modelTags = new Tags();
    }
    function fillerTags($data = [])
    {
        $dataTags = [];
        foreach ($data as $tag) {
            $selected = false;
            foreach ($this->dataTagsSelect as $value) {
                if ($tag->id_tag == $value->id_tag) {
                    array_push($dataTags, ['title' => $tag->name_tag, 'value' => $tag->name_tag, 'selected' => true]);
                    $selected = true;
                }
            }
            if ($selected == false) {
                array_push($dataTags, ['title' => $tag->name_tag, 'value' => $tag->name_tag, 'selected' => false]);
            }
        }
        return $dataTags;
    }
    public function render(): View|Closure|string
    {
        $data = optional($this->modelTags)->get();
        $dataTags = $this->fillerTags($data);
        return view('components/select/tags-select', ['dataTags' => $dataTags]);
    }
}
