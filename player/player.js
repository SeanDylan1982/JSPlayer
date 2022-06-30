	
	
	function PLAYERX(){

		var song_title = document.querySelector(".js-song-title");
		var playlist = document.querySelector(".PLAYER-PLAYLIST");
		
		if(playlist){
 			var total_songs = playlist.children.length;
		}

		var default_volume = 0.5;
		var volume_control = document.querySelector(".js-volume-control");
		volume_control.value = default_volume;
		
		var seek_control = document.querySelector(".js-seek-control");
		seek_control.value = 0;

		var vline = document.querySelector(".js-visual-line");
		
		var audio_source = document.createElement("audio"); 
		var current_song = 0;

		var audio_api = new window.AudioContext() || new window.WebkitAudioContext();

		var gainNode = audio_api.createGain();
		var analyserNode = audio_api.createAnalyser();
		var bitLength = analyserNode.frequencyBinCount;
		var dataArray = new Uint8Array(bitLength);

		var track = audio_api.createMediaElementSource(audio_source);
		track.connect(analyserNode).connect(gainNode).connect(audio_api.destination);

		var interval;
		init();

		if(playlist){
			playlist.addEventListener("click",init_song.bind(this));
		}

		function init_song(e)
		{
			var path = e.target.getAttribute("path");
			song_title.innerHTML = path.split(/[\\/]/).pop();;
 			this.song(path);
			this.play();
		}

		this.song = function(path)
		{
			audio_source.src = path;
			song_title.innerHTML = path.split(/[\\/]/).pop();;
		}

		function init()
		{
			if(playlist){
				var path = playlist.children[current_song].getAttribute("path");
				audio_source.src = path;
				song_title.innerHTML = path.split(/[\\/]/).pop();
			}
		}

		this.play = function()
		{
			audio_source.play();
			interval = setInterval(update_seeker,20);
		}

		this.pause = function()
		{
			audio_source.pause();
			clearInterval(interval);
		}

		this.stop = function()
		{
			audio_source.pause();
			audio_source.currentTime = 0;
			clearInterval(interval);
		}

		this.next = function()
		{
			if(!playlist)
				return;

			current_song += 1;
			if(current_song > (total_songs - 1)){
				current_song = 0;
			}

			init();
			this.play();
		}

		this.prev = function()
		{
			if(!playlist)
				return;

			current_song -= 1;

			if(current_song < 0){
				current_song = (total_songs - 1);
			}

			init();
			this.play();
		}

		this.volume = function(e)
		{
			gainNode.gain.value = e.target.value;

			var mute = document.querySelector(".js-mute");
			var unmute = document.querySelector(".js-unmute");
			var volume_count = document.querySelector(".js-volume-count");
			mute.classList.add("hide");
			unmute.classList.remove("hide");
			volume_count.innerHTML = parseInt(e.target.value * 100) + "%";

		}

		this.seek = function(e)
		{
			audio_source.currentTime = (e.target.value / 100)  * audio_source.duration;
		}

		function update_seeker()
		{
			analyserNode.getByteFrequencyData(dataArray);
			var points = "";
			for (var i = 0; i < bitLength; i++) {
				
				var value = 300 - dataArray[i];
				if(!(i % 10))
					value = 300;

				points += i + "," + value + " ";
			}

			vline.setAttribute("points",points);
			seek_control.value = (audio_source.currentTime / audio_source.duration) * 100;
		}

		this.mute = function(mode)
		{
			gainNode.gain.value = 0;
			volume_control.value = 0;

			var mute = document.querySelector(".js-mute");
			var unmute = document.querySelector(".js-unmute");

			if(mode == "mute"){
				
				unmute.classList.add("hide");
				mute.classList.remove("hide");
			}else 
			{
				mute.classList.add("hide");
				unmute.classList.remove("hide");
			}
		}

	}

var PLAYER = new PLAYERX();
