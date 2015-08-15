<?php

namespace Modules\Page\Composers;

use Illuminate\Contracts\View\View;
use Modules\Core\Foundation\Theme\ThemeManager;

class TemplateViewComposer
{

    /**
     * @var ThemeManager
     */
    private $themeManager;

    public function __construct(ThemeManager $themeManager)
    {
        $this->themeManager = $themeManager;
    }

    public function compose(View $view)
    {
        $view->with('all_templates', $this->getTemplates());
    }

    private function getTemplates()
    {
        //Get the base path of the current theme.
        $path = $this->themeManager->find(setting('core::template'))->getPath();

        //This is what we will pass to the view.
        $templates = [];

        foreach (\File::allFiles($path . '/views') as $template) {
            //This is the name of the directory that contains the file.
            //It is an empty string when the file is in the root {Theme}/views directory.
            $relativePath = $template->getRelativePath();

            //Don't show partials or the base layouts, since you typically wouldn't select them as the template for a page.
            if (preg_match("#(layouts|partials)#i", $relativePath) === 0) {
                //Get the template name. Remove the '.blade.php' suffix, since it isn't needed (and might confuse users).
                $file = str_replace('.blade.php', '', $template->getFilename());
                //If the relative path is not empty (meaning the template is in a directory),
                //we need to prepend it to our template name. Otherwise, just add the file to the templates array.
                if (! empty($relativePath)) {
                    $templates[$relativePath . '.' . $file] = $relativePath . '/' . $file;
                } else {
                    $templates[$file] = $file;
                }
            }
        }

        return $templates;
    }

}
