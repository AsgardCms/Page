<?php namespace Modules\Page\Composers;

use Illuminate\Contracts\View\View;
use Illuminate\Filesystem\Filesystem;
use Modules\Core\Foundation\Theme\ThemeManager;

class TemplateViewComposer
{

    /**
     * @var ThemeManager
     */
    private $themeManager;
    /**
     * @var Filesystem
     */
    private $finder;

    public function __construct(ThemeManager $themeManager, Filesystem $finder)
    {
        $this->themeManager = $themeManager;
        $this->finder = $finder;
    }

    public function compose(View $view)
    {
        $view->with('all_templates', $this->getTemplates());
    }

    private function getTemplates()
    {
        $path = $this->getCurrentThemeBasePath();

        $templates = [];

        foreach ($this->finder->allFiles($path . '/views') as $template) {
            $relativePath = $template->getRelativePath();

            if ($this->isLayoutOrPartial($relativePath)) {
                continue;
            }

            $templateName = $this->getTemplateName($template);
            $file = $this->removeExtensionsFromFilename($template);

            if ($this->hasSubdirectory($relativePath)) {
                $templates[str_replace('/', '.', $relativePath) . '.' . $file] = $templateName;
            } else {
                $templates[$file] = $templateName;
            }

        }

        return $templates;
    }

    /**
     * Get the base path of the current theme.
     *
     * @return string
     */
    private function getCurrentThemeBasePath()
    {
        return $this->themeManager->find(setting('core::template'))->getPath();
    }

    /**
     * Read template name defined in comments.
     *
     * @param $template
     *
     * @return string
     */
    private function getTemplateName($template)
    {
        preg_match("/{{-- Template: (.*) --}}/", $template->getContents(), $templateName);

        if (count($templateName) > 1) {
            return $templateName[1];
        }

        return $this->getDefaultTemplateName($template);
    }

    /**
     * If the template name is not defined in comments, build a default.
     *
     * @param $template
     *
     * @return mixed
     */
    private function getDefaultTemplateName($template)
    {
        $relativePath = $template->getRelativePath();
        $fileName = $this->removeExtensionsFromFilename($template);

        return $this->hasSubdirectory($relativePath) ? $relativePath . '/' . $fileName : $fileName;
    }

    /**
     * Check if the given path is a layout or a partial.
     *
     * @param string $relativePath
     *
     * @return bool
     */
    private function isLayoutOrPartial($relativePath)
    {
        return preg_match("#(layouts|partials)#i", $relativePath) === 1;
    }

    /**
     * Remove the extension from the filename.
     *
     * @param $template
     *
     * @return mixed
     */
    private function removeExtensionsFromFilename($template)
    {
        return str_replace('.blade.php', '', $template->getFilename());
    }

    /**
     * Check if the relative path is not empty (meaning the template is in a directory).
     *
     * @param $relativePath
     *
     * @return bool
     */
    private function hasSubdirectory($relativePath)
    {
        return ! empty($relativePath);
    }

}
