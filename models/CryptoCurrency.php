<?php
return [
    'ns' => 'alexshadie\currency',
    'path' => '',
    'useCoreUtils' => false,
    'fields' => [
        'id' => 'int',
        'code' => 'string',
        'name' => 'string',
        'logo' => '?string',
        'explorer' => 'jsonarray',
        'site' => 'jsonarray',
        'chat' => 'jsonarray',
        'announcement' => '?string',
        'confirmations' => '?int',
        'supply' => '?float',
        'sourceCode' => '?string',
        'documentation' => '?string',
        'type' => 'string',
        'isMineable' => 'bool',
    ],
];
