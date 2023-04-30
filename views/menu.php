<?php

namespace PHPMaker2023\appmessage;

// Menu Language
if ($Language && function_exists(PROJECT_NAMESPACE . "Config") && $Language->LanguageFolder == Config("LANGUAGE_FOLDER")) {
    $MenuRelativePath = "";
    $MenuLanguage = &$Language;
} else { // Compat reports
    $LANGUAGE_FOLDER = "../lang/";
    $MenuRelativePath = "../";
    $MenuLanguage = Container("language");
}

// Navbar menu
$topMenu = new Menu("navbar", true, true);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", true, false);
$sideMenu->addMenuItem(4, "mci_SendMessage", $MenuLanguage->MenuPhrase("4", "MenuText"), $MenuRelativePath . "MessageTblAdd", -1, "", true, false, true, "", "", false, true);
$sideMenu->addMenuItem(2, "mi_sent_tbl", $MenuLanguage->MenuPhrase("2", "MenuText"), $MenuRelativePath . "SentTblList?cmd=resetall", -1, "", true, false, false, "", "", false, true);
$sideMenu->addMenuItem(3, "mi_contact_tbl", $MenuLanguage->MenuPhrase("3", "MenuText"), $MenuRelativePath . "ContactTblList", -1, "", true, false, false, "", "", false, true);
echo $sideMenu->toScript();
