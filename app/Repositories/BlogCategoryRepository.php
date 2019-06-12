<?php
namespace App\Repositories;

use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;
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
        $collums = ['id', 'title', 'parent_id'];

        return $this
            ->startConditions()
            ->select($collums)
            ->paginate($perPage);
    }

    public function getForComboBox()
    {

        $collums = implode(', ', [
            'id',
            'CONCAT(id, ". ", title) AS id_title'
        ]);
        $result = $this
            ->startConditions()
            ->selectRaw($collums)
            ->toBase()
            ->get();

        return $result;
    }
}
