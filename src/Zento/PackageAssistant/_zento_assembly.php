<?php
return [
    "Zento_PackageAssistant" => [
        "version" => "1.0.0",
        "commands" => [
            "\\Zento\\PackageAssistant\\Console\\PackageGenCommand",
        ],
        "providers" => [
            "\\Zento\\PackageAssistant\\Providers\\Plugin",
        ],
    ],
];
