<?php

use Illuminate\Database\Seeder;

class TextSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('texts')->insert([
          'homesection' => 'Home',
          'servicessection' => 'Services',
          'blogsection' => 'Blog',
          'contactsection' => 'Contact',
          'carouseltext' => 'Get your freebie template now!',
          'discovertitle' => 'Get in <span>the Lab</span> and discover the world' ,
          'discoverleft' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est, feugiat nec elementum id, suscipit id nulla. Nulla sit amet luctus dolor. Etiam finibus consequat ante ac congue. Quisque porttitor porttitor tempus. Donec maximus ipsum non ornare vporttitor porttitorestibulum. Sed libero nibh, feugiat at enim id, bibendum sollicitudin arcu.',
          'discoverright' => 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum. Nam convallis vel erat id dictum. Sed ut risus in orci convallis viverra a eget nisi. Aenean pellentesque elit vitae eros dignissim ultrices. Quisque porttitor porttitorlaoreet vel risus et luctus.',
          'browseblog' => 'Browse',
          'browseservices' => 'Browse',
          'browsestandout' => 'Browse',
          'browseservices2' => 'Browse',
          'newstitle' => 'Newsletter',
          'newsplaceholder' => 'Your e-mail here',
          'newsbtn' => 'Newsletter',
          'video' => 'https://www.youtube.com/watch?v=JgHfx2v9zOU',
          'testimonial' => 'What our clients say',
          'services' => 'Get in <span>the Lab</span> and see the services',
          'team' => 'Get in <span>the Lab</span> and  meet the team',
          'standouttitle' => 'Are you ready to stand out?',
          'standouttext' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo est.',
          'services2' => 'Get in <span>the Lab</span> and  discover the world',
          'categories' => 'Categories',
          'instagram' => 'Instagram',
          'tags' => 'Tags',
          'quote' => 'Quote',
          'ad' => 'Ad',
          'leavecom' => 'Leave a comment',
          'sendbtn' => 'send',
          'readmorebtn' => 'Read More',
          'contacttitle' => 'CONTACT US',
          'contacttext' => 'Cras ex mauris, ornare eget pretium sit amet, dignissim et turpis. Nunc nec maximus dui, vel suscipit dolor. Donec elementum velit a orci facilisis rutrum.',
          'contactoffice' => 'Main Office',
          'contactaddress' =>'C/ Libertad, 34 ',
          'contacttown' => '05200 Arévalo',
          'contactphone' => '0034 37483 2445 322',
          'contactemail' => 'hello@company.com',
          'contactformbtn' => 'send',
          'copyright' => '2017 All rights reserved. Designed by',
          'copyrightlink' => 'Colorlib',
          'copyrighturl' => 'https://colorlib.com/'

        ]);
    }
}
