<?php
namespace App\Repositories;

use App\Models\BlogPost as Model;

use App\Repositories\CoreRepository;

class BlogPostRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllWithPaginate()
    {

        $columns = ['id', 'title', 'slug', 'is_published', 'published_at', 'user_id', "category_id"];
        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id', "DESC")
            ->paginate(25);

        return $result;
    }
}
