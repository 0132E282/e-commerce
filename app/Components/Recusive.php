<?php

namespace App\Components;



class Recusive
{
    protected $category = [];
    protected $data = [];
    protected $dataMenus = [];
    function __construct($data)
    {
        $this->data = $data;
    }
    public function filterCategory($parent_id = '', $id = 0, $text = '')
    {
        foreach ($this->data as $item) {
            if ($item->parent_id == $id) {
                $selected = $parent_id == $item->id_category && $parent_id != 0 ? 'selected' : '';
                array_push($this->category, [
                    'selected' => $selected,
                    'value' => $item->id_category,
                    'title' => $text . $item->name_category
                ]);
                $this->filterCategory($parent_id, $item->id_category, $text . '--');
            }
        }
        return $this->category;
    }
    public function filterMenus($parent_id = '', $id = 0, $text = '')
    {
        foreach ($this->data as $item) {
            if ($item->parent_id == $id) {
                $selected = $parent_id == $item->id_menus && $parent_id != 0 ? 'selected' : '';
                array_push($this->dataMenus, [
                    'selected' => $selected,
                    'value' => $item->id_menus,
                    'title' => $text . $item->name_menus
                ]);
                $this->filterMenus($parent_id, $item->id_menus, $text . '--');
            }
        }
        return $this->dataMenus;
    }
}
