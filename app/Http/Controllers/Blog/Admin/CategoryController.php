<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Http\Requests\BlogCategoryCreateRequest;
use App\Repositories\BlogCategoryRepository;

class CategoryController extends BaseController
{
    private $blogCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->blogCategoryRepository = app(blogCategoryRepository::class);
    }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $paginate = BlogCategory::paginate(10);
        $paginate =  $this->blogCategoryRepository->getAllWithPaginate(5);
        return view('blog.admin.categories.index', compact("paginate"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new BlogCategory;
        $categoryList = $this->blogCategoryRepository->getForComboBox();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryCreateRequest $request)
    {
        $data =  $request->input();
        empty($data['slug']) ? $data['slug'] = str_slug($data['tuitle']) : '';

        $item = (new BlogCategory())->create($data);

        if ($item) {
            return redirect()->route('blog.admin.categories.edit', [$item->id])
                ->with(['success' => "Saved"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Seve is failed'])
                ->withInput();
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, BlogCategoryRepository $categoryRepository)
    {
        // $item = BlogCategory::findOrFail($id);
        // $categoryList = BlogCategory::all();


        $item = $categoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $categoryList = $categoryRepository->getForComboBox();

        return view('blog.admin.categories.edit', compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {

        $item = $this->blogCategoryRepository->getEdit($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => 'Record with id=' . $id . ' not found'])
                ->withInput();
        }

        $data = $request->all();
        $result = $item
            ->update($data);

        if ($result) {
            return redirect()
                ->route('blog.admin.categories.edit', $item->id)
                ->with(['success' => "Updated"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Seve is failed'])
                ->withInput();
        }
    }
}
