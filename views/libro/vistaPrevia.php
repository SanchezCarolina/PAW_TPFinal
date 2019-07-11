<script type="text/javascript" src="https://www.google.com/books/jsapi.js"></script>
<script type="text/javascript">
    google.books.load();

    function initialize() {
        var viewer = new google.books.DefaultViewer(document.getElementById('viewerCanvas'));
        viewer.load('ISBN:<?= $isbn ?>');
    }
    google.books.setOnLoadCallback(initialize);
</script>
<div id="viewerCanvas" style="width: auto; height: 600px"></div>
