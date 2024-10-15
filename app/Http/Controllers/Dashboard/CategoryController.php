<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

        $categories = Category::paginate();

        return view('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Category::create($request->validated());

        return to_route('category.index');
    }

   
    public function show(Category $category)
    {
        //
    }

  
    public function edit(Category $category)
    {
        return view('dashboard.category.edit', compact('category'));
    }

   
    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());

        return to_route('category.index');

    }

    
    public function destroy(Category $category)
    {
        $category->delete();
        
        return to_route('category.index');

    }
}
