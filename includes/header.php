<?php  

    session_start();
    if (empty($_SESSION['active'])) {
        header('location: ../index.php');
    }

?>
    
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Playeras</a>
        <!--span class="user"><?php //echo $_SESSION['user']; ?> </span>-->
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <!--<ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <span></span>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="../php/salir.php">Cerrar sisión</a>
            </li>
        </ul>-->

        <div class="dropdown">
            <button class="btn btn-default text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION['user']; ?>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="#">Editar perfil</a></li>
                <li><a class="dropdown-item" href="../php/salir.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </header>