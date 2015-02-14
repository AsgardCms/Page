<?php namespace Modules\Page\Composers;

use Illuminate\Contracts\View\View;
use Maatwebsite\Sidebar\SidebarGroup;
use Maatwebsite\Sidebar\SidebarItem;
use Modules\Core\Composers\BaseSidebarViewComposer;

class SidebarViewComposer extends BaseSidebarViewComposer
{
    public function compose(View $view)
    {
        $view->sidebar->group('Pages', function (SidebarGroup $group) {
            $group->enabled = false;
            $group->weight = 5;

            $group->addItem('Pages', function (SidebarItem $item) {
                // $item->append('admin.page.page.create');
                $item->route('admin.page.page.index');
                $item->icon = 'fa fa-file';
                $item->name = 'Pages';
                $item->authorize(
                    $this->auth->hasAccess('page.pages.index')
                );
            });
        });
    }
}
