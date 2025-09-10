<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class DishesController
{
    protected function store(\Illuminate\Http\Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string',
            'recette' => 'required|string|max:2048',
            'image_url' => 'required',
        ]);

        $dishes = Dishes::create([
            'title' => $request->title,
            'recette' => $request->recette,
            'image_url' => $request->image_url,
        ]);

        event(new Registered($dishes));

        return redirect()->intended(route('test', absolute: false));
    }
}
