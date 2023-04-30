<?php
/**
 * PHPMaker 2023 user level settings
 */
namespace PHPMaker2023\appmessage;

// User level info
$USER_LEVELS = [["-2","Anonymous"]];
// User level priv info
$USER_LEVEL_PRIVS = [["{8A3F9354-B253-4C98-921B-87028B8AF986}message_tbl","-2","0"],
    ["{8A3F9354-B253-4C98-921B-87028B8AF986}sent_tbl","-2","0"],
    ["{8A3F9354-B253-4C98-921B-87028B8AF986}contact_tbl","-2","0"],
    ["{8A3F9354-B253-4C98-921B-87028B8AF986}sendsms.php","-2","0"]];
// User level table info
$USER_LEVEL_TABLES = [["message_tbl","message_tbl","Send",true,"{8A3F9354-B253-4C98-921B-87028B8AF986}","MessageTblList"],
    ["sent_tbl","sent_tbl","Sent",true,"{8A3F9354-B253-4C98-921B-87028B8AF986}","SentTblList"],
    ["contact_tbl","contact_tbl","Contacts",true,"{8A3F9354-B253-4C98-921B-87028B8AF986}","ContactTblList"],
    ["sendsms.php","sendsms","SENDMESSAGE",true,"{8A3F9354-B253-4C98-921B-87028B8AF986}","Sendsms"]];
