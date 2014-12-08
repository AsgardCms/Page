<?php namespace Modules\Page\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Page\Repositories\PageRepository;

class BasePageDatabaseSeeder extends Seeder
{

    /**
     * @var PageRepository
     */
    private $page;

    public function __construct(PageRepository $page)
    {
        $this->page = $page;
    }

    public function run()
    {
        $data = [
            'template' => 'home',
            'is_home' => 1,
            'en' => [
                'title' => 'Home page',
                'slug' => 'home',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum iure necessitatibus repellat sapiente sit. Alias dolore id, nam odit reiciendis similique vel voluptatem! Alias assumenda beatae doloremque iste magni provident quae reiciendis saepe tempora voluptatibus! Animi, asperiores consectetur cum delectus explicabo fuga neque, quam quidem reiciendis similique unde voluptates! Quibusdam.',
                'meta_title' => 'Home page'
            ],
            'fr' => [
                'title' => 'Page d\'accueil',
                'slug' => 'accueil',
                'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum iure necessitatibus repellat sapiente sit. Alias dolore id, nam odit reiciendis similique vel voluptatem! Alias assumenda beatae doloremque iste magni provident quae reiciendis saepe tempora voluptatibus! Animi, asperiores consectetur cum delectus explicabo fuga neque, quam quidem reiciendis similique unde voluptates! Quibusdam.',
                'meta_title' => 'Page d\'accueil',
            ],
        ];
        $this->page->create($data);
    }
}
