<?php
    // Select products ordered by the date added
    // $stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC ?,?');
    
    if (isset($_GET['id'])) {
        //create a prepared statement to prevent SQLi
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$_GET['id']]);

        //fetch products from the database and return the result as an assoc array
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        //check if product exists ie, array is not empty
        if(!$product) {
            //error to display if the id of the product doesn't exist, ie array is empty
            exit('product does not exist!');
        }
    
    }else {
        //simple error to display if the id wasn't specified
        // exit('Id is not specified!');
    }
    
    // The code above will check if the requested id variable (GET request) exists. If specified, the code will proceed to retrieve the product from the products table in our database.
    // If the product doesn't exist in the database, the code will output a simple error, the exit() function will prevent further script execution and display the error

?>


<body>
    <section id="products" class="products">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Products</h2>
                <p>Check our Products</p>
            </div>
            <div class="row">
                    <div class="col-lg-4 col-md-6 text-center d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card-1">
                                    <img src="img/<?=$product['img']?>" class="img-fluid card-img-top" alt="<?=$product['name'] ?>">
                                    <div class="card-body">
                                        <h5 class="name card-title text-center mt-3"><?=$product['name']?></h5>
                                    
                                        <p class="price fw-bold mt-2">
                                        &#8358;<?=$product['price']?>
                                        <?php if ($product['rrp'] > 0): ?> 
                                            <span class="rrp">&#8358;<?=$product['rrp']?></span>
                                            <?php endif; ?>
                                        </p>
     
                                        <div class="description mb-3">
                                            <?=$product['desc']?>
                                        </div>

                                        <btn-card>
                                            <form action="../includes/cart.php" method="POST" class="addToCartForm">
                                            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity'] ?>" placeholder="Quantity" required>
                                            <input type="hidden" name="product_id" value="<?=$product['id'] ?>">
                                            <input type="hidden" name="product_price" value="price">
                                            <input type="hidden" name="product_img" value="product_img">
                                            <input type="hidden" name="product_code" value="code">
                                            <input type="hidden" name="csrf" value="csrf">
                                            <button class="btn btn-block btn-cart text-center addToCartBtn" type="submit">
                                            <i class="bi-cart"></i>&nbsp; &nbsp; Add to Cart
                                            </button>  
                                            </form>
                                        </btn-card>
                                    </div>
                        </div>
                    </div>
               
                    <div class="col-lg-4 col-md-6 text-center d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
                        <!-- column in large screen should be 3 columns. if it's not large screen, it should go back to the default ie, one column -->
                        <div class="card-1">
                                    <img src="img/<?=$product['img']?>" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="name card-title text-center mt-3"><?=$product['name']?></h5>
                                        <p class="price fw-bold mt-2">
                                        &#8358;<?=$product['price']?>
                                        <?php if ($product['rrp'] > 0): ?> 
                                            <span class="rrp">&#8358;<?=$product['rrp']?></span>
                                            <?php endif; ?>
                                        </p>
     
                                        <div class="description mb-3">
                                            <?=$product['desc']?>
                                        </div>
                                        
                                        <btn-card>
                                            <form action="../includes/cart.php" method="POST" class="addToCartForm">
                                            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity'] ?>" placeholder="Quantity" required>
                                            <input type="hidden" name="product_id" value="<?=$product['id'] ?>">
                                            <input type="hidden" name="product_price" value="price">
                                            <input type="hidden" name="product_img" value="product_img">
                                            <input type="hidden" name="product_code" value="code">
                                            <input type="hidden" name="csrf" value="csrf">
                                            <button class="btn btn-block btn-cart text-center addToCartBtn" type="submit">
                                            <i class="bi-cart"></i>&nbsp; &nbsp; Add to Cart
                                            </button>  
                                            </form>
                                        </btn-card>
                                    </div>
                        </div>
                    </div>
                
                    <div class="col-lg-4 col-md-6 text-center d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
                        <!-- column in large screen should be 3 columns. if it's not large screen, it should go back to the default ie, one column -->
                        <div class="card-1">
                                <img src="img/<?=$product['img']?>" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="name card-title text-center mt-3"><?= $product['name']?></h5>
                                        <p class="price fw-bold mt-2">
                                        &#8358;<?=$product['price']?>
                                        <?php if ($product['rrp'] > 0): ?> 
                                            <span class="rrp">&#8358;<?=$product['rrp']?></span>
                                            <?php endif; ?>
                                        </p>
                                        <div class="description mb-3">
                                            <?=$product['desc'] ?>
                                        </div>
                                        
                                        <btn-card>
                                            <form action="../includes/cart.php" method="POST" class="addToCartForm">
                                            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity'] ?>" placeholder="Quantity" required>
                                            <input type="hidden" name="product_id" value="<?=$product['id'] ?>">
                                            <input type="hidden" name="product_price" value="price">
                                            <input type="hidden" name="product_img" value="product_img">
                                            <input type="hidden" name="product_code" value="code">
                                            <input type="hidden" name="csrf" value="csrf">
                                            <button class="btn btn-block btn-cart text-center addToCartBtn" type="submit">
                                            <i class="bi-cart"></i>&nbsp; &nbsp; Add to Cart
                                            </button>  
                                            </form>
                                        </btn-card>
                                    </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>
</body>
