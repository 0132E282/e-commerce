<?php

namespace App\Repository\RepositoryMain;

use App\Models\Menus;
use App\Repository\RepositoriesInterface\MenusRepositoryInterface;

class MenusRepository extends BaseRepository implements MenusRepositoryInterface
{
    protected $modal;
    protected $menuItemModal;
    function __construct()
    {
        $this->modal = new Menus();
    }
    function create($value, $options = [])
    {
        if (!empty($value['location'])) {
            $this->modal->where('location', $value['location'])->update(['location' => null]);
        }
        return $this->modal->create($value);
    }
    function update($id, $value, $options = [])
    {
        $menu = $this->modal->find($id);
        if (!empty($value['location'])) {
            $this->modal->where('location', $value['location'])->where('id', '!=', $id)->update(['location' => null]);
        }
        $menu->update($value);
        return $menu;
    }
    function delete($id, $options = [])
    {
        $menus =  $this->modal->find($id);
        $menus->delete();
        return $menus;
    }
    function details($id, $option = null)
    {
        return $this->modal->find($id);
    }
    function trash()
    {
        return  $this->modal->onlyTrashed()->paginate(25);
    }
    function all($options = null)
    {
        return $this->modal->all();
    }
    function destroy($id)
    {
        $menus =  $this->modal->onlyTrashed()->find($id);
        $menus->forceDelete();
        return  $menus;
    }
    function restore($id)
    {
        $menus = $this->modal->onlyTrashed()->find($id);
        $menus->restore();
        return $menus;
    }

    function createMenuItems($id_menu, $data = [], $option = null)
    {
        return $this->modal->find($id_menu)->menu_items()->createMany($data);
    }
    function updateMenuItemsParent($id_menu, $id_chill, $parent_id)
    {
        return $this->modal->find($id_menu)->menu_items()->whereIn("id", $id_chill)->update(['parent_id' => $parent_id]);
    }
    function deleteMenuItem($id_menu, $id_menu_item)
    {
        $menuItem = $this->modal->find($id_menu)->menu_items()->where("id", '=', $id_menu_item)->first();
        if ($menuItem->children?->count() > 0) {
            $menuItem->children()->update(['parent_id' => null]);
        }
        return  $menuItem->delete();
    }
    function updateMenuItem($id_menu, $id_menu_item, $value = null)
    {
        $menuItemBase = $this->modal->find($id_menu)->menu_items();
        $menuItem = $menuItemBase->where("id", '=', $id_menu_item)->first();
        if (!empty($value['location'])) {
            $this->modal->find($id_menu)->menu_items()
                ->where('parent_id',  $menuItem->parent_id)
                ->where('location',  $value['location'])
                ->update(['location' => null]);
        }
        $menuItem->update($value);
        return  $menuItem;
    }
}
