<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Storage;


// イメージ画像再登録ように新たに作成
class ChangeImageController extends Controller
{
    // 画像の再登録
    public function changeImage(Request $request)
    {
        // 画像までのパスを代入
        $path = $this->saveProfileImage($request->picture);
        // 現在のユーザー情報を取得
        $user = Auth::user();
        // 現在のユーザー情報の画像のパスに新しいパスを代入
        $user->picture_path = $path;
        // ユーザー情報を保存
        Storage::delete('$users->picture_path');


        $user->save();


        // if (File::exists($path)) {
        //     // dd($path);
            
        //     # code...
        //     File::delete($path);
        //     // dd(2);
        //     # code...
        //     // strage::delete($oldFilename)
        // } else {
        //     $user->save();
        // }

            // dd($path);

            // $strange::delete('')


        // 処理が終わったらマイページに戻る
        return redirect()->route('movie.Mypage');
    }

    private function saveProfileImage($image)

     // デフォルトではstorage/appに画像が保存されます。
     // 第2引数にpublicをつけることで、storage/app/publicに保存されます。
     // 今回は、/images/profilePictureをつけて、
     // storage/app/public/images/profilePictureに画像が保存されるようにしています。
     // 自分で指定しない場合、ファイル名は自動で設定されます。
     {
         $imgPath = $image->store('images/profilePicture', 'public');

    return 'storage/' . $imgPath;

    }

    // public function delete()
    // {
        

    // }

}
