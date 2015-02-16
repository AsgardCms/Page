<?php namespace Modules\Page\Repositories;

use Modules\Core\Repositories\BaseRepository;

interface PageRepository extends BaseRepository
{
    /**
     * Find the page set as homepage
     * @return object
     */
    public function findHomepage();

    /**
     * Count all records
     * @return int
     */
    public function countAll();
}
