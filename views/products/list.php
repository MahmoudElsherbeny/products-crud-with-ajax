<!--  content  -->
<main class="py-5">
    <section class=" text-center container">
        <div class="page_header">
            <div>
                <h1>Products List</h1>
            </div>
            <div class="header_btns">
                <?php if(count($products) > 0) { ?>
                    <form id="DeleteProductsForm" action="/delete-products" method="post">
                        <input type="hidden" name="_token" value="<?php echo $_SESSION['delete_products_token'] ?>" />
                        <button type="submit" class="btn btn-danger mx-2">MASS DELETE</button>
                    </form>
                <?php } ?>
                <a href="/add-product" class="btn btn-success">ADD</a>
            </div>
        </div>
    </section>

    <div class="py-5">
        <div class="container">
            <?php if(count($products) > 0) { ?>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                    <?php foreach($products as $product) { ?>
                        <div class="col">
                            <div class="card shadow-sm">
                                <div class="card-header">
                                    <input type="checkbox" name="delete_products[]" form="DeleteProductsForm" value="<?php echo $product->id ?>" class="delete-checkbox" />
                                </div>
                                <div class="card-body">
                                    <div class="text-center">
                                        <p><?php echo $product->sku ?></p>
                                        <p class="text-capitalize"><?php echo $product->name ?></p>
                                        <p><?php echo '$'.$product->price ?></p>
                                        <?php foreach($product->getProductAttributes($product->attributes) as $key => $attribute) { ?>
                                        <p>
                                            <span class="text-capitalize"><?php echo $key ?>: </span>
                                            <span><?php echo $attribute ?></span>
                                        </p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } else { ?>
                <div class="text-center py-5">
                    No Products Found Add New One
                </div>
            <?php } ?>
        </div>
    </div>
</main>