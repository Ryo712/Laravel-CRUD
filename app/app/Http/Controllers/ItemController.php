<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::latest()->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);
    
    
    $item = new Item();
    $item->name = $request->name;
    $item->description = $request->description;
    $item->save();
    
    return redirect()->route('items.index')
                    ->with('success', 'Item created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }
    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, Item $item)
{
    $request->validate([
        'name' => 'required',
        'description' => 'required',
    ]);
    
    // $request->all() の代わりに必要なフィールドだけを指定
    $item->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);
    
    return redirect()->route('items.index')
                    ->with('success', 'Item updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();
        
        return redirect()->route('items.index')
                         ->with('success', 'Item deleted successfully.');
    }
}