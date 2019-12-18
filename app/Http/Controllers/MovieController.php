<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Img;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

use App\Review;
use App\User;
use App\Like;

class MovieController extends Controller
{
    function index()
    {
        $client = new Client();
        $url = 'https://api.themoviedb.org/3/movie/now_playing?';
        $params = [
            'api_key' => env('API_KEY'),
            'language' => 'ja-JP',
            'page' => 1,
        ];
        $response = $client->request(
            'GET',
            $url, // URLを設定
            [ 'query' => $params]// パラメーターがあれば設定
        );

        // $json = json_decode($response->getBody()->getContents());
        // dd($json->results);

        $results = json_decode($response->getBody()->getContents())->results;

        // getBody()コンテンツを取得します。
        // getContents()〜の内容を全て文字列に読み込む


        return view('movies.index', [
            'new_movies' => $results
            // 'movies_title' => $response -> getBody()
        ]);
    }

    function searchicon()
    {
        return view('movies.search', [
            'movies' => []
        ]);
    }

    function search(Request $request)
    {
        $client = new Client();
        $url = 'https://api.themoviedb.org/3/search/movie?';
        $params = [
            'api_key' => env('API_KEY'),
            'language' => 'ja-JP',
            'page' => 1,
            'query' => $request->movie_title,
            'include_adult' => false
        ];
        $response = $client->request(
            'GET',
            $url, // URLを設定
            [ 'query' => $params]// パラメーターがあれば設定
        );

        // $json = json_decode($response->getBody()->getContents());
        // dd($json->results);

        $results = json_decode($response->getBody()->getContents())->results;



        // getBody()コンテンツを取得します。
        // getContents()〜の内容を全て文字列に読み込む

        // usort 映画APIを昇順・降順に並べる
        if(isset($result))
        {
            usort($results, function($a, $b) {
                return $a->release_date > $b->release_date ? -1 : 1;
            });
        }

        // $request->session()->put('contact', $request->contact);
        // dd($request);

        return view('movies.search', [
            'movies' => $results
            // 'movies_title' => $response -> getBody()
        ]);
    }

    function review(int $id,Request $request)
    {
        env('API_KEY');
        $client = new Client();
        $url = 'https://api.themoviedb.org/3/movie/' . $id;
        $params = [
            'api_key' => env('API_KEY'),
            'language' => 'ja-JP',
            'page' => 1,
            'include_adult' => false
        ];
        $response = $client->request(
            'GET',
            $url, // URLを設定
            [ 'query' => $params]// パラメーターがあれば設定
        );

        $result = json_decode($response->getBody()->getContents());



        // User.php,Review.phpを１対多の関係で結びつけてmovie_idの情報をとってくる
        // $reviews = Review::with('user','likes')->where('movie_id', $id)->get();
        $reviews = Review::with('likes')->where('movie_id', $id)->orderBy('id', 'desc')->get();



        // movie_idセッション
        $request->session()->put('movie_id', $id);
        $request->session()->put('result', $result);



        return view('movies.review', [
            'id' => $result,
            'reviews' => $reviews,
            // 'movies_title' => $response -> getBody()
            // $request
        ]);


    }

    function exchange()
    {
        // $data = Img::all();
        $data = Img::where('category', 1)->get();
        return view('movies.exchange',
    ['data' => $data]);
    }

    function Mypage()
    {
        return view('movies.Mypage');
    }

    function review2(Request $request)
    {
        $request->session()->put('img1', $request->animal);
        $data = Img::where('category', 2)->get();
        return view('movies.review2',
    ['data' => $data]);
    }

    function match(Request $request)
    {
        // movie_idのセッションを使う
        $movie_id = $request->session()->get('movie_id');

        env('API_KEY');
        $client = new Client();
        $url = 'https://api.themoviedb.org/3/movie/' . $movie_id;
        $params = [
            'api_key' => env('API_KEY'),
            'language' => 'ja-JP',
            'page' => 1,
            'include_adult' => false
        ];
        $response = $client->request(
            'GET',
            $url, // URLを設定
            [ 'query' => $params]// パラメーターがあれば設定
        );
        $result = json_decode($response->getBody()->getContents());

        $img1 = $request->session()->get('img1');
        $request->session()->put('img2', $request->fruit);
        $img2 = $request->session()->get('img2');

        $user_id = Auth::user()->name;

        return view('movies.match',[
            'img1' => $img1,
            'img2' => $img2,
            'result' => $result,
            'user_id' => $user_id
        ]);
    }

    function register()
    {
        return view('movies.register');
    }

    function email()
    {
        return view('movies.email');
    }

    function login()
    {
        return view('movies.login');
    }

    function reset()
    {
        // $token = "test";
        // return view('movies.reset', ['token' => $token]);
        return view('movies.reset');
    }

    function verify()
    {
        return view('movies.verify');
    }


    function ChangeImage()
    {
        return view('movies.ChangeImage');
    }
    function confirm(Request $request)
    {
        $user_id = Auth::user()->id;

        $review = new Review;

        $movie_id = $request->session()->get('movie_id');
        $img1 = $request->session()->get('img1');
        $img2 = $request->session()->get('img2');

        $review->user_id = $user_id;
        $review->movie_id = $movie_id;
        $review->animal_img_path = $img1;
        $review->food_img_path = $img2;
        $review->save();
        return view('movies.confirm');
    }




