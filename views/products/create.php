
<!--  content  -->
<main class="py-5">
    <section class=" text-center container">
        <div class="page_header">
            <div>
                <h1>Add Product</h1>
            </div>
        </div>
    </section>

    <div class="py-5">
        <div class="container">
            <form id="product_form" action="/add-product/store" method="post">
                <input type="hidden" name="_token" value="<?php echo $_SESSION['create_product_token'] ?>" />

                <div class="form-group mb-3">
                    <label class="px-1 mb-1">SKU:</label>
                    <input id="sku" type="text" name="sku" class="form-control" placeholder="Product sku code" />
                </div>
                <div class="form-group mb-3">
                    <label class="px-1 mb-1">Name:</label>
                    <input id="name" type="text" name="name" class="form-control" placeholder="Product name" />
                </div>
                <div class="form-group mb-3">
                    <label class="px-1 mb-1">Price ($):</label>
                    <input id="price" type="text" name="price" class="form-control" placeholder="Product price"  />
                </div>
                <div class="form-group mb-3">
                    <label  class="px-1 mb-1">Choose Type:</label>
                    <select id="productType" name="type" class="form-control">
                        <option value="">-- choose --</option>
                        <option id="DVD" value="dvd">DVD</option>
                        <option id="Book" value="book">Book</option>
                        <option id="Furniture" value="furniture">Furniture</option>
                    </select>
                </div>

                <div id="dvdAttribute" class="form-group mb-3 attributes-input">
                    <label  class="px-1 mb-1">Size (MB):</label>
                    <input id="size" type="text" name="size" class="form-control" placeholder="Product size"  />
                    <span class="attribute_description">* please provide product size in megabyte when type is dvd *</span>
                </div>

                <div id="bookAttribute" class="form-group mb-3 attributes-input">
                    <label  class="px-1 mb-1">Weight (KG):</label>
                    <input id="weight" type="text" name="weight" class="form-control" placeholder="Product weight"  />
                    <span class="attribute_description">* please provide product weight in kilogram when type is book *</span>
                </div>

                <div id="furnitureAttribute" class="mb-3 attributes-input">
                    <div class="form-group mb-3">
                        <label  class="px-1 mb-1">Height (CM):</label>
                        <input id="height" type="text" name="height" class="form-control" placeholder="Product height"  />
                        <div id="height_error" class="invalid-msg"></div>
                    </div>
                    <div class="form-group mb-3">
                        <label  class="px-1 mb-1">Width (CM):</label>
                        <input id="width" type="text" name="width" class="form-control" placeholder="Product width"  />
                        <div id="width_error" class="invalid-msg"></div>
                    </div>
                    <div class="form-group">
                        <label  class="px-1 mb-1">Length (CM):</label>
                        <input id="length" type="text" name="length" class="form-control" placeholder="Product length"  />
                        <div id="length_error" class="invalid-msg"></div>
                    </div>

                    <span class="attribute_description">* please provide product dimension in format H x W x L when type is furniture *</span>
                </div>

                <div>
                    <input type="submit" class="btn btn-success" value="Save"  />
                    <a href="/" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</main>
