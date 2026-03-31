<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class SupplierController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Admin/Suppliers/Index', [
            'suppliers' => Supplier::latest()->paginate(10),
        ]);
    }

    public function create(): Response
    {
        return Inertia::render('Admin/Suppliers/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:suppliers,email',
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string|max:500',
            'contact_person' => 'required|string|max:255',
            'status'         => 'required|in:active,inactive',
        ]);

        Supplier::create($validated);

        return redirect()->route('admin.suppliers.index')
            ->with('success', 'Supplier created successfully.');
    }

    public function edit(Supplier $supplier): Response
    {
        return Inertia::render('Admin/Suppliers/Edit', [
            'supplier' => $supplier,
        ]);
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:suppliers,email,' . $supplier->id,
            'phone'          => 'required|string|max:20',
            'address'        => 'required|string|max:500',
            'contact_person' => 'required|string|max:255',
            'status'         => 'required|in:active,inactive',
        ]);

        $supplier->update($validated);

        return redirect()->route('admin.suppliers.index')
            ->with('success', 'Supplier updated successfully.');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()->route('admin.suppliers.index')
            ->with('success', 'Supplier deleted successfully.');
    }
}
