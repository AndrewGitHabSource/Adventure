<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([[
            'id' => 1,
            'name' => 'Ukraine',
        ], [
            'id' => 2,
            'name' => 'Russia',
        ]]);

        DB::table('cities')->insert([[
            'name' => 'Kiev',
            'country_id' => 1
        ], [
            'name' => 'Moscow',
            'country_id' => 2
        ]]);

        DB::table('hotels')->insert([
            [
                'id' => 1,
                'name' => 'Luxury Hotel in Paris',
                'address' => '291 South 21th Street, Suite 721 New York NY 10016',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 40,
                'rating' => 4,
                'popular' => true
            ],
            [
                'id' => 2,
                'name' => 'Luxury Hotel in Paris 1',
                'address' => '291 South 21th Street, Suite 721 New York NY 12',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 24,
                'rating' => 4,
                'popular' => true
            ],
            [
                'id' => 3,
                'name' => 'Luxury Hotel in Paris 2',
                'address' => '291 South 21th Street, Suite 721 New York NY 1s',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 20,
                'rating' => 4,
                'popular' => true
            ],
            [
                'id' => 4,
                'name' => 'Luxury Hotel in Paris 5',
                'address' => '291 South 21th Street, Suite 721 New York NY 1s',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 48,
                'rating' => 5,
                'popular' => true
            ]
        ]);

        DB::table('ratings')->insert([
            'ip' => '127.0.0.2',
            'rating_value' => 4,
            'hotel_id' => 1
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Hotel, Italy',
                'address' => 'Miami, Fl',
                'description' => 'Far far away, behind the word mountains, far from the countries',
                'price' => 40,
                'hotel_id' => 1,
                'image' => '/images/room-4.jpg'
            ],
            [
                'name' => 'Hotel 1 Room',
                'address' => 'Miami, Fl',
                'description' => 'Far far away, behind the word mountains, far from the countries',
                'price' => 40,
                'hotel_id' => 1,
                'image' => '/images/room-4.jpg'
            ],
            [
                'name' => 'Hotel, Italy 1',
                'address' => 'Miami',
                'description' => 'Far far away, behind the word mountains, far from the countries',
                'price' => 40,
                'hotel_id' => 2,
                'image' => '/images/room-4.jpg'
            ],
            [
                'name' => 'Hotel',
                'address' => 'Miami 1258',
                'description' => 'Far far away, behind the word mountains, far from the countries',
                'price' => 40,
                'hotel_id' => 3,
                'image' => '/images/room-4.jpg'
            ],
            [
                'name' => 'Hotel',
                'address' => 'Miami',
                'description' => 'Far far away, behind the word mountains, far from the countries',
                'price' => 40,
                'hotel_id' => 4,
                'image' => '/images/room-4.jpg'
            ]
        ]);

        DB::table('galleries')->insert([
            [
                'image' => '/images/hotel-1.jpg',
                'hotel_id' => 1
            ],
            [
                'image' => '/images/hotel-2.jpg',
                'hotel_id' => 1
            ],
            [
                'image' => '/images/hotel-1.jpg',
                'hotel_id' => 2
            ],
            [
                'image' => '/images/hotel-2.jpg',
                'hotel_id' => 2
            ],
            [
                'image' => '/images/hotel-1.jpg',
                'hotel_id' => 3
            ],
            [
                'image' => '/images/hotel-2.jpg',
                'hotel_id' => 3
            ],
            [
                'image' => '/images/hotel-1.jpg',
                'hotel_id' => 4
            ],
            [
                'image' => '/images/hotel-2.jpg',
                'hotel_id' => 4
            ]
        ]);

        DB::table('flights')->insert([
            [
                'from' => 'Kiev',
                'where' => 'Moscow',
                'description' => 'description description description description description',
                'date_start' => Carbon::parse('11-08-2020'),
                'date_end' => Carbon::parse('12-08-2020'),
                'price' => 55.5
            ],
            [
                'from' => 'Moscow',
                'where' => 'Kiev',
                'description' => 'description description description description description',
                'date_start' => Carbon::parse('11-08-2020'),
                'date_end' => Carbon::parse('12-08-2020'),
                'price' => 55.5
            ],
            [
                'from' => 'Kiev',
                'where' => 'New City',
                'description' => 'description description description description description',
                'date_start' => Carbon::parse('14-08-2020'),
                'date_end' => Carbon::parse('15-08-2020'),
                'price' => 55.5
            ],
            [
                'from' => 'Kiev',
                'where' => 'Smela',
                'description' => 'description description description description description',
                'date_start' => Carbon::parse('18-08-2020'),
                'date_end' => Carbon::parse('18-08-2020'),
                'price' => 55.5
            ],
        ]);
    }
}
