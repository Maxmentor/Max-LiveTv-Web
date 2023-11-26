const video_player_html = `
  <div class="loader"></div>
  <p class="caption_text"></p>
  <div class="progressAreaTime" >0:00</div>
  
  <div class="controls active">
    <div class="progress-area">
      <canvas class="bufferedBar"></canvas>
      <div class="progress-bar">
        <span></span>
      </div>
    </div>

    <div class="controls-list">
      <div class="controls-left">
        <span class="icon">
          <i class="material-icons fast-rewind">replay_10</i>
        </span>

        <span class="icon">
          <i class="material-icons play_pause" >play_arrow</i>
        </span>

        <span class="icon">
          <i class="material-icons fast-forward">forward_10</i>
        </span>

        <span class="icon">
          <i class="material-icons volume">volume_up</i>

          <input type="range" min="0" max="100" class="volume_range" />
        </span>

        <div class="timer">
          <span class="current">0:00</span> /
          <span class="duration">0:00</span>
        </div>
      </div>

      <div class="controls-right">
        <span class="icon">
          <i class="material-icons auto-play"></i>
        </span>

        <span class="icon">
          <i class="material-icons captionsBtn">closed_caption</i>
        </span>

        <span class="icon">
          <i class="material-icons settingsBtn">settings</i>
        </span>

        <span class="icon">
          <i class="material-icons picture_in_picutre">picture_in_picture_alt</i>
        </span>

        <span class="icon">
          <i class="material-icons fullscreen">fullscreen</i>
        </span>
      </div>
    </div>
  </div>

  <div class="settings">
    <div data-label="settingHome">
      <ul>
        <li data-label="speed">
          <span> Speed </span>
          <span class="material-symbols-outlined icon">
            arrow_forward_ios
          </span>
        </li>
        <li data-label="quality">
          <span> Quality </span>
         <span class="material-symbols-outlined icon">
          arrow_forward_ios
        </span>
        </li>
      </ul>
    </div>
    <div class="playback" data-label="speed" hidden>
      <span>
        <i class="material-symbols-outlined icon back_arrow"  data-label="settingHome">
          arrow_back
        </i>
        <span>Playback Speed </span>
      </span>
      <ul>
        <li data-speed="0.25">0.25</li>

        <li data-speed="0.5">0.5</li>

        <li data-speed="0.75">0.75</li>

        <li data-speed="1" class="active">Normal</li>

        <li data-speed="1.25">1.25</li>

        <li data-speed="1.5">1.5</li>

        <li data-speed="1.75">1.75</li>

        <li data-speed="2">2</li>
      </ul>
    </div>
    <div data-label="quality" hidden>
      <span>
        <i class="material-symbols-outlined icon back_arrow" data-label="settingHome">
          arrow_back
        </i>
        <span>Playback Quality </span>
      </span>
      <ul>
        <li data-quality="auto" class="active">auto</li>
      </ul>
    </div>
  </div>
  <div class="captions">
    <div class="caption">
      <span>Select Subtitle</span>
      <ul>
        
      </ul>
    </div>
  </div>
`;
export {video_player_html};