<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            // TechSource PH (supplier_id: 1)
            ['supplier_id' => 1, 'name' => 'Mechanical Keyboard', 'description' => 'Full-size mechanical keyboard with RGB backlight and blue switches.', 'price' => 2499.00, 'sku' => 'SKU-MK001', 'status' => 'active'],
            ['supplier_id' => 1, 'name' => 'Wireless Mouse', 'description' => 'Ergonomic wireless mouse with 2.4GHz receiver and 12-month battery life.', 'price' => 899.00, 'sku' => 'SKU-WM002', 'status' => 'active'],
            ['supplier_id' => 1, 'name' => 'USB-C Hub 7-in-1', 'description' => 'Multiport hub with HDMI, USB 3.0, SD card, and PD charging support.', 'price' => 1299.00, 'sku' => 'SKU-UH003', 'status' => 'active'],
            ['supplier_id' => 1, 'name' => '27" IPS Monitor', 'description' => 'Full HD IPS monitor with 75Hz refresh rate and ultra-thin bezels.', 'price' => 12999.00, 'sku' => 'SKU-MN004', 'status' => 'active'],

            // GadgetHub Manila (supplier_id: 2)
            ['supplier_id' => 2, 'name' => 'Bluetooth Earbuds', 'description' => 'True wireless earbuds with active noise cancellation and 24-hour case battery.', 'price' => 1999.00, 'sku' => 'SKU-BE005', 'status' => 'active'],
            ['supplier_id' => 2, 'name' => 'Portable Charger 20000mAh', 'description' => 'High-capacity power bank with dual USB-A and USB-C fast charging.', 'price' => 1499.00, 'sku' => 'SKU-PC006', 'status' => 'active'],
            ['supplier_id' => 2, 'name' => 'Smart Watch Fitness Band', 'description' => 'Fitness tracker with heart rate monitor, sleep tracking, and 7-day battery.', 'price' => 3499.00, 'sku' => 'SKU-SW007', 'status' => 'active'],
            ['supplier_id' => 2, 'name' => 'Ring Light 10"', 'description' => 'Dimmable LED ring light with phone holder for streaming and content creation.', 'price' => 799.00, 'sku' => 'SKU-RL008', 'status' => 'inactive'],

            // OfficeDepot PH (supplier_id: 3)
            ['supplier_id' => 3, 'name' => 'Executive Office Chair', 'description' => 'Ergonomic mesh office chair with lumbar support and adjustable armrests.', 'price' => 6499.00, 'sku' => 'SKU-OC009', 'status' => 'active'],
            ['supplier_id' => 3, 'name' => 'A4 Paper Ream 500 sheets', 'description' => 'High-quality 80gsm bond paper, compatible with all inkjet and laser printers.', 'price' => 249.00, 'sku' => 'SKU-AP010', 'status' => 'active'],
            ['supplier_id' => 3, 'name' => 'Whiteboard 4x3 ft', 'description' => 'Magnetic dry-erase whiteboard with aluminum frame and marker tray.', 'price' => 1899.00, 'sku' => 'SKU-WB011', 'status' => 'active'],
            ['supplier_id' => 3, 'name' => 'Shredder Machine', 'description' => 'Cross-cut paper shredder, 8-sheet capacity with auto-reverse jam protection.', 'price' => 3299.00, 'sku' => 'SKU-SM012', 'status' => 'active'],

            // HomeGoods Express (supplier_id: 4)
            ['supplier_id' => 4, 'name' => 'Air Purifier HEPA', 'description' => 'True HEPA air purifier covering up to 30sqm, with PM2.5 display.', 'price' => 5499.00, 'sku' => 'SKU-AP013', 'status' => 'active'],
            ['supplier_id' => 4, 'name' => 'Electric Kettle 1.7L', 'description' => 'Stainless steel electric kettle with auto shut-off and boil-dry protection.', 'price' => 699.00, 'sku' => 'SKU-EK014', 'status' => 'active'],
            ['supplier_id' => 4, 'name' => 'Standing Desk Converter', 'description' => 'Sit-stand desk riser with adjustable height and wide platform for dual monitors.', 'price' => 4199.00, 'sku' => 'SKU-SD015', 'status' => 'active'],

            // UniParts Corp (supplier_id: 5)
            ['supplier_id' => 5, 'name' => 'HDMI Cable 2m', 'description' => 'High-speed HDMI 2.0 cable supporting 4K 60Hz and HDR.', 'price' => 299.00, 'sku' => 'SKU-HC016', 'status' => 'active'],
            ['supplier_id' => 5, 'name' => 'Cat6 Ethernet Cable 5m', 'description' => 'Shielded Cat6 LAN cable for high-speed gigabit network connections.', 'price' => 199.00, 'sku' => 'SKU-EC017', 'status' => 'active'],
            ['supplier_id' => 5, 'name' => 'Thermal Paste 5g', 'description' => 'High-performance CPU thermal compound for improved heat dissipation.', 'price' => 149.00, 'sku' => 'SKU-TP018', 'status' => 'inactive'],
            ['supplier_id' => 5, 'name' => 'Cable Management Box', 'description' => 'Wooden cable organizer box to hide power strips and messy cables.', 'price' => 549.00, 'sku' => 'SKU-CM019', 'status' => 'active'],
            ['supplier_id' => 5, 'name' => 'Anti-Static Wrist Strap', 'description' => 'ESD wrist strap with grounding cord for safe PC building and repairs.', 'price' => 99.00, 'sku' => 'SKU-AW020', 'status' => 'active'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