     // いいねが押された時の処理
    // public 
    function like(int $id)
    {
        $review = Review::where('id', $id)->with('likes')->first();


        $review->likes()->attach(Auth::user()->id);

        // 通信が成功したことを返す
        return response()
            ->json(['success' => 'いいね完了！']);
    }

        // いいね解除が押された時の処理
    // public 
    function dislike(int $id)
    {
        // いいね解除された投稿の取得
        $review = Review::find($id);
        // detach：多対多のデータを削除するメソッド
        $review->likes()->detach(Auth::user()->id);
        // 通信が成功したことを返す
        return response()
            ->json(['success' => 'いいね解除完了！']);
    }

    function ranking()
    {
        $ranking1 = null;
        $ranking2 = null;
        $ranking3 = null;

        $movies = DB::table('reviews')
            ->select(DB::raw('count(*) as count, movie_id'))
            ->groupBy('movie_id')
            ->orderBy('count', 'desc')
            ->get();

            foreach ($movies as $movie)
            {
                $movie_id[] = $movie->movie_id;
            }
            foreach ($movie_id as $key => $value)
            {
                if($key == 0)
                {
                    env('API_KEY');
                    $client = new Client();
                    $url = 'https://api.themoviedb.org/3/movie/' . $value;
                    $params = [
                        'api_key' => env('API_KEY'),
                        'language' => 'ja-JP',
                        'page' => 1,
                        'include_adult' => false
                    ];
                    $response = $client->request(
                        'GET',
                        $url, // URLを設定
                        [ 'query' => $params]// パラメーターがあれば設定
                    );

                    $result = json_decode($response->getBody()->getContents());

                    $ranking1 = $result;
                }
            }
            foreach ($movie_id as $key =>$value)
            {
                if($key == 1)
                {
                    env('API_KEY');
                    $client = new Client();
                    $url = 'https://api.themoviedb.org/3/movie/' . $value;
                    $params = [
                        'api_key' => env('API_KEY'),
                        'language' => 'ja-JP',
                        'page' => 1,
                        'include_adult' => false
                    ];
                    $response = $client->request(
                        'GET',
                        $url, // URLを設定
                        [ 'query' => $params]// パラメーターがあれば設定
                    );

                    $result = json_decode($response->getBody()->getContents());
                    $ranking2 = $result;

                }
            }
            foreach ($movie_id as $key => $value)
            {
                if($key == 2)
                {
                    env('API_KEY');
                    $client = new Client();
                    $url = 'https://api.themoviedb.org/3/movie/' . $value;
                    $params = [
                        'api_key' => env('API_KEY'),
                        'language' => 'ja-JP',
                        'page' => 1,
                        'include_adult' => false
                    ];
                    $response = $client->request(
                        'GET',
                        $url, // URLを設定
                        [ 'query' => $params]// パラメーターがあれば設定
                    );

                    $result = json_decode($response->getBody()->getContents());
                    $ranking3 = $result;
                }
            }
            // dd($ranking1);
        return view('movies.ranking', [
            'ranking1' => $ranking1,
            'ranking2' => $ranking2,
            'ranking3' => $ranking3,
        ]);
    }

    // public 
    function rankinglike(int $id)
    {
        $rankinglike1 = null;
        $rankinglike2 = null;
        $rankinglike3 = null;

        $reviews = Review::with('likes')->where('movie_id' ,$id)->pluck('id');
        foreach($reviews as $key => $value)
        {
            $likes = Like::with('review')->where('review_id' ,$value)->get();
            $array1[] = $likes;
            $array2[] =$likes->pluck('review_id');

        }

        $str = array_flatten($array2);

        $counts = array_count_values($str);

        $collection = collect($counts);

        $sorted = $collection->sort();

        $reversed = $sorted->reverse();

        $a = $reversed->toArray();

        $b = array_keys($a);

        foreach ($b as $key => $value)
        {
            if($key == 0)
            {
                $rankinglike1 = Review::with('user')->where('id', $value)->get();
            }
        }
        foreach ($b as $key => $value)
        {
            if($key == 1)
            {
                $rankinglike2 = Review::with('user')->where('id', $value)->get();
            }
        }
        foreach ($b as $key => $value)
        {
            if($key == 2)
            {
                $rankinglike3 = Review::with('user','likes')->where('id', $value)->get();
            }
        }

        // dd($rankinglike3);
        // $rankings = DB::table('reviews')
        //                 ->select("reviews.*", DB::raw('COUNT(likes.*) as likesCount'))
        //                 ->join("likes", "reviews.id", "=", "likes.review_id")
        //                 ->groupBy("likes.reviews_id")
        //                 ->get();

        return view('movies.rankinglike',[
            'rankinglike1' => $rankinglike1,
            'rankinglike2' => $rankinglike2,
            'rankinglike3' => $rankinglike3,
        ]);
    }

}
