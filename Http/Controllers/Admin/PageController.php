<?php namespace Modules\Page\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Page\Http\Requests\CreatePageRequest;
use Modules\Page\Http\Requests\UpdatePageRequest;
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

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('page::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePageRequest $request
     * @return Response
     */
    public function store(CreatePageRequest $request)
    {
        $this->page->create($request->all());

        Flash::success(trans('page::messages.page created'));

        return Redirect::route('admin.page.page.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $page
     * @return Response
     */
    public function edit($page)
    {
        $this->assetPipeline->requireJs('ckeditor.js');
        $this->assetPipeline->requireCss('icheck.blue.css');

        return View::make('page::admin.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $page
     * @param  UpdatePageRequest $request
     * @return Response
     */
    public function update($page, UpdatePageRequest $request)
    {
        $this->page->update($page, $request->all());

        Flash::success(trans('page::messages.page updated'));

        return Redirect::route('admin.page.page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $page
     * @return Response
     */
    public function destroy($page)
    {
        $this->page->destroy($page);

        Flash::success(trans('page::messages.page deleted'));

        return Redirect::route('admin.page.page.index');
    }
}
