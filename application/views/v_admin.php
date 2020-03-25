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
                        <a class="dropdown-item" href="C_admin/logout"><i class="fas fa-sign-out-alt"></i> Keluar</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>

    <body>
        <div class="col-sm-12" style="margin-top:60px;">

            <button class="btn btn-secondary" data-toggle="modal" data-target="#addbrg">
                <i class="fas fa-plus"></i> Barang
            </button>

            <button class="btn btn-secondary" data-toggle="modal" data-target="#addstok">
                <i class="fas fa-plus"></i> Stok
            </button>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-8">

                    </div>
                    <div class="col-sm-4">

                    <?php 
                        if($this->session->flashdata('warning') != ""){
                            echo '
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Warning !</strong> '.$this->session->flashdata('warning').'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            ';
                        }elseif($this->session->flashdata('warning2') != ""){
                            echo '
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Success !</strong> '.$this->session->flashdata('warning2').'
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            ';
                        }else{

                        }
                        
                    ?>

                    </div>

                </div>
                
            </div>

            <div class="col-sm-12">

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
                        <?php
                            $no=1;
                            foreach($data_barang->result() as $brg){
                                echo '
                                    <tr>
                                        <td>'.$no.'</td>
                                        <td><a href="">'.$brg->nama_barang.'</a></td>
                                        <td>'.$brg->jumlah.'</td>
                                        <td>
                                            <a data-toggle="modal" data-target="#modal_jual" href="#" class="btn btn-sm btn-success"><i class="fas fa-cart-plus"></i></a>
                                            <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                ';
                                $no++;
                            }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>

        <!-- Modal Tambah Barang -->
        <div class="modal fade" id="addbrg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <form action="C_admin/add_brg" method="post" enctype="multipart/form-data">

                        <div class="modal-body">
                            
                            <div class="row">

                                <div class="col-sm-12">
                                    <label for="nm_brg">Nama Barang :</label>
                                    <input type="text" name="nm_brg" id="nm_brg" class="form-control upper" required>
                                    <br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="stokbrgb">Stok :</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="stokbrgb" name="stokbrgb" aria-label="Amount (to the nearest dollar)" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Unit</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="img-brgb">Image :</label>
                                        <input type="file" class="form-control" id="img-brgb" name="img-brgb" onchange="readURL(this);" required>
                                    <br>
                                </div>

                                <div id="show-img" class="col-sm-12" align="center"></div>

                                <div class="col-sm-6">
                                    <br>
                                    <label for="id_produsen">Produsen :</label>
                                    <select name="id_produsen" id="id_produsen" class="form-control" required>
                                        <option value="" disabled selected>Pilih Produsen</option>
                                        <?php
                                            foreach($data_produsen->result() as $prod){
                                                echo '<option value="'.$prod->id.'">'.$prod->nama_produsen.'</option>';   
                                            }
                                            //print_r($produsen);
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <br>
                                    <label for="harga_beli">Total Pengeluaran :</label>
                                    <input type="text" class="form-control" name="harga_beli" id="harga_beli">
                                </div>
                                
                            </div>
                            
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Modal Tambah Stok -->
        <div class="modal fade" id="addstok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Stok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <form action="<?php echo base_url()?>index.php/c_admin/add_stok" method="POST">

                        <div class="modal-body">
                        
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="nm_brg2">Nama Barang :</label>
                                    <select name="nm_brg2" id="nm_brg2" class="form-control">
                                        <option value="" disabled selected>Pilih Barang</option>
                                        <?php
                                            foreach($data_barang->result() as $brg){
                                                echo '
                                                    <option value="'.$brg->kd_barang.'">'.$brg->nama_barang.'</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                    <br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="stokbrg">Stok :</label>
                                    <div class="input-group mb-3">
                                        <!--div class="input-group-prepend">
                                            <span class="input-group-text">Stok</span>
                                        </div-->
                                        <input type="number" class="form-control" id="stokbrg" name="stokbrg" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Unit</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <label for="id_produsen2">Produsen :</label>
                                    <select name="id_produsen2" id="id_produsen2" class="form-control" required>
                                        <option value="" disabled selected>Pilih Produsen</option>
                                        <?php
                                            foreach($data_produsen->result() as $prod){
                                                echo '<option value="'.$prod->id.'">'.$prod->nama_produsen.'</option>';   
                                            }
                                            //print_r($produsen);
                                        ?>
                                    </select>
                                </div>

                                <input type="hidden" id="nama_barang" name="nama_barang">
                                <input type="hidden" id="img_stok" name="img_stok">

                            </div>

                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        <!-- Modal Tambah Stok -->
        <div class="modal fade" id="modal_jual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Jual Barang</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                    <form action="<?php echo base_url()?>index.php/c_admin/jual_brg" method="POST">

                        <div class="modal-body">
                        
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="jnm_brg2">Nama Barang :</label>
                                    <select name="jnm_brg2" id="jnm_brg2" class="form-control">
                                        <option value="" disabled selected>Pilih Barang</option>
                                        <?php
                                            foreach($data_barang->result() as $brg){
                                                echo '
                                                    <option value="'.$brg->kd_barang.'">'.$brg->nama_barang.'</option>
                                                ';
                                            }
                                        ?>
                                    </select>
                                    <br>
                                </div>
                                <div class="col-sm-6">
                                    <label for="jstokbrg">Barang Keluar :</label>
                                    <div class="input-group mb-3">
                                        <!--div class="input-group-prepend">
                                            <span class="input-group-text">Stok</span>
                                        </div-->
                                        <input type="number" class="form-control" id="jstokbrg" name="jstokbrg" aria-label="Amount (to the nearest dollar)">
                                        <div class="input-group-append">
                                            <span class="input-group-text">Unit</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label for="jid_produsen2">Konsumen :</label>
                                    <select name="jid_produsen2" id="jid_produsen2" class="form-control" required>
                                        <option value="" disabled selected>Pilih Konsumen</option>
                                        <?php
                                            foreach($data_konsumen->result() as $kons){
                                                echo '<option value="'.$kons->id.'">'.$kons->nama.'</option>';
                                            }
                                            //print_r($produsen);
                                        ?>
                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <div class="row" id="resp_kons">

                                    </div>
                                </div>

                                <input type="hidden" id="jnama_barang" name="jnama_barang">

                                <div class="col-sm-6" id="">
                                    <label for="rpjual">Pemasukan :</label>
                                    <input type="text" name="rpjual" id="rpjual" class="form-control">
                                </div>

                            </div>

                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>

                    </form>

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

            $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                $(".alert").slideUp(500);
            });

            $("select#nm_brg2").change(function(){
                $.post("<?php echo base_url()?>"+"index.php/c_admin/get_brg",
                {
                    kd_brg: $(this).val()
                },
                function(data){
                    console.log(data);
                    $('#stokbrg').val(data[0].stok);
                    $('#id_produsen2').val(data[0].id_produsen);
                    $('#nama_barang').val(data[0].nama_barang);
                    $('#img_stok').val(data[0].image); 

                });
            });

            $('#mytable').DataTable({
                paging: true,
                "lengthChange": false,
                //"searching" : false,
                "info" : false
                //scrollY: 400
            });

            $('#nm_brg').keyup(function(){
                $(this).val($(this).val().toUpperCase());
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

        var rupiah = document.getElementById('harga_beli');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});

        var rupiah = document.getElementById('rpjual');
		rupiah.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
    </script>

</html>