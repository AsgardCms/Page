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
                'body' => '<p><strong>You made it!</strong></p>
<p>You&#39;ve installed AsgardCMS and are ready to proceed to the <a href="http://asgard-test1/en/backend">administration area</a>.</p>
<h2>What&#39;s next ?</h2>
<p>Learn how you can develop modules for AsgardCMS by reading our <a href="https://github.com/AsgardCms/Documentation">documentation</a>.</p>
',
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
