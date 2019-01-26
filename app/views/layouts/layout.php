<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My app</title>
    <link rel="stylesheet" href="/../../../tp_MvC_php/public/css/bulma.min.css">
    <link href="/../../../tp_MvC_php/public/css/main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  </head>
  <body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
          <a class="navbar-item" href="https://bulma.io">
            <img src="" width="112" height="28">
          </a>
      
          <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
          </a>
        </div>
      
        <div id="navbarBasicExample" class="navbar-menu">
          <div class="navbar-start">
            <a class="navbar-item">
              
            </a>
          </div>

        </div>
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <!-- <a class="button is-primary">
                <strong>Registrate</strong>
              </a>
              <a class="button is-light">
                Iniciar Sesión
              </a> -->
            </div>
          </div>
        </div>
      </nav>
    <div class="container is-fluid container-main">
      <div class="columns">
        <div class="column is-one-fifth">
            <aside class="menu">
              <p class="menu-label">
                General
              </p>
              <ul class="menu-list">
                <li><a href="/tp_MvC_php">Inicio</a></li>
                <li><a href='/tp_MvC_php/routes/index'>Rutas</a></li>
                <li><a href="/tp_MvC_php/drivers/index">Choferes</a></li>
              </ul>
            </aside>
        </div>
        <div class="column">
          <div class="container container-body">
            <?php echo $content_for_layout; 
            ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>