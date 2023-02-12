<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            [
                'name' => 'Argentina',
                'code' => 'AR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Australia',
                'code' => 'AU',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Austria',
                'code' => 'AT',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bahamas',
                'code' => 'BS',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bahrain',
                'code' => 'BH',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bangladesh',
                'code' => 'BD',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Barbados',
                'code' => 'BB',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Belgium',
                'code' => 'BE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Belize',
                'code' => 'BZ',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Benin',
                'code' => 'BJ',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bermuda',
                'code' => 'BM',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bolivia',
                'code' => 'BO',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Brazil',
                'code' => 'BR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Bulgaria',
                'code' => 'BG',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Burkina Faso',
                'code' => 'BF',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Chile',
                'code' => 'CL',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'China',
                'code' => 'CN',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Colombia',
                'code' => 'CO',
                'created_at' => Carbon::now()
            ],
            [
                'name' => 'Costa Rica',
                'code' => 'CR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Côte D' Ivoire",
                'code' => 'CR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Croatia",
                'code' => 'HR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Cuba",
                'code' => 'CU',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Cyprus",
                'code' => 'CY',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Czech Republic",
                'code' => 'CZ',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Denmark",
                'code' => 'DK',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Dominican Republic",
                'code' => 'DO',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Ecuador",
                'code' => 'EC',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Egypt",
                'code' => 'EG',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "El Salvador",
                'code' => 'SV',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Estonia",
                'code' => 'EE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Ethiopia",
                'code' => 'ET',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Finland",
                'code' => 'FI',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "France",
                'code' => 'FR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Gambia",
                'code' => 'GM',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Germany",
                'code' => 'DE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Ghana",
                'code' => 'GH',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Great Britain",
                'code' => 'GB',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Greece",
                'code' => 'GR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Guatemala",
                'code' => 'GT',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Guinea",
                'code' => 'GN',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Guyana",
                'code' => 'GY',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Honduras",
                'code' => 'HN',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Hong Kong",
                'code' => 'HK',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Hungary",
                'code' => 'HU',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Iceland",
                'code' => 'IS',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "India",
                'code' => 'IN',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Indonesia",
                'code' => 'ID',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Iran",
                'code' => 'IR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Iraq",
                'code' => 'IQ',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Ireland",
                'code' => 'IE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Israel",
                'code' => 'IL',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Italy",
                'code' => 'IT',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Jamaica",
                'code' => 'JM',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Japan",
                'code' => 'JP',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Jordan",
                'code' => 'JO',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Kenya",
                'code' => 'KE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Kuwait",
                'code' => 'KW',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Latvia",
                'code' => 'LV',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Lebanon",
                'code' => 'LB',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Liberia",
                'code' => 'LR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Libya",
                'code' => 'LY',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Liechtenstein",
                'code' => 'LI',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Lithuania",
                'code' => 'LT',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Luxemburg",
                'code' => 'LU',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Malawi",
                'code' => 'MW',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Malaysia",
                'code' => 'MY',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Mali",
                'code' => 'ML',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Malta",
                'code' => 'MT',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Mauritania",
                'code' => 'MR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Mauritius",
                'code' => 'MU',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Mexico",
                'code' => 'MX',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Morocco",
                'code' => 'MA',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Netherlands",
                'code' => 'NL',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "New Zealand",
                'code' => 'NZ',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Nicaragua",
                'code' => 'NI',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Niger",
                'code' => 'NE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Nigeria",
                'code' => 'NG',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Norway",
                'code' => 'NO',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Oman",
                'code' => 'OM',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Pakistan",
                'code' => 'PK',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Panama",
                'code' => 'PA',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Paraguay",
                'code' => 'PY',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Peru",
                'code' => 'PE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Philippines",
                'code' => 'PH',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Poland",
                'code' => 'PL',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Portugal",
                'code' => 'PT',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Puerto Rico",
                'code' => 'PR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Qatar",
                'code' => 'QA',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Republic of Korea",
                'code' => 'KR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Romania",
                'code' => 'RO',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Russian Federation",
                'code' => 'RU',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Saudi Arabia",
                'code' => 'SA',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Senegal",
                'code' => 'SN',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Seychelles",
                'code' => 'SC',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Sierra Leone",
                'code' => 'SL',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Singapore",
                'code' => 'SG',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Slovakia",
                'code' => 'SK',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Slovenia",
                'code' => 'SI',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "South Africa",
                'code' => 'ZA',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Spain",
                'code' => 'ES',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Sri Lanka",
                'code' => 'LK',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Sudan",
                'code' => 'SD',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Surinam",
                'code' => 'SR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Sweden",
                'code' => 'SE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Switzerland",
                'code' => 'CH',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Syria",
                'code' => 'SY',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Syria",
                'code' => 'SY',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Taiwan",
                'code' => 'TW',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Tanzania",
                'code' => 'TZ',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Thailand",
                'code' => 'TH',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Trinidad and Tobago",
                'code' => 'TT',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Tunisia",
                'code' => 'TN',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Turkey",
                'code' => 'TR',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Uganda",
                'code' => 'UG',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Ukraine",
                'code' => 'UA',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "United Arab Emirates",
                'code' => 'AE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "United Kingdom",
                'code' => 'UK',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "United States of America",
                'code' => 'USA',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Uruguay",
                'code' => 'UY',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Venezuela",
                'code' => 'VE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Vietnam",
                'code' => 'VN',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Yemen",
                'code' => 'YE',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Zambia",
                'code' => 'ZM',
                'created_at' => Carbon::now()
            ],
            [
                'name' => "Zimbabwe",
                'code' => 'ZW',
                'created_at' => Carbon::now()
            ],
        ]);
    }
}
