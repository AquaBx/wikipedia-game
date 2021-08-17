<?php

    $lang = $_GET["lang"];
    $title = $_GET["title"];
    if(isset($lang) and isset($title)){
        $url = "https://$lang.wikipedia.org/wiki/$title";
        echo file_get_contents($url);
    }

?>

<script>

var lang = "<?php echo $lang ?>";

var ndiv = document.createElement("div")
ndiv.innerHTML = document.querySelector("#content").innerHTML
ndiv.style.margin = "50px";

var css0 = document.createElement("link")
css0.rel = "stylesheet"
css0.href = "https://fr.wikipedia.org/w/load.php?lang=fr&modules=ext.cite.styles%7Cext.echo.styles.badge%7Cext.uls.interlanguage%7Cext.visualEditor.desktopArticleTarget.noscript%7Cext.wikimediaBadges%7Cmediawiki.ui.button%2Cicon%7Coojs-ui.styles.icons-alerts%7Cskins.vector.icons%2Cstyles%7Cwikibase.client.init&only=styles&skin=vector"

var css1 = document.createElement("link")
css1.rel = "stylesheet"
css1.href = "https://fr.wikipedia.org/w/load.php?lang=fr&modules=site.styles&only=styles&skin=vector"

document.body.innerHTML = ""
document.querySelector("head").remove()

document.body.appendChild(css0)
document.body.appendChild(css1)
document.body.appendChild(ndiv)

for (item of document.querySelectorAll("a")){
    if ( item.href.startsWith(location.origin + "/wiki/") ){
        item.href = "cleanpage.php?lang=" + lang + "&title=" + item.href.split("/wiki/")[1]
    }
    else if ( item.href.includes(location.href + "#") ){
        //
    }
    else{
        item.remove()
    }
}

</script>
