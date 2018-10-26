$(function(){
    
    // 設定
    var options = {
        thumbUl : $('#thumbnail'),  // サムネイルが入ったulのidを指定
        mainPhoto : $('#main_photo'), // メイン画像が入るdivのidを指定
        parentDiv : $('#photo_container'), // 全体を包むdivのidを指定
        slideSpeed: 3000, // 次の画像に切り替わるまでの時間
        fadeSpeed: 500, // フェードアニメーションの時間
        startPlay: true, // 最初から自動再生しておくかどうか
        maxWidth : 520, // parentDiv の max-width 値
        thumbMaxWidth : 80,  // サムネイルの max-width 値
        thumbMinWidth : 65 // サムネイルの min-width 値
    };
    
    var thumbs = options.thumbUl.find('a'),
        mainPhoto = options.mainPhoto,
        thumbFiles = [],
        mainFiles = [],
        currentNum = 0,
        nextBtn = $('#next'),
        prevBtn = $('#prev'),
        nowPlay = false, 
        timer,
        playBtn = $('#play_btn'),
        stopBtn = $('#stop_btn');       
	
    // ロード時 #main_photo に高さ設定
    window.onload = function(){
        mainPhoto.height(mainPhoto.children('img').outerHeight());
    }
    
    // 親Div サムネイルli メインDiv へmax-width・width値などを設定する
    options.parentDiv.css('maxWidth', options.maxWidth);
    var liWidth = Math.floor((options.thumbMaxWidth / options.maxWidth) * 100);
    options.thumbUl.children('li').css({
        width : liWidth + '%',
        maxWidth : options.thumbMaxWidth,
        minWidth : options.thumbMinWidth
    });
		
    // サムネイルとメイン画像の配列作る
    for(var i = 0; i < thumbs.length; i++){
        mainFiles[i] = $('<img />');
        mainFiles[i].attr({
            src: $(thumbs[i]).attr('href'),
            alt: $(thumbs[i]).children('img').attr('alt')
        });
        mainFiles[i] = mainFiles[i][0];
        thumbFiles[i] = $(thumbs[i]).children('img');
        thumbFiles[i] = thumbFiles[i][0];
    }
    // メインに最初の一枚を表示しておく
    mainPhoto.prepend(mainFiles[0]);
    // サムネイルの最初の一枚の親 li に current クラスを付ける
    $(thumbFiles[0]).parent().parent().addClass('current');
    
    // ロード時の再生機能オンかどうかとボタンor停止ボタンの表示
    if(options.startPlay) {
        currentNum--;
        autoPlay();
        playBtnHide();
    } else {
        playBtnShow();
    }
    
    ////////// イベントの設定 ////////// 
    
    // サムネイルのクリックイベント
    thumbs.on('click', function(){
        currentNum = $.inArray($("img",this)[0], thumbFiles); 
        mainView();
        stopPlay();
        playBtnShow();
        return false;
    });
    
    // プレビューボタンのクリックイベント
    prevBtn.on('click', function(){
        currentNum--;
        if(currentNum < 0){
			currentNum = mainFiles.length - 1;
		}
        mainView();
        stopPlay();
        playBtnShow();
    });
    
    // ネクストボタンのクリックイベント
    nextBtn.on('click', function(){
        currentNum++;
        if(currentNum > mainFiles.length - 1){
			currentNum = 0;
		}
        mainView();
        stopPlay();
        playBtnShow();
    });
    
    // 再生ボタンクリックイベント
    playBtn.on('click', function(){
		if(nowPlay) return;
		autoPlay();	
		playBtnHide();
	});
    
    // 停止ボタンクリックイベント
	stopBtn.on('click', function(){
        stopPlay();
        playBtnShow();
        
	});
    
    // ウィンドウサイズ変更時 
    $(window).on('resize', function(){
        mainPhoto.height(mainPhoto.find('img').outerHeight());
    });
    
    ////////// 関数の設定 //////////
    
    // メイン画像入れ替える関数
    function mainView(){
        mainPhoto.prepend(mainFiles[currentNum]).find('img').show();
        mainPhoto.find('img:not(:first)').stop(true, true).fadeOut(options.fadeSpeed, function(){
		    $(this).remove();
		});
        
        thumbs.eq(currentNum).parent().addClass('current').siblings().removeClass('current');
    }
	
	// 自動再生の関数
    function autoPlay(){
        nowPlay = true;
		currentNum++;
        if(currentNum > mainFiles.length - 1){
			currentNum = 0;
		}
        mainView();
		timer = setTimeout(function(){
	       autoPlay();
        }, options.slideSpeed);
	}
   
    // 自動再生止める関数
    function stopPlay(){
        clearTimeout(timer);
        nowPlay = false;
    }
	
	// 再生ボタン表示非表示関数
	function playBtnShow(){
		if(nowPlay === false){
			stopBtn.hide();
			playBtn.show();
		}
	}
	function playBtnHide(){
		if(nowPlay === true){
			playBtn.hide();
			stopBtn.show();	
		}
	}
    
});