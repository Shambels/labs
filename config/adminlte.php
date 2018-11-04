<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'AdminLTE 2',

    'title_prefix' => '',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Admin</b>LTE',

    'logo_mini' => '<b>A</b>LT',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'purple',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => '',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [
        'WEBSITE',
        [
            'text' => 'Blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ],
        [
            
            'text' => 'Summary',
            'icon' => 'eye',
            'url'  => 'admin/home',
        ],
        [
            'text'        => 'Pages',
            'icon'        => 'file',
            'label'       => 4,
            'label_color' => 'success',
            'submenu'     => [
            [
              'text' => 'Home',
              'url' => 'admin/edit/homepage',
              'icon' => 'home',
              
            ],
            [
              'text' => 'Services',
              'url' => 'admin/edit/servicespage',
              'icon' => 'flask'
            ], 
            [
              'text' => 'Blog',
              'url' => 'admin/edit/blogpage',
              'icon' => 'rss'
            ], 
            [
              'text' => 'Contact',
              'url' => 'admin/edit/contactpage',
              'icon' => 'envelope'
            ], 
            ]         
        ],
       
        'CONTACT',
        [
            'text' => 'Inbox',
            'url'  => 'admin/inbox',
            'icon' => 'envelope',
        ],
        [
            'text' => 'Newsletter',
            'url'  => 'admin/settings',
            'icon' => 'envelope-square',
        ],

        'LISTS',
        [
            'text' => 'Users',
            'url'  => 'admin/list/users',
            'icon' => 'user',
        ],
        [
          'text' => 'Services',
          'url' => 'admin/list/services',
          'icon' => 'taxi',          
        ],[
          'text' => 'Projects',
          'url' => 'admin/list/projects',
          'icon' => 'umbrella',          
        ],[
          'text' => 'Articles',
          'url' => 'admin/list/articles',
          'icon' => 'newspaper',          
        ],[
          'text' => 'Categories',
          'url' => 'admin/list/categories',
          'icon' => 'sort',          
        ],
        [
          'text' => 'Tags',
          'url' => 'admin/list/tags',
          'icon' => 'tags',          
        ],
        [
          'text' => 'Images',
          'url' => 'admin/list/images',
          'icon' => 'image',          
        ],
        [
          'text' => 'Trash Can',
          'icon' => 'trash-alt',
          'submenu' =>[
            [
              'text' => 'Users',
              'url'  => 'admin/trash/users',
              'icon' => 'user',
          ],
          [
            'text' => 'Services',
            'url' => 'admin/trash/services',
            'icon' => 'taxi',          
          ],[
            'text' => 'Projects',
            'url' => 'admin/trash/projects',
            'icon' => 'umbrella',          
          ],[
            'text' => 'Articles',
            'url' => 'admin/trash/articles',
            'icon' => 'newspaper',          
          ],[
            'text' => 'Categories',
            'url' => 'admin/trash/categories',
            'icon' => 'sort',          
          ],
          [
            'text' => 'Tags',
            'url' => 'admin/trash/tags',
            'icon' => 'tags',          
          ],          
          [
            'text' => 'Images',
            'url' => 'admin/trash/images',
            'icon' => 'image',          
          ],
          ]
        ],
        'ACCOUNT SETTINGS',
        [
            'text' => 'Profile',
            'url'  => 'admin/settings',
            'icon' => 'user',
        ],
        [
            'text' => 'Change Password',
            'url'  => 'admin/settings',
            'icon' => 'lock',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
