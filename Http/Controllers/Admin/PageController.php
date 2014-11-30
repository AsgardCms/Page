<?php namespace Modules\Page\Http\Controllers\Admin;

use Illuminate\Support\Facades\View;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PageController extends AdminBaseController
{

    public function index()
    {
        return View::make('page::admin.index');
    }

}
