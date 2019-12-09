// seach.blade.phpへの検索機能を作成中 

function disp(){

	// 入力ダイアログを表示 ＋ 入力内容を user に代入
	user = prompt("映画名を入力してください", "");

	// 入力内容が tama の場合は example_tama.html にジャンプ
	if(user !== ''){

		location.href = "";

  }

	// 入力内容が一致しない場合は警告ダイアログを表示
	else if(user != "" && user != null){

		window.alert(user + 'さんは登録されていません');

	}

	// 空の場合やキャンセルした場合は警告ダイアログを表示
	else{

		window.alert('キャンセルされました');

	}

}
	// いいねされた日記のIDを取得
	// $(this) : 今回クリックされたiタグ(ハートマーク)
	// .siblings('XXX') : 兄弟要素を取得する
	// val() : inputタグのvalueの値を取得する
	// this = js-like



// window.onload = function() {
//   var popup = document.getElementById('js-popup');
//   if(!popup) return;
//   popup.classList.add('is-show');

//   var blackBg = document.getElementById('js-black-bg');
//   var closeBtn = document.getElementById('js-close-btn');

//   closePopUp(blackBg);
//   closePopUp(closeBtn);

//   function closePopUp(elem) {
//     if(!elem) return;
//     elem.addEventListener('click', function() {
//       popup.classList.remove('is-show');
//     })
//   }
// }

//ポップアップ
// $(document).on('click', 'open', function() {
// 	console.log('ボタンがクリックされました。');
// });

// 'use strict';
// {
//   const open = document.getElementById('open');
//   const close = document.getElementById('close');
//   const modal = document.getElementById('modal');
//   const mask = document.getElementById('mask');

//   open.addEventListener('click', function () {
//     modal.classList.remove('hidden');
//     mask.classList.remove('hidden');
//   });
//   close.addEventListener('click', function () {
//     modal.classList.add('hidden');
//     mask.classList.add('hidden');
//   });
//   mask.addEventListener('click', function () {
//     modal.classList.add('hidden');
//     mask.classList.add('hidden');
//   });
// }
// review1
// $(document).on('click','.img', function(){
// 	// alert('click');
// 	let movieId = $(this).attr('src');
// 	// alert(movieId);
// 	$('<input>').attr({
//     type: 'hidden',
//     name: 'animal',
//     value: movieId
// 	}).appendTo('#actionform');
// 	$('#actionform').submit();
// });

$(document).on('click','.click-img', function(){
	// alert('click');
	let movieId = $(this).attr('src');
	// alert(movieId);
	$('<input>').attr({
    type: 'hidden',
    name: 'animal',
    value: movieId
	}).appendTo('#actionform');
	$('#actionform').submit();
});

$(document).on('click','.img2', function(){
	// alert('click');
	let movieId = $(this).attr('src');
	// alert(movieId);
	$('<input>').attr({
    type: 'hidden',
    name: 'fruit',
    value: movieId
	}).appendTo('#actionform');
	$('#actionform').submit();
});


// 根本
$(document).on('click', '.js-like', function() {

	// いいねされた日記のIDを取得
	// $(this) : 今回クリックされたiタグ（ハートマーク）
	// .siblings('XXX') : 兄弟要素を取得する
	// val() : inputタグのvalueの値を取得する
	let reviewId = $(this).siblings('.review-id').val();
	console.log(reviewId);

	// likeメソッドを実行
	like(reviewId, $(this));
});

// reviewId：いいねする投稿のID
// clickedBtn：今回クリックされたいいねアイコン
function like(reviewId, clickedBtn) {

	$.ajax({
			url: reviewId + '/like',
			type: 'POST',
			dataType: 'json',
			// CSRF対策のため、tokenを送信する
			headers: {
					'X-CSRF-TOKEN': 
					$('meta[name="csrf-token"]').attr('content')
			}
	}).done((data) => {
			console.log(data);
			// いいねの数を増やす
			// 1. 現在のいいね数を取得
			// text() : <a>XXX</a> XXXの部分を取得
			let num = clickedBtn.siblings('.js-like-num').text();

			// numを数値に変換する
			num = Number(num);

			// 2. 1プラスした結果を設定する
			// text(YYY) : <a>XXX</a> XXXの部分をYYYに置き換える
			clickedBtn.siblings('.js-like-num').text(num + 1);

			// いいねのボタンのデザインを変更
			changeLikeBtn(clickedBtn);
	}).fail((error) => {
			console.log(error);
	});
}



// いいね解除の処理
$(document).on('click', '.js-dislike', function() {
	// いいね解除された日記のID取得
	let reviewId = $(this).siblings('.review-id').val();

	// dislikeメソッドの実行
	dislike(reviewId, $(this));

});

function dislike(reviewId, clickedBtn) {

	$.ajax({
			url: reviewId + '/dislike',
			type: 'POST',
			dataType: 'json',
			// CSRF対策のため、tokenを送信する
			headers: {
					'X-CSRF-TOKEN': 
					$('meta[name="csrf-token"]').attr('content')
			}
	}).done((data) => {
			console.log(data);
			// いいねの数を減らす
			// 1. 現在のいいね数を取得
			// text() : <a>XXX</a> XXXの部分を取得
			let num = clickedBtn.siblings('.js-like-num').text();

			// numを数値に変換する
			num = Number(num);

			// 2. 1マイナスした結果を設定する
			// text(YYY) : <a>XXX</a> XXXの部分をYYYに置き換える
			clickedBtn.siblings('.js-like-num').text(num - 1);

			// いいねのボタンのデザインを変更
			changeLikeBtn(clickedBtn);
	}).fail((error) => {
			console.log(error);
	});
}

// btn：色を変えたいいいねアイコン
// js-like, js-dislikeの切り替え
function changeLikeBtn(btn) {
	btn.toggleClass('far').toggleClass('fas');
	btn.toggleClass('js-like').toggleClass('js-dislike');
}
// 根本
