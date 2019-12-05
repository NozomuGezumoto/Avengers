<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


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


 // ❤アイコンを押して、フォロワーページに飛べるように。
    function hearticon()
    {
        // $users = User::find(1)->reviews;
        // dd($users);
        return view('movies.follower');
    }




    function review(int $id, Request $request)
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

        $reviews = Review::with('user')->where('movie_id', $id)->get();


        return view('movies.review', [
            'id' => $result,
            'reviews' => $reviews,
            // 'movies_title' => $response -> getBody()
        ]);


    }

    function exchange()
    {
        // dd($request);
        return view('movies.exchange');
    }
    function Mypage()
    {
        return view('movies.Mypage');
    }
    function review2()
    {
        return view('movies.review2');
    }
    function match()
    {
        return view('movies.match');
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

}
