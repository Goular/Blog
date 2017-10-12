<?php
/**
 * 用于网站加密时候使用加SALT,可能暂时没什么用，通过自定义加密规则，可以使机密更加保险
 */
return [
    'salt' => env('ENCRYPT_SALT','')
];