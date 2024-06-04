<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="historias.css">
        <link href="utils/bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="utils/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body>
        <iframe src="../navbar/navbar.html" width="100%" height="50" frameborder="0" id="navbar"></iframe>

        <div class="body-content">
            <div class="table-content">
                <?php
                    include '../../conexao.php';

                    $itemsPerPage = 12; 
                    $page = isset($_GET['page']) ? $_GET['page'] : 1; 
                    $offset = ($page - 1) * $itemsPerPage;

                    $sql = "SELECT TemaId, UsuarioId, Titulo FROM historia LIMIT $offset, $itemsPerPage";
                    $result = $conn->query($sql);

                    echo "<div class='btn-content'>";
                    echo "<a href='../_escrever/escrever.php?acao=escrever_historia'>+</a>";
                    echo "</div>";

                    if ($result->num_rows > 0) {
                        echo "<div class='card-content'>";
                            while($row = $result->fetch_assoc()) {
                                echo "<div class='card'>";
                                echo "<h3>" . $row["Titulo"] . "</h3>";
                                echo "<p><strong>Tema:</strong> " . $row["TemaId"] . "</p>";
                                echo "<p><strong>Autor:</strong> " . $row["UsuarioId"] . "</p>";
                                echo "</div>";
                            }
                        echo "</div>";

                        $sql = "SELECT COUNT(*) AS total FROM historia";
                        $result = $conn->query($sql);
                        $row = $result->fetch_assoc();
                        $totalPages = ceil($row['total'] / $itemsPerPage);

                        echo "<div class='pagination'>";
                        if ($page > 1) {
                            echo "<a href='?page=".($page - 1)."'>Anterior</a>";
                        }
                        for ($i = 1; $i <= $totalPages; $i++) {
                            echo "<a href='?page=$i'>$i</a>";
                        }
                        if ($page < $totalPages) {
                            echo "<a href='?page=".($page + 1)."'>Próximo</a>";
                        }
                        echo "</div>";
                    } else {
                        echo "0 resultados";
                    }

                    mysqli_close($conn);
                ?>
            </div>
        </div>

        <script src="historias.js"></script>
        <iframe id="footer" src="../footer/footer.html" width="100%" height="80" frameborder="0"></iframe>
    </body>
</html>