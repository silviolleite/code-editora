<?php

namespace App\Repositories;

use App\Criteria\CriteriaTrashedTrait;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Models\Book;

/**
 * Class BookRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class BookRepositoryEloquent extends BaseRepository implements BookRepository
{
    use CriteriaTrashedTrait;
    use RepositoryRestoreTrait;
    protected $fieldSearchable = [
      'title' => 'like',
        'user.name',
        'categories.name'
    ];

    public function create(array $attributes)
    {
        $model = parent::create($attributes); // TODO: Change the autogenerated stub
        $model->categories()->sync($attributes['categories']);
        return $model;
    }

    public function update(array $attributes, $id)
    {
        $model = parent::update($attributes, $id); // TODO: Change the autogenerated stub
        $model->categories()->sync($attributes['categories']);
        return $model;
    }


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Book::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
