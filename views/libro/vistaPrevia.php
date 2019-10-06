<script type="text/javascript" src="https://www.google.com/books/jsapi.js"></script>
<script type="text/javascript">
    google.books.load();

    function initialize() {
        var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
        viewer.load('ISBN:<?= $isbn ?>');
    }
    google.books.setOnLoadCallback(initialize);
    
    window.onload = function(){
        var contenedor = document.getElementById("contenedor_carga");
        contenedor.style.visibility = 'hidden';
        contenedor.style.opacity = '0';
    }
</script>

<div id="contenedor_carga">
    <div id="carga"></div>
</div>

<div id="viewerCanvas" style="width: auto; height: 600px"></div>

    