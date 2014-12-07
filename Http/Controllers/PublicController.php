<?php namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Page\Repositories\PageRepository;

class PublicController extends BasePublicController
{

    /**
     * @var PageRepository
     */
    private $page;
    /**
     * @var Application
     */
    private $app;

    public function __construct(PageRepository $page, Application $app)
    {
        parent::__construct();
        $this->page = $page;
        $this->app = $app;
    }

    public function uri($slug)
    {
        dd('ok?');
        if ($slug == '/') {
            $page = $this->page->findHomepage();
        } else {
            $page = $this->page->findBySlug($slug);
        }
        if (is_null($page)) {
            $this->app->abort('404');
        }

        $template = $this->getTemplateForPage($page);

        return view($template, compact('page'));
    }

    public function homepage()
    {
        dd('homepage');
    }

    private function getTemplateForPage($page)
    {
        return $page->template ?: 'default';
    }
}
