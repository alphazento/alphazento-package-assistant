<?php echo "<?php"; ?>

return [
    "{{$packageName}}" => [
        "version" => "0.0.1",
        //'vuetheme_type' => 'frontend', //if your package is a theme package. frontend or backend
        //"vue_component" => true, //if you have custome vue component defined.
        "commands" => [], //Extended command classes
        "providers" => [
            {{$packageNamespace}}\Providers\Plugin::class,
        ],
        "listeners" => [],
        "middlewares" => [],
        "middlewaregroup" => [],
        //"depends" => [],
    ],
];
