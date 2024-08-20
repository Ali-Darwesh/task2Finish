<?php
trait ErrorHandling {
    public function show_error($message) {
        echo "<div class='alert alert-danger'>{$message}</div>";
    }
}