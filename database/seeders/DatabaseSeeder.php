<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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

        $user = User::factory()->create([
            'username' => 'JohnDoe'
        ]);

        Post::factory(3)->create([
            'user_id' => $user
        ]);

        Comment::factory(4)->create();

//        User::truncate();
//        Category::truncate();
//        Post::truncate();

//        $user = User::factory()->create();
//
//        $kisisel = Category::create([
//            'name' => 'Kişisel',
//            'slug' => 'kisisel'
//        ]);
//
//        $guncel = Category::create([
//            'name' => 'Güncel',
//            'slug' => 'guncel'
//        ]);
//
//        $extrem = Category::create([
//            'name' => 'Extrem',
//            'slug' => 'extrem'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $kisisel->id,
//            'title' => 'Kişisel Blog Yazısı',
//            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Convallis tellus id interdum velit laoreet. Tellus in hac habitasse platea dictumst vestibulum rhoncus est pellentesque.',
//            'slug' => 'kisisel-blog-yazisi',
//            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc consequat interdum varius sit amet mattis vulputate enim nulla. In fermentum posuere urna nec tincidunt. Eleifend mi in nulla posuere. Dignissim convallis aenean et tortor at. Ac turpis egestas sed tempus urna et pharetra. Urna cursus eget nunc scelerisque viverra mauris in. Mollis nunc sed id semper. Leo a diam sollicitudin tempor id. Sed vulputate mi sit amet mauris. Dolor morbi non arcu risus quis. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Nisl suscipit adipiscing bibendum est ultricies integer quis auctor. Etiam non quam lacus suspendisse faucibus interdum. Eget nulla facilisi etiam dignissim.'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $guncel->id,
//            'title' => 'Güncel Blog Yazısı',
//            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Convallis tellus id interdum velit laoreet. Tellus in hac habitasse platea dictumst vestibulum rhoncus est pellentesque.',
//            'slug' => 'guncel-blog-yazisi',
//            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc consequat interdum varius sit amet mattis vulputate enim nulla. In fermentum posuere urna nec tincidunt. Eleifend mi in nulla posuere. Dignissim convallis aenean et tortor at. Ac turpis egestas sed tempus urna et pharetra. Urna cursus eget nunc scelerisque viverra mauris in. Mollis nunc sed id semper. Leo a diam sollicitudin tempor id. Sed vulputate mi sit amet mauris. Dolor morbi non arcu risus quis. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Nisl suscipit adipiscing bibendum est ultricies integer quis auctor. Etiam non quam lacus suspendisse faucibus interdum. Eget nulla facilisi etiam dignissim.'
//        ]);
//
//        Post::create([
//            'user_id' => $user->id,
//            'category_id' => $extrem->id,
//            'title' => 'Extrem Blog Yazısı',
//            'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Convallis tellus id interdum velit laoreet. Tellus in hac habitasse platea dictumst vestibulum rhoncus est pellentesque.',
//            'slug' => 'extrem-blog-yazisi',
//            'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Nunc consequat interdum varius sit amet mattis vulputate enim nulla. In fermentum posuere urna nec tincidunt. Eleifend mi in nulla posuere. Dignissim convallis aenean et tortor at. Ac turpis egestas sed tempus urna et pharetra. Urna cursus eget nunc scelerisque viverra mauris in. Mollis nunc sed id semper. Leo a diam sollicitudin tempor id. Sed vulputate mi sit amet mauris. Dolor morbi non arcu risus quis. Habitasse platea dictumst vestibulum rhoncus est pellentesque elit. Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Nisl suscipit adipiscing bibendum est ultricies integer quis auctor. Etiam non quam lacus suspendisse faucibus interdum. Eget nulla facilisi etiam dignissim.'
//        ]);

    }
}
