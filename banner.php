<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
</head>
<nav class="navbar navbar-light navbar-expand shadow mb-4 topbar static-top"
     style="background: #4A90E2;">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none rounded-circle mr-3"
                id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
        <ul class="nav navbar-nav flex-nowrap ml-auto">
            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link"
                                                                data-toggle="dropdown" aria-expanded="false"
                                                                href="#"><i
                            class="fas fa-search"></i></a>
                <div class="dropdown-menu dropdown-menu-right p-3 animated--grow-in" role="menu"
                     aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto navbar-search w-100">
                        <div class="input-group"><input class="bg-light form-control border-0 small"
                                                        type="text" placeholder="Search for ...">
                            <div class="input-group-append">
                                <button class="btn btn-primary py-0"
                                        type="button"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
            <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                      data-toggle="dropdown" aria-expanded="false" href="#"></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                     role="menu"></div>
            </li>
            </li>
            <li class="nav-item dropdown no-arrow mx-1" role="presentation">
            <li class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link"
                                                      data-toggle="dropdown" aria-expanded="false" href="#"></a>
                <div class="dropdown-menu dropdown-menu-right dropdown-list dropdown-menu-right animated--grow-in"
                     role="menu">
                    <h6 class="dropdown-header">alerts center</h6>
                </div>
            </li>
            <div class="shadow dropdown-list dropdown-menu dropdown-menu-right"
                 aria-labelledby="alertsDropdown"></div>
            </li>
            <div class="d-none d-sm-block topbar-divider"></div>
            <li class="nav-item dropdown no-arrow" role="presentation">
            <li class="nav-item dropdown no-arrow">
                <a class="dropdown-toggle nav-link"
                   data-toggle="dropdown" aria-expanded="false" href="#"><span
                            class="mr-2 small"
                            style="color: #fff;"><?php echo "$_SESSION[nama]"; ?></span><img
                            class="border rounded-circle img-profile"
                            src="assets/img/avatars/avatar1.jpeg"></a>
                <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu">
                    <a class="dropdown-item" role="presentation" href="logout.php"
                       onclick="return confirm('Anda yakin akan keluar ?')"><i
                                class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a>
                </div>
            </li>
            </li>
        </ul>
    </div>
</nav>