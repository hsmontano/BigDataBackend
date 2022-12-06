<?php
    include ('head.php')
?>
    <body>
    <!--<video src="img/video.mp4" id="vidFondo"></video>-->

    <div class="contenedor">
        <div class="card rowTitulo">
            <h1>Buscador</h1>
        </div>
        <div class="colFiltros">
            <form action="search.php" method="post" id="formulario">
                <div class="filtrosContenido">
                    <div class="tituloFiltros">
                        <h5>Realiza una búsqueda personalizada</h5>
                    </div>
                    <div class="filtroCiudad input-field">
                        <label for="selectCiudad">Ciudad:</label>
                        <select name="ciudad" id="selectCiudad">
                            <option value="" selected>Elige una ciudad</option>
                        </select>
                    </div>
                    <div class="filtroTipo input-field">
                        <label for="selectTipo">Tipo:</label><br>
                        <select name="tipo" id="selectTipo">
                            <option value="" selected>Elige un tipo</option>
                        </select>
                    </div>
                    <div class="filtroPrecio">
                        <label for="rangoPrecio">Precio:</label>
                        <input type="text" id="rangoPrecio" name="precio" value="" />
                    </div>
                    <div class="botonField">
                        <input type="submit" class="btn white" value="Buscar" id="submitButton">
                    </div>
                </div>
            </form>
        </div>

        <div class="colContenido" id="itemProducto">
            <div class="tituloContenido card">
                <h5>Resultados de la búsqueda:</h5>
                <div class="divider"></div>
                <button type="button" name="todos" class="btn-flat waves-effect" id="mostrarTodos">Mostrar Todos</button>
            </div>
<?php
$data = file_get_contents("data-1.json");
$inmuebles = json_decode($data);
$filtroAply = (isset($_POST["ciudad"]) && boolval($_POST["ciudad"])) || (isset($_POST["tipo"]) && boolval($_POST["tipo"])) || (isset($_POST["precio"]) && boolval($_POST["precio"]));
$filtroCiudad = $_POST["ciudad"];
$filtroTipo = $_POST["tipo"];
$filtroPrecio = $_POST["precio"];
$separador = ";";
$precioSeparado = explode($separador, $filtroPrecio);
$filtroPrecioIni = $precioSeparado[0];
$filtroPrecioFin = $precioSeparado[1];
$matchCiudad = true;
$matchTipo = true;
$matchPrecio = true;
try {
    include ('head.php');

    foreach($inmuebles as $key => $json) {
        $precio = str_ireplace(["$",","], "", $json->Precio);
        $precio = intval($precio);
        $matchPrecio = ($precio >= intval($filtroPrecioIni) && $precio <= intval($filtroPrecioFin));
        if($filtroAply){
            $matchCiudad =  ($matchCiudad=="" || (!empty($filtroCiudad) && $json->Ciudad == $filtroCiudad));
            $matchTipo = ($matchTipo=="" || (!empty($filtroTipo) && ($json->Tipo == $filtroTipo)));
        }
        //Sí Aplica filtro y no es coincidente continua el ciclo sin imprimir un elemento;
        if($filtroAply && !($matchCiudad && $matchTipo && $matchPrecio)){
            continue;
        }
        ?>
        <div class="row">
            <div class="col m12">
                <div class="card horizontal itemMostrado">
                    <img src="img/home.jpg">
                    <div class="card-stacked">
                        <div class="card-content">
                            <?php
                            foreach($json as $keyProp => $prop){
                                $class = ($keyProp=="Precio") ? 'class="precioTexto"' : null;
                                if($keyProp=="Id"){ continue; }
                                echo "<p><strong>$keyProp:</strong> <span $class>$prop</span><p>";
                            }
                            ?>
                        </div>
                        <div class="card-action">
                            <a href="#" class="precioTexto">VER MÁS</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}catch (Exception $e) {
    echo $e->getMessage();
}
?>
        </div>
    </div>

    <script type="text/javascript" src="js/jquery-3.0.0.js"></script>
    <script type="text/javascript" src="js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/index.js"></script>
    </body>
</html>
