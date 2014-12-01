<?php namespace Modules\Page\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Page\Repositories\PageRepository;

class PageController extends AdminBaseController
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

    public function index()
    {
        $pages = $this->page->all();

        return View::make('page::admin.index', compact('pages'));
    }

}
