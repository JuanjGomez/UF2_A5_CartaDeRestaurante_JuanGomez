<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/carta.css">
    <title>Ale-Mania</title>
</head>
<body>
    <?php
        if(file_exists('./xml/platos.xml')){
            $menu=simplexml_load_file('./xml/platos.xml');
        } else {
            exit('Error en concetar el archivo platos.xml');
        }
    ?>
    <header class="flex"></header>
    <div class="menu" id="menu">
    <div class="cover" id="cover">
        <p id="consejo">(Da 5 clicks para abrir y otros 5 para cerrar el menú)</p>
    </div>
    <div class="content">
        <section classs="row">
            <div id="left">
                <h1 class="burn"><strong>Menú del Restaurante</strong></h1>
                <br>
                </br>
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="carrusel" src="./img/brezel.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h7><strong class="negrita">BREZEL</strong></h7>
                                <p><strong class="negrita">Entrada tradicional</strong></p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="carrusel" src="./img/wiener-schnitzel.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h7><strong class="negrita">WIENER-SCHNITZEL</strong></h7>
                                <p><strong class="negrita">Plato estrella.</strong></p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="carrusel" src="./img/apfelstrudel.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h7><strong class="negrita">APFELSTRUDEL</strong></h7>
                                <p><strong class="negrita">El especial de la casa.</strong></p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                </br>
                <br>
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="./index.php">Ale-Manía</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                            <?php
                                $aux=[];
                                foreach($menu->plato as $platillo){
                                    if(!in_array((string)$platillo['tipo'],$aux)){
                                        echo'<li class="nav-item">';
                                        if(isset($_GET['tipo']) && $_GET['tipo']==(string)$platillo['tipo']){
                                            echo'<a class="nav-link active" aria-current="page" href="index.php?cine='.$platillo['tipo'].'">'.$platillo['tipo'].'</a>';
                                        } else {
                                            echo '<a class="nav-link" aria-current="page" href="index.php?tipo='.$platillo['tipo'].'">'.$platillo['tipo'].'</a>';

                                        }
                                        echo'</li>';
                                        array_push($aux,(string)$platillo['tipo']);
                                    }
                                }
                            ?>
                            </ul>
                        </div>
                    </div>
                </nav>
                </br>
                <div>
                    <?php
                        if(isset($_GET['tipo'])){
                            foreach($menu->plato as $platillo){
                                if(isset($_GET['tipo']) && $_GET['tipo'] == $platillo['tipo'] && $platillo['tipo'] == "entrantes"){
                                    echo "<h3><strong>".$platillo->title."</strong></h3>";
                                    echo '<div id="platos" class="boots">';
                                    echo '<div class="container">';
                                    echo '<div class="card">';
                                    echo '<div class="imgBx">';
                                    echo '<img src="'.$platillo->imagen['src'].'">';
                                    echo '</div>';
                                    echo "<p>".$platillo->castella."----------<strong>".$platillo->precio."</strong></p>";
                                    echo "<p>".$platillo->descripcion."</p>";
                                    echo '<p><img src="'.$platillo->alergenos->items['src'].'"><img src="'.$platillo->alergenos->item['src'].'"><img src="'.$platillo->alergenos->ite['src'].'"'.$platillo->alergenos->items.'</p>';
                                    echo "<p>".$platillo->calorias."</p>";
                                    echo "<h5>".$platillo->nombre."</h5>";
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                                }
                            }
                        } else {
                            foreach($menu->plato as $platillo){
                                if($platillo['tipo'] == "entrantes"){
                                    echo "<h3><strong>".$platillo->title."</strong></h3>";
                                    echo '<div id="platos" class="boots">';
                                    echo '<div class="container">';
                                    echo '<div class="card">';
                                    echo '<div class="imgBx">';
                                    echo '<img src="'.$platillo->imagen['src'].'">';
                                    echo '</div>';
                                    echo "<p>".$platillo->castella."----------<strong>".$platillo->precio."</strong></p>";
                                    echo "<p>".$platillo->descripcion."</p>";
                                    echo '<p><img src="'.$platillo->alergenos->items['src'].'"><img src="'.$platillo->alergenos->item['src'].'"><img src="'.$platillo->alergenos->ite['src'].'"'.$platillo->alergenos->items.'</p>';
                                    echo "<p>".$platillo->calorias."</p>";
                                    echo "<h5>".$platillo->nombre."</h5>";
                                    echo '</div>';
                                    echo '</div>';
                                    echo '</div>';
                            }
                        }
                        }
                        foreach($menu->promociones as $promocion){
                            if(isset($_GET['tipo']) && $_GET['tipo'] == $promocion['promo'] && ($promocion['promo'] == "platos" || $promocion['promo'] == "postres")){
                                echo "<h3><strong>".$promocion->subtitle."</strong></h3>";
                                echo '<div class="aspecto">';
                                echo '<h3>'.$promocion->oferta.'</h3>';
                                echo '<p>'.$promocion->previa.'</p>';
                                echo '</div>';
                                echo '<br>';
                            } 
                        }
                        foreach($menu->promociones as $promocion){
                            if(isset($_GET['tipo']) && $_GET['tipo'] == $promocion['promoplato'] && ($promocion['promoplato'] == "platos" || $promocion['promoplato'] == "postres")){
                                echo "<h3><strong>".$promocion->subtitle."</strong></h3>";
                                echo '<div class="aspecto">';
                                echo '<h3>'.$promocion->oferta.'</h3>';
                                echo '<p>'.$promocion->previa.'</p>';
                                echo '</div>';
                                echo '<br>';
                            } 
                        }
                    ?>
                </div>
            </div>
            <div id="center">
                <?php
                    if(isset($_GET['tipo'])){
                        foreach($menu->plato as $platillo){
                            if(isset($_GET['tipo']) && $_GET['tipo'] == $platillo['tipo'] && $platillo['tipo'] == "platos"){
                                echo "<h3><strong>".$platillo->title."</strong></h3>";
                                echo '<div id="platos" class="boots">';
                                echo '<div class="container">';
                                echo '<div class="card">';
                                echo '<div class="imgBx">';
                                echo '<img src="'.$platillo->imagen['src'].'">';
                                echo '</div>';
                                echo "<p>".$platillo->castella."----------<strong>".$platillo->precio."</strong></p>";
                                echo "<p>".$platillo->descripcion."</p>";
                                echo '<p><img src="'.$platillo->alergenos->items['src'].'"><img src="'.$platillo->alergenos->item['src'].'"><img src="'.$platillo->alergenos->ite['src'].'"'.$platillo->alergenos->items.'</p>';
                                echo "<p>".$platillo->calorias."</p>";
                                echo "<h5>".$platillo->nombre."</h5>";
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            } 
                        }
                    } else {
                        foreach($menu->plato as $platillo){
                            if($platillo['tipo'] == "platos"){
                                echo "<h3><strong>".$platillo->title."</strong></h3>";
                                echo '<div id="platos" class="boots">';
                                echo '<div class="container">';
                                echo '<div class="card">';
                                echo '<div class="imgBx">';
                                echo '<img src="'.$platillo->imagen['src'].'">';
                                echo '</div>';
                                echo "<p>".$platillo->castella."----------<strong>".$platillo->precio."</strong></p>";
                                echo "<p>".$platillo->descripcion."</p>";
                                echo '<p><img src="'.$platillo->alergenos->items['src'].'"><img src="'.$platillo->alergenos->item['src'].'"><img src="'.$platillo->alergenos->ite.'"'.$platillo->alergenos->items.'</p>';
                                echo "<p>".$platillo->calorias."</p>";
                                echo "<h5>".$platillo->nombre."</h5>";
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    }
                    foreach($menu->promociones as $promocion){
                        if(isset($_GET['tipo']) && $_GET['tipo'] == $promocion['promox'] && ($promocion['promox'] == "platos" || $promocion['promox'] == "postres")){
                            echo "<h3><strong>".$promocion->subtitle."</strong></h3>";
                            echo '<div class="aspecto">';
                            echo '<h3>'.$promocion->oferta.'</h3>';
                            echo '<p>'.$promocion->previa.'</p>';
                            echo '</div>';
                            echo '<br>';
                        } 
                    }
                    foreach($menu->promociones as $promocion){
                        if(isset($_GET['tipo']) && $_GET['tipo'] == $promocion['promoent'] && ($promocion['promoent'] == "entrantes" || $promocion['promoent'] == "postres")){
                            echo "<h3><strong>".$promocion->subtitle."</strong></h3>";
                            echo '<div class="aspecto">';
                            echo '<h3>'.$promocion->oferta.'</h3>';
                            echo '<p>'.$promocion->previa.'</p>';
                            echo '</div>';
                            echo '<br>';
                        } 
                    }
                ?>
            </div>
            <div id="right">
                <?php
                    if(isset($_GET['tipo'])){
                        foreach($menu->plato as $platillo){
                            if(isset($_GET['tipo']) && $_GET['tipo'] == $platillo['tipo'] && $platillo['tipo'] == "postres"){
                                echo "<h3><strong>".$platillo->title."</strong></h3>";
                                echo '<div id="platos" class="boots">';
                                echo '<div class="container">';
                                echo '<div class="card">';
                                echo '<div class="imgBx">';
                                echo '<img src="'.$platillo->imagen['src'].'">';
                                echo '</div>';
                                echo "<p>".$platillo->castella."----------<strong>".$platillo->precio."</strong></p>";
                                echo "<p>".$platillo->descripcion."</p>";
                                echo '<p><img src="'.$platillo->alergenos->items['src'].'"><img src="'.$platillo->alergenos->item['src'].'"><img src="'.$platillo->alergenos->ite['src'].'"'.$platillo->alergenos->items.'</p>';
                                echo "<p>".$platillo->calorias."</p>";
                                echo "<h5>".$platillo->nombre."</h5>";
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            } 
                        }
                    } else {
                        foreach($menu->plato as $platillo){
                            if($platillo['tipo'] == "postres"){
                                echo "<h3><strong>".$platillo->title."</strong></h3>";
                                echo '<div id="platos" class="boots">';
                                echo '<div class="container">';
                                echo '<div class="card">';
                                echo '<div class="imgBx">';
                                echo '<img src="'.$platillo->imagen['src'].'">';
                                echo '</div>';
                                echo "<p>".$platillo->castella."----------<strong>".$platillo->precio."</strong></p>";
                                echo "<p>".$platillo->descripcion."</p>";
                                echo '<p><img src="'.$platillo->alergenos->items['src'].'"><img src="'.$platillo->alergenos->item['src'].'"><img src="'.$platillo->alergenos->ite['src'].'"'.$platillo->alergenos->items.'</p>';
                                echo "<p>".$platillo->calorias."</p>";
                                echo "<h5>".$platillo->nombre."</h5>";
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    }
                    foreach($menu->promociones as $promocion){
                        if(isset($_GET['tipo']) && $_GET['tipo'] == $promocion['promoentre'] && ($promocion['promoentre'] == "entrantes" || $promocion['promoentre'] == "platos")){
                            echo "<h3><strong>".$promocion->subtitle."</strong></h3>";
                            echo '<div class="aspecto">';
                            echo '<h3>'.$promocion->oferta.'</h3>';
                            echo '<p>'.$promocion->previa.'</p>';
                            echo '</div>';
                            echo '<br>';
                        } 
                    }
                    foreach($menu->promociones as $promocion){
                        if(isset($_GET['tipo']) && $_GET['tipo'] == $promocion['promopla'] && ($promocion['promopla'] == "platos" || $promocion['promopla'] == "postres")){
                            echo "<h3><strong>".$promocion->subtitle."</strong></h3>";
                            echo '<div class="aspecto">';
                            echo '<h3>'.$promocion->oferta.'</h3>';
                            echo '<p>'.$promocion->previa.'</p>';
                            echo '</div>';
                            echo '<br>';
                        } 
                    }
                ?>
                <h3>Bebidas:</h3>
                <div id="general">
                    <div id="cuerpo">
                        <main>
                            <div class="cart">
                                <img src="./img/bebidas/agua.jpeg" alt="" class="image">
                                <img src="./img/bebidas/agua.jpeg" alt="" class="background">
                                <div class="layer">
                                    <div class="info">
                                        <h5>Agua</h5>
                                        <p>Agua natural</p>
                                        <p>1.50€</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cart">
                                <img src="./img/bebidas/coca-cola.png" alt="" class="image">
                                <img src="./img/bebidas/coca-cola.png" alt="" class="background">
                                <div class="layer">
                                    <div class="info">
                                        <h5>Coca cola</h5>
                                        <p>Vaso de coca cola</p>
                                        <p>2€</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cart">
                                <img src="./img/bebidas/vino.jpg" alt="" class="image">
                                <img src="./img/bebidas/vino.jpg" alt="" class="background">
                                <div class="layer">
                                    <div class="info">
                                        <h5>Vino</h5>
                                        <p>Botella de vino tinto</p>
                                        <p>20€</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cart">
                                <img src="./img//bebidas/te.jpeg" alt="" class="image">
                                <img src="./img//bebidas/te.jpeg" alt="" class="background"> 
                                <div class="layer">
                                    <div class="info">
                                        <h5>Té</h5>
                                        <p>Taza de té</p>
                                        <p>2.50€</p>
                                    </div>
                                </div> 
                            </div>
                            <div class="cart">
                                <img src="./img/bebidas/cerveza.jpg" alt="" class="image">
                                <img src="./img/bebidas/cerveza.jpg" alt="" class="background">
                                <div class="layer">
                                    <div class="info">
                                        <h5>Cerveza</h5>
                                        <p>Vaso de cerveza</p>
                                        <p>3€</p>
                                    </div>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </section>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./javascript/abrir_carta.js"></script>
</body>
</html>