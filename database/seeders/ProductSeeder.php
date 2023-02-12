<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\ExternalData;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $response = Http::asForm()->post('https://accounts.zoho.com/oauth/v2/token', [
        //     'refresh_token' => env('ZOHO_REFRESH_TOKEN'),
        //     'client_id' => env('ZOHO_CLIENT_ID'),
        //     'client_secret' => env('ZOHO_CLIENT_SECRET'),
        //     'redirect_url' => env('APP_URL'),
        //     'grant_type' => 'refresh_token'
        // ]);

        // $result = json_decode($response);

        // if (isset($result->access_token)) {
        //     $token = $result->access_token;
        // }

        $gateZenNaturalProducts = [
            // CBD Oil
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'Black Label CBD Extra Virgin Organic Olive Oil 30%',
                'description' => 'Cannabidiol Black Label CBD Oil 30% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '250',
                'retail_price' => '240',
                'wholesale_price' => '245',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'Health', 'Best Seller'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Broad Spectrum 10%',
                'description' => 'Cannabidiol CBD Oil 10% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '60',
                'retail_price' => '50',
                'wholesale_price' => '55',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'THC FREE', 'Sleep'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Broad Spectrum 15%',
                'description' => 'Cannabidiol CBD Oil 15% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '85',
                'retail_price' => '80',
                'wholesale_price' => '75',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Broad Spectrum 20%',
                'description' => 'Cannabidiol CBD Oil 20% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '105',
                'retail_price' => '95',
                'wholesale_price' => '100',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'THC FREE', 'Relief'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Broad Spectrum 25%',
                'description' => 'Cannabidiol CBD Oil 25% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

How to use: Depends on the needs of each organization and our company proposes the guidance of each consumer by a specialized partner us or the doctor who has undertaken his medical supervision.

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '125',
                'retail_price' => '115',
                'wholesale_price' => '120',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Broad Spectrum 3%',
                'description' => 'Cannabidiol CBD Oil 3% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

How to use: Depends on the needs of each organization and our company proposes the guidance of each consumer by a specialized partner us or the doctor who has undertaken his medical supervision.

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '30',
                'retail_price' => '20',
                'wholesale_price' => '25',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Broad Spectrum 30%',
                'description' => 'Cannabidiol CBD Oil 30% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '155',
                'retail_price' => '150',
                'wholesale_price' => '145',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Broad Spectrum 40%',
                'description' => 'Cannabidiol CBD Oil 40% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '185',
                'retail_price' => '180',
                'wholesale_price' => '175',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'THC FREE', 'Health'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Broad Spectrum 5%',
                'description' => 'Cannabidiol CBD Oil 5% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

How to use: Depends on the needs of each organization and our company proposes the guidance of each consumer by a specialized partner us or the doctor who has undertaken his medical supervision.

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '40',
                'retail_price' => '30',
                'wholesale_price' => '35',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Broad Spectrum 50%',
                'description' => 'Cannabidiol CBD Oil 50% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

How to use: Depends on the needs of each organization and our company proposes the guidance of each consumer by a specialized partner us or the doctor who has undertaken his medical supervision.

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '225',
                'retail_price' => '215',
                'wholesale_price' => '220',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Full Spectrum 10%',
                'description' => 'Cannabidiol CBD Oil 10% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

How to use: Depends on the needs of each organization and our company proposes the guidance of each consumer by a specialized partner us or the doctor who has undertaken his medical supervision.

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '60',
                'retail_price' => '50',
                'wholesale_price' => '55',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'Relief', 'Focus'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Full Spectrum 15%',
                'description' => 'Cannabidiol CBD Oil 15% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

How to use: Depends on the needs of each organization and our company proposes the guidance of each consumer by a specialized partner us or the doctor who has undertaken his medical supervision.

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '80',
                'retail_price' => '70',
                'wholesale_price' => '75',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'Relief'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Full Spectrum 20%',
                'description' => 'Cannabidiol CBD Oil 20% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '100',
                'retail_price' => '90',
                'wholesale_price' => '95',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'Health'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Full Spectrum 25%',
                'description' => 'Cannabidiol CBD Oil 25% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '120',
                'retail_price' => '110',
                'wholesale_price' => '115',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'Relaxation', 'Sleep'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Full Spectrum 3%',
                'description' => 'Cannabidiol CBD Oil 3% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '30',
                'retail_price' => '20',
                'wholesale_price' => '25',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'Relaxation', 'Sleep'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Full Spectrum 30%',
                'description' => 'Cannabidiol CBD Oil 30% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '140',
                'retail_price' => '135',
                'wholesale_price' => '130',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'Health'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Full Spectrum 40%',
                'description' => 'Cannabidiol CBD Oil 40% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '180',
                'retail_price' => '170',
                'wholesale_price' => '175',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Full Spectrum 5%',
                'description' => 'Cannabidiol CBD Oil 5% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '40',
                'retail_price' => '30',
                'wholesale_price' => '35',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'Relaxation', 'Sleep'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil Full Spectrum 50%',
                'description' => 'Cannabidiol CBD Oil 50% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '200',
                'retail_price' => '190',
                'wholesale_price' => '195',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Starter Set',
                'description' => 'Save €24.00

This set includes:

• CBD Oil Full Spectrum 5%
• CBG Oil Full Spectrum 5%
• CBD Analgesic Cream 620mg

This products does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '105',
                'retail_price' => '100',
                'wholesale_price' => '95',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD OIL', 'BUNDLE & SAVE'),
            ],
            // CBG Oil
            [
                'store_category_id' => 10,  // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Broad Spectrum 10%',
                'description' => 'Cannabigerol CBG Oil 10% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '70',
                'retail_price' => '60',
                'wholesale_price' => '75',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'THC FREE', 'Focus'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Broad Spectrum 15%',
                'description' => 'Cannabigerol CBG Oil 15% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '90',
                'retail_price' => '80',
                'wholesale_price' => '85',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'THC FREE', 'Relief'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Broad Spectrum 20%',
                'description' => 'Cannabigerol CBG Oil 20% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '115',
                'retail_price' => '105',
                'wholesale_price' => '110',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'THC FREE', 'Health'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Broad Spectrum 25%',
                'description' => 'Cannabigerol CBG Oil 25% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '140',
                'retail_price' => '130',
                'wholesale_price' => '135',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Broad Spectrum 30%',
                'description' => 'Cannabigerol CBG Oil 30% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '170',
                'retail_price' => '160',
                'wholesale_price' => '165',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Broad Spectrum 40%',
                'description' => 'Cannabigerol CBG Oil 40% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '210',
                'retail_price' => '200',
                'wholesale_price' => '205',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Broad Spectrum 5%',
                'description' => 'Cannabigerol CBG Oil 5% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '45',
                'retail_price' => '35',
                'wholesale_price' => '40',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'THC FREE', 'Relaxation'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Broad Spectrum 50%',
                'description' => 'Cannabigerol CBG Oil 50% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '240',
                'retail_price' => '230',
                'wholesale_price' => '235',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Full Spectrum 10%',
                'description' => 'Cannabigerol CBG Oil 10% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '60',
                'retail_price' => '50',
                'wholesale_price' => '55',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'Relief'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Full Spectrum 15%',
                'description' => 'Cannabigerol CBG Oil 15% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '85',
                'retail_price' => '75',
                'wholesale_price' => '80',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'Focus'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Full Spectrum 20%',
                'description' => 'Cannabigerol CBG Oil 20% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '105',
                'retail_price' => '95',
                'wholesale_price' => '100',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Full Spectrum 25%',
                'description' => 'Cannabigerol CBG Oil 25% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '125',
                'retail_price' => '115',
                'wholesale_price' => '120',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Full Spectrum 30%',
                'description' => 'Cannabigerol CBG Oil 30% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '150',
                'retail_price' => '140',
                'wholesale_price' => '145',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Full Spectrum 40%',
                'description' => 'Cannabigerol CBG Oil 40% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '180',
                'retail_price' => '170',
                'wholesale_price' => '175',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Full Spectrum 5%',
                'description' => 'Cannabigerol CBG Oil 5% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '40',
                'retail_price' => '30',
                'wholesale_price' => '35',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL', 'Focus'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBG Oil Full Spectrum 50%',
                'description' => 'Cannabigerol CBG Oil 50% with dropper

• Hemp oil is safe for external use and oral care
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '220',
                'retail_price' => '210',
                'wholesale_price' => '215',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBG OIL'),
            ],
            // Magic Pair
            [
                'store_category_id' => 10,  // 1
                'vat_id' => 1,
                'name' => 'CBD+CBG Oil Broad Spectrum 10%',
                'description' => 'Cannabidiol + Cannabigerol CBD+CBG drops 10% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, and muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute medicinal product and are not substitutable any medication.',
                'price' => '65',
                'retail_price' => '55',
                'wholesale_price' => '60',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('MAGIC PAIR'),
            ],
            [
                'store_category_id' => 10,  // 1
                'vat_id' => 1,
                'name' => 'CBD+CBG Oil Broad Spectrum 20%',
                'description' => 'Cannabidiol + Cannabigerol CBD+CBG drops 20% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, and muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute medicinal product and are not substitutable any medication.',
                'price' => '115',
                'retail_price' => '105',
                'wholesale_price' => '110',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('MAGIC PAIR', 'Best Seller'),
            ],
            [
                'store_category_id' => 10,  // 1
                'vat_id' => 1,
                'name' => 'CBD+CBG Oil Broad Spectrum 30%',
                'description' => 'Cannabidiol + Cannabigerol CBD+CBG drops 30% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, and muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute medicinal product and are not substitutable any medication.',
                'price' => '160',
                'retail_price' => '150',
                'wholesale_price' => '155',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('MAGIC PAIR'),
            ],
            [
                'store_category_id' => 10,  // 1
                'vat_id' => 1,
                'name' => 'CBD+CBG Oil Full Spectrum 10%',
                'description' => 'Cannabidiol + Cannabigerol CBD+CBG drops 10% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, and muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute medicinal product and are not substitutable any medication.',
                'price' => '60',
                'retail_price' => '50',
                'wholesale_price' => '55',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('MAGIC PAIR', 'Health'),
            ],
            [
                'store_category_id' => 10,  // 1
                'vat_id' => 1,
                'name' => 'CBD+CBG Oil Full Spectrum 20%',
                'description' => 'Cannabidiol + Cannabigerol CBD+CBG drops 20% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, and muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute medicinal product and are not substitutable any medication.',
                'price' => '105',
                'retail_price' => '95',
                'wholesale_price' => '100',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('MAGIC PAIR', 'Health', 'Best Seller'),
            ],
            [
                'store_category_id' => 10,  // 1
                'vat_id' => 1,
                'name' => 'CBD+CBG Oil Full Spectrum 30%',
                'description' => 'Cannabidiol + Cannabigerol CBD+CBG drops 30% with dropper

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, and muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute medicinal product and are not substitutable any medication.',
                'price' => '140',
                'retail_price' => '130',
                'wholesale_price' => '135',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('MAGIC PAIR', 'Health'),
            ],
            // CBD for Pets
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD+CBG Pet Oil Broad Spectrum 3%',
                'description' => 'Cannabidiol + cannabigerol CBD + CBG Oil 3% for pets with dropper.

• Hemp oil is safe for external use and oral care
• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, and muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Distinguished for its analgesic action
• It has anti-inflammatory properties
• Helps improve brain health
• It has antibacterial properties
• Improves eye health
• Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties
• Microbiologically tested

This product does not constitute medicinal product and are not substitutable any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD FOR PETS', 'THC FREE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Oil For Pets Broad Spectrum 3%',
                'description' => 'Cannabidiol CBD Oil 3% for pets with dropper
Hemp oil CBD for Pets is a safe product for pets from organic Cannabis Sativa crops.

• It can treat pain, especially neuropathic pain, as well as help control seizures
• Contribute to reducing stress, especially in cases such as separation anxiety or phobias arising from various noises (eg thunderstorms or fireworks)
• Thanks to its anti-inflammatory and analgesic properties it gives a pet suffering from arthritis better quality of life
• The hemp seed oil is one of the key ingredients in CBD oil for PETS and is packed with nutritious properties that enhance pet health
• Among the many benefits of olive oil, which is a key component of CBD oil for PETS, is the fact that it is rich in phytonutrients as well as vitamin E and omega-3 fatty acids thus maintaining the skin of pets hydrated and their hair shiny
• The ideal product for preventive treatment. Helps maintain good physical condition and strengthen the immune system
• Microbiologically tested

This product does not constitute medicinal product and are not substitutable any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD FOR PETS', 'THC FREE'),
            ],
            // CBD Vapes
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Vape Kush 10% (5ml)',
                'description' => 'CBD Vape 10% OG Kush with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Focus'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Vape Kush 10% (10ml)',
                'description' => 'CBD Vape 10% OG Kush with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '55',
                'retail_price' => '45',
                'wholesale_price' => '50',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Focus'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Vape Kush 5% (5ml)',
                'description' => 'CBD Vape 5% OG Kush with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '55',
                'retail_price' => '45',
                'wholesale_price' => '50',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Relaxation'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Vape Kush 5% (10ml)',
                'description' => 'CBD Vape 5% OG Kush with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Relaxation'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Vape Lemon Haze 10% (5ml)',
                'description' => 'CBD Vape 10% Lemon Haze with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Focus'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Vape Lemon Haze 10% (10ml)',
                'description' => 'CBD Vape 10% Lemon Haze with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '55',
                'retail_price' => '45',
                'wholesale_price' => '40',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Focus'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Vape Lemon Haze 5% (5ml)',
                'description' => 'CBD Vape 5% Lemon Haze with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '20',
                'retail_price' => '10',
                'wholesale_price' => '15',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Relaxation'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Vape Lemon Haze 5% (10ml)',
                'description' => 'CBD Vape 5% Lemon Haze with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Relaxation'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Vape Strawberry 10% (5ml)',
                'description' => 'CBD Vape 10% Strawberry with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Focus'),
            ],
            [
                'store_category_id' => 10,
                'vat_id' => 1,
                'name' => 'CBD Vape Strawberry 10% (10ml)',
                'description' => 'CBD Vape 10% Strawberry with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '55',
                'retail_price' => '45',
                'wholesale_price' => '50',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Focus'),
            ],
            [
                'store_category_id' => 10,
                'vat_id' => 1,
                'name' => 'CBD Vape Strawberry 5% (5ml)', // 1
                'description' => 'CBD Vape 5% Strawberry with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

Benefits of Cannabidiol CBD

• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• Ideal for preventive treatment. Helps maintain good physical condition and strengthen the immune system

This product is not a medicinal product and does not replace any medication.',
                'price' => '20',
                'retail_price' => '10',
                'wholesale_price' => '15',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Relaxation'),
            ],
            [
                'store_category_id' => 10,
                'vat_id' => 1,
                'name' => 'CBD Vape Strawberry 5% (10ml)',
                'description' => 'CBD Vape 5% Strawberry with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

Benefits of Cannabidiol CBD

• Helps in the proper functioning of the body (homeostasis) and in inflammatory skin diseases such as psoriasis, eczema, acne, itchy rashes, and dermatitis. Used for neuropathic pain, arthritis, muscle injuries
• It has analgesic, anxiolytic and antioxidant properties. Suitable for headaches, migraines, insomnia, and anxiety disorders
• Recommended as adjunctive therapy for mild forms of epilepsy, idiopathic tremor, Parkinson’s disease, and autoimmune diseases
• Ideal for preventive treatment. Helps maintain good physical condition and strengthen the immune system

This product is not a medicinal product and does not replace any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Relaxation'),
            ],
            [
                'store_category_id' => 10,
                'vat_id' => 1,
                'name' => 'CBD Vape Watermelon 10% (5ml)', // 1
                'description' => 'CBD Vape 10% Strawberry with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Focus'),
            ],
            [
                'store_category_id' => 10,
                'vat_id' => 1,
                'name' => 'CBD Vape Watermelon 10% (10ml)',
                'description' => 'CBD Vape 10% Strawberry with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '55',
                'retail_price' => '45',
                'wholesale_price' => '50',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Focus'),
            ],
            [
                'store_category_id' => 10,
                'vat_id' => 1,
                'name' => 'CBD Vape Watermelon 5% (5ml)', // 1
                'description' => 'CBD Vape 5% Watermelon with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '20',
                'retail_price' => '10',
                'wholesale_price' => '15',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Relaxation'),
            ],
            [
                'store_category_id' => 10,
                'vat_id' => 1,
                'name' => 'CBD Vape Watermelon 5% (10ml)', // 1
                'description' => 'CBD Vape 5% Watermelon with natural terpenes

• CBD E-Liquid with natural terpenes
• The intensive perfumes, reminiscent of lavender and pine, come from natural terpenes bearing the cannabis plant and contained in the liquid, and mainly terpenes Linalool and Pienio
• PG / VG: 90/10 for the best experience
• Certified CBD concentration
• Nicotine free
• THC free

This product is not a medicinal product and does not replace any medication.',
                'price' => '35',
                'retail_price' => '25',
                'wholesale_price' => '30',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD VAPES', 'Relaxation'),
            ],
            // CBD Tea
            //             [
            //                 'store_category_id' => 10,
            //                 'vat_id' => 1,
            //                 'name' => 'CBD Premium Tea 5%',
            //                 'description' => 'This product consists of industrial hemp flowers collected and crushed by hand. Contains terpenes, cannabinoids, cannabigerol CBG and vegetable protein.

            // Its consumption offers many benefits to the body:
            // • Distinguished for its analgesic action
            // • It has anti-inflammatory properties
            // • Helps improve brain health
            // • It has antibacterial properties
            // • Improves eye health
            // • Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties

            // This product does not constitute a medicinal product and is not substitutable for any medication.',
            //                 'price' => '12',
            //                 'retail_price' => '8',
            //                 'wholesale_price' => '10',
            //                 'reorder_level' => '100',
            //                 'status' => 'active',
            //                 'product_category' => array('CBD TEA'),
            //             ],
            //             [
            //                 'store_category_id' => 10,
            //                 'vat_id' => 1,
            //                 'name' => 'CBD Premium Tea 6%',
            //                 'description' => 'This product consists of industrial hemp flowers collected and crushed by hand. Contains terpenes, cannabinoids, cannabigerol CBG and vegetable protein.

            // Its consumption offers many benefits to the body:
            // • Distinguished for its analgesic action
            // • It has anti-inflammatory properties
            // • Helps improve brain health
            // • It has antibacterial properties
            // • Improves eye health
            // • Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties

            // This product does not constitute a medicinal product and is not substitutable for any medication.',
            //                 'price' => '12',
            //                 'retail_price' => '8',
            //                 'wholesale_price' => '10',
            //                 'reorder_level' => '100',
            //                 'status' => 'active',
            //                 'product_category' => array('CBD TEA'),
            //             ],
            //             [
            //                 'store_category_id' => 10,
            //                 'vat_id' => 1,
            //                 'name' => 'CBD Premium Tea 7%',
            //                 'description' => 'This product consists of industrial hemp flowers collected and crushed by hand. Contains terpenes, cannabinoids, cannabigerol CBG and vegetable protein.

            // Its consumption offers many benefits to the body:
            // • Distinguished for its analgesic action
            // • It has anti-inflammatory properties
            // • Helps improve brain health
            // • It has antibacterial properties
            // • Improves eye health
            // • Research, which is ongoing, is constantly enhancing the existence of its anti-cancer properties

            // This product does not constitute a medicinal product and is not substitutable for any medication.',
            //                 'price' => '14',
            //                 'retail_price' => '10',
            //                 'wholesale_price' => '12',
            //                 'reorder_level' => '100',
            //                 'status' => 'active',
            //                 'product_category' => array('CBD TEA'),
            //             ],
            // CBD Cream
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Analgesic Cream 620mg',
                'description' => 'EPIDERMIS Skin Care Cannabis Cream

