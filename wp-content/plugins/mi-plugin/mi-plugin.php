<?php

/**
 * Plugin Name: mi-plugin
 * Plugin URI: mi-plugin
 * Description: An eCommerce toolkit that helps you sell anything. Beautifully.
 * Version: 1.0
 * Author: jose manuel
 * Author URI: mi-plugin
 * Text Domain: woocommerce
 * Domain Path: /i18n/languages/
 * Requires at least: 5.6
 * Requires PHP: 7.0
 *
 * 
 */


/** agregar en etiqueta header */
// add_action('wp_head', 'agregar_ga');
// function agregar_ga()
// {
//     echo "
//     <script>
//         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;
//         i[r]=i[r]||function(){
//         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();
//         a=s.createElement(o),
//         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;
//         m.parentNode.insertBefore(a,m)})(window,document,'script',
//         'https://www.google-analytics.com/analytics.js','ga');
//         ga('create', 'UA-0000000-1', 'auto');
//         ga('send', 'pageview');
//     </script>";
// }

// // Modifica etiqueta generator
// add_filter('the_generator', 'remove_generator', 10, 1);

// function remove_generator($html)
// {
//     return  preg_replace(
//         '|content=("WordPress.*?")|',
//         'content="Codigo jose"',
//         $html
//     );
// }


// //Crear un filtro para modificar el contenido del articulo....
// add_filter('the_content', 'cn_agregar_anuncio');

// function cn_agregar_anuncio($the_content)
// {

//     //Creamos una variable que contenga todo el contenido
//     //del articulo
//     $articulo = $the_content;
//     echo $articulo;

//     // Al final del articulo agregar el codigo del anuncio....
//     $articulo .= '<div class="ads"> *** insertar codigo de anuncio *** </div>';

//     // siempre debe regresar el contenido que se desea mostrar
//     return $articulo;
// }




register_activation_hook(__FILE__, "cn_set_default_options");

function cn_set_default_options()
{
    global $wpdb;

    //crear tabla
    $sql = "CREATE TABLE IF NOT EXISTS {$wpdb->prefix}encuestas(
         `id_encuestas` INT NOT NULL AUTO_INCREMENT , `nombre` VARCHAR(255) NOT NULL , `shortcode` VARCHAR(255) NOT NULL , PRIMARY KEY (`id_encuestas`)
    )";
    $wpdb->query($sql);

    $qProduct = "ALTER TABLE {$wpdb->prefix}posts ADD `suscription_check` VARCHAR(255) NULL DEFAULT '0' AFTER `comment_count`";
    $wpdb->query($qProduct);
    
}


add_action('admin_menu', 'cn_menu_ajustes');
// insertar menu
function cn_menu_ajustes()
{
    $pagina_opciones = add_menu_page(
        'Configuraciones Mi plugin',
        'Codigo mi plugin', //nombre del menu
        'manage_options', //nivel de acceso
        plugin_dir_path(__FILE__).'includes/menu/principal.php',
        null, //funcion que procesara  todo,
        plugin_dir_url(__FILE__).'admin/img/icon.ico',
        '1' //priority
    );

    $pagina_submenu = add_submenu_page(
        'sp_menu',// parent slug
        'Ajustes', //titulo menu,
        'Ajustes', // titulo
        'manage_options',//permisos
        'sp_menu_ajustes',//
        'cp_submenu'
    );

}





function cn_generar_pagina()
{
    echo '<h1>hola mundo</h1>';
}

function cp_submenu()
{
    echo '<h1>submenu</h1>';
}