<?php namespace Modules\Page\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Page\Http\Requests\CreatePageRequest;
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
     * @param CreatePageRequest $request
     *
     * @return Response
     */
    public function store(CreatePageRequest $request)
    {
        $this->page->create($request->all());

        Flash::success(trans('page::messages.page created'));
        return Redirect::route('dashboard.page.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $page
     *
     * @return Response
     */
    public function edit($page)
    {
        return View::make('page::admin.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
