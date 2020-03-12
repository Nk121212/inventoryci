<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.css">

        <style>
        .card-img-top {
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
        }

        .card-img-top:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 700px;
        text-align: center;
        color: #ccc;
        padding: 10px 0;
        height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {  
        -webkit-animation-name: zoom;
        -webkit-animation-duration: 0.6s;
        animation-name: zoom;
        animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
        from {-webkit-transform:scale(0)} 
        to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
        position: absolute;
        top: 15px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        transition: 0.3s;
        }

        .close:hover,
        .close:focus {
        color: #bbb;
        text-decoration: none;
        cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
        .modal-content {
            width: 100%;
        }
        }
        </style>

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

        <div class="col-sm-12 xs-12">

            <div class="card-header text-left" style="margin-top:80px;margin-bottom:10px;">
                <div class="row">
                    
                    <div class="col-sm-3 xs-12 mb-3">
                        <select name="" id="" class="form-control">
                            <option value="" disabled selected>Pilih Kategori</option>
                            <option value="kursi">Kursi</option>
                            <option value="meja">Meja</option>
                            <option value="lemari">Lemari</option>
                        </select>
                    </div>

                    <div class="col-sm-3 xs-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="hmin">Rp.</span>
                            </div>
                            <input type="currency" class="form-control" placeholder="Harga Minimum" aria-describedby="hmin">
                        </div>
                    </div>

                    <div class="col-sm-3 xs-12">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="hmax">Rp.</span>
                            </div>
                            <input type="currency" class="form-control" placeholder="Harga Maksimum" aria-describedby="hmax">
                        </div>
                    </div>

                    <div class="col-sm-3 xs-12">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search-plus"></i></button>
                    </div>
                    
                </div>
            </div>

            <div class="card-group">
                <div class="card">
                    <img src="img/kursi.jpg" class="card-img-top" alt="Nama Kursi" height="263" width="439">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="img/meja.jpg" class="card-img-top" alt="Nama Meja" height="263" width="439">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                <div class="card">
                    <img src="img/lemari.jpg" class="card-img-top" alt="Nama Lemari" height="263" width="439">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                    <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                </div>

        </div>



        <!-- Modal show image -->
        <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
        </div>
        
    </body>

    <script type="text/javascript" src="jquery/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/dist/js/bootstrap.js"></script>
    <script>
    // Get the modal
    var modal = document.getElementById("myModal");

    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementsByClassName("card-img-top");
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");

    for(var i = 0, x = img.length; i < x; i++) {
        img[i].onclick = function(){
            // do something
            console.log('target name should be here');
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }
    }

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() { 
    modal.style.display = "none";
    }


    var currencyInput = document.querySelector('input[type="currency"]');
    var currency = 'IDR'; // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

    currencyInput.addEventListener('focus', onFocus);
    currencyInput.addEventListener('blur', onBlur);

    function localStringToNumber( s ){
        return Number(String(s).replace(/[^0-9.-]+/g,""));
    }

    function onFocus(e){
    var value = e.target.value;
    e.target.value = value ? localStringToNumber(value) : '';
    }

    function onBlur(e){
    var value = e.target.value;

    const options = {
        maximumFractionDigits : 2,
        currency              : currency,
        style                 : "currency",
        currencyDisplay       : "symbol"
    }
    
    e.target.value = value 
        ? localStringToNumber(value).toLocaleString(undefined, options)
        : ''
    }

    </script>

</html>