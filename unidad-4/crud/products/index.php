<?php 
    session_start();
    include "../app/ProductsController.php";
    $token = $_SESSION["token"];
    $productController = new ProductsController();
    $products = $productController->getProducts($token);
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php include '../layout/head.template.php'; ?>


</head>
<body class="h-100">



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


                    <?php foreach($products as $product): ?>
                            <div class="col-md-3 col-sm-10 p-2">
                                <div class="card" style="height: 37rem">
                                    <img src="<?php echo $product["cover"]?>" class="card-img-top" alt="...">
                                    <div class="card-body row">
                                        <h5 class="card-title"><?php echo $product['name']?></h5>
                                        <p class="card-text"><?php echo $product['description']?></p>
                                        <div class="row d-flex flex-row my-1 mx-auto justify-content-around">
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
                                        
                                                <a href="./detalles.php" class="btn btn-primary w-100 py-3 mx-0 float-end">
                                                    Detalles
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>



                    </div> 
               </div>


        
            </div>



            <!-- Modal Agregar-->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../app/ProductsController.php" method="POST" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" name="slug" class="form-control" placeholder="Slug" aria-label="Username" aria-describedby="basic-addon1">
    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" name="description" class="form-control" placeholder="Description" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" name="features" class="form-control" placeholder="Features" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" name="brand_id" class="form-control" placeholder="Brand_id" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="form-group">
                                    <label for="imagen" class="form-label">img</label>
                                    <input name="imagen" type="file" class="form-control" id="imagen">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                <input type="hidden" name="action" value="create">
                            </form>
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



<script>
    function remove(target){
        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
            )
        }
        })
    }


</script>


</html>