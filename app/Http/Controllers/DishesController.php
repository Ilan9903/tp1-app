<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;

class DishesController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-dishes')->only(['create', 'store']);
        $this->middleware('permission:delete-dishes')->only(['destroy']);
    }

    public function index()
    {
        $dishes = Dishes::with(['user', 'likes'])->paginate(10);

        return view('dishes.index', compact('dishes'));
    }

    public function show(Dishes $dish)
    {
        return view('dishes.show', compact('dish'));
    }

    public function create()
    {
        return view('dishes.create.edit');
    }

    protected function store(\Illuminate\Http\Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|string',
            'recette' => 'required|string|max:2048',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image_url')->store('images', 'public');
        $imageUrl = Storage::disk('public')->url($path);

        $dish = Dishes::create([
            'title' => $request->title,
            'recette' => $request->recette,
            'image_url' => $request->image_url,
            'user_id' => auth()->id(),
        ]);

        Notification::send($dish->user, new Dishes($dish));

        return redirect()->route('dishes.index', $dish)->with('success', 'Dish added successfully.');
    }

    public function edit(Dishes $dish)
    {
        if (!auth()->user()->can('edit dishes') && auth()->user() !== $dish->user_id) {
            return redirect()->route('dishes.index')->with('error', 'You do not have permission to edit dishes.');
        }

        return view('dishes.create_edit', compact('dish'));
    }

    public function update(Request $request, Dishes $dish): RedirectResponse
    {
        if (!auth()->user()->can('edit dishes') && auth()->user() !== $dish->user_id)
        {
            return redirect()->route('dishes.index')->with('error', 'You do not have permission to edit dishes.');
        }

        $request->validate([
            'title' => 'required|string',
            'recette' => 'required|string|max:2048',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageUrl = $dish->image_url;

        if ($request->hasFile('image_url')) {
            
        }
    }
}
