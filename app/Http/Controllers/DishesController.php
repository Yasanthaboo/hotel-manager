<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DishesController extends Controller
{
    public function index()
    {
        return Inertia::render(component: 'Dish/Index', props: ['dishes' => MenuItem::all()]);
    }

    public function create()
    {

        return Inertia::render(component: 'Dish/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:128',
            'description' => 'required|max:500',
            'price' => 'required|numeric'
        ]);

        MenuItem::create($request->only(['name', 'description', 'price', 'isAvailable']));
        return  redirect()->route(route: 'dishes.index');
    }

    public function edit(MenuItem $menuItem, Request $request): Response
    {
        return Inertia::render(component: 'Dish/Edit', props: ['menuItem' => $menuItem]);
    }

    public function update(MenuItem $menuItem, Request $request)
    {
        $request->validate([
            'name' => 'required|max:128',
            'description' => 'required|max:500',
            'price' => 'required|numeric'
        ]);

        $menuItem->update($request->only(['name', 'description', 'price', 'isAvailable']));
    }

    public function destroy(MenuItem $menu, Request $request)
    {

        return Inertia::render(component: 'Dish/RemoveDish');
    }
}
