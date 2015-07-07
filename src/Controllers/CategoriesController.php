<?php

namespace Gmlo\CMS\Controllers;

use Carbon\Carbon;
use Gmlo\CMS\Modules\Categories\CategoriesRepo;
use Gmlo\CMS\Modules\Users\UsersRepo;
use Gmlo\CMS\Requests\CategoryRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class CategoriesController extends Controller
{
    protected $usersRepo;
    protected $categoriesRepo;
    protected $current_user;

    public function __construct(UsersRepo $usersRepo, CategoriesRepo $categoriesRepo, Guard $guard)
    {
        $this->usersRepo = $usersRepo;
        $this->categoriesRepo = $categoriesRepo;
        $this->current_user = $guard->user();
        $this->middleware('CMSAuthenticate');
    }


    public function index()
    {
        $categories = $this->categoriesRepo->paginate();
        return view('CMS::categories.index', compact('categories'));
    }

    public function create()
    {
        return view('CMS::categories.create');
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->categoriesRepo->storeNew($request->all());

        \Alert::success('CMS::categories.msg_category_created');
        return redirect()->route('CMS::admin.categories.edit', $category->id);
    }

    public function edit($id)
    {
        $category = $this->categoriesRepo->findOrFail($id);

        return view('CMS::categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = $this->categoriesRepo->findOrFail($id);
        $this->categoriesRepo->update($category, $request->all());

        \Alert::success('CMS::categories.msg_category_updated');
        return redirect()->route('CMS::admin.categories.edit', $category->id);
    }

    public function destroy($id)
    {
        $category = $this->categoriesRepo->findOrFail($id);
        $this->categoriesRepo->delete($category);
        \Alert::success("CMS::categories.msg_category_deleted");
        return redirect()->route('CMS::admin.categories.index');
    }
}
