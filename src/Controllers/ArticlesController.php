<?php

namespace Gmlo\CMS\Controllers;
use Carbon\Carbon;
use Gmlo\CMS\Modules\Articles\ArticlesRepo;
use Gmlo\CMS\Modules\Categories\CategoriesRepo;
use Gmlo\CMS\Requests\CreateArticle;
use Gmlo\CMS\Requests\UpdateArticle;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    private $articlesRepo;
    protected $categoriesRepo;

    public function __construct(ArticlesRepo $articlesRepo, CategoriesRepo $categoriesRepo)
    {
        $this->articlesRepo = $articlesRepo;
        $this->categoriesRepo = $categoriesRepo;
        $this->middleware('CMSAuthenticate');
        view()->share('categories', $this->categoriesRepo->lists('title', 'id'));
    }

    public function index()
    {
        $articles = $this->articlesRepo->orderBy('created_at', 'desc')->paginate(2);

        return view('CMS::articles.index', compact('articles'));
    }

    public function create()
    {
        return view('CMS::articles.create');
    }


    public function store(CreateArticle $request)
    {
        $article = $this->articlesRepo->storeNew($request->all());

        \Alert::success('CMS::articles.msg_article_created');
        return redirect()->route('CMS::admin.articles.edit', $article->id);
    }

    public function edit($id)
    {
        $article = $this->articlesRepo->findOrFail($id);

        return view('CMS::articles.edit', compact('article'));
    }


    public function update($id, UpdateArticle $request)
    {
        $article = $this->articlesRepo->findOrFail($id);
        $this->articlesRepo->update($article, $request->all());

        \Alert::success('CMS::articles.msg_article_updated');
        return redirect()->route('CMS::admin.articles.edit', $article->id);

    }

    public function destroy($id)
    {
        $article = $this->articlesRepo->findOrFail($id);
        $this->articlesRepo->delete($article);

        \Alert::success('CMS::articles.msg_article_deleted');
        return redirect()->route('CMS::admin.articles.index');
    }


    public function toggleStatus($id)
    {
        $article = $this->articlesRepo->findOrFail($id);
        $data = '';
        $message = null;
        if($article->published_at == null)
        {
            $data['published_at'] = Carbon::now();
            $message = 'CMS::articles.msg_article_published';
        }
        else
        {
            $data['published_at'] = null;
            $message = 'CMS::articles.msg_article_unpublished';
        }

        $this->articlesRepo->update($article, $data);
        \Alert::success($message);
        return redirect()->route('CMS::admin.articles.edit', $article->id);
    }
}
