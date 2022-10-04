<?php
    include '../app/ProductsController.php';
    $productController = new ProductsController;
    if (isset($_GET['slug'])) {
        $slug = $_GET['slug'];
        $product = $productController->getProductBySlug($slug);

        $img = $product->cover;
        $name = $product->name;
        $brand = $product->brand->name;
        $categories = $product->categories;
        $description = $product->description;
        $features = $product->features;


        //var_dump($product);
    }
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
            <div class="container  col-lg-10 col-sm-12 px-lg-5 my-4">
                <div class="row w-100">
                    <div class="col-6 overflow-hidden d-flex align-content-center justify-content-center">
                        
                        <img src="<?php echo $img?>" style="width: 75%" alt="">
                    </div>
                    <div class="col-6">
                        <div class="row w-100">
                            <h1 class="w-100 text-center"><?php echo $name?></h1>
                        </div>
                        <div class="row">
                            <h3 class="w-100 text-center"><?php echo $brand?></h3>
                        </div>
                        <div class="row d-flex align-content-center justify-content-center">
                            <?php  foreach($categories as $category): ?>
                                <div class="col">
                                    <h5 class="text-secondary text-center"><?php echo $category->name?></h5>
                                </div>
                            <?php endforeach;?>
                        </div>
                        <div class="row my-3">
                            <p>
                                <?php echo $description?>
                            </p>
                        </div>
                        <div class="row my-3">
                            <p>
                                <?php echo $features?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>



<?php include "../layout/scripts.templates.php" ; ?>

</body>






</html>