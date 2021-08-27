<?php
    // Get Params from URL
    $country = get_query_var('country');
    $language = get_query_var('language');
    // Output them
    echo('hi ' . $country . ", " , 'language');
?>
