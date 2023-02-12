<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ShippingMethodSeeder::class,
            ExternalDataTypesSeeder::class,
            ServerSeeder::class,
            RoleSeeder::class,
            PlansTableSeeder::class,
            StoreCategoriesTableSeeder::class,
            TemplatesTableSeeder::class,
            UsersTableSeeder::class,
            CountriesTableSeeder::class,
            UserSubscriptionsTableSeeder::class,
            AddressesTableSeeder::class,
            CustomersTableSeeder::class,
            CustomerAddressesTableSeeder::class,
            AdminsTableSeeder::class,
            ProductCategorySeeder::class,
            VatSeeder::class,
            PaymentMethodSeeder::class,
            BlogCategorySeeder::class,
            BlogSeeder::class,
            FaqCategorySeeder::class,
            FaqSeeder::class,
            UserBankDetailsSeeder::class,
            MarketingContactListSeeder::class,
            ShippingZonesSeeder::class,
            ShippingZoneMethodSeeder::class,
            ProductSeeder::class,
            ProductMediaSeeder::class,
            NewsCategorySeeder::class,
            NewsHeadlineSeeder::class
        ]);
    }
}
