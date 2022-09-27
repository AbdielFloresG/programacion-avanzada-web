<!DOCTYPE html>
<html lang="en">
<head>

    <?php include '../layout/head.template.php'; ?>


</head>
<body class="vh-100">

    <?php include "../layout/navbar.template.php"; ?>


    <div class="container-fluid">
        <div class="row">

            <?php include "../layout/sidebar.template.php"; ?>


            <div class="col-lg-10 col-sm-12 px-lg-5">
            
               <div class="border-bottom">
                    <div class="row my-4">
                        <div class="col">
                            <p class="fs-4">Products</p>
                        </div>
                        <div class="col">
                            <button class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Añadir producto
                            </button>
                        </div>
                    </div>
                    <div class="row">

                       
                            <div class="col-md-3 col-sm-10 p-2">
                                <div class="card" >
                                    <img src="../../../unidad-2/19/Tyler-mugshot.jpeg" class="card-img-top" alt="...">
                                    <div class="card-body row">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        <div class="row my-1 mx-auto justify-content-around">
                                            <div class="col-5 px-0">
                                  
                                                <button class="btn btn-warning w-100 float-end" data-bs-toggle="modal" data-bs-target="#modalEditar">
                                                    Editar
                                                </button>

                                            </div>
                                            <div class="col-5 px-0">

                                                <button class="btn btn-danger w-100 float-end" onclick="remove(this)">
                                                    Eliminar
                                                </button>

                                            </div>
                                        </div>
                                        <div class="row my-1 mx-auto">
                                            <div class="col-12 p-0">
                                        
                                                <button class="btn btn-primary w-100 py-3 mx-0 float-end" data-bs-toggle="modal" data-bs-target="#modalDetalles">
                                                    Detalles
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
       
                    </div> 
               </div>


        
            </div>








            <!-- Modal Editar -->
            <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

      </div>

<?php include "../layout/scripts.templates.php" ; ?>

</body>






</html>