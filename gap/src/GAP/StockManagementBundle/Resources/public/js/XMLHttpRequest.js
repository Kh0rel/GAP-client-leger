function getXMLHttpRequest(){
    if (window.XMLHttpRequest || window.ActiveXObject) {
        if (window.ActiveXObject) {
            try {
                var xhr = new ActiveXObject("Msxm12.XMLHTTP");
            } catch (e) {
                var xhr = new ActiveXObject("Microsoft.XMLHTTP");
            }
        } else {
            var xhr = new XMLHttpRequest();
        }
    } else {
        console.log("Votre navigateur ne supporte pas l'objet XMLHTTPRequest ...");
        return null;
    }

    return xhr;
}