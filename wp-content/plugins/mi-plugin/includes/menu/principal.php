<?php
global $wpdb;
if (isset($_POST['codigo_ga'])) {
    $post_title =  $_POST['codigo_ga'];
    $sql = "SELECT * FROM {$wpdb->prefix}posts p WHERE p.post_title like '%{$post_title}%' AND p.post_type = 'product'";
    // $datos = array(
    //     "meta_id" => null,
    //     "post_id" => 28,
    //     "meta_key" => "_subscription_checked",
    //     "meta_value" => "0"
    // );
    // $wpdb->insert("{$wpdb->prefix}postmeta", $datos);
} else {
    $post_title = "";
    $sql = "SELECT * FROM {$wpdb->prefix}posts p WHERE p.post_title like '%{$post_title}%' AND p.post_type = 'product'";
}
$lista = $wpdb->get_results($sql, ARRAY_A);
// print_r($_POST);
foreach ($lista as $key => $value) {
    $sql2 = "SELECT * FROM {$wpdb->prefix}posts p WHERE p.post_parent = '" . $value['ID'] . "' ";
    $listaVariation = $wpdb->get_results($sql2, ARRAY_A);

    foreach ($listaVariation as  $valores) {
    }
}

// if (!empty($lista)) {

//     // print_r($lista);
//     foreach ($lista as $key => $value) {
//         echo $value['post_title'];
//         echo '<br/>';
//         echo $value['post_status'];
//     }
// }

// echo '<div>'.get_admin_page_title().'</div>'
?>
<br>
<br>
<br>
<br>
<form method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Producto</label>
        <input type="hidden" class="form-control" value="guardar_qa">
        <?php wp_nonce_field('token_ga') ?>

        <input type="text" name="codigo_ga" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </div>
</form>
<table class="table" border="1">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Post title</th>
            <th scope="col">Post Status</th>
            <th scope="col">Last</th>
            <th scope="col" colspan="2">Variation</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($lista as $key => $value) { ?>
            <tr>
                <td><?= $value['ID'] ?></td>
                <td><?= $value['post_title'] ?></td>
                <td><?= $value['post_status'] ?></td>
                <td><?= $value['post_status'] ?></td>
                <td>
                    <?php
                    $sql2 = "SELECT * FROM {$wpdb->prefix}posts p WHERE p.post_parent = '" . $value['ID'] . "' AND p.post_status != 'trash' ";
                    $listaVariation = $wpdb->get_results($sql2, ARRAY_A);
                    ?>
                    <ul name="mi-select" class="wc_input_subscription_trial_period">
                        <?php foreach ($listaVariation as  $valores) { ?>
                            <li value="<?= $valores['ID'] ?>"><?= $valores['post_title'] ?> || Suscription :
                                <form method="POST">
                                    <input type="checkbox" name="checked_suscription" <?php echo $valores['suscription_check'] == '0' ?  'value="off"' : 'checked="true" value="on"'; ?>>
                                    <input type="text" name="post_id" value="<?= $valores['ID'] ?>" style="display:none">
                                    <button type="submit" class="btn btn-primary">guardar</button>
                                    <div class="form-group">
                                    </div>
                                </form>
                            </li>
                        <?php } ?>
                    </ul>

                </td>

            </tr>
        <?php } ?>
    </tbody>
</table>
<?php
add_action('admin_post_guardar_ga', 'cn_guardar_ga');

if (isset($_POST['checked_suscription'])) {
    print_r($_POST);
    $wpdb->update(
        "{$wpdb->prefix}posts",
        array(
            'suscription_check' => '1'
        ),
        array('ID' => $_POST['post_id'])
    );
} else {
    print_r($_POST);

    if (isset($_POST['post_id'])) {
        $wpdb->update(
            "{$wpdb->prefix}posts",
            array(
                'suscription_check' => '0'
            ),
            array('ID' => $_POST['post_id'])
        );
    }
}

?>