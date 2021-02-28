<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MenuBuilderController extends Controller
{
    public function index($id)
    {
        Gate::authorize('app.menus.index');
        $menu = Menu::findOrFail($id);
        return view('backend.menus.builder',compact('menu'));
    }

    public function order(Request $request)
    {
        Gate::authorize('app.menus.index');
        $menuItemOrder = json_decode($request->input('order'));
        $this->orderMenu($menuItemOrder,null);
    }

    private function orderMenu(array $menuItems, $parentId)
    {
        Gate::authorize('app.menus.index');
        foreach ($menuItems as $index => $menuItem) {
            $item = MenuItem::findOrFail($menuItem->id);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();

            if (isset($menuItem->children)) {
                $this->orderMenu($menuItem->children, $item->id);
            }
        }
    }

    public function itemCreate($id)
    {
        Gate::authorize('app.menus.create');
        $menu = Menu::findOrFail($id);
        return view('backend.menus.item.form',compact('menu'));
    }

    public function itemStore(Request $request, $id)
    {
        Gate::authorize('app.menus.create');

        $this->validate($request, [
            'type' => 'required|string',
            'divider_title' => 'nullable|string',
            'title' => 'nullable|string',
            'url' => 'nullable|string',
            'target' => 'nullable|string',
            'icon_class' => 'nullable|string'
        ]);

        $menu = Menu::findOrFail($id);

        $menu->menuItems()->create([
            'type' => $request->get('type'),
            'title' => $request->get('title'),
            'divider_title' => $request->get('divider_title'),
            'url' => $request->get('url'),
            'target' => $request->get('target'),
            'icon_class' => $request->get('icon_class')
        ]);

        notify()->success('Menu Item Successfully Added.', 'Added');
        return redirect()->route('app.menus.builder',$menu->id);

    }


    public function itemEdit($id, $itemId)
    {
        Gate::authorize('app.menus.edit');
        $menu = Menu::findOrFail($id);
        $menuItem = MenuItem::where('menu_id',$menu->id)->findOrFail($itemId);
        return view('backend.menus.item.form',compact('menu', 'menuItem'));
    }

    public function itemUpdate(Request $request, $id, $itemId)
    {
        Gate::authorize('app.menus.edit');

        $this->validate($request, [
            'type' => 'required|string',
            'divider_title' => 'nullable|string',
            'title' => 'nullable|string',
            'url' => 'nullable|string',
            'target' => 'nullable|string',
            'icon_class' => 'nullable|string'
        ]);

        $menu = Menu::findOrFail($id);
        $menuItem = MenuItem::where('menu_id',$menu->id)->findOrFail($itemId)->update([
            'type' => $request->get('type'),
            'title' => $request->get('title'),
            'divider_title' => $request->get('divider_title'),
            'url' => $request->get('url'),
            'target' => $request->get('target'),
            'icon_class' => $request->get('icon_class')
        ]);

        notify()->success('Menu Item Successfully Updated.', 'Updated');
        return redirect()->route('app.menus.builder', $menu->id);

    }

    public function itemDestroy($id, $itemId)
    {
        Gate::authorize('app.menus.destroy');
        Menu::findOrFail($id)
            ->menuItems()
            ->findOrFail($itemId)
            ->delete();

        notify()->success('Menu Item Successfully Deleted.', 'Success');
        return back();

    }
}
