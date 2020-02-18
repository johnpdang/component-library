import YouTubePlayer from 'youtube-player';

// var videoWrap = $('.video-container');
//
// if($(videoWrap).length > 0){
//     console.log('check');
//     const videoID = $('.video-container').attr('data-video');
//
//     let player = YouTubePlayer('player', {
//         playerVars: {
//             'controls': 0
//         }
//     });
//     player.loadVideoById(videoID);
//
//     player.on('ready', () =>{
//         player.stopVideo();
//
//         const playButton = document.getElementById("video__playbutton_1");
//         playButton.addEventListener("click", function() {
//             player.playVideo();
//             $(playButton).addClass('hide');
//             $('.video__wrapper').addClass('video-active hide--loop');
//         });
//     })
//
//     player.on('stageChange', (event) => {
//         if(event.data == 1) {
//             $('.video__wrapper').addClass('video-active');
//         } else if(event.data === YT.PlayerState.PAUSED || event.data == 0){
//             $('#video__playbutton_1').removeClass('hide')
//         } else {
//             $('.video__wrapper').removeClass('video-active hide--loop');
//         }
//     })
// }
function onYouTubeIframeAPIReady() {
        // 1. This function creates an <iframe> (and YouTube player) //    after the API code downloads.
        var videoID = $('#player').attr('data-rel');
        player = new YT.Player('player', {
        width: '1140',
        height: '641',
        videoId: videoID,
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
            },
            playerVars: {
                'rel' : 0,
                'fs' : 0,
                'controls' : 0,
                showinfo: 0,
                ecver: 2
            }
        });
    }
    function onPlayerReady(event) {
        player.stopVideo();
        // 2. The API will call this function when the video player is ready.
        var playButton = document.getElementById("video__playbutton_1");
        var closeButton = $('.close-btn');
        // var vid = document.getElementById('video__elem');
        // vid.playbackRate = 0.625;
        playButton.addEventListener("click", function() {
            player.playVideo();
            $(playButton).addClass('hide');
            $('.video__wrapper').addClass('video-active hide--loop');
        });
        $(closeButton).click(function(){
            player.stopVideo();
        });
    }
    function onPlayerStateChange(event) {
        // 3. The API calls this function when the player's state changes.
        if(event.data == 1) {
            $('.video__wrapper').addClass('video-active');
        } else if(event.data === YT.PlayerState.PAUSED || event.data == 0){
            $('#video__playbutton_1').removeClass('hide')
        } else {
            $('.video__wrapper').removeClass('video-active hide--loop');
        }
    }
    function stopVideo() {
        // 4. This API will stop the video
        player.stopVideo();
    }
