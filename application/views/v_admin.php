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
            <ul class="navbar-nav ml-auto">
                
                <!-- Default dropleft button -->
                <div class="btn-group dropleft">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i> <?php echo $this->session->userdata('username');?>
                    </button>
                    <div class="dropdown-menu">
                        <!-- Dropdown menu links -->
                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>

    <body>
        <div class="col-sm-12">
            <div class="table-responsive" style="margin-top:60px;">

                <button class="btn btn-secondary" data-toggle="modal" data-target="#addbrg">
                    <i class="fas fa-plus"></i> Barang
                </button>

                <button class="btn btn-secondary" data-toggle="modal" data-target="#addstok">
                    <i class="fas fa-plus"></i> Stok
                </button>

                <table class="table table-hover table-striped text-center" id="mytable">
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
                            <td><a href="">Kursi Minimalis</a></td>
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

        <!-- Modal -->
        <div class="modal fade" id="addbrg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">

                        <div class="col-sm-12">
                            <label for="nmbrg">Nama Barang :</label>
                            <input type="text" name="" id="nmbrg" class="form-control">
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <label for="stokbrgb">Stok :</label>
                            <div class="input-group mb-3">
                                <input type="number" class="form-control" id="stokbrgb"  aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">Unit</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="img-brgb">Image :</label>
                            <input type="file" class="form-control" id="img-brgb" onchange="readURL(this);" />
                            <br>
                        </div>

                        <div id="show-img" class="col-sm-12" align="center"></div>
                        
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="addstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    
                    <div class="row">
                        <div class="col-sm-12">
                            <select name="" id="" class="form-control">
                                <option value="" disabled selected>Pilih Barang</option>
                            </select>
                            <br>
                        </div>
                        <div class="col-sm-6">
                            <label for="stokbrgl">Stok :</label>
                            <div class="input-group mb-3">
                                <!--div class="input-group-prepend">
                                    <span class="input-group-text">Stok</span>
                                </div-->
                                <input type="number" class="form-control" id="stokbrgl" aria-label="Amount (to the nearest dollar)">
                                <div class="input-group-append">
                                    <span class="input-group-text">Unit</span>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

    </body>

    <script type="text/javascript" src="../jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="../bootstrap/dist/js/bootstrap.js"></script>
    <script type="text/javascript" src="../bootstrap/dist/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../bootstrap/dist/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#mytable').DataTable({
                paging: true,
                "lengthChange": false,
                "searching" : false,
                "info" : false
                //scrollY: 400
            });

        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#show-img').html('<img src="'+e.target.result+'" width="200" height="170">');
                        //.attr('src', e.target.result)
                        //.width(150)
                        //.height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</html>