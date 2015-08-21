<?php
    $presenter = new \Illuminate\Pagination\BootstrapThreePresenter($pager);
?>

{!! $pager->render($presenter) !!}