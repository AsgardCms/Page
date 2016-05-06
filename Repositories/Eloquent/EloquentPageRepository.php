<?php namespace Modules\Page\Repositories\Eloquent;

use Illuminate\Database\Eloquent\Builder;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Modules\Page\Events\PageWasCreated;
use Modules\Page\Events\PageWasUpdated;
use Modules\Page\Repositories\PageRepository;

class EloquentPageRepository extends EloquentBaseRepository implements PageRepository
{
    /**
     * Find the page set as homepage
     * @return object
     */
    public function findHomepage()
    {
        return $this->model->where('is_home', 1)->first();
    }

    /**
     * Count all records
     * @return int
     */
    public function countAll()
    {
        return $this->model->count();
    }

    /**
     * @param  mixed  $data
     * @return object
     */
    public function create($data)
    {
        $page = $this->model->create($data);

        event(new PageWasCreated($page->id, $data));

        return $page;
    }

    /**
     * @param $model
     * @param  array  $data
     * @return object
     */
    public function update($model, $data)
    {
        $model->update($data);

        event(new PageWasUpdated($model->id, $data));

        return $model;
    }

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findBySlugInLocale($slug, $locale)
    {
        if (method_exists($this->model, 'translations')) {
            return $this->model->whereHas('translations', function (Builder $q) use ($slug, $locale) {
                $q->where('slug', $slug);
                $q->where('locale', $locale);
            })->with('translations')->first();
        }

        return $this->model->where('slug', $slug)->where('locale', $locale)->first();
    }
}
