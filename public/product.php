

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
                                    <img src="../assets/img/Tea/Tea10.jpg" class="img-fluid card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="name card-title text-center mt-3">Small Pack</h5>
                                    
                                        <p class="price fw-bold mt-2">
                                        &#8358; 2000 </p>
     
                                        <div class="description mb-3">
                                            A Single pack of tea leaves
                                        </div>

                                        <btn-card>
                                            <form action="../includes/cart.php" method="POST" class="addToCartForm">
                                            <input type="number" name="quantity" value="1" min="1" max="5000" placeholder="Quantity" required>
                                            <input type="hidden" name="product_id" value="product_id">
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
                                    <img src="../assets/img/Tea/Tea10.jpg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="name card-title text-center mt-3">Medium Pack</h5>
                                        <p class="price fw-bold mt-2">
                                        &#8358; 4000 </p>
     
                                        <div class="description mb-3">
                                            This is two packs.
                                        </div>
                                        
                                        <btn-card>
                                            <form action="../includes/cart.php" method="POST" class="addToCartForm">
                                            <input type="number" name="quantity" value="1" min="1" max="4000" placeholder="Quantity" required>
                                            <input type="hidden" name="product_id" value="product_id">
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
                                <img src="../assets/img/Tea/Tea10.jpg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="name card-title text-center mt-3">Mega Pack</h5>
                                        <p class="price fw-bold mt-2">
                                        &#8358; 5000
                                       
                                        <div class="description mb-3">
                                            This pack contains four packs of tea
                                        </div>
                                        
                                        <btn-card>
                                            <form action="../includes/cart.php" method="POST" class="addToCartForm">
                                            <input type="number" name="quantity" value="1" min="1" max="3000" placeholder="Quantity" required>
                                            <input type="hidden" name="product_id" value="product_id">
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
