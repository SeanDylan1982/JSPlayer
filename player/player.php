
	<style type="text/css">
		.player_container{
			font-family: tahoma;
			font-size: 13px;

			margin: auto;
			width: 100%;
			max-width:400px;
			background-color: #eaeaea;
		}

		.js-volume-control{
			appearance: none;
			background-color: #aaa;
		}

		.js-volume-control-holder{

			float: right;
			margin-right: 2px;
			color: #414141;
			display: flex;
			margin-top: 6px;
			margin-bottom: 6px;
		}

		.js-seek-control{
			width: 100%;
			appearance: none;
			background-color: #aaa;
			margin-bottom: 6px;
		}

		.js-controls-holder{
			padding: 6px;
		}

		.js-controls-holder svg{

			padding: 6px;
			border: solid thin #aaa;
		}

		.hide{
			display: none;
		}
	</style>

<div class="player_container">
	<svg viewbox="0 0 1024 300" style="width:100%;">
			<defs>
		    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
		      <stop offset="0%" style="stop-color:red;stop-opacity:1" />
		      <stop offset="50%" style="stop-color:orange;stop-opacity:1" />
		      <stop offset="100%" style="stop-color:white;stop-opacity:1" />
		    </linearGradient>
		  </defs>

		<rect width="1024" height="300" style="fill:#414141;" />
		<polyline class="js-visual-line" points="" style="fill:none;stroke:url(#grad1);stroke-width:2" />
	</svg>
	<br>
		
	<div class="js-volume-control-holder">
		<svg style="flex:1" onclick="PLAYER.mute('mute')" class="js-unmute" fill="#414141" type="speaker" width="20" height="20" viewBox="0 0 24 24"><path d="M5 17h-5v-10h5v10zm2-10v10l9 5v-20l-9 5zm17 4h-5v2h5v-2zm-1.584-6.232l-4.332 2.5 1 1.732 4.332-2.5-1-1.732zm1 12.732l-4.332-2.5-1 1.732 4.332 2.5 1-1.732z"/></svg>
		<svg style="flex:1" onclick="PLAYER.mute('unmute')" class="js-mute hide" fill="#414141" type="mute" width="20" height="20" viewBox="0 0 24 24"><path d="M5 17h-5v-10h5v10zm2-10v10l9 5v-20l-9 5zm15.324 4.993l1.646-1.659-1.324-1.324-1.651 1.67-1.665-1.648-1.316 1.318 1.67 1.657-1.65 1.669 1.318 1.317 1.658-1.672 1.666 1.653 1.324-1.325-1.676-1.656z"/></svg>
		<input style="flex:10" class="js-volume-control" oninput="PLAYER.volume(event)" type="range" min="0" max="2" step="0.1" name=""><br>
		<span style="flex:1" class="js-volume-count">50%</span>
	</div>

	<div class="js-controls-holder">

		<br><br>Song: &nbsp <span class="js-song-title"></span><br><br>

		<input class="js-seek-control" oninput="PLAYER.seek(event)" type="range" min="0" max="100" step="0.5" name=""><br>

		<span onclick="PLAYER.play()" style="cursor: pointer;">
			<svg fill="#414141" type="play" width="24" height="24" viewBox="0 0 24 24"><path d="M3 22v-20l18 10-18 10z"/></svg>
		</span>
		<span onclick="PLAYER.pause()" style="cursor: pointer;">
			<svg fill="#414141" type="pause" width="24" height="24" viewBox="0 0 24 24"><path d="M11 22h-4v-20h4v20zm6-20h-4v20h4v-20z"/></svg>
		</span>
		<span onclick="PLAYER.stop()" style="cursor: pointer;">
			<svg fill="#414141" type="stop" width="24" height="24" viewBox="0 0 24 24"><path d="M2 2h20v20h-20z"/></svg>
		</span>
		<span onclick="PLAYER.prev()" style="cursor: pointer;">
			<svg fill="#414141" type="prev" style="transform: rotate(180deg);"  width="24" height="24" viewBox="0 0 24 24"><path d="M19 12l-18 12v-24l18 12zm4-11h-4v22h4v-22z"/></svg>
		</span>
		<span onclick="PLAYER.next()" style="cursor: pointer;">
			<svg fill="#414141" type="next" width="24" height="24" viewBox="0 0 24 24"><path d="M19 12l-18 12v-24l18 12zm4-11h-4v22h4v-22z"/></svg>
		</span>
	</div>

 </div>

<script src="player/player.js"></script>
