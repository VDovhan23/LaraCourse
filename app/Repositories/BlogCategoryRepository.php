<?php
namespace App\Repositories;

use App\Models\BlogCategory as Model;
use App\Repositories\CoreRepository;

class BlogCategoryRepository extends CoreRepository
{

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        return $this
            ->startConditions()
            ->select($columns)
            ->paginate($perPage);
    }

    public function getForComboBox()
    {

        $columns = implode(', ', [
            'id',
            'CONCAT(id, ". ", title) AS id_title'
        ]);
        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }
}
