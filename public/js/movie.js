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


