<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use function GuzzleHttp\json_encode;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    protected $repository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Category $repository)
    {
        $this->repository = $repository;
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CategoryResource::collection($this->repository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);
        return  $this->repository->create([
            'name' => $request['name'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { //This methode is using to make api request to load all the category in item create and update component
        return response()->json($this->repository->all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255', 'unique:categories'],
        ]);
        $this->repository->findOrFail($id)->update($request->all());
        // return 'Updating data';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->repository->findOrFail($id)->delete();

        // return ['message' => 'Category Deleted Successfully'];
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function related($id)
    {
        $posts = Category::with('item')->find($id);

        // return $posts;
        return response()->json($posts);
    }
}
