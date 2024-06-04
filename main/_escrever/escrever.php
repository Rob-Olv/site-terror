<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="escrever.css">
    <link href="utils/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="utils/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <iframe src="../navbar/navbar.html" width="100%" height="50" frameborder="0" id="navbar"></iframe>

    <div class="body-content">
        <div class="table-content">
        <?php
            if (isset($_GET['acao'])) {
                $acao = $_GET['acao'];

                if ($acao === 'escrever_historia') {
                    echo "<div class='card-content'>";
                    echo "</div>";
                } else {
                    
                }
            } else {
                
            }
        ?>
        </div>
    </div>

    <script src="escrever.js"></script>
    <iframe id="footer" src="../footer/footer.html" width="100%" height="80" frameborder="0"></iframe>
</body>
</html>