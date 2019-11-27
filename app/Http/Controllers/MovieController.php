<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

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

        // dd($results);
        // getBody()コンテンツを取得します。
        // getContents()〜の内容を全て文字列に読み込む

        return view('movies.index', [
            'new_movies' => $results
            // 'movies_title' => $response -> getBody()
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

        // dd($results);
        // getBody()コンテンツを取得します。
        // getContents()〜の内容を全て文字列に読み込む

        return view('movies.seach', [
            'movies' => $results
            // 'movies_title' => $response -> getBody()
        ]);


    }

    function review(int $id)
    {
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

        return view('movies.review', [
            'id' => $result
            // 'movies_title' => $response -> getBody()
        ]);


    }

    function exchange()
    {
        return view('movies.exchange');
    }

}
