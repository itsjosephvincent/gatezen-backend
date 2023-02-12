<?php

namespace Database\Seeders;

use App\Models\Server;
use App\Models\Store;
use App\Models\StoreServer;
use App\Models\StoreUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Traits\EncryptionTraits;
use App\Traits\Google2FATraits;

class UsersTableSeeder extends Seeder
{
    use Google2FATraits, EncryptionTraits;

    public function run()
    {
        if (env('APP_ENV') === 'local') {
            $faker = \Faker\Factory::create();
            $google_key = $this->generateGoogleSecretKey();
            $encrypted_google_key = $this->encrypt($google_key);
            $server = Server::orderBy('id', 'DESC')->first();
            $newStoreServerPort = 3000;

            $store = Store::create([
                'template_id' => 3,
                'store_category_id' => 10,
                'url' => 'http://dev-shop-cbd.' . config('store-domain.domain'),
                'domain' => 'dev-shop-cbd.' . config('store-domain.domain'),
                'store_name' => $faker->company,
                'status' => 'active',
                'is_private' => false,
                'is_wholesaler' => false,
                'theme_color' => '#A178E3',
                'text_color' => '#FFFFFF',
                'template_version' => 1,
                'created_at' => Carbon::now()
            ]);

            StoreServer::create([
                'store_id' => $store->id,
                'server_id' => $server->id,
                'port' => $newStoreServerPort + 1,
                'created_at' => Carbon::now()
            ]);

            $store_2 = Store::create([
                'template_id' => 1,
                'store_category_id' => 4,
                'url' => 'http://dev-shop-saint-roches.' . config('store-domain.domain'),
                'domain' => 'dev-shop-saint-roches.' . config('store-domain.domain'),
                'store_name' => $faker->company,
                'status' => 'active',
                'is_private' => false,
                'is_wholesaler' => false,
                'theme_color' => '#A178E3',
                'text_color' => '#FFFFFF',
                'template_version' => 1,
                'created_at' => Carbon::now()
            ]);

            StoreServer::create([
                'store_id' => $store_2->id,
                'server_id' => $server->id,
                'port' => $newStoreServerPort,
                'created_at' => Carbon::now()
            ]);

            $store_3 = Store::create([
                'template_id' => 2,
                'store_category_id' => 5,
                'url' => 'http://dev-shop-hauger.' . config('store-domain.domain'),
                'domain' => 'dev-shop-hauger.' . config('store-domain.domain'),
                'store_name' => $faker->company,
                'status' => 'active',
                'is_private' => false,
                'is_wholesaler' => false,
                'theme_color' => '#A178E3',
                'text_color' => '#FFFFFF',
                'template_version' => 1,
                'created_at' => Carbon::now()
            ]);

            StoreServer::create([
                'store_id' => $store_3->id,
                'server_id' => $server->id,
                'port' => $newStoreServerPort + 1,
                'created_at' => Carbon::now()
            ]);

            $ownerUser = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'email' => 'store-owner@gatezen.com',
                'mobile' => $faker->tollFreePhoneNumber,
                'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'password' => Hash::make('Own3r2023!'),
                'confirmed_at' => Carbon::now()->format('Y-m-d'),
                'is_2fa_enabled' => 'disabled',
                'google2fa_secret' => $encrypted_google_key,
                'created_at' => Carbon::now()
            ]);

            $ownerUser->assignRole('store_owner');

            StoreUser::create([
                'user_id' => $ownerUser->id,
                'store_id' => $store->id,
                'created_at' => Carbon::now()
            ]);

            StoreUser::create([
                'user_id' => $ownerUser->id,
                'store_id' => $store_2->id,
                'created_at' => Carbon::now()
            ]);

            StoreUser::create([
                'user_id' => $ownerUser->id,
                'store_id' => $store_3->id,
                'created_at' => Carbon::now()
            ]);
        }

        if (env('APP_ENV') === 'prod') {
            $faker = \Faker\Factory::create();
            $google_key = $this->generateGoogleSecretKey();
            $encrypted_google_key = $this->encrypt($google_key);

            $ownerUser = User::create([
                'first_name' => 'Mike',
                'last_name' => 'Tyson',
                'email' => 'user1@gatezen.co',
                'mobile' => $faker->tollFreePhoneNumber,
                'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'password' => Hash::make('kKLk8JwH'),
                'confirmed_at' => Carbon::now()->format('Y-m-d'),
                'is_2fa_enabled' => 'disabled',
                'google2fa_secret' => $encrypted_google_key,
                'created_at' => Carbon::now()
            ]);

            $ownerUser->assignRole('store_owner');

            $ownerUser2 = User::create([
                'first_name' => 'Bruce',
                'last_name' => 'Willis',
                'email' => 'user2@gatezen.co',
                'mobile' => $faker->tollFreePhoneNumber,
                'birthdate' => Carbon::now()->subYears(20)->format('Y-m-d'),
                'password' => Hash::make('kKLk8JwH'),
                'confirmed_at' => Carbon::now()->format('Y-m-d'),
                'is_2fa_enabled' => 'disabled',
                'google2fa_secret' => $encrypted_google_key,
                'created_at' => Carbon::now()
            ]);

            $ownerUser2->assignRole('store_owner');
        }
    }
}
