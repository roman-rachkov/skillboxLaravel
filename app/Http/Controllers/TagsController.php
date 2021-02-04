<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TagsController extends Controller
{

    /**
     * Выводит список новостей и постов по данному тегу
     *
     * !!ВОПРОС!!: Михаил, как сделать тут будет правильнее все таки?
     * При таком подходе из-за того что не вызываются методы пагинации мы выгружаем полностью все подходящее
     * новости и посты, но если их на теге будет более 10000? Время обработки запроса заметно увеличится, и еще получается
     * что эта выборка происходит для каждой страницы. Я так понимаю для оптимизации все таки стоит делать через фасад DB?
     *
     * @param Tag $tag
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Tag $tag)
    {
        $posts = $tag->posts()->with('tags')->published()->latest()->get();
        $posts = $posts->merge($tag->news()->with('tags')->published()->latest()->get());
        $posts->sortBy(['created_at', 'desc']);
        $perPage = config('skillbox.results_per_page');

        $offset = null;
        if (\request()->has('page')) {
            $offset = (\request('page') - 1) * $perPage;
        }

        $total = count($posts);

        $posts = $posts->slice($offset, $perPage);
        $posts = new LengthAwarePaginator($posts, $total, $perPage, \request('page'));
        $posts->withPath('/tags/'.$tag->name);

        return view('index', [
            'posts' => $posts,
            'title' => $tag->name,
        ]);
    }
}
