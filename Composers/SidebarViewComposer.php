<?php namespace Modules\Page\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;
use Modules\Page\Repositories\PageRepository;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group(trans('core::sidebar.content'), function (SidebarGroup $group) {
            $group->addItem(trans('page::pages.title.pages'), function (SidebarItem $item) {
                $item->icon = 'fa fa-file';
                $item->weight = 1;
                $item->route('admin.page.page.index');
                $item->badge(function ($append, PageRepository $page) {
                    $append->value = $page->countAll();
                });
                $item->authorize(
                    $this->auth->hasAccess('page.pages.index')
                );
            });
        });
    }
}
