<?php 
use \App\Session\Login;
use  \App\Entidy\Pedido;

 $notific = Pedido::getQtd();
 $usuariologado = Login:: getUsuarioLogado();

 $usuario = $usuariologado ? 
          
          '<a href="logout.php" class="nav-link"> <i class="fas fa-power-off" style="font-size:16px"></i></a>' :
          'Visitante: <a href="login.php" class="text-light font-weigth-bold ml-2">Entrar</a>'

?>
<body class="sidebar-mini layout-navbar-fixed sidebar-closed sidebar-collapse">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="usuario-list.php" class="nav-link">Usuários</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="categoria-list.php" class="nav-link">Categorias</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="produto-list.php" class="nav-link">Produtos</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="pedido-list.php" class="nav-link">Pedidos</a>
        </li>
      
        <li class="nav-item d-none d-sm-inline-block">
          <a href="pedido-receber.php" class="nav-link">Receber Produtos</a>
        </li>
      
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Pesquisar" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Messages Dropdown Menu -->
       
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge" style="font-size: 12px;  "><?= $notific ?></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header" >
            <a href="pedido-receber.php" >
            <span style="color:crimson">RECEBER </span>&nbsp; <?= $notific ?> &nbsp; PRODUTOS  </span>
            </a>
          </div>
        </li>
        </a>
        <li class="nav-item dropdown">
         <?=$usuario ?>

        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        </li>

      </ul>
    </nav>
    <!-- /.navbar -->