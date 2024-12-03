<?php
    require_once './vendor/autoload.php';
    require_once './script/linkMethods.php';
    require_once './script/textMethods.php';
    use DiDom\Document;

    $url = "https://code.mu" . $_SERVER["REQUEST_URI"];
    $content = @file_get_contents($url);

    if ($content) {
        $dom = new Document($content);
        $css = $dom->find("*:not(a)");

        foreach ( $css as $elem ) {
            modifyLinks($elem);
        }
    
        $footer = $dom->first("footer");
        if ($footer) {
            $footer->remove();
        }

        $newHeader = (string) require_once './pages/header.php';    
        $header = $dom->first("div[data-w='nict/adv']");
        if ($header) {
            $header->setInnerHtml($newHeader);
        }
    
        $corrects = require_once './script/corrects.php';    
        replaceText($dom, $corrects);

        echo $dom;
    } 
    
    else {
        echo require_once './pages/error.php';
    }