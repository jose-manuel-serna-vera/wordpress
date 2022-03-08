<?php

function plz_script_registro(){
    wp_register_script("plz-registro",plugins_url( "../assets/js/registro.js",__FILE__));
}

add_action("wp_enqueue_scripts",'plz_script_registro');

function plz_add_register_form()
{
    wp_enqueue_script("plz-registro");
    $response = '
            <form id="signin">
            <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">Well never share your email with anyone else.</small>
            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    ';

    return $response;
}


// agregar shortcode
add_shortcode('plz_registro', 'plz_add_register_form');
