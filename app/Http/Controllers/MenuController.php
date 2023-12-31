<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use GuzzleHttp\Psr7\Response;
use Illuminate\Console\View\Components\Component;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MenuController extends Controller
{
    public function index()
    {

        return Inertia::render(component: 'Menu/Index');
    }

    public function create()
    {

        return Inertia::render(component: 'Menu/Create');
    }

    public function store(Request $request): Response
    {
        print($request);
        return  new Response(200);
    }

    public function edit(Menu $menu, Request $request)
    {

        return Inertia::render(component: 'Menu/Edit');
    }

    public function destroy(Menu $menu, Request $request)
    {

        return Inertia::render(component: 'Menu/RemoveMenu');
    }
}
