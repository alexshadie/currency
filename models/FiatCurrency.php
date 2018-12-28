<?php
return [
    'ns' => 'alexshadie\currency',
    'path' => '',
    'useCoreUtils' => false,
    'fields' => [
        'id' => 'int',
        'code' => 'string',
        'name' => 'string',
        'unit' => 'int',
        'countryId' => '?int',
        'countryName' => 'string',
    ],
];
