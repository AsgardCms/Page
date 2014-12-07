<?php namespace Modules\Page\Http\Controllers;

use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Page\Repositories\PageRepository;

class PublicController extends BasePublicController
{

    /**
     * @var PageRepository
     */
    private $page;

    public function __construct(PageRepository $page)
    {
        parent::__construct();
        $this->page = $page;
    }

    public function uri($slug)
    {
        if ($slug == '/') {
            $page = $this->page->findHomepage();
        } else {
            $page = $this->page->findBySlug($slug);
        }
        if (is_null($page)) {

        }

        $template = $this->getTemplateForPage($page);

        return view($template, compact('page'));
    }

    private function getTemplateForPage($page)
    {
        return $page->template ?: 'default';
    }
}
