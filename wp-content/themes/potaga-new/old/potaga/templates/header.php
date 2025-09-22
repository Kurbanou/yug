<header class="header" role="banner">

  <div class="navbar navbar--default navbar--fixed-top" id="navbar">
    <div class="navbar__body">

      <div class="navbar__header">
        <button class="navbar__toggle collapsed" type="button" data-toggle="collapse" data-target="#navbar-collapse">
<!--          <span class="sr-only">Toggle navigation</span>-->
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar__brand" href="<?= esc_url(home_url('/')); ?>">
        <?php if (get_current_blog_id() == 1 ) : ?>
          <div>
            <img src="<?php echo esc_url( bloginfo('template_directory') ); ?>/dist/images/logo.svg" alt="<?php bloginfo('name'); ?>">
          </div>
          <h1><?php bloginfo('name'); ?><br>
            <small><?php bloginfo('description'); ?></small>
          </h1>
        <?php elseif (get_current_blog_id() == 2) : ?>
            <div>
                <img src="<?php echo esc_url( bloginfo('template_directory') ); ?>/dist/images/logo-steelprom.png" alt="<?php bloginfo('name'); ?>">
            </div>
        <?php endif; ?>
        </a>
      </div>

      <div class="navbar__collapse collapse" id="navbar-collapse">
        <ul class="navbar__menu nav navbar__menu--right">
          <li class="active"><a data-target="#about" href="<?php if(!is_front_page()) { echo '/'; } ?>#about">О компании</a></li>
          <li><a data-target="#services" href="<?php if(!is_front_page()) { echo '/'; } ?>#services">Услуги</a></li>
          <li><a data-target="#projects" href="<?php if(!is_front_page()) { echo '/'; } ?>#projects">Проекты</a></li>
          <li><a data-target="#articles" href="<?php if(!is_front_page()) { echo '/'; } ?>#articles">Статьи</a></li>
          <li><a data-target="#gallery" href="<?php if(!is_front_page()) { echo '/'; } ?>#gallery">Фотогалерея</a></li>
          <li><a data-target="#video" href="<?php if(!is_front_page()) { echo '/'; } ?>#video">Видео</a></li>
          <li><a data-target="#clients" href="<?php if(!is_front_page()) { echo '/'; } ?>#clients">Клиенты</a></li>
          <li><a data-target="#contacts" href="<?php if(!is_front_page()) { echo '/'; } ?>#contacts">Контакты</a></li>
        </ul>
      </div>

    </div>
  </div>

</header>
