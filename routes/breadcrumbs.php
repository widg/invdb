<?php

Breadcrumbs::for('admin.cisco', function ($trail) {
    $trail->push('Title Here', route('admin.cisco'));
});

require __DIR__.'/breadcrumbs/backend/backend.php';
