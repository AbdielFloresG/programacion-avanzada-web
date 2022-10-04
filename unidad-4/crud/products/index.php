<?php 
    session_start();
    include "../app/ProductsController.php";

    $token = $_SESSION["token"];
    //echo $token;
    $productController = new ProductsController();
    $products = $productController->getProducts($token);
    $brands = $productController->getBrands();
    
   

    // foreach($products as $product):
    //     var_dump($product);
    // endforeach;

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <?php include '../layout/head.template.php'; ?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


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
                            <button onclick="addProduct()" class="btn btn-info float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                                                <button data-product='<?php echo json_encode($product)?>' onclick="editProduct(this)" class="btn btn-warning w-100 float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    Editar
                                                </button>
                                            </div>
                                            <div class="col-5 px-0">

                                                <button class="btn btn-danger w-100 float-end" onclick="remove(<?php echo $product['id']?>)">
                                                    Eliminar
                                                </button>

                                            </div>
                                        </div>
                                        <div class="row my-1 mx-auto">
                                            <div class="col-12 p-0">
                                        
                                                <a href="./detalles.php?slug=<?php echo $product["slug"]?>" class="btn btn-primary w-100 py-3 mx-0 float-end">
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
                            <h5 class="modal-title" id="modalTitle"></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../app/ProductsController.php" method="POST" enctype="multipart/form-data">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" id='name' name="name" class="form-control" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" id='slug' name="slug" class="form-control" placeholder="Slug" aria-label="Username" aria-describedby="basic-addon1">
    
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" id='description' name="description" class="form-control" placeholder="Description" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" id='features' name="features" class="form-control" placeholder="Features" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                                <div class="input-group mb-3">
                                    <select class='form-control' name="brand_id" id="brand_id">
                                        <option disabled selected value=  "" >Seleccione brand</option>
                                        <?php foreach($brands as $brand): ?>
                                            <option value="<?php echo $brand->id?>" >  <?php echo $brand->name ?>  </option>
                                            <?php endforeach;?>
                                    </select>
                                </div>

                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" id='id' name="id" class="form-control" placeholder="id" aria-label="Username" aria-describedby="basic-addon1">
                                </div>

                                <div class="form-group">
                                    <label for="imagen" class="form-label">img</label>
                                    <input name="imagen" type="file" class="form-control" id="imagen">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                <input id="hidden" type="hidden" name="action" value="create">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
      </div>

<?php include "../layout/scripts.templates.php" ; ?>

</body>



<script>
    function remove(id){
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

            var bodyFormData = new FormData()
            bodyFormData.append('id',id)
            bodyFormData.append('action','delete')

            axios.post('../app/ProductsController.php',bodyFormData)
            .then(function (response) {
                if(response.status === 200){
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    ) 
                    window.location.reload()
                }
            })
            .catch(function (error) {
                console.log(error);
            });
        }
        })
    }

    addProduct = () => {
        document.getElementById('hidden').value = "create"
        document.getElementById('modalTitle').innerText="Agregar producto"
    }
    editProduct = target => {
        document.getElementById('hidden').value = "edit"
        document.getElementById('modalTitle').innerText="Editar producto"

        const data = JSON.parse(target.getAttribute('data-product'))

        document.getElementById('name').value = data.name
        document.getElementById('slug').value = data.slug
        document.getElementById('description').value = data.description
        document.getElementById('features').value = data.features
        document.getElementById('brand_id').value = data.brand_id
        document.getElementById('id').value = data.id


        console.log(data)
    }


</script>


</html>