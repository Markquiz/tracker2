<div class="demo-layout mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header">
      <header class="demo-header mdl-layout__header mdl-color--grey-100 mdl-color-text--grey-600">
        <div class="mdl-layout__header-row">
          <span class="mdl-layout-title"><?=$pageTitle?></span>
          <div class="mdl-layout-spacer"></div>
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
          </div>

          <?php if($_SERVER["PHP_AUTH_USER"]=="admin"): ?>

          <button class="mdl-button mdl-js-button mdl-button--primary">
            Добавить задачу
          </button>

          <?php endif; ?>
        </div>
      </header>
      <div class="demo-drawer mdl-layout__drawer mdl-color--blue-grey-900 mdl-color-text--blue-grey-50">
        <header class="demo-drawer-header">
          <img src="./static/img/userpic.png" class="demo-avatar">
          <br>
          <div class="demo-avatar-dropdown">
            <span> <?= $_SERVER['PHP_AUTH_USER'];  ?> </span>
            <div class="mdl-layout-spacer"></div>

            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
              <i class="material-icons" role="presentation">arrow_drop_down</i>
              <span class="visuallyhidden">Accounts</span>
            </button>
            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
              <a href="" class="mdl-menu__item">Изменить фото (будет позже)</a>
            </ul>
          </div>
        </header>
        <nav class="demo-navigation mdl-navigation mdl-color--blue-grey-800">
          <a class="mdl-navigation__link" href="/"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">assignment</i>Задачи</a>
          <a class="mdl-navigation__link" href="/mail"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">mail</i>Почта</a>
          <?php if($_SERVER["PHP_AUTH_USER"]=="admin"): ?>
          <a class="mdl-navigation__link" href="/archive"><i class="mdl-color-text--blue-grey-400 material-icons" role="presentation">archive</i>Архив</a>
          <?php endif; ?>
        </nav>
      </div>