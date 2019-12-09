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
        usort($results, function($a, $b) {
            return $a->release_date > $b->release_date ? -1 : 1;
        });

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
    public function like(int $id)
    {
        $review = Review::where('id', $id)->with('likes')->first();


        $review->likes()->attach(Auth::user()->id);

        // 通信が成功したことを返す
        return response()
            ->json(['success' => 'いいね完了！']);
    }
        // いいね解除が押された時の処理
    public function dislike(int $id)
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
        $reviews = Review::all()->pluck('movie_id');
        $flat = $reviews->toArray();
        // dd($flat);//カウントできる形に変換

        $counts = array_count_values($flat);
        // dd($counts);//複数の投稿をまとめてカウント

        $collection = collect($counts);
        // dd($collection);collectでsortを使えるようにする

        $sorted = $collection->sort()->all();
        //dd($sorted);値(投稿数)を元に降順に表示
        $value_key = array_keys($sorted);
        //dd($value_key);値(投稿数)を0〜に変更・key=>値を反転
        $maxkey = max(array_keys($value_key));
        //dd($maxkey);keyの0〜の最大値を取得

        foreach($value_key as $key => $value)
        {
            if($maxkey == $key)
            {
                $movie_key1 = $key;
            }elseif($maxkey-1 == $key)
            {
                $movie_key2 = $key;
            }elseif($maxkey-2 == $key)
            {
                $movie_key3 = $key;
            }
        }
        foreach($value_key as $key => $value)
        {
            if($movie_key1 == $key)
            {
                $movie_id1 = $value;
                env('API_KEY');
                $client = new Client();
                $url = 'https://api.themoviedb.org/3/movie/' . $movie_id1;
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

            }elseif($movie_key2 == $key)
            {
                $movie_id2 = $value;
                env('API_KEY');
                $client = new Client();
                $url = 'https://api.themoviedb.org/3/movie/' . $movie_id2;
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

            }elseif($movie_key3 == $key)
            {
                $movie_id3 = $value;
                env('API_KEY');
                $client = new Client();
                $url = 'https://api.themoviedb.org/3/movie/' . $movie_id3;
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
                // dd($ranking3);
            }
        }
        return view('movies.ranking', [
            'ranking1' => $ranking1,
            'ranking2' => $ranking2,
            'ranking3' => $ranking3
        ]);

    }
    public function rankinglike(int $id)
    {
        // $reviews = Review::all()->pluck('movie_id');
        // $flat = $reviews->toArray();
        // $reviews = Review::with('likes')->where('movie_id', $id)->orderBy('id', 'desc')->get();
 
        $i = 0;
        $array1 = array();
        $reviews = Review::with('likes')->where('movie_id' ,$id)->pluck('id');
        foreach($reviews as $key => $value)
        {
            $likes = Like::with('review')->where('review_id' ,$value)->get();
            $array1[] = $likes;
            $count1[] = count($likes);
            $array2[] =$likes->pluck('review_id');

        }
        $str = array_flatten($array2);

        $counts = array_count_values($str);

        // $a = collect($counts);

        $b = arsort($counts);



        // dd($b);

        return view('movies.rankinglike',[
        ]);
    }

}
