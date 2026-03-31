<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class InventoryController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Inventories/Index', [
            'inventories' => Inventory::with('product.supplier')->latest()->paginate(10),
        ]);
    }

    public function edit(Inventory $inventory): Response
    {
        return Inertia::render('Admin/Inventories/Edit', [
            'inventory' => $inventory->load('product.supplier'),
        ]);
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:0',
        ]);

        $inventory->update($validated);

        return redirect()->route('admin.inventories.index')
            ->with('success', 'Inventory updated successfully.');
    }
}
