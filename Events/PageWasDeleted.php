<?php namespace Modules\Page\Events;

class PageWasDeleted
{
    /**
     * @var int
     */
    public $pageId;

    public function __construct($pageId)
    {
        $this->pageId = $pageId;
    }
}
