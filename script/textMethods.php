<?php
    function replaceText($dom, $corrects) {
        $tags = ["h1", "h2", "span", "p", "a"];

        foreach ($tags as $tag) {
            $elems = $dom->find($tag);

            foreach ($elems as $elem) {

                foreach ($corrects as $search => $replace) {
                    $elemText = strtolower($elem->text());
                    $elemText = str_ireplace($search, $replace, $elemText);
        
                    $elem->setInnerHtml($elemText);   
                }
            }
        }
    }