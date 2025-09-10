<?php

namespace App\Http\Requests;

use App\Models\Dishes;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DishesRequest
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'recette' => 'required|string|max:2048',
            'image_url' => 'required',
        ]);

        event(new Registered($dishes));
    }
}
