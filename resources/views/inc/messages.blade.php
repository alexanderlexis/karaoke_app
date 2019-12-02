<?php
if(count($errors) > 0){
    foreach($errors->all() as $error){
        echo '<div class="alert alert-danger">';
        echo $error;
        echo '</div>';
    }

    if(session('success')){
        echo '<div class="alert alert-success">';
        echo session('success');
        echo '</div>';
    }

    if(session('error')){
        echo '<div class="alert alert-danger">';
        echo session('error');
        echo '</div>';
    }
}
