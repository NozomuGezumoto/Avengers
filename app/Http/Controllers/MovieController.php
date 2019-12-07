<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Img;
use Illuminate\Support\Facades\Auth;


use App\Review;
use App\User;

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

        $request->session()->put('contact', $request->contact);
        // dd($request);

        return view('movies.search', [
            'movies' => $results
            // 'movies_title' => $response -> getBody()
        ]);


    }


// touroku/ranking
//     function review(int $id)
// 下と被ってて、とりあえずコメントアウトしておきました。多分コッチ↑が要らないですかね？




    function review(int $id,Request $request
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
        $reviews = Review::with('user')->where('movie_id', $id)->get();
        // dd($reviews);


        // movie_idセッション
        $request->session()->put('movie_id', $id);


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

    function ranking()
    {
    
        return view('movies.ranking');
    }

}
