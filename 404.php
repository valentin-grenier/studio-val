<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Studio Val
 */

get_header();
?>

<main id="content" class="site-main st-404">
    <section class="st-section boxed">
        <dotlottie-player src="https://lottie.host/c2aa10e1-ffe6-41ca-939f-c28f80b964a1/nojiMNQLMG.json" background="transparent" speed="1" style="width: 275px; height: 275px;" loop autoplay></dotlottie-player>


        <h1><?php _e("Oh non !<br /> <strong>C'est cassé !</strong> ", "studio-val"); ?></h1>

        <p><?php _e("Il semblerait que Philou ait tout débranché. <br />Sinon, la page que vous recherchez n'existe pas.", "studio-val"); ?></p>

        <div class="st-button primary">
            <a href="<?php echo esc_url(home_url('/')); ?>"><?php _e("Retour à l'accueil", "studio-val"); ?></a>
        </div>
    </section>
</main>



<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module" defer></script>
<?php

get_footer();
