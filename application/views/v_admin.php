<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Page</title>

        <link rel="stylesheet" href="../fontawesome/css/all.css">
        <link rel="stylesheet" href="../bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/dist/css/dataTables.bootstrap4.min.css">


    </head>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><i class="fas fa-home"></i></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <!--li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Dropdown
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
            </li-->
            </ul>
            <form class="form-inline my-2 my-lg-0" method="POST" action="index.php/C_login">
                <input type="text" name="username" class="form-control mr-sm-2" type="Username" placeholder="Username" aria-label="Search">
                <input type="password" name="password" class="form-control mr-sm-2" type="Password" placeholder="Password" aria-label="Search">
                <button class="btn btn-primary my-2 my-sm-0" type="submit"><i class="fas fa-sign-in-alt"></i></button>
            </form>
        </div>
    </nav>

    <body>
        <div class="col-sm-12">
            <div class="table-responsive" style="margin-top:60px;">
                <table class="table table-hover table-dark" id="mytable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Barang</th>
                            <th>Stok</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Kursi Minimalis</td>
                            <td>90</td>
                            <td>
                                
                                <a href="" class="btn btn-sm btn-success"><i class="fas fa-cart-plus"></i></a>
                                <a href="" class="btn btn-sm btn-warning"><i class="fas fa-sync-alt"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                                
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </body>

    <script type="text/javascript" src="../jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../bootstrap/dist/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../bootstrap/dist/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable();
        } );
    </script>

</html>