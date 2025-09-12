<?php
require_once 'ClassAutoLoad.php';

$mailCont = [
    'name_from' => 'Baro',
    'mail_from' => 'baraka.onserio@strathmore.edu',
    'name_to' => 'Mwiziraeli',
    'mail_to'=> 'barakaonserio@gmail.com',
    'subject' => 'VERSE OF THE DAY',
    'body' => 'Romans 16:20 - The God of peace will soon crush Satan under your feet. The grace of our Lord Jesus be with you.'
];

$ObjSendMail->Send_Mail($conf, $mailCont);