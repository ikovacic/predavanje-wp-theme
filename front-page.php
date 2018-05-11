<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lang-en"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lang-en"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lang-en"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9 lang-en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js lang-en"> <!--<![endif]-->
<head>

    <meta charset="utf-8">

    <meta name="viewport" content="initial-scale=1.0, width=device-width">

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> data-spy="scroll" data-target="#navbar" data-offset="<?php if( is_admin_bar_showing() ): ?>132<?php else: ?>100<?php endif; ?>">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="Container">

        <header class="Header js-sticky">
            <div class="u-inner">

                <div class="Header-inner">
                    
                    <div class="Header-group">
                        <div class="Header-wrapLogo">
                            <h1 class="Logo">HD Travel</h1>
                        </div>
                        <div class="Header-wrapLogoAlt">
                            <i class="LogoAlt" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="Header-group">
                        <div class="Header-wrapTools">
                            <div class="Tools">
                                <ul>
                                    <li class="Tools-item">Email: <strong>info@hd-travel.hr</strong></li>
                                </ul>
                            </div>
                        </div>
                        <?php
                            $menu_items = wp_get_nav_menu_items('Primary Menu');
                            if($menu_items):
                        ?>
                        <div class="Header-wrapNav">
                            <nav class="Nav js-nav" id="navbar">
                                <ul class="nav">
                                    <?php foreach ($menu_items as $k => $menu_item): ?>
                                    <li class="Nav-item<?php if( $k == 0 ): ?> active<?php endif; ?>"><a href="<?php echo $menu_item->url; ?>"><?php echo $menu_item->title; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </nav>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </header>

        <section class="Hero" id="top">

            <?php
                $slides = get_field( 'hero_slides' );
                if( $slides ):
            ?>
            <div class="Hero-wrapCarousel">
                <div class="Carousel js-carousel">
                    <?php foreach( $slides as $slide ): ?>
                    <div class="Carousel-cell" style="background-image: url(<?php echo $slide['url']; ?>);"></div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif ?>

            <div class="Hero-inner">
                <div class="u-inner">
                    <?php if( get_field( 'hero_title' ) ): ?>
                    <h2 class="Hero-title"><?php the_field( 'hero_title' ); ?></h2>
                    <?php endif; ?>
                    <?php if( get_field( 'hero_subtitle' ) ): ?>
                    <div class="Hero-text">
                        <p><?php the_field( 'hero_subtitle' ); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php
            $offer = get_field( 'offer' );
            if( $offer ):
        ?>

        <section class="Block Block--overlap" id="offer">
            <div class="u-inner">
                <ul class="Media Media--count_3">
                    <?php foreach( $offer as $post ): setup_postdata($post); ?>
                    <li class="Media-item">
                        <div class="ArticleDefault">
                            <?php if( has_post_thumbnail() ): ?>
                            <div class="ArticleDefault-group">
                                <?php the_post_thumbnail( 'medium', array('class' => 'ArticleDefault-image') ); ?>
                            </div>
                            <?php endif; ?>
                            <div class="ArticleDefault-group">
                                <h3 class="ArticleDefault-title"><?php the_title(); ?></h3>
                                <div class="ArticleDefault-text">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php wp_reset_postdata(); ?>
            </div>
        </section>

        <?php endif; ?>


        <?php

            $args = array(
                'posts_per_page' => -1,
                'post_type' => 'inspiration'
            );

            $inspiration = new WP_Query( $args );

            if( $inspiration->have_posts() ):

        ?>

        <section class="Block Block--gray" id="inspiration">

            <div class="u-inner">

                <ul class="Media js-inspiration">
                    <?php $k = 0; while ( $inspiration->have_posts() ): $inspiration->the_post(); ?>
                    <li class="Media-item<?php if( $k++ > 0 ): ?> is-hidden<?php endif; ?>">
                        <div class="ArticleBox<?php if( $k%2 == 1 ): ?> is-odd<?php endif; ?>">

                            <?php if( has_post_thumbnail() ): ?>
                            <div class="ArticleBox-group">
                                <?php the_post_thumbnail( 'square', array( 'class' => 'ArticleBox-image' ) ); ?>
                            </div>
                            <?php endif; ?>

                            <div class="ArticleBox-group ArticleBox-group--text">
                                <h3 class="ArticleBox-title"><?php the_title(); ?></h3>
                                <div class="ArticleBox-text">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                </ul>
                <div class="Block-wrapButton">
                    <a href="" class="Button js-showInspiration">
                        <span class="Button-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></span>
                        More inspiration
                    </a>
                </div>
            </div>

        </section>

        <?php endif; ?>

        <section class="Block" id="destinations">

            <div class="u-inner">

                <?php if( get_field( 'destinations_title' ) ): ?>
                <h2 class="Block-title"><?php the_field( 'destinations_title' ); ?></h2>
                <?php endif; ?>
                <?php if( get_field( 'destinations_text' ) ): ?>
                <div class="Block-text Block-text--narrow">
                    <p><?php the_field( 'destinations_text' ); ?></p>
                </div>
                <?php endif; ?>

                <?php

                    $args = array(
                        'posts_per_page' => 5,
                        'post_type' => 'destination'
                    );

                    $destinations = new WP_Query( $args );

                    if( $destinations->have_posts() ):

                ?>

                <div class="Block-wrapTabs">
                    <div class="Tabs js-tabs">
                        <ul>
                            <?php $k = 0; while ( $destinations->have_posts() ): $destinations->the_post(); ?>
                            <li class="Tabs-item<?php if($k++ == 0): ?> is-active<?php endif; ?>"><a href="#destination-<?php the_id(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>

                <?php // enable re-use the same query ?>
                <?php $destinations->rewind_posts(); ?>

                <div class="Block-wrapTabContent">

                    <?php $k = 0; while ( $destinations->have_posts() ): $destinations->the_post(); ?>
                    <div class="TabContent<?php if($k++ == 0): ?> is-active<?php endif; ?>" id="destination-<?php the_id(); ?>">
                        <h2 class="TabContent-title">Zagreb</h2>
                        <?php if( has_post_thumbnail() ): ?>
                        <div class="TabContent-group">
                            <?php the_post_thumbnail( 'square', array( 'class' => 'TabContent-image' ) ); ?>
                        </div>
                        <?php endif; ?>
                        <div class="TabContent-group TabContent-group--text">
                            <div class="Text">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                </div>

                <?php endif; ?>

            </div>

        </section>

        <section class="Block Block--bg" id="taylor-made"
            <?php
                $about_us_bg = get_field( 'about_us_background' );
                if( $about_us_bg ):
            ?>
                style="background-image: url(<?php echo $about_us_bg['url']; ?>)"
            <?php endif; ?>>

            <div class="u-inner">
                <?php if( get_field( 'about_us_title' ) ): ?>
                <h2 class="Block-title Block-title--medium Block-title--line"><?php the_field( 'about_us_title' ); ?></h2>
                <?php endif; ?>
                <?php if( get_field( 'about_us_text' ) ): ?>
                <div class="Block-text">
                    <p><?php the_field( 'about_us_text' ); ?></p>
                </div>
                <?php endif; ?>
                <?php if( have_rows('about_us_buttons') ): ?>
                <div class="Block-wrapButton">
                    <?php while ( have_rows('about_us_buttons') ) : the_row(); ?>
                    <a href="<?php the_sub_field('link_url'); ?>" class="Button Button--ghost Button--multi <?php the_sub_field('link_class'); ?>"><?php the_sub_field('link_title'); ?></a>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>

            </div>

        </section>

        <section class="Block" id="contact">

            <div class="u-inner">

                <h2 class="Block-title Block-title--small Block-title--left">Contact</h2>

                <div class="Block-wrapContact">
                    <div class="Contact">

                        <div class="Contact-group Contact-group--1of3">
                            <div class="ContactList">
                                <ul>
                                    <li class="ContactList-item">
                                        <div class="ContactList-label">Address</div>
                                        <div class="ContactList-value">Stubička 99, Zagreb</div>
                                    </li>

                                    <li class="ContactList-item ContactList-item--spacing">
                                        <div class="ContactList-label">Phone</div>
                                        <div class="ContactList-value">+385 1 3630 638</div>
                                    </li>
                                    <li class="ContactList-item">
                                        <div class="ContactList-label">Fax</div>
                                        <div class="ContactList-value">+385 1 3649 821</div>
                                    </li>
                                    <li class="ContactList-item">
                                        <div class="ContactList-label">Mobile phone</div>
                                        <div class="ContactList-value">+385 91 3499 811</div>
                                    </li>

                                    <li class="ContactList-item ContactList-item--spacing">
                                        <div class="ContactList-label">Email</div>
                                        <div class="ContactList-value">info@hd-travel.hr</div>
                                    </li>
                                    <li class="ContactList-item">
                                        <div class="ContactList-label">Skype ID</div>
                                        <div class="ContactList-value">hd-travel</div>
                                    </li>
                                    <li class="ContactList-item">
                                        <div class="ContactList-label">Facebook</div>
                                        <div class="ContactList-value">hd-travel</div>
                                    </li>
                                    <li class="ContactList-item">
                                        <div class="ContactList-label">Web</div>
                                        <div class="ContactList-value">www.hd-travel.hr</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="Contact-group Contact-group--2of3">

                            <?php echo do_shortcode( '[contact-form-7 id="103" title="Contact form"]' ); ?>

                        </div>

                    </div>
                </div>

            </div>

        </section>

        <?php
            $images = get_field( 'gallery' );
            if( $images ):
        ?>

        <section class="Block Block--noSpacing" id="gallery">

            <div class="Gallery">
                <ul>
                <?php
                    $rand_keys = array_rand($images, 4);
                    foreach($rand_keys as $rand_key):
                ?>
                    <li class="Gallery-item">
                        <a href="<?php echo $images[$rand_key]['sizes']['large']; ?>" rel="fancybox" class="js-fancybox">
                            <img src="" data-original="<?php echo $images[$rand_key]['sizes']['square']; ?>" class="js-lazy" alt="<?php echo $images[$rand_key]['alt']; ?>">
                            <span class="Gallery-hover">
                                <span class="Gallery-hoverInner">
                                    <span class="Gallery-wrapIcon"><i class="Icon Icon--zoom" aria-hidden="true"></i></span>
                                    click to<br>enlarge
                                </span>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
                </ul>
            </div>

        </section>
        <?php endif ?>

        <footer class="Footer">

            <div class="u-inner">

                <div class="Footer-group">
                    <div class="Partners">
                        <img src="" data-original="<?php echo get_theme_file_uri( 'assets/images/partners.png' ); ?>" class="js-lazy" alt="Partners">
                    </div>
                </div>
                <div class="Footer-group">
                    <div class="Footer-wrapCopyright">
                        <?php if ( is_active_sidebar( 'footer' ) ) : ?>
                            <?php dynamic_sidebar( 'footer' ); ?>
                        <?php endif; ?>
                    </div>
                </div>

            </div>

        </footer>

    </div>

    <?php endwhile; endif; ?>

    <?php wp_footer(); ?>

</body>
</html>
