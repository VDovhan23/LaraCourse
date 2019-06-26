<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;

class DiggingDeeperController extends Controller
{
    /**
     * collections
     *
     * Undocumented function long description
     *
     * https://laravel.com/docs/5.8/collections
     *
     **/
    public function collections()
    {
        $eloquentCollection = BlogPost::withTrashed()->get();

        $collection = collect($eloquentCollection);



        // dd(
        //     get_class($collection),
        //     get_class($eloquentCollection),
        //     $collection
        // );

        // $result['where']['data'] = $collection
        //     ->where('category_id', 5)
        //     ->values()
        //     ->keyBy('id');

        // $result['where']['count'] = $result['where']['data']->count();
        // $result['where']['isEmpty'] = $result['where']['data']->isEmpty();
        // $result['where']['isNotEmpty'] = $result['where']['data']->isNotEmpty();


        // $result['where']['where_first'] = $collection
        //     ->firstWhere('user_id', '1');


            $filter = $collection->filter(function ($item)
            {
                $byDay = $item->created_at->isMonday();
                $byDate = $item->created_at->day==1;

                $rez = $byDay && $byDate ;
                return $rez;

            });


            dd(compact ('filter'));
        }
    }
