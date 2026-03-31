<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            ['name' => 'TechSource PH', 'email' => 'contact@techsource.ph', 'phone' => '09171234567', 'address' => 'Makati City, Metro Manila', 'contact_person' => 'Juan dela Cruz', 'status' => 'active'],
            ['name' => 'GadgetHub Manila', 'email' => 'info@gadgethub.ph', 'phone' => '09281234567', 'address' => 'Quezon City, Metro Manila', 'contact_person' => 'Maria Santos', 'status' => 'active'],
            ['name' => 'OfficeDepot PH', 'email' => 'sales@officedepot.ph', 'phone' => '09391234567', 'address' => 'Pasig City, Metro Manila', 'contact_person' => 'Pedro Reyes', 'status' => 'active'],
            ['name' => 'HomeGoods Express', 'email' => 'orders@homegoods.ph', 'phone' => '09491234567', 'address' => 'Mandaluyong City, Metro Manila', 'contact_person' => 'Ana Villanueva', 'status' => 'active'],
            ['name' => 'UniParts Corp', 'email' => 'support@uniparts.ph', 'phone' => '09561234567', 'address' => 'Taguig City, Metro Manila', 'contact_person' => 'Carlos Mendoza', 'status' => 'inactive'],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
