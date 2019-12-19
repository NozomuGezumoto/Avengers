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
        // 古い画像のパスを退避
        $oldPath = $user->picture_path;
        // 現在のユーザー情報の画像のパスに新しいパスを代入
        $imageData = file_get_contents($request->picture);

        $user->picture_path = "data:image/png;base64," . base64_encode($imageData);
        // ユーザー情報を保存

        $user->save();

        // str_replace検索した文字列に一致した全ての文字列を置換する
        // 今回 storage/images/profilePict~ の形だとうまく動かない
        // だから storage を消している
        $oldImage = str_replace('storage/', '', $oldPath);

        // dd('/public/' . $oldImage);

        // public/images/profilePict~ の形にして実物の画像データまでのパスを設定
        Storage::delete('/public/' . $oldImage);


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



}
