<?php

return [
    'view' => 'partials.breadcrumb',

    'files' => base_path('routes/breadcrumbs.php'),

    'unnamed-route-exception' => false,
    'missing-route-bound-breadcrumb-exception' => false,
    'invalid-named-breadcrumb-exception' => true,

    'manager-class' => Diglactic\Breadcrumbs\Manager::class,
    'generator-class' => Diglactic\Breadcrumbs\Generator::class,
];
