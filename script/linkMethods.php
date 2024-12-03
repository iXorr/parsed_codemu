<?php
    function changeLink($elem, $attr) {
        $elemAttr = $elem->getAttribute($attr);

        if ($elemAttr AND $elemAttr[0] !== "#" AND !str_contains($elemAttr, "https://"))
            $elem->setAttribute($attr, "https://code.mu" . $elemAttr);
    }
    function modifyLinks($elem) {
        changeLink($elem, "href");
        changeLink($elem, "src");
    }