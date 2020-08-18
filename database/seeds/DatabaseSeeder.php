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
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'John Doe',
                'login' => 'Admin',
                'email' => 'gmail@gmail.com',
                'photo' => '/images/person_1.jpg',
                'info' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem 
                           necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente 
                           consectetur similique, inventore eos fugit cupiditate numquam!',
                'is_admin' => true,
                'password' => '11'
            ]
        ]);

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
                'slug' => 'ht1',
                'name' => 'Luxury Hotel in Paris',
                'address' => '291 South 21th Street, Suite 721 New York NY 10016',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 40,
                'rating' => 4,
                'popular' => true,
                'country' => 'ukraine',
                'city' => 'kiev'
            ],
            [
                'id' => 2,
                'slug' => 'ht2',
                'name' => 'Luxury Hotel in Paris 1',
                'address' => '291 South 21th Street, Suite 721 New York NY 12',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 24,
                'rating' => 4,
                'popular' => true,
                'country' => 'ukraine',
                'city' => 'kiev'
            ],
            [
                'id' => 3,
                'slug' => 'ht3',
                'name' => 'Luxury Hotel in Paris 2',
                'address' => '291 South 21th Street, Suite 721 New York NY 1s',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 20,
                'rating' => 4,
                'popular' => true,
                'country' => 'ukraine',
                'city' => 'kiev'
            ],
            [
                'id' => 4,
                'slug' => 'ht4',
                'name' => 'Luxury Hotel in Paris 5',
                'address' => '291 South 21th Street, Suite 721 New York NY 1s',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 48,
                'rating' => 5,
                'popular' => true,
                'country' => 'ukraine',
                'city' => 'kiev'
            ]
        ]);

        DB::table('ratings')->insert([
            'ip' => '127.0.0.2',
            'rating_value' => 4,
            'ratingable_id' => 1,
            'ratingable_type' => 'App\Hotel',
            'comment' => 'Text'
        ]);

        DB::table('rooms')->insert([
            [
                'name' => 'Hotel, Italy',
                'slug' => 'ht1',
                'address' => 'Miami, Fl',
                'description' => 'Far far away, behind the word mountains, far from the countries',
                'price' => 40,
                'hotel_id' => 1,
                'image' => '/images/room-4.jpg'
            ],
            [
                'name' => 'Hotel 1 Room',
                'slug' => 'ht2',
                'address' => 'Miami, Fl',
                'description' => 'Far far away, behind the word mountains, far from the countries',
                'price' => 40,
                'hotel_id' => 1,
                'image' => '/images/room-4.jpg'
            ],
            [
                'name' => 'Hotel, Italy 1',
                'slug' => 'ht3',
                'address' => 'Miami',
                'description' => 'Far far away, behind the word mountains, far from the countries',
                'price' => 40,
                'hotel_id' => 2,
                'image' => '/images/room-4.jpg'
            ],
            [
                'name' => 'Hotel',
                'slug' => 'ht4',
                'address' => 'Miami 1258',
                'description' => 'Far far away, behind the word mountains, far from the countries',
                'price' => 40,
                'hotel_id' => 3,
                'image' => '/images/room-4.jpg'
            ],
            [
                'name' => 'Hotel',
                'slug' => 'ht5',
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
                'slug' => 'sl1',
                'from' => 'Kiev',
                'where' => 'Moscow',
                'description' => 'description description description description description',
                'date_start' => Carbon::parse('11-08-2020'),
                'date_end' => Carbon::parse('12-08-2020'),
                'price' => 55.5
            ],
            [
                'slug' => 'sl2',
                'from' => 'Moscow',
                'where' => 'Kiev',
                'description' => 'description description description description description',
                'date_start' => Carbon::parse('11-08-2020'),
                'date_end' => Carbon::parse('12-08-2020'),
                'price' => 55.5
            ],
            [
                'slug' => 'sl3',
                'from' => 'Kiev',
                'where' => 'New City',
                'description' => 'description description description description description',
                'date_start' => Carbon::parse('14-08-2020'),
                'date_end' => Carbon::parse('15-08-2020'),
                'price' => 55.5
            ],
            [
                'slug' => 'sl4',
                'from' => 'Kiev',
                'where' => 'Smela',
                'description' => 'description description description description description',
                'date_start' => Carbon::parse('18-08-2020'),
                'date_end' => Carbon::parse('18-08-2020'),
                'price' => 55.5
            ],
        ]);

        DB::table('places')->insert([
            [
                'id' => 1,
                'slug' => 'pl1',
                'name' => 'Place 1',
                'address' => ' San Franciso, CA',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 200,
                'rating' => 5,
                'popular' => true,
                'country' => 'ukraine',
                'city' => 'kiev',
                'image' => '/images/destination-1.jpg',
                'period' => '2 days 3 nights'
            ],
            [
                'id' => 2,
                'slug' => 'pl2',
                'name' => 'Place 2',
                'address' => ' San Franciso, CA',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 200,
                'rating' => 4,
                'popular' => true,
                'country' => 'ukraine',
                'city' => 'kiev',
                'image' => '/images/destination-2.jpg',
                'period' => '2 days 3 nights'

            ],
            [
                'id' => 3,
                'slug' => 'pl3',
                'name' => 'Place 3',
                'address' => ' San Franciso, CA',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 200,
                'rating' => 3,
                'popular' => true,
                'country' => 'russia',
                'city' => 'moscow',
                'image' => '/images/destination-3.jpg',
                'period' => '2 days 3 nights'
            ],
            [
                'id' => 4,
                'slug' => 'pl4',
                'name' => 'Place 4',
                'address' => ' San Franciso, CA',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'price' => 200,
                'rating' => 5,
                'popular' => true,
                'country' => 'ukraine',
                'city' => 'kiev',
                'image' => '/images/destination-4.jpg',
                'period' => '2 days 3 nights'
            ]

        ]);

        DB::table('restaurants')->insert([
            [
                'id' => 1,
                'slug' => 'pl1',
                'name' => 'restaurant 1',
                'address' => ' San Franciso, CA',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'rating' => 5,
                'recommended' => true,
                'country' => 'ukraine',
                'city' => 'kiev',
                'image' => '/images/restaurant-1.jpg'
            ],
            [
                'id' => 2,
                'slug' => 'pl2',
                'name' => 'Luxury Restaurant',
                'address' => ' San Franciso, CA',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'rating' => 5,
                'recommended' => true,
                'country' => 'ukraine',
                'city' => 'kiev',
                'image' => '/images/restaurant-2.jpg'
            ],
            [
                'id' => 3,
                'slug' => 'pl3',
                'name' => 'Luxury Restaurant 3',
                'address' => ' San Franciso, CA',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'rating' => 2,
                'recommended' => true,
                'country' => 'ukraine',
                'city' => 'kiev',
                'image' => '/images/restaurant-3.jpg'
            ],
            [
                'id' => 4,
                'slug' => 'pl4',
                'name' => 'restaurant 4',
                'address' => ' San Franciso, CA',
                'description' => 'When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane. Pityful a rethoric question ran over her cheek, then she continued her way.',
                'rating' => 4,
                'recommended' => true,
                'country' => 'ukraine',
                'city' => 'kiev',
                'image' => '/images/restaurant-4.jpg'
            ]
        ]);

        DB::table('hotel_hotel')->insert([
            [
                'id' => 1,
                'parent_id' => 1,
                'child_id' => 2
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'child_id' => 3
            ]
        ]);

        DB::table('posts')->insert([
            [
                'id' => 1,
                'slug' => 'post-1',
                'user_id' => 1,
                'title' => '10 Tips For The Traveler',
                'image' => '/images/image_1.jpg',
                'description' => '<h2 class="mb-3">10 Tips For The Traveler</h2> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>
                    <p>
                      <img src="images/image_7.jpg" alt="" class="img-fluid">
                    </p>
                    <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
                    <h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
                    <p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
                    <p>
                      <img src="images/image_8.jpg" alt="" class="img-fluid">
                    </p>
                    <p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>
                    <p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>
                    <p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>
                    <p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>',

                'date' => Carbon::parse('11-08-2020'),
            ],
            [
                'id' => 2,
                'slug' => 'post-2',
                'user_id' => 1,
                'title' => 'Even the all-powerful Pointing has no control about the blind texts',
                'image' => '/images/image_2.jpg',
                'description' => 'description description description description description description',
                'date' => Carbon::parse('11-08-2020'),
            ],
            [
                'id' => 3,
                'slug' => 'post-3',
                'user_id' => 1,
                'title' => 'Title The Traveler',
                'image' => '/images/image_2.jpg',
                'description' => '<h2 class="mb-3">10 Tips For The Traveler</h2> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>
                    <p>
                      <img src="/images/image_7.jpg" alt="" class="img-fluid">
                    </p>
                    <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
                    <h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
                    <p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
                    <p>
                      <img src="/images/image_8.jpg" alt="" class="img-fluid">
                    </p>
                    <p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>
                    <p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>
                    <p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>
                    <p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>',

                'date' => Carbon::parse('11-08-2020'),
            ],
            [
                'id' => 4,
                'slug' => 'post-4',
                'user_id' => 1,
                'title' => 'Tips For The Traveler',
                'image' => '/images/image_1.jpg',
                'description' => '<h2 class="mb-3">10 Tips For The Traveler</h2> <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis, eius mollitia suscipit, quisquam doloremque distinctio perferendis et doloribus unde architecto optio laboriosam porro adipisci sapiente officiis nemo accusamus ad praesentium? Esse minima nisi et. Dolore perferendis, enim praesentium omnis, iste doloremque quia officia optio deserunt molestiae voluptates soluta architecto tempora.</p>
                    <p>
                      <img src="images/image_7.jpg" alt="" class="img-fluid">
                    </p>
                    <p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
                    <h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
                    <p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
                    <p>
                      <img src="images/image_8.jpg" alt="" class="img-fluid">
                    </p>
                    <p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>
                    <p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>
                    <p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>
                    <p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>',

                'date' => Carbon::parse('11-08-2020'),
            ],
        ]);

        DB::table('post_post')->insert([
            [
                'id' => 1,
                'parent_id' => 1,
                'child_id' =>  2,
            ],
            [
                'id' => 2,
                'parent_id' => 1,
                'child_id' =>  3,
            ],
            [
                'id' => 3,
                'parent_id' => 1,
                'child_id' =>  4,
            ],
        ]);

        DB::table('categories')->insert([
            [
                'id' => 1,
                'slug' => 'cat_1',
                'title' => 'category 1',
                'description' => 'description'
            ],
            [
                'id' => 2,
                'slug' => 'cat_2',
                'title' => 'category 2',
                'description' => 'description'
            ],
        ]);

        DB::table('tags')->insert([
            [
                'id' => 1,
                'slug' => 'tag_1',
                'title' => 'tag 1',
                'description' => 'description tag'
            ],
            [
                'id' => 2,
                'slug' => 'tag_2',
                'title' => 'tag 2',
                'description' => 'description tag'
            ],
        ]);

        DB::table('post_category')->insert([
            [
                'id' => 1,
                'post_id' => 1,
                'category_id' => 1
            ],
            [
                'id' => 2,
                'post_id' => 1,
                'category_id' => 2
            ],
        ]);

        DB::table('post_tag')->insert([
            [
                'id' => 1,
                'post_id' => 1,
                'tag_id' => 1
            ],
            [
                'id' => 2,
                'post_id' => 1,
                'tag_id' => 2
            ],
        ]);

        DB::table('comments')->insert([
            [
                'id' => 1,
                'author' => 'Jon Andersen',
                'text' => 'Hello',
                'email' => 'email@email.com',
                'date' => Carbon::parse('11-08-2020'),
                'post_id' => 1,
                'parent_id' => null
            ],
            [
                'id' => 2,
                'author' => 'Jon Jonson',
                'text' => 'Hello World!',
                'email' => 'email@email.com',
                'date' => Carbon::parse('11-08-2020'),
                'post_id' => 2,
                'parent_id' => null
            ],
            [
                'id' => 3,
                'author' => 'Jon Andersen',
                'text' => 'Hello',
                'email' => 'email@email.com',
                'date' => Carbon::parse('11-08-2020'),
                'post_id' => 1,
                'parent_id' => 1
            ],
        ]);

        DB::table('pages')->insert([
            [
                'id' => 1,
                'slug' => 'page-1',
                'title' => 'Page 1',
                'image' => '/images/image_1.jpg',
                'description' => '<p>Molestiae cupiditate inventore animi, maxime sapiente optio, illo est nemo veritatis repellat sunt doloribus nesciunt! Minima laborum magni reiciendis qui voluptate quisquam voluptatem soluta illo eum ullam incidunt rem assumenda eveniet eaque sequi deleniti tenetur dolore amet fugit perspiciatis ipsa, odit. Nesciunt dolor minima esse vero ut ea, repudiandae suscipit!</p>
                    <h2 class="mb-3 mt-5">#2. Creative WordPress Themes</h2>
                    <p>Temporibus ad error suscipit exercitationem hic molestiae totam obcaecati rerum, eius aut, in. Exercitationem atque quidem tempora maiores ex architecto voluptatum aut officia doloremque. Error dolore voluptas, omnis molestias odio dignissimos culpa ex earum nisi consequatur quos odit quasi repellat qui officiis reiciendis incidunt hic non? Debitis commodi aut, adipisci.</p>
                    <p>
                      <img src="images/image_8.jpg" alt="" class="img-fluid">
                    </p>
                    <p>Quisquam esse aliquam fuga distinctio, quidem delectus veritatis reiciendis. Nihil explicabo quod, est eos ipsum. Unde aut non tenetur tempore, nisi culpa voluptate maiores officiis quis vel ab consectetur suscipit veritatis nulla quos quia aspernatur perferendis, libero sint. Error, velit, porro. Deserunt minus, quibusdam iste enim veniam, modi rem maiores.</p>
                    <p>Odit voluptatibus, eveniet vel nihil cum ullam dolores laborum, quo velit commodi rerum eum quidem pariatur! Quia fuga iste tenetur, ipsa vel nisi in dolorum consequatur, veritatis porro explicabo soluta commodi libero voluptatem similique id quidem? Blanditiis voluptates aperiam non magni. Reprehenderit nobis odit inventore, quia laboriosam harum excepturi ea.</p>
                    <p>Adipisci vero culpa, eius nobis soluta. Dolore, maxime ullam ipsam quidem, dolor distinctio similique asperiores voluptas enim, exercitationem ratione aut adipisci modi quod quibusdam iusto, voluptates beatae iure nemo itaque laborum. Consequuntur et pariatur totam fuga eligendi vero dolorum provident. Voluptatibus, veritatis. Beatae numquam nam ab voluptatibus culpa, tenetur recusandae!</p>
                    <p>Voluptas dolores dignissimos dolorum temporibus, autem aliquam ducimus at officia adipisci quasi nemo a perspiciatis provident magni laboriosam repudiandae iure iusto commodi debitis est blanditiis alias laborum sint dolore. Dolores, iure, reprehenderit. Error provident, pariatur cupiditate soluta doloremque aut ratione. Harum voluptates mollitia illo minus praesentium, rerum ipsa debitis, inventore?</p>',

                'date' => Carbon::parse('11-08-2020'),
            ],
            [
                'id' => 2,
                'slug' => 'page-2',
                'title' => 'Even the all-powerful Pointing has no control about the blind texts',
                'image' => '/images/image_2.jpg',
                'description' => 'description description description description description description',
                'date' => Carbon::parse('11-08-2020'),
            ]
        ]);
    }
}
