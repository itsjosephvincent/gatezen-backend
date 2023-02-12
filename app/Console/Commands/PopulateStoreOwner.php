<?php

namespace App\Console\Commands;

use App\Models\Address;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Store;
use App\Models\Country;
use App\Models\Customer;
use App\Models\Template;
use App\Models\StoreUser;
use App\Models\StoreCategory;
use App\Models\CustomerAddress;
use App\Models\Entity;
use App\Models\EntityType;
use App\Models\Subscription;
use App\Models\UserSubscription;
use App\Traits\Google2FATraits;
use Illuminate\Console\Command;
use App\Traits\EncryptionTraits;
use Illuminate\Support\Facades\Hash;

class PopulateStoreOwner extends Command
{
    use EncryptionTraits, Google2FATraits;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Populate:storeowner {--length=1} {--store=1} {--customer=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate store requiring 3 parameters --length  --store --customer';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $options = $this->options();
        $faker = \Faker\Factory::create();

        for ($length = 0; $length <= (int) $options['length'] - 1; $length++) {
            $this->info('****************** Store Owner ******************');
            // Create store owner
            $uniqueEmail = str_replace('@', date('Ymdhis') . '@', $faker->unique()->email);
            $ownerUser = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => $uniqueEmail,
                'mobile' => $faker->tollFreePhoneNumber,
                'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'password' => Hash::make('password'),
                'confirmed_at' => Carbon::now()->format('Y-m-d'),
                'is_2fa_enabled' => 'disabled',
                'google2fa_secret' => $this->encrypt($this->generateGoogleSecretKey()),
            ]);

            // assign role
            $ownerUser->assignRole('store_owner');
            $this->info('Store owner: ' . $ownerUser->email . ' - ' . $ownerUser->first_name . ' ' . $ownerUser->last_name . ' has been created');

            $userPlan = UserSubscription::create([
                'subscription_id' => Subscription::all()->random()->id,
                'user_id' => $ownerUser->id
            ]);
            $this->info('Store: ' . $userPlan->subscription_id . ' has been created');

            $entity = Entity::create([
                'type_id' => EntityType::all()->random()->id,
                'name' => $faker->name,
                'description' => $faker->sentence,
                'profile_picture' => 0,
            ]);
            $this->info('Store: ' . $entity->name . ' has been created');

            $addresses = Address::create([
                'entity_id' => $entity->id,
                'user_id' => $ownerUser->id,
                'care_of' => null,
                'address_1' => $faker->address,
                'address_2' => null,
                'city' => $faker->city,
                'postal_code' => $faker->postcode,
                'country_id' => Country::all()->random()->id
            ]);
            $this->info('Store: ' . $addresses->id . ' has been created');

            for ($store = 0; $store <= (int) $options['store'] - 1; $store++) {
                // Create store
                $storeData = Store::create([
                    'template_id' => Template::all()->random()->id,
                    'store_category_id' => StoreCategory::all()->random()->id,
                    'url' => $faker->url,
                    'store_name' => $faker->company,
                    'status' => 'active',
                    'is_private' => false,
                    'is_wholesaler' => false,
                    'theme_color' => $faker->hexcolor,
                    'text_color' => $faker->hexcolor,
                    'template_version' => '1.0',
                ]);
                $this->info('Store: ' . $storeData->store_name . ' has been created');

                // Add store owner to store_users
                StoreUser::create([
                    'user_id' => $ownerUser->id,
                    'store_id' => $storeData->id,
                ]);

                for ($customer = 0; $customer <= (int) $options['customer'] - 1; $customer++) {
                    $uniqueEmail = str_replace('@', date('Ymdhis') . '@', $faker->unique()->email);
                    $customerUser = Customer::create([
                        'user_id' => $ownerUser->id,
                        'store_id' => $storeData->id,
                        'customer_type' => $faker->randomElement(['individual', 'company']),
                        'company_name' => $faker->name . 'Inc.',
                        'business_number' => $faker->tollFreePhoneNumber,
                        'first_name' => $faker->firstName,
                        'last_name' => $faker->lastName,
                        'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                        'gender' => $faker->randomElement(['male', 'female']),
                        'email' => $uniqueEmail,
                        'mobile' => $faker->phoneNumber,
                        'password' => Hash::make('password'),
                        'img_url' => $faker->imageUrl,
                        'is_active' => 1,
                        'is_2fa_enabled' => 'disabled',
                        'google2fa_secret' => $this->encrypt($this->generateGoogleSecretKey()),
                    ]);
                    $customerUser->assignRole('consumer');

                    $addressType = $faker->randomElement(['Home', 'Office']);
                    CustomerAddress::create([
                        'customer_id' => $customerUser->id,
                        'address_type' => $addressType,
                        'care_of' => $customerUser->first_name . ' ' . $customerUser->last_name,
                        'address_1' => $faker->streetName(),
                        'address_2' => $faker->streetName(),
                        'city' => $faker->city(),
                        'postal_code' => $faker->postcode(),
                        'country_id' => Country::all()->random()->id,
                        'delivery_notes' => $faker->sentence()
                    ]);

                    $this->info('Store customer: ' . $customerUser->email . ' - ' . $customerUser->first_name . ' ' . $customerUser->last_name . ' has been created');
                }
                $this->info('');
            }
            // Create store manager
            /* for ($manager = 0; $manager <= (int) $options['manager'] - 1; $manager++) {
                // Create store owner
                $managerUser = User::create([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => $faker->freeEmail,
                    'mobile' => $faker->tollFreePhoneNumber,
                    'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                    'password' => Hash::make('password'),
                    'confirmed_at' => Carbon::now()->format('Y-m-d'),
                    'is_2fa_enabled' => 'disabled',
                    'google2fa_secret' => $this->encrypt($this->generateGoogleSecretKey()),
                ]);

                // assign role
                $managerUser->assignRole('store_manager');

                // Add store manager to store_users
                StoreUser::create([
                    'user_id' => $managerUser->id,
                    'store_id' => $store->id,
                ]);
            } */

            // Create store salesman
            /* for ($salesman = 0; $salesman <= (int) $options['salesman'] - 1; $salesman++) {
                // Create store owner
                $salesmanUser = User::create([
                    'first_name' => $faker->firstName,
                    'last_name' => $faker->lastName,
                    'email' => $faker->freeEmail,
                    'mobile' => $faker->tollFreePhoneNumber,
                    'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                    'password' => Hash::make('password'),
                    'confirmed_at' => Carbon::now()->format('Y-m-d'),
                    'is_2fa_enabled' => 'disabled',
                    'google2fa_secret' => $this->encrypt($this->generateGoogleSecretKey()),
                ]);

                // assign role
                $managerUser->assignRole('store_salesman');

                // Add store salesman to store_users
                StoreUser::create([
                    'user_id' => $salesmanUser->id,
                    'store_id' => $store->id,
                ]);
            } */
            $this->info('Seeding Completed.');
        }
        return 0;
    }
}
