<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Gate::authorize('app.menus.index');
        $menus = Menu::latest('id')->get();
        return view('backend.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.menus.create');
        return view('backend.menus.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Gate::authorize('app.menus.create');
        $this->validate($request, [
           'name' => 'required|string|unique:menus',
           'description' => 'nullable|string'
        ]);

        Menu::create([
            'name' => Str::slug($request->get('name')),
            'description' => $request->get('description'),
            'deletable' => true
        ]);

        notify()->success('Menu Added', 'Success');
        return redirect()->route('app.menus.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        Gate::authorize('app.menus.edit');
        return view('backend.menus.form', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        Gate::authorize('app.menus.edit');
        $this->validate($request, [
            'name' => 'required|string|unique:menus,name,'.$menu->id,
            'description' => 'nullable|string'
        ]);

        $menu->update([
            'name' => Str::slug($request->get('name')),
            'description' => $request->get('description'),
            'deletable' => true
        ]);

        notify()->success('Menu Updated', 'Success');
        return redirect()->route('app.menus.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Gate::authorize('app.menus.destroy');
        if($menu->deletable == true){
            $menu->delete();
            notify()->success('Menu Deleted', 'Success');
        }else{
            notify()->error('Sorry you can\'t delete system menu.', 'Error');
        }

        return back();
    }
}
