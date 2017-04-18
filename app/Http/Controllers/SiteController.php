<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Article;
use App\Banner;
use App\Catalog;
use App\Link;
use App\Notice;
use App\Resource;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class SiteController extends Controller
{

    /**
     * Site index
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $banners = Banner::orderBy('index')->get();
        $notices = Notice::where("publish_at", "<", Carbon::now())
            ->where("isPass", true)
            ->orderBy('publish_at', 'desc')
            ->get();
        $articles = Article::where("catalog", 1)
            ->where("publish_at", "<", Carbon::now())
            ->where("isPass", true)
            ->where("isSpecial", false)
            ->orderBy("isTop", "desc")
            ->orderBy('publish_at', 'desc')
            ->get();
        $links = Link::orderBy('index')->get();
        $advertisement = Advertisement::first();
        $catalogs = Catalog::where("isShow", true)
            ->where("pid", 0)
            ->get();
        $result = [
            'banners' => $banners,
            'notices' => $notices,
            'articles' => $articles,
            'links' => $links,
            'advertisement' => $advertisement,
            'catalogs' => $catalogs
        ];
        return view("site.index", $result);
    }

    /**
     * Notices List
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function noticesList()
    {
        $catalogNavs = Catalog::where("isShow", true)
            ->where("pid", 0)
            ->get();
        $notices = Notice::where("isPass", true)
            ->orderBy('publish_at', 'desc')
            ->paginate(7);
        $result = [
            "notices" => $notices,
            "catalogNavs" => $catalogNavs
        ];
        return view("site.noticesList", $result);
    }

    /**
     * Notice
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function notice($id)
    {
        $catalogNavs = Catalog::where("isShow", true)
            ->where("pid", 0)
            ->get();
        $notice = Notice::find($id);
        $result = [
            "notice" => $notice,
            "catalogNavs" => $catalogNavs
        ];
        return view("site.notice", $result);
    }

    /**
     * Articles List
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function articlesList($id)
    {
        $articles = Article::where("catalog", $id)
            ->where("publish_at", "<", Carbon::now())
            ->where("isPass", true)
            ->where("isSpecial", false)
            ->orderBy("isTop", "desc")
            ->orderBy('publish_at', 'desc')
            ->paginate(7);
        $catalog = Catalog::find($id);
        $catalogNavs = Catalog::where("isShow", true)
            ->where("pid", 0)
            ->get();
        $result = [
            "articles" => $articles,
            "catalog" => $catalog,
            "catalogNavs" => $catalogNavs
        ];
        return view("site.articlesList", $result);
    }

    /**
     * Article
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function article($id)
    {
        $article = Article::find($id);
        $catalog = $article->Catalog;
        $catalogNavs = Catalog::where("isShow", true)
            ->where("pid", 0)
            ->get();
        $result = [
            "article" => $article,
            "catalog" => $catalog,
            "catalogNavs" => $catalogNavs
        ];
        return view("site.article", $result);
    }

    /**
     * 教务处
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function jwc()
    {
        $resources = Resource::where("isPass", true)
            ->orderBy("id", "desc")
            ->get();
        $banner = Banner::first();
        $notices = Notice::where("publish_at", "<", Carbon::now())
            ->where("isPass", true)
            ->orderBy('publish_at', 'desc')
            ->get();
        $articles = Article::where("catalog", 1)
            ->where("publish_at", "<", Carbon::now())
            ->where("isPass", true)
            ->where("isSpecial", false)
            ->orderBy("isTop", "desc")
            ->orderBy('publish_at', 'desc')
            ->get();
        $catalogs = Catalog::where("isShow", true)
            ->where("pid", 0)
            ->get();
        $result = [
            'banner' => $banner,
            'notices' => $notices,
            'articles' => $articles,
            'catalogs' => $catalogs,
            "resources" => $resources
        ];
        return view("site.jwc", $result);
    }

    /**
     * 纪念馆
     *
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function jng()
    {
        $resources = Resource::where("isPass", true)
            ->orderBy("id", "desc")
            ->get();
        $banner = Banner::first();
        $notices = Notice::where("publish_at", "<", Carbon::now())
            ->where("isPass", true)
            ->orderBy('publish_at', 'desc')
            ->get();
        $articles = Article::where("catalog", 2)
            ->where("publish_at", "<", Carbon::now())
            ->where("isPass", true)
            ->where("isSpecial", false)
            ->orderBy("isTop", "desc")
            ->orderBy('publish_at', 'desc')
            ->get();
        $catalogs = Catalog::where("isShow", true)
            ->where("pid", 0)
            ->get();
        $result = [
            'banner' => $banner,
            'notices' => $notices,
            'articles' => $articles,
            'catalogs' => $catalogs,
            "resources" => $resources
        ];
        return view("site.jng", $result);
    }

    /**
     * @return string
     */
    public function create(Request $request)
    {
        $banner = Banner::create($request->all());
        return response()->json(
            [
                'status' => "success",
                'banner' => $banner
            ]);
    }

    /**
     * @return string
     */
    public function delete($id)
    {
        Banner::destroy($id);
        return response()->json(
            [
                'status' => "success"
            ]);
    }
}
