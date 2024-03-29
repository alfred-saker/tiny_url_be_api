<?php
/*
Plugin Name: TinyURL Shortcut
Description: Generates shortened URLs for articles using the TinyURL service.
Version: 1.0
Author: Alfred KUATE
*/


// Appel de l'APi TinyURL
function api_rest_generate_url($url) {

    $api_url = 'https://api.tinyurl.com/create';
    $api_token = 'Token gXd8pKzOsSRPGDHXzQSlGGZ6xlo9AMVupNfQVTkh3CyAnZXiYoI0gqaeKpvt';
    
    $body = array(
        'url' => $url,
    );
    // Authentification à l'API TinyUrl
    $args = array(
        'body' => json_encode($body),
        'headers' => array(
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $api_token,
        ),
    );

    $response = wp_remote_post($api_url, $args);
    $response_code = wp_remote_retrieve_response_code($response);
    if (is_wp_error($response)) {
       
        $error_message = $response->get_error_message();
        // echo 'Erreur de requête : ' . $error_message;
    } else {
        
        if ($response_code === 200) {
           
            $response_body = json_decode(wp_remote_retrieve_body($response), true);
            
            if (isset($response_body['tiny_url'])) {
                return $response_body['tiny_url'];
            } else {
                // echo ($error_message['errors']);
                return 'Impossible de raccourcir cet url';
            }
        } else {
            echo 'La requête a échoué avec le code de statut : ' . $response_code;
        }
    }
}

// genere l'url du post deja minifié
function generate_tinyurl_on_publish($id, $post) {
    if ($post->post_status == 'publish' && !wp_is_post_revision($id)) {
        $url = get_permalink($id);
        $tinyurl = api_rest_generate_url($url);
        update_post_meta($id, 'tinyurl', $tinyurl);
    }
}

// Ajout d'une colonne dans le backoffice pour afficher les urls minifiés de chque articles
function tinyurl_column_head($defaults) {
    $defaults['tinyurl'] = 'ShortURL'; 
    return $defaults;
}
// Ajout de la colonne
add_filter('manage_posts_columns', 'tinyurl_column_head'); 

function tinyurl_column_content($column_name, $post_ID) {
    if ($column_name == 'tinyurl') {
        $tinyurl = get_post_meta($post_ID, 'tinyurl', true);
        if (!empty($tinyurl)) {
            echo '<a href="' . esc_url($tinyurl) . '" target="_blank">' . esc_url($tinyurl) . '</a>';
        } else {
            echo 'Url non disponible';
        }
    }
}
add_action('manage_posts_custom_column', 'tinyurl_column_content', 10, 2);

add_action('publish_post', 'generate_tinyurl_on_publish', 10, 2);

// test de l'API

$url = 'https://v2.fr.vuejs.org/v2/guide/conditional.html'; 
$url_short = api_rest_generate_url($url); 

// Affichage du résultat du test
echo 'URL à raccourcir : ' . $url. '<br>';
echo 'URL minifiée : ' . $url_short . '<br>';