• Suitable as a moisturizing cream with deep nourishment
• Unique formulation with powerful CBD and beneficial terpenes
• Soothing for all skin types prone to skin problems
• 620mg of CBD

How to use: Apply a small amount of the cream to the area and massage lightly 2-3 times a day.',
                'price' => '12',
                'retail_price' => '8',
                'wholesale_price' => '10',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD CREAM'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Skin Care Cream 620mg',
                'description' => 'EPIDERMIS Skin Care Cannabis Cream

• Suitable as a moisturizing cream with deep nourishment
• Unique formulation with powerful CBD and beneficial terpenes
• Soothing for all skin types prone to skin problems
• 620mg of CBD

How to use: Apply a small amount of the cream to the area and massage lightly 2-3 times a day.',
                'price' => '12',
                'retail_price' => '8',
                'wholesale_price' => '10',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('CBD CREAM'),
            ],
            // Bundle & Save
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Casual Set',
                'description' => 'Save €20.00

This set includes:

• CBD+CBG Oil Full Spectrum 10%
• CBD Oil Broad Spectrum 15%

This products does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '125',
                'retail_price' => '120',
                'wholesale_price' => '115',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('BUNDLE & SAVE', 'New Arrival'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Expert Set',
                'description' => 'Save €75.00

This set includes:

• CBD+CBG Oil Full Spectrum 20%
• CBG Oil Full Spectrum 30%
• CBD Oil Full Spectrum 30%

This products does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '320',
                'retail_price' => '200',
                'wholesale_price' => '300',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('BUNDLE & SAVE', 'New Arrival'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Relaxation Set',
                'description' => 'Save €35.00

This set includes:

• CBD Oil Full Spectrum 10%
• CBG Oil Full Spectrum 10%
• CBD+CBG Oil Broad Spectrum 10%

This products does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '150',
                'retail_price' => '130',
                'wholesale_price' => '140',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('BUNDLE & SAVE', 'New Arrival'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD SkinCare Set',
                'description' => 'Save €44.00

This set includes:

• CBD Skin Care Cream 620mg
• CBD+CBG Oil Broad Spectrum 10%
• CBD+CBG Oil Broad Spectrum 20%

This products does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '185',
                'retail_price' => '150',
                'wholesale_price' => '160',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('BUNDLE & SAVE', 'New Arrival'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Sports Set',
                'description' => 'Save €59.00

This set includes:

• CBD Analgesic Cream 620mg
• CBD Oil Full Spectrum 50%
• CBG Oil Full Spectrum 25%

This products does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '235',
                'retail_price' => '200',
                'wholesale_price' => '220',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('BUNDLE & SAVE'),
            ],
            [
                'store_category_id' => 10, // 1
                'vat_id' => 1,
                'name' => 'CBD Wellness Set',
                'description' => 'Save €59.00

This set includes:

• CBD Premium Tea 5%
• CBD Oil Broad Spectrum 10%
• CBD+CBG Oil Full Spectrum 10%

This products does not constitute a medicinal product and is not substitutable for any medication.',
                'price' => '105',
                'retail_price' => '60',
                'wholesale_price' => '90',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('BUNDLE & SAVE'),
            ],
        ];

        foreach ($gateZenNaturalProducts as $gateZenNaturalProduct) {
            $product = Product::create([
                'store_category_id' => $gateZenNaturalProduct['store_category_id'],
                'vat_id' => $gateZenNaturalProduct['vat_id'],
                'name' => $gateZenNaturalProduct['name'],
                'description' => $gateZenNaturalProduct['description'],
                'price' => $gateZenNaturalProduct['price'],
                'retail_price' => $gateZenNaturalProduct['retail_price'],
                'wholesale_price' => $gateZenNaturalProduct['wholesale_price'],
                'reorder_level' => $gateZenNaturalProduct['reorder_level'],
                'status' => $gateZenNaturalProduct['status'],
                'release_date' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);

            // try {
            //     $result = Http::withHeaders([
            //         'Content-Type' => 'application/json;charset=UTF-8',
            //         'Authorization' => 'Zoho-oauthtoken ' . $token
            //     ])->post('https://inventory.zoho.com/api/v1/items?organization_id=' . env('ZOHO_ORGANIZATION_ID'), [
            //         'name' => $product->name,
            //         'rate' => $product->price,
            //         'description' => $product->description
            //     ]);

            //     $data = json_decode($result, true);

            //     ExternalData::create([
            //         'external_id' => $data['item']['item_id'],
            //         'data' => json_encode($data),
            //         'external_data_type_id' => 1, // Zoho Inventory
            //         'externable_type' => 'App\Models\Product',
            //         'externable_id' => $product->id,
            //         'created_at' => Carbon::now()
            //     ]);
            // } catch (\Throwable $th) {
            //     //throw $th;
            // }

            $gateZenNaturalProductCategories = $gateZenNaturalProduct['product_category'];
            foreach ($gateZenNaturalProductCategories as $gateZenNaturalProductCategory) {
                $productCategory = ProductCategory::where('name', $gateZenNaturalProductCategory)->first();

                CategoryProduct::create([
                    'product_id' => $product->id,
                    'product_category_id' => $productCategory->id,
                ]);
            }
        }

        $saintRochersProducts = [
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Adam Traveller Sunglasses Shiny Gold/Brown Gradiant',
                'description' => 'The Adam Traveller model from Saint Rochés is a legendary retro style inspired from the 1960s. The model is a popular unisex style with its soft rounded lens shape and metal frame. The model is made in high quality an comfort and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 53 22-140
                • Lens: Brown Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-101013',
                'price' => '176.00',
                'retail_price' => '176.00',
                'wholesale_price' => '176.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Adam Traveller Sunglasses Shiny Silver/Smoke Gradiant',
                'description' => 'The Adam Traveller model from Saint Rochés is a legendary retro style inspired from the 1960s. The model is a popular unisex style with its soft rounded lens shape and metal frame. The model is made in high quality an comfort and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Silver
                • Size: 53 22-140
                • Lens: Smoke Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-102092',
                'price' => '176.00',
                'retail_price' => '176.00',
                'wholesale_price' => '176.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Benjamin Inspector Sunglasses Black/Smoke Gradiant',
                'description' => 'The trendy and popular classic vintage style Benjamin Inspector Sunglasses is inspired from the 1950s and fits both men and women. The model is a combination between plastic and metal, and made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Metal
                • Frame color: Black
                • Size: 55 18-146
                • Lens: Smoke Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-808003',
                'price' => '200.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Benjamin Inspector Sunglasses Turtle Brown/Solid Green',
                'description' => 'The trendy and popular classic vintage style Benjamin Inspector Sunglasses is inspired from the 1950s and fits both men and women. The model is a combination between plastic and metal, and made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Metal
                • Frame color: Turtle Brown
                • Size: 55 18-146
                • Lens: Solid Green
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-808113',
                'price' => '200.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Celine Explorer Sunglasses Crystal Brown/Shiny Gold',
                'description' => 'The trendy round sunglasses Celine Explorer Sunglasses from Saint Rochés is a elegant feminine style. The model is a combination between plastic and metal, and made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Metal
                • Frame color: Crystal Brown
                • Size: 55 19-145
                • Lens: Shiny Gold
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-853572',
                'price' => '216.00',
                'retail_price' => '216.00',
                'wholesale_price' => '216.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Charles Pilot Sunglasses Shiny Gold/Brown Gradiant',
                'description' => 'The classic pilot model is one of the most iconic styles in the world. The model fits both men and women and will never go out of style. Saint Rochés classic aviator model Charles Pilot is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 59 14-141
                • Lens: Brown Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-011013',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Charles Pilot Sunglasses Shiny Gold/Light Yellow',
                'description' => 'The classic pilot model is one of the most iconic styles in the world. The model fits both men and women and will never go out of style. Saint Rochés classic aviator model Charles Pilot is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Light Yellow
                • Frame color: Shiny Gold
                • Size: 59 14-141
                • Lens: Light Yellow
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-011143',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Charles Pilot Sunglasses Rose Gold/Rose Gold Gradiant',
                'description' => 'The classic pilot model is one of the most iconic styles in the world. The model fits both men and women and will never go out of style. Saint Rochés classic aviator model Charles Pilot is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Rose Gold
                • Size: 59 14-141
                • Lens: Rose Gold Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-011203',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Charles Pilot Sunglasses Shiny Silver/Heavy Mirror',
                'description' => 'The classic pilot model is one of the most iconic styles in the world. The model fits both men and women and will never go out of style. Saint Rochés classic aviator model Charles Pilot is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Silver
                • Size: 59 14-141
                • Lens: Heavy Mirror
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-012003',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Charles Pilot Sunglasses Shiny Silver/Smoke Gradiant',
                'description' => 'The classic pilot model is one of the most iconic styles in the world. The model fits both men and women and will never go out of style. Saint Rochés classic aviator model Charles Pilot is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Silver
                • Size: 59 14-141
                • Lens: Smoke Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-012073',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Damien Pilot Sunglasses Shiny Gold/Light Brown Gradiant',
                'description' => 'Damien Pilot Sunglasses is Saint Rochés most luxurious and stylish aviator model. The model fits both men and women. The classic pilot model is one of the most iconic styles in the world. The Damien Pilot model are made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 59 14-140
                • Lens: Light Brown Gradiant
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-031003',
                'price' => '200.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Damien Pilot Sunglasses Shiny Gold/Green Gradiant',
                'description' => 'Damien Pilot Sunglasses is Saint Rochés most luxurious and stylish aviator model. The model fits both men and women. The classic pilot model is one of the most iconic styles in the world. The Damien Pilot model are made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 59 14-140
                • Lens: Green Gradiant
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-031153',
                'price' => '200.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Damien Pilot Sunglasses Shiny Silver/Smoke Gradiant',
                'description' => 'Damien Pilot Sunglasses is Saint Rochés most luxurious and stylish aviator model. The model fits both men and women. The classic pilot model is one of the most iconic styles in the world. The Damien Pilot model are made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Silver
                • Size: 59 14-140
                • Lens: Smoke Gradiant
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-032093',
                'price' => '200.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Coline Fashionista Sunglasses Black/Smoke Gradiant',
                'description' => 'The glamourous and fashionable model Coline Fashionista Sunglasses have a soft squared frame with a cateye shape. The classic elegant feminine model is made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Plastic
                • Frame color: Black
                • Size: 54 18-140
                • Lens: Smoke Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-553012',
                'price' => '208.00',
                'retail_price' => '208.00',
                'wholesale_price' => '208.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Coline Fashionista Sunglasses Crystal Brown/Brown Gradiant',
                'description' => 'The glamourous and fashionable model Coline Fashionista Sunglasses have a soft squared frame with a cateye shape. The classic elegant feminine model is made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Plastic
                • Frame color: Crystal Brown
                • Size: 54 18-140
                • Lens: Brown Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-553582',
                'price' => '208.00',
                'retail_price' => '208.00',
                'wholesale_price' => '208.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'David Defender Sunglasses Black/Smoke Gradiant',
                'description' => 'The David Defender Sunglasses is a classic soft rectangular lens style in a masculine look, but cool on women as well. Frame is in plastic and the lenses are similar to Saint Rochés model Gabriel Defender. The David Defender model is made in high quality and comfort and Saint Rochés metal logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Plastic
                • Frame color: Black
                • Size: 59 14-138
                • Lens: Smoke Gradiant
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-213503',
                'price' => '168.00',
                'retail_price' => '168.00',
                'wholesale_price' => '168.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'David Defender Sunglasses Turtle Brown/Brown Gradiant',
                'description' => 'The David Defender Sunglasses is a classic soft rectangular lens style in a masculine look, but cool on women as well. Frame is in plastic and the lenses are similar to Saint Rochés model Gabriel Defender. The David Defender model is made in high quality and comfort and Saint Rochés metal logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Plastic
                • Frame color: Turtle Brown
                • Size: 59 14-138
                • Lens: Brown Gradiant
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-213503',
                'price' => '168.00',
                'retail_price' => '168.00',
                'wholesale_price' => '168.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'David Defender Sunglasses White/Mirror',
                'description' => 'The David Defender Sunglasses is a classic soft rectangular lens style in a masculine look, but cool on women as well. Frame is in plastic and the lenses are similar to Saint Rochés model Gabriel Defender. The David Defender model is made in high quality and comfort and Saint Rochés metal logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Plastic
                • Frame color: White
                • Size: 59 14-138
                • Lens: Mirror
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-214003',
                'price' => '168.00',
                'retail_price' => '168.00',
                'wholesale_price' => '168.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Dorian Explorer Sunglasses Shiny Gold/Solid Green',
                'description' => 'The classic round model with thin metal frame is one of the iconic styles in the world. The model fits both men and women and will never go out of style. Saint Rochés classic round model Dorian Explorer is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 54 18-142
                • Lens: Solid Green
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-811042',
                'price' => '168.00',
                'retail_price' => '168.00',
                'wholesale_price' => '168.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Inspiration', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Dorian Explorer Sunglasses Shiny Gold/Light Yellow',
                'description' => 'The classic round model with thin metal frame is one of the iconic styles in the world. The model fits both men and women and will never go out of style. Saint Rochés classic round model Dorian Explorer is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 54 18-142
                • Lens: Light Yellow
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-811142',
                'price' => '168.00',
                'retail_price' => '168.00',
                'wholesale_price' => '168.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Dorian Explorer Sunglasses Shiny Silver/Smoke Mirror',
                'description' => 'The classic round model with thin metal frame is one of the iconic styles in the world. The model fits both men and women and will never go out of style. Saint Rochés classic round model Dorian Explorer is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Silver
                • Size: 54 18-142
                • Lens: Smoke Mirror
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-812082',
                'price' => '168.00',
                'retail_price' => '168.00',
                'wholesale_price' => '168.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Estelle Explorer Sunglasses Turtle Brown/Shiny Gold',
                'description' => 'The luxurious round sunglasses Estelle Explorer Sunglasses from Saint Rochés is a classic fashionable unisex style. The model is a combination between plastic and metal, and made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Metal
                • Frame color: Turtle Brown
                • Size: 52 22-142
                • Lens: Shiny Gold
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-843532',
                'price' => '208.00',
                'retail_price' => '208.00',
                'wholesale_price' => '208.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Estelle Explorer Sunglasses Crystal Brown/Shiny Gold',
                'description' => 'The luxurious round sunglasses Estelle Explorer Sunglasses from Saint Rochés is a classic fashionable unisex style. The model is a combination between plastic and metal, and made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Metal
                • Frame color: Crystal Brown
                • Size: 52 22-142
                • Lens: Shiny Gold
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-843562',
                'price' => '208.00',
                'retail_price' => '208.00',
                'wholesale_price' => '208.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Gabriel Defender Sunglasses Shiny Gold/Green Gradiant',
                'description' => 'The Gabriel Defender Sunglasses is a classic soft rectangular pilot style in a masculine look, but cool on women as well. The lens are bigger than Saint Rochés classic pilot model Charles Pilot. The Gabriel Defender model is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the metal temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 61 14-139
                • Lens: Green Gradiant
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-201153',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Inspiration'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Gabriel Defender Sunglasses Shiny Silver/Mirror',
                'description' => 'The Gabriel Defender Sunglasses is a classic soft rectangular pilot style in a masculine look, but cool on women as well. The lens are bigger than Saint Rochés classic pilot model Charles Pilot. The Gabriel Defender model is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the metal temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Silver
                • Size: 61 14-139
                • Lens: Mirror
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-202033',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Gabriel Defender Sunglasses Gunmetal/Smoke Gradiant',
                'description' => 'The Gabriel Defender Sunglasses is a classic soft rectangular pilot style in a masculine look, but cool on women as well. The lens are bigger than Saint Rochés classic pilot model Charles Pilot. The Gabriel Defender model is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the metal temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Gunmetal
                • Size: 61 14-139
                • Lens: Smoke Gradiant
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-203313',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Jean Traveller Sunglasses Black/Solid Smoke',
                'description' => 'The Saint Rochés unisex model Jean Traveller is a real icon. The model in plastic frame and soft square lens is a historic model that fits most occasions and looks. The Jean Traveller model is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Plastic
                • Frame color: Black
                • Size: 51 19-146
                • Lens: Solid Smoke
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-533033',
                'price' => '176.00',
                'retail_price' => '176.00',
                'wholesale_price' => '176.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Julie Traveller Sunglasses Shiny Gold/Light Brown Gradiant',
                'description' => 'The Julie Traveller model from Saint Rochés is a super cool feminine small pilot inspired style, with soft round lenses and thin metal frame. The model is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the metal temple.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 51 22-145
                • Lens: Light Brown Gradiant with Heavy White Mirror
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-871122',
                'price' => '208.00',
                'retail_price' => '208.00',
                'wholesale_price' => '208.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Inspiration'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Justine Explorer Sunglasses Shiny Gold/Solid Green',
                'description' => 'Justine Explorer Sunglasses is Saint Rochés more exclusive model of the classic round style. The model fits both men and women. The classic round model is one of the iconic styles in the world. The Justine Explorer model is made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 54 19-140
                • Lens: Solid Green
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-831092',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Justine Explorer Sunglasses Shiny Silver/Smoke Mirror',
                'description' => 'Justine Explorer Sunglasses is Saint Rochés more exclusive model of the classic round style. The model fits both men and women. The classic round model is one of the iconic styles in the world. The Justine Explorer model is made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Silver
                • Size: 54 19-140
                • Lens: Smoke Mirror
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-832082',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Laurie Explorer Sunglasses Shiny Gold/Light Crystal',
                'description' => 'The Laurie Explorer model from Saint Rochés is a modern version of the glamourous and elegant retro style from the 1970s with it´s characteristic oversize round lens without metal frame around the lens. The model is made in high quality and comfort with Saint Rochés logo decoration on the metal temple.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 58 16-142
                • Lens: Light Crystal
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-861122',
                'price' => '200.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Laurie Explorer Sunglasses Shiny Gold/Dark Crystal',
                'description' => 'The Laurie Explorer model from Saint Rochés is a modern version of the glamourous and elegant retro style from the 1970s with it´s characteristic oversize round lens without metal frame around the lens. The model is made in high quality and comfort with Saint Rochés logo decoration on the metal temple.

                Specifications

                • Frame material: Metal
                • Frame color: Shiny Gold
                • Size: 58 16-142
                • Lens: Dark Crystal
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-861132',
                'price' => '200.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Leo Pilot Sunglasses Turtle Brown/Gradiant Brown',
                'description' => 'The stylish single lens model Leo Pilot Sunglasses is Saint Rochés newest aviator style. The popular rimless unisex model makes no difference between women and men, and is a perfect compliment to all clothing styles. The model is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Turtle Brown
                • Size: 144 146
                • Lens: Gradiant Brown
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-308123',
                'price' => '216.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Leo Pilot Sunglasses Light Brown/Gradiant Brown',
                'description' => 'The stylish single lens model Leo Pilot Sunglasses is Saint Rochés newest aviator style. The popular rimless unisex model makes no difference between women and men, and is a perfect compliment to all clothing styles. The model is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Light Brown
                • Size: 144 146
                • Lens: Gradiant Brown
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-308133',
                'price' => '216.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Leo Pilot Sunglasses Black/Smoke Gradiant',
                'description' => 'The stylish single lens model Leo Pilot Sunglasses is Saint Rochés newest aviator style. The popular rimless unisex model makes no difference between women and men, and is a perfect compliment to all clothing styles. The model is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model have several frame and lens colors.

                Specifications

                • Frame material: Metal
                • Frame color: Black
                • Size: 144 146
                • Lens: Smoke Gradiant
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-308143',
                'price' => '216.00',
                'retail_price' => '200.00',
                'wholesale_price' => '200.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Louis Skyfarer Sunglasses Black/Smoke Gradiant',
                'description' => 'Inspired of the iconic plastic frame look, Saint Rochés Sunglass model Louis Skyfarer is designed with large soft rectangular lenses to get a cool and fashionable look, but still keep it classic and timeless. The model is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Pastic
                • Frame color: Black
                • Size: 57 15-142
                • Lens: Smoke Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-503013',
                'price' => '176.00',
                'retail_price' => '176.00',
                'wholesale_price' => '176.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Louis Skyfarer Sunglasses Turtle Brown/Brown Gradiant',
                'description' => 'Inspired of the iconic plastic frame look, Saint Rochés Sunglass model Louis Skyfarer is designed with large soft rectangular lenses to get a cool and fashionable look, but still keep it classic and timeless. The model is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Pastic
                • Frame color: Turtle Brown
                • Size: 57 15-142
                • Lens: Brown Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-503503',
                'price' => '176.00',
                'retail_price' => '176.00',
                'wholesale_price' => '176.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Louis Skyfarer Sunglasses White/Mirror',
                'description' => 'Inspired of the iconic plastic frame look, Saint Rochés Sunglass model Louis Skyfarer is designed with large soft rectangular lenses to get a cool and fashionable look, but still keep it classic and timeless. The model is made in high quality and comfort with Saint Rochés logo decoration on the temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Pastic
                • Frame color: White
                • Size: 57 15-142
                • Lens: Mirror
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-504003',
                'price' => '176.00',
                'retail_price' => '176.00',
                'wholesale_price' => '176.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Marc Ruler Sunglasses Black/Smoke Gradient',
                'description' => 'Marc Ruler Sunglasses is Saint Rochés new everyday classic. The aesthetic is bold and makes a statement. The cat-eyed and sharp lines gives a sophisticated look and feel. The masculine unisex model is made in high quality acetate and comfort with Saint Rochés logo decoration on the temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Acetate
                • Frame color: Black
                • Size: 52 22-142
                • Lens: Smoke Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-563013',
                'price' => '232.00',
                'retail_price' => '232.00',
                'wholesale_price' => '232.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Marc Ruler Sunglasses Turtle Brown/Brown Gradiant',
                'description' => 'Marc Ruler Sunglasses is Saint Rochés new everyday classic. The aesthetic is bold and makes a statement. The cat-eyed and sharp lines gives a sophisticated look and feel. The masculine unisex model is made in high quality acetate and comfort with Saint Rochés logo decoration on the temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Acetate
                • Frame color: Turtle Brown
                • Size: 52 22-142
                • Lens: Brown Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-563603',
                'price' => '232.00',
                'retail_price' => '232.00',
                'wholesale_price' => '232.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Marc Ruler Sunglasses Light Brown/Brown Gradiant',
                'description' => 'Marc Ruler Sunglasses is Saint Rochés new everyday classic. The aesthetic is bold and makes a statement. The cat-eyed and sharp lines gives a sophisticated look and feel. The masculine unisex model is made in high quality acetate and comfort with Saint Rochés logo decoration on the temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Acetate
                • Frame color: Light Brown
                • Size: 52 22-142
                • Lens: Brown Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-563703',
                'price' => '232.00',
                'retail_price' => '232.00',
                'wholesale_price' => '232.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Marion Explorer Sunglasses Turtle Brown/Shiny Gold',
                'description' => 'The fashionable round sunglasses Marion Explorer Sunglasses from Saint Rochés is a modern elegant feminine style. The model is a combination between plastic and metal, and made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Metal
                • Frame color: Turtle Brown
                • Size: 51 21-140
                • Lens: Shiny Gold
                • Rx-able: No
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-823552',
                'price' => '192.00',
                'retail_price' => '192.00',
                'wholesale_price' => '192.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Martin Pilot Sunglasses Black/Smoke Gradiant',
                'description' => 'The Saint Rochés´s unisex aviator model Martin Pilot Sunglasses in plastic style is a timeless classic. The model is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Plastic
                • Frame color: Black
                • Size: 57 15-136
                • Lens: Smoke Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-523013',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Martin Pilot Sunglasses Turtle Brown/Brown Gradiant',
                'description' => 'The Saint Rochés´s unisex aviator model Martin Pilot Sunglasses in plastic style is a timeless classic. The model is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Plastic
                • Frame color: Turtle Brown
                • Size: 57 15-136
                • Lens: Brown Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-523503',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Martin Pilot Sunglasses White/Mirror',
                'description' => 'The Saint Rochés´s unisex aviator model Martin Pilot Sunglasses in plastic style is a timeless classic. The model is made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple. The model has several frame and lens colors.

                Specifications

                • Frame material: Plastic
                • Frame color: White
                • Size: 57 15-136
                • Lens: Mirror
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-524003',
                'price' => '184.00',
                'retail_price' => '184.00',
                'wholesale_price' => '184.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Nathan Pilot Sunglasses',
                'description' => 'Nathan Pilot Sunglasses is Saint Rochés most trendy and fashionable aviator style. The popular unisex model is a combination between plastic and metal, and made in high quality and comfort with double bridge and Saint Rochés logo decoration on the temple.

                SR-053593',
                'price' => '224.00',
                'retail_price' => '224.00',
                'wholesale_price' => '224.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Sarah Traveller Sunglasses Turtle Brown/Shiny Gold',
                'description' => 'The Sarah Traveller sunglasses from Saint Rochés is a classic elegant feminine retro style with soft round shape. The model is a combination between plastic and metal, and made in high quality and comfort with Saint Rochés logo decoration on the temple.

                SR-543532',
                'price' => '208.00',
                'retail_price' => '208.00',
                'wholesale_price' => '208.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Sarah Traveller Sunglasses Crystal Brown/Shiny Gold',
                'description' => 'The Sarah Traveller sunglasses from Saint Rochés is a classic elegant feminine retro style with soft round shape. The model is a combination between plastic and metal, and made in high quality and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Metal
                • Frame color: Crystal Brown
                • Size: 53 19-145
                • Lens: Shiny Gold
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: UV400

                SR-543542',
                'price' => '208.00',
                'retail_price' => '208.00',
                'wholesale_price' => '208.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Spring Collection'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Zoe Fashionista Sunglasses Black/Solid Smoke',
                'description' => 'The trendy round graphic model Zoe Fashionista Sunglasses from Saint Rochés is a modern elegant feminine style. The iconic pop stars inspired style is made in high quality acetate and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Acetate
                • Frame color: Black
                • Size: 50 24-145
                • Lens: Solid Smoke
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: 573032

                SR-543542',
                'price' => '224.00',
                'retail_price' => '224.00',
                'wholesale_price' => '224.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
            [
                'store_category_id' => 4,
                'vat_id' => 1,
                'name' => 'Zoe Fashionista Sunglasses Turtle Brown/Smoke Gradiant',
                'description' => 'The trendy round graphic model Zoe Fashionista Sunglasses from Saint Rochés is a modern elegant feminine style. The iconic pop stars inspired style is made in high quality acetate and comfort with Saint Rochés logo decoration on the temple.

                Specifications

                • Frame material: Acetate
                • Frame color: Turtle Brown
                • Size: 50 24-145
                • Lens: Smoke Gradiant
                • Rx-able: Yes. These glasses frame can be fitted with prescription lenses by an optician
                • Included: All sunglasses are delivered with a hard case and cleaning cloth
                • Protection: 573032

                SR-573602',
                'price' => '224.00',
                'retail_price' => '224.00',
                'wholesale_price' => '224.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array('Women', 'Men', 'Spring Collection', 'Best Seller'),
            ],
        ];

        foreach ($saintRochersProducts as $saintRochersProduct) {
            $product = Product::create([
                'store_category_id' => $saintRochersProduct['store_category_id'],
                'vat_id' => $saintRochersProduct['vat_id'],
                'name' => $saintRochersProduct['name'],
                'description' => $saintRochersProduct['description'],
                'price' => $saintRochersProduct['price'],
                'retail_price' => $saintRochersProduct['retail_price'],
                'wholesale_price' => $saintRochersProduct['wholesale_price'],
                'reorder_level' => $saintRochersProduct['reorder_level'],
                'status' => $saintRochersProduct['status'],
                'release_date' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);

            // try {
            //     $result = Http::withHeaders([
            //         'Content-Type' => 'application/json;charset=UTF-8',
            //         'Authorization' => 'Zoho-oauthtoken ' . $token
            //     ])->post('https://inventory.zoho.com/api/v1/items?organization_id=' . env('ZOHO_ORGANIZATION_ID'), [
            //         'name' => $product->name,
            //         'rate' => $product->price,
            //         'description' => $product->description
            //     ]);

            //     $data = json_decode($result, true);

            //     ExternalData::create([
            //         'external_id' => $data['item']['item_id'],
            //         'data' => json_encode($data),
            //         'external_data_type_id' => 1, // Zoho Inventory
            //         'externable_type' => 'App\Models\Product',
            //         'externable_id' => $product->id,
            //         'created_at' => Carbon::now()
            //     ]);
            // } catch (\Throwable $th) {
            //     //throw $th;
            // }

            $saintRochersProductCategories = $saintRochersProduct['product_category'];
            foreach ($saintRochersProductCategories as $saintRochersProductCategory) {
                $productCategory = ProductCategory::where('name', $saintRochersProductCategory)->first();

                CategoryProduct::create([
                    'product_id' => $product->id,
                    'product_category_id' => $productCategory->id,
                ]);
            }
        }

        $haugerProducts = [
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Excellence V Master Automatic 44mm Gold Stainless Steel / Black',
                'description' => 'With the combination of clean classic design and robust 44mm gold plated steel case, the Hauger Excellence V Master is a tribute to all heroes of the world´s history. The wristwatch is masculine and modern, but still with an elegant silhouette, which makes it to the perfect wristwatch for all men that want to stand out from the average. This Excellence V Master model have a limited annual production volume of 300 pieces

                HAUGER-EVM447118',
                'price' => '1192.00',
                'retail_price' => '1192.00',
                'wholesale_price' => '1192.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Excellence V Master Automatic 44mm Silver Stainless Steel / Black',
                'description' => 'With the combination of clean classic design and robust 44mm steel case, the Hauger Excellence V Master is a tribute to all heroes of the world´s history. The wristwatch is masculine and modern, but still with an elegant silhouette, which makes it to the perfect wristwatch for all men that want to stand out from the average. This Excellence V Master model have a limited annual production volume of 300 pieces.

                HAUGER-EVM442118',
                'price' => '1192.00',
                'retail_price' => '1192.00',
                'wholesale_price' => '1192.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Golden Valor Chronograph 42mm Gold Stainless Steel / Black',
                'description' => 'Masculine and classic is the perfect description of the Hauger Golden Valor Chronograph wristwatch. With its 42mm gold plated steel case and steel strap it is the ideal wristwatch for all gentlemen and connoisseurs of beautiful chronograph timepieces. This Golden Valor Chronograph wristwatch have a limited annual production volume of 100 pieces.

                HAUGER-GV427118',
                'price' => '1752.00',
                'retail_price' => '1752.00',
                'wholesale_price' => '1752.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Golden Valor Chronograph 42mm Gold Stainless Steel / Eggshell',
                'description' => 'Masculine and classic is the perfect description of the Hauger Golden Valor Chronograph wristwatch. With its 42mm gold plated steel case and steel strap it is the ideal wristwatch for all gentlemen and connoisseurs of beautiful chronograph timepieces. This Golden Valor Chronograph wristwatch have a limited annual production volume of 100 pieces.

                HAUGER-GV427018',
                'price' => '1752.00',
                'retail_price' => '1752.00',
                'wholesale_price' => '1752.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Golden Valor Chronograph 42mm Silver Stainless Steel / Black',
                'description' => 'Masculine and classic is the perfect description of the Hauger Golden Valor Chronograph wristwatch. With its 42mm steel case and steel strap it is the ideal wristwatch for all gentlemen and connoisseurs of beautiful chronograph timepieces. This Golden Valor Chronograph wristwatch have a limited annual production volume of 100 pieces.

                HAUGER-GV422118',
                'price' => '1752.00',
                'retail_price' => '1752.00',
                'wholesale_price' => '1752.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Golden Valor Chronograph 42mm Silver Stainless Steel / Eggshell',
                'description' => 'Masculine and classic is the perfect description of the Hauger Golden Valor Chronograph wristwatch. With its 42mm steel case and steel strap it is the ideal wristwatch for all gentlemen and connoisseurs of beautiful chronograph timepieces. This Golden Valor Chronograph wristwatch have a limited annual production volume of 100 pieces.

                HAUGER-GV422018',
                'price' => '1752.00',
                'retail_price' => '1752.00',
                'wholesale_price' => '1752.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Grand Courage Automatic 40mm Gold Stainless Steel / Black',
                'description' => 'With its characteristic pure lines, the Grand Courage is recognized as the outmost timeless round wristwatch. The sleek lines of the Hauger Grand Courage Automatic wristwatch create an supremely elegance. With it´s 40 mm gold plated steel case, it is the perfect watch for the man who wishes to combine an modern sophisticated style with sure taste and personality. This Grand Courage model have a limited annual production volume of 100 pieces.

                HAUGER-GC407118',
                'price' => '2312.00',
                'retail_price' => '2312.00',
                'wholesale_price' => '2312.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Grand Courage Automatic 40mm Gold Stainless Steel / Eggshell',
                'description' => 'With its characteristic pure lines, the Grand Courage is recognized as the outmost timeless round wristwatch. The sleek lines of the Hauger Grand Courage Automatic wristwatch create an supremely elegance. With it´s 40 mm gold plated steel case, it is the perfect watch for the man who wishes to combine an modern sophisticated style with sure taste and personality. This Grand Courage model have a limited annual production volume of 100 pieces.

                HAUGER-GC407018',
                'price' => '2312.00',
                'retail_price' => '2312.00',
                'wholesale_price' => '2312.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Grand Courage Automatic 40mm Silver Stainless Steel / Black',
                'description' => 'With its characteristic pure lines, the Grand Courage is recognized as the outmost timeless round wristwatch. The sleek lines of the Hauger Grand Courage Automatic wristwatch create an supremely elegance. With it´s 40 mm steel case, it is the perfect watch for the man who wishes to combine an modern sophisticated style with sure taste and personality. This Grand Courage model have a limited annual production volume of 100 pieces.

                HAUGER-GC402118',
                'price' => '2312.00',
                'retail_price' => '2312.00',
                'wholesale_price' => '2312.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Grand Courage Automatic 40mm Silver Stainless Steel / Eggshell',
                'description' => 'With its characteristic pure lines, the Grand Courage is recognized as the outmost timeless round wristwatch. The sleek lines of the Hauger Grand Courage Automatic wristwatch create an supremely elegance. With it´s 40 mm steel case, it is the perfect watch for the man who wishes to combine an modern sophisticated style with sure taste and personality. This Grand Courage model have a limited annual production volume of 100 pieces.

                HAUGER-GC402018',
                'price' => '2312.00',
                'retail_price' => '2312.00',
                'wholesale_price' => '2312.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Men's Watches"),
            ]
        ];

        foreach ($haugerProducts as $haugerProduct) {
            $product = Product::create([
                'store_category_id' => $haugerProduct['store_category_id'],
                'vat_id' => $haugerProduct['vat_id'],
                'name' => $haugerProduct['name'],
                'description' => $haugerProduct['description'],
                'price' => $haugerProduct['price'],
                'retail_price' => $haugerProduct['retail_price'],
                'wholesale_price' => $haugerProduct['wholesale_price'],
                'reorder_level' => $haugerProduct['reorder_level'],
                'status' => $haugerProduct['status'],
                'release_date' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);

            // try {
            //     $result = Http::withHeaders([
            //         'Content-Type' => 'application/json;charset=UTF-8',
            //         'Authorization' => 'Zoho-oauthtoken ' . $token
            //     ])->post('https://inventory.zoho.com/api/v1/items?organization_id=' . env('ZOHO_ORGANIZATION_ID'), [
            //         'name' => $product->name,
            //         'rate' => $product->price,
            //         'description' => $product->description
            //     ]);

            //     $data = json_decode($result, true);

            //     ExternalData::create([
            //         'external_id' => $data['item']['item_id'],
            //         'data' => json_encode($data),
            //         'external_data_type_id' => 1, // Zoho Inventory
            //         'externable_type' => 'App\Models\Product',
            //         'externable_id' => $product->id,
            //         'created_at' => Carbon::now()
            //     ]);
            // } catch (\Throwable $th) {
            //     //throw $th;
            // }

            $haugerProductProductCategories = $haugerProduct['product_category'];

            foreach ($haugerProductProductCategories as $haugerProductProductCategory) {
                $productCategory = ProductCategory::where('name', $haugerProductProductCategory)->first();

                CategoryProduct::create([
                    'product_id' => $product->id,
                    'product_category_id' => $productCategory->id,
                ]);
            }
        }

        $hauger2Products = [
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Excellence V Master Automatic 38mm Gold Stainless Steel / Black',
                'description' => 'With the combination of clean classic design and robust 38mm gold plated steel case, the Hauger Princess Excellence V Master is a tribute to all historic heroes of the past. The wristwatch is sophisticated and modern with an elegant silhouette, which makes it to the perfect wristwatch for all people that want to stand out from the average. This Princess Excellence V Master have a limited annual production volume of 300 pieces.

                HAUGER-PEVM387118',
                'price' => '1192.00',
                'retail_price' => '1192.00',
                'wholesale_price' => '1192.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Excellence V Master Automatic 38mm Silver Stainless Steel / Black',
                'description' => 'With the combination of clean classic design and robust 38mm steel case, the Hauger Princess Excellence V Master is a tribute to all historic heroes of the past. The wristwatch is sophisticated and modern with an elegant silhouette, which makes it to the perfect wristwatch for all people that want to stand out from the average. This Princess Excellence V Master have a limited annual production volume of 300 pieces.

                HAUGER-PEVM382118',
                'price' => '1192.00',
                'retail_price' => '1192.00',
                'wholesale_price' => '1192.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Golden Valor 34mm Gold Stainless Steel / Black',
                'description' => 'Feminine and classic is the perfect description of the Hauger Princess Golden Valor wristwatch. With is´s 34mm gold plated steel case and steel strap it is the ideal wristwatch for all ladies and connoisseurs of beautiful and elegant timepieces. This Princess Golden Valor model have a limited annual production volume of 100 pieces.

                HAUGER-PGV347118',
                'price' => '1752.00',
                'retail_price' => '1752.00',
                'wholesale_price' => '1752.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches", "Featured"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Golden Valor 34mm Gold Stainless Steel / Eggshell',
                'description' => 'Feminine and classic is the perfect description of the Hauger Princess Golden Valor wristwatch. With is´s 34mm gold plated steel case and steel strap it is the ideal wristwatch for all ladies and connoisseurs of beautiful and elegant timepieces. This Princess Golden Valor model have a limited annual production volume of 100 pieces.

                HAUGER-PGV347018',
                'price' => '1752.00',
                'retail_price' => '1752.00',
                'wholesale_price' => '1752.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Golden Valor 34mm Silver Stainless Steel / Black',
                'description' => 'Feminine and classic is the perfect description of the Hauger Princess Golden Valor wristwatch. With is´s 34mm steel case and steel strap it is the ideal wristwatch for all ladies and connoisseurs of beautiful and elegant timepieces. This Princess Golden Valor model have a limited annual production volume of 100 pieces.

                HAUGER-PGV342118',
                'price' => '1752.00',
                'retail_price' => '1752.00',
                'wholesale_price' => '1752.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Golden Valor 34mm Silver Stainless Steel / Eggshell',
                'description' => 'Feminine and classic is the perfect description of the Hauger Princess Golden Valor wristwatch. With is´s 34mm steel case and steel strap it is the ideal wristwatch for all ladies and connoisseurs of beautiful and elegant timepieces. This Princess Golden Valor model have a limited annual production volume of 100 pieces.

                HAUGER-PGV342018',
                'price' => '1752.00',
                'retail_price' => '1752.00',
                'wholesale_price' => '1752.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches", "Featured"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Grand Courage Automatic 30mm Gold Stainless Steel / Black',
                'description' => 'With its gorgeous classic and timeless expression, the Hauger Princess Grand Courage Automatic 30mm round wristwatch is dressed in gold plated steel. The classic small steel watch, with its feminine lines, will fit even the most slender of wrists. This Princess Grand Courage model have a limited annual production volume of 100 pieces.

                HAUGER-PGC307118',
                'price' => '2312.00',
                'retail_price' => '2312.00',
                'wholesale_price' => '2312.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches", "Featured"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Grand Courage Automatic 30mm Gold Stainless Steel / Eggshell',
                'description' => 'With its gorgeous classic and timeless expression, the Hauger Princess Grand Courage Automatic 30mm round wristwatch is dressed in gold plated steel. The classic small steel watch, with its feminine lines, will fit even the most slender of wrists. This Princess Grand Courage model have a limited annual production volume of 100 pieces.

                HAUGER-PGC307018',
                'price' => '2312.00',
                'retail_price' => '2312.00',
                'wholesale_price' => '2312.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches", "Featured"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Grand Courage Automatic 30mm Silver Stainless Steel / Black',
                'description' => 'With its gorgeous classic and timeless expression, the Hauger Princess Grand Courage Automatic 30mm round wristwatch is dressed in polished steel. The classic small steel watch, with its feminine lines, will fit even the most slender of wrists. This Princess Grand Courage model have a limited annual production volume of 100 pieces.

                HAUGER-PGC302118',
                'price' => '2312.00',
                'retail_price' => '2312.00',
                'wholesale_price' => '2312.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches", "Featured"),
            ],
            [
                'store_category_id' => 5,
                'vat_id' => 1,
                'name' => 'Hauger Princess Grand Courage Automatic 30mm Silver Stainless Steel / Eggshell',
                'description' => 'With its gorgeous classic and timeless expression, the Hauger Princess Grand Courage Automatic 30mm round wristwatch is dressed in polished steel. The classic small steel watch, with its feminine lines, will fit even the most slender of wrists. This Princess Grand Courage model have a limited annual production volume of 100 pieces.

                HAUGER-PGC302018',
                'price' => '2312.00',
                'retail_price' => '2312.00',
                'wholesale_price' => '2312.00',
                'reorder_level' => '100',
                'status' => 'active',
                'product_category' => array("Women's Watches"),
            ]
        ];

        foreach ($hauger2Products as $hauger2Product) {
            $product = Product::create([
                'store_category_id' => $hauger2Product['store_category_id'],
                'vat_id' => $hauger2Product['vat_id'],
                'name' => $hauger2Product['name'],
                'description' => $hauger2Product['description'],
                'price' => $hauger2Product['price'],
                'retail_price' => $hauger2Product['retail_price'],
                'wholesale_price' => $hauger2Product['wholesale_price'],
                'reorder_level' => $hauger2Product['reorder_level'],
                'status' => $hauger2Product['status'],
                'release_date' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);

            try {
                $result = Http::withHeaders([
                    'Content-Type' => 'application/json;charset=UTF-8',
                    'Authorization' => 'Zoho-oauthtoken ' . $token
                ])->post('https://inventory.zoho.com/api/v1/items?organization_id=' . env('ZOHO_ORGANIZATION_ID'), [
                    'name' => $product->name,
                    'rate' => $product->price,
                    'description' => $product->description
                ]);

                $data = json_decode($result, true);

                ExternalData::create([
                    'external_id' => $data['item']['item_id'],
                    'data' => json_encode($data),
                    'external_data_type_id' => 1, // Zoho Inventory
                    'externable_type' => 'App\Models\Product',
                    'externable_id' => $product->id,
                    'created_at' => Carbon::now()
                ]);
            } catch (\Throwable $th) {
                //throw $th;
            }

            $hauger2ProductProductCategories = $hauger2Product['product_category'];
            foreach ($hauger2ProductProductCategories as $hauger2ProductProductCategory) {
                $productCategory = ProductCategory::where('name', $hauger2ProductProductCategory)->first();

                CategoryProduct::create([
                    'product_id' => $product->id,
                    'product_category_id' => $productCategory->id,
                ]);
            }
        }

        // $getmbracedProducts = [
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Forest Green Braided Silver Lock',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Superior Leather Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Wine Braided Silver Lock',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Superior Leather Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Green Braided Silver Lock',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Superior Leather Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Beige Braided Silver Lock',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Superior Leather Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Yellow Braided Silver Lock',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Superior Leather Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Black Braided Gold Lock',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Superior Leather Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Brown Braided Silver Lock',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Superior Leather Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Breaded 6mm Single Wrap with Silver Lock',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Superior Leather Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Boho Lava Rock Natural Stones with Metal Details',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Delicate Stone Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Fully Matte Black Frosted Stone With Zircon Ball',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Delicate Stone Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Single Black Onyx with Match Fire Agate',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Delicate Stone Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Malachite Rough Beads with Silver Buddha Head',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Delicate Stone Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Amethyst Natural Stones with Brass Tibetan Pure Copper',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Delicate Stone Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Natural Alloy Stone with Silver Owl',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Delicate Stone Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Natural Malachite Stone Beads with Silver Skull',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Delicate Stone Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Amethyst Chakra Brass Tibetan Pure Copper',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Delicate Stone Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Green Pine Natural Stones',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Delicate Stone Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Brushed Square Silver',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Endurance Steel Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Matt Black Square',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Endurance Steel Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Fully Twisted Polished Rose Gold #1',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Endurance Steel Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Plain 5mm Polished Gold #3',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Endurance Steel Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Polished Single Twist Gold #2',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Endurance Steel Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Brushed Square Rose Gold #1',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Endurance Steel Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Brushed Silver #1',
        //         'description' => '',
        //         'price' => '400.00',
        //         'retail_price' => '400.00',
        //         'wholesale_price' => '400.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Endurance Steel Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'String Bracelet #1',
        //         'description' => '',
        //         'price' => '800.00',
        //         'retail_price' => '800.00',
        //         'wholesale_price' => '800.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Durable String Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Gun Black Beads with Cubid Zirconia Crown Ball',
        //         'description' => '',
        //         'price' => '800.00',
        //         'retail_price' => '800.00',
        //         'wholesale_price' => '800.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Durable String Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Austrian Rhinestones with Zirconia',
        //         'description' => '',
        //         'price' => '600.00',
        //         'retail_price' => '600.00',
        //         'wholesale_price' => '600.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Durable String Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Zirconia Rose Gold Macramest String',
        //         'description' => '',
        //         'price' => '800.00',
        //         'retail_price' => '800.00',
        //         'wholesale_price' => '800.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Durable String Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Adjustable Miyuki Pattern',
        //         'description' => '',
        //         'price' => '450.00',
        //         'retail_price' => '450.00',
        //         'wholesale_price' => '450.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Durable String Collection'),
        //     ],
        //     [
        //         'store_category_id' => 4,
        //         'vat_id' => 1,
        //         'name' => 'Blue Braded String with Crystal Ball',
        //         'description' => '',
        //         'price' => '500.00',
        //         'retail_price' => '500.00',
        //         'wholesale_price' => '500.00',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('Durable String Collection'),
        //     ]
        // ];

        // foreach ($getmbracedProducts as $getmbracedProduct) {
        //     $product = Product::create([
        //         'store_category_id' => $getmbracedProduct['store_category_id'],
        //         'vat_id' => $getmbracedProduct['vat_id'],
        //         'name' => $getmbracedProduct['name'],
        //         'description' => $getmbracedProduct['description'],
        //         'price' => $getmbracedProduct['price'],
        //         'retail_price' => $getmbracedProduct['retail_price'],
        //         'wholesale_price' => $getmbracedProduct['wholesale_price'],
        //         'reorder_level' => $getmbracedProduct['reorder_level'],
        //         'status' => $getmbracedProduct['status'],
        //         'release_date' => Carbon::now(),
        //         'created_at' => Carbon::now()
        //     ]);

        //     $result = Http::withHeaders([
        //         'Content-Type' => 'application/json;charset=UTF-8',
        //         'Authorization' => 'Zoho-oauthtoken ' . $token
        //     ])->post('https://inventory.zoho.com/api/v1/items?organization_id=' . env('ZOHO_ORGANIZATION_ID'), [
        //         'name' => $product->name,
        //         'rate' => $product->price,
        //         'description' => $product->description
        //     ]);

        //     $data = json_decode($result, true);

        //     ExternalData::create([
        //         'external_id' => $data['item']['item_id'],
        //         'data' => json_encode($data),
        //         'external_data_type_id' => 1, // Zoho Inventory
        //         'externable_type' => 'App\Models\Product',
        //         'externable_id' => $product->id,
        //         'created_at' => Carbon::now()
        //     ]);

        //     $getmbracedProductCategories = $getmbracedProduct['product_category'];
        //     foreach ($getmbracedProductCategories as $getmbracedProductCategory) {
        //         $productCategory = ProductCategory::where('name', $getmbracedProductCategory)->first();

        //         CategoryProduct::create([
        //             'product_id' => $product->id,
        //             'product_category_id' => $productCategory->id,
        //         ]);
        //     }
        // }

        // $clsProducts = [
        //     [
        //         'store_category_id' => 5,
        //         'vat_id' => 1,
        //         'name' => 'Casablanca by night 500GR',
        //         'description' => 'Tax included. Shipping calculated at checkout.

        //         AVAILABILITY: COMING SOON
        //         SKU: CLS-CASABLANCA-BEAN
        //         CATEGORIES: 500GR, WHOLE BEANS',
        //         'price' => '19.50',
        //         'retail_price' => '19.50',
        //         'wholesale_price' => '19.50',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('WHOLE BEANS'),
        //     ],
        //     [
        //         'store_category_id' => 5,
        //         'vat_id' => 1,
        //         'name' => 'Yespresso 8.2 500GR',
        //         'description' => 'Tax included. Shipping calculated at checkout.

        //         AVAILABILITY: COMING SOON
        //         SKU: CLS-YOURPLACE-BEAN
        //         CATEGORIES: 500GR, WHOLE BEANS',
        //         'price' => '19.50',
        //         'retail_price' => '19.50',
        //         'wholesale_price' => '19.50',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('WHOLE BEANS'),
        //     ],
        //     [
        //         'store_category_id' => 5,
        //         'vat_id' => 1,
        //         'name' => 'Your place or mine? 500GR',
        //         'description' => 'Tax included. Shipping calculated at checkout.

        //         AVAILABILITY: COMING SOON
        //         SKU: CLS-YOURPLACE-BEAN
        //         CATEGORIES: 500GR, WHOLE BEANS',
        //         'price' => '19.50',
        //         'retail_price' => '19.50',
        //         'wholesale_price' => '19.50',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('WHOLE BEANS'),
        //     ],
        //     [
        //         'store_category_id' => 5,
        //         'vat_id' => 1,
        //         'name' => 'The Coffee Box 1 (beans) 500GR',
        //         'description' => '3 x 500g
        //         Tax included. Shipping calculated at checkout.

        //         AVAILABILITY: COMING SOON
        //         SKU: CLS-COFFEEBOX-1-BEAN
        //         CATEGORIES: 500GR, BUNDLES, WHOLE BEANS',
        //         'price' => '58.50',
        //         'retail_price' => '58.50',
        //         'wholesale_price' => '58.50',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('BUNDLES', 'WHOLE BEANS'),
        //     ],
        //     [
        //         'store_category_id' => 5,
        //         'vat_id' => 1,
        //         'name' => 'Casablanca by night 250GR',
        //         'description' => 'Tax included. Shipping calculated at checkout.

        //         AVAILABILITY: COMING SOON
        //         SKU: CLS-CASABLANCA-BEAN-1
        //         CATEGORIES: 250GR, GROUND COFFEE',
        //         'price' => '13.50',
        //         'retail_price' => '13.50',
        //         'wholesale_price' => '13.50',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('GROUND COFFEE'),
        //     ],
        //     [
        //         'store_category_id' => 5,
        //         'vat_id' => 1,
        //         'name' => 'Your place or mine? 250GR',
        //         'description' => 'Tax included. Shipping calculated at checkout.

        //         AVAILABILITY: COMING SOON
        //         SKU: CLS-YOURPLACE-GROUND
        //         CATEGORIES: 250GR, GROUND COFFEE',
        //         'price' => '13.50',
        //         'retail_price' => '13.50',
        //         'wholesale_price' => '13.50',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('GROUND COFFEE'),
        //     ],
        //     [
        //         'store_category_id' => 5,
        //         'vat_id' => 1,
        //         'name' => 'The Coffee Box 2 (grounded) 250GR',
        //         'description' => '3 x 250g
        //         Tax included. Shipping calculated at checkout.

        //         AVAILABILITY: COMING SOON
        //         SKU: CLS-COFFEEBOX-1-BEAN-1
        //         CATEGORIES: 250GR, BUNDLES, GROUND COFFEE',
        //         'price' => '40.50',
        //         'retail_price' => '40.50',
        //         'wholesale_price' => '40.50',
        //         'reorder_level' => '100',
        //         'status' => 'active',
        //         'product_category' => array('BUNDLES', 'GROUND COFFEE'),
        //     ]
        // ];

        // foreach ($clsProducts as $clsProduct) {
        //     $product = Product::create([
        //         'store_category_id' => $clsProduct['store_category_id'],
        //         'vat_id' => $clsProduct['vat_id'],
        //         'name' => $clsProduct['name'],
        //         'description' => $clsProduct['description'],
        //         'price' => $clsProduct['price'],
        //         'retail_price' => $clsProduct['retail_price'],
        //         'wholesale_price' => $clsProduct['wholesale_price'],
        //         'reorder_level' => $clsProduct['reorder_level'],
        //         'status' => $clsProduct['status'],
        //         'release_date' => Carbon::now(),
        //         'created_at' => Carbon::now()
        //     ]);

        //     $result = Http::withHeaders([
        //         'Content-Type' => 'application/json;charset=UTF-8',
        //         'Authorization' => 'Zoho-oauthtoken ' . $token
        //     ])->post('https://inventory.zoho.com/api/v1/items?organization_id=' . env('ZOHO_ORGANIZATION_ID'), [
        //         'name' => $product->name,
        //         'rate' => $product->price,
        //         'description' => $product->description
        //     ]);

        //     $data = json_decode($result, true);

        //     ExternalData::create([
        //         'external_id' => $data['item']['item_id'],
        //         'data' => json_encode($data),
        //         'external_data_type_id' => 1, // Zoho Inventory
        //         'externable_type' => 'App\Models\Product',
        //         'externable_id' => $product->id,
        //         'created_at' => Carbon::now()
        //     ]);

        //     $clsProductCategories = $clsProduct['product_category'];
        //     foreach ($clsProductCategories as $clsProductCategory) {
        //         $productCategory = ProductCategory::where('name', $clsProductCategory)->first();

        //         CategoryProduct::create([
        //             'product_id' => $product->id,
        //             'product_category_id' => $productCategory->id,
        //         ]);
        //     }
        // }
    }
}
