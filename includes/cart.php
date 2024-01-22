<?php
    if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
        $product_id = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
        $stmt->execute([$_POST['product_id']]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($product && $quantity > 0) {
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                if (array_key_exists($product_id, $_SESSION['cart'])) {
                    $_SESSION['cart'][$product_id] += $quantity;
                } else {
                    $_SESSION['cart'][$product_id] = $quantity;
                }
            } else {
             $_SESSION['cart'] = array($product_id => $quantity);
            }
        }
        header('location: index.php?page=cart');
        exit;
    }

    //Remove product from cart
    if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSIO['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
        unset($_SESSION['cart'][$_GET['remove']]);
    } 

    //update product quantities in cart if user clicks the update button on shopping cart page
    if (isset($_POST['update']) && isset($_SESSION['cart'])) {
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
        header('location: index.php?page=cart');
        exit;
    }

    //Place order page
    if (isset($_POST['placeholder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        header('Location: index.php?page=placeholder');
        exit;
    }


    //check session variable for products in cart
    $products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    $products = array();
    $subtotal = 0.00;
    
    if ($products_in_cart) {
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' .$array_to_question_marks .')');
        //only the array key is needed not the values. The keys are the 'ids' of the products.
        $stmt->execute(array_keys($products_in_cart));
        //fetch the products from the database and return the result as an array
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($products as $product) {
            $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
        }
    }
?>

<link rel="stylesheet" href="../assets/css/style.css">
<html>
<body>
    <div class="container">
            <!-- <div class="section-title mt-5">
                <h2>About</h2>
                <p>About US</p>
            </div> -->
            <div class="cart content-wrapper">
                <h1>Cart</h1>
                <form action="cart.php" method="POST">
                    <table>
                        <thead>
                            <tr class="">
                                <td colspan="2">Products</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                                <?php if(empty($products)): ?>
                                <tr>
                                    <td colspan="5" class="text-center">You have no products added in your shopping cart</td>
                                </tr>
                                <?php else: ?>
                                <?php foreach ($products as $product): ?>
                                <tr>
                                    <td class="img">
                                        <a href="index.php?page=product&id=<?=$product['id']?>">
                                            <img src="img/<?=$product['img']?>" width="" height="50" alt="<?=$product['name']?>">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['name']?></a>
                                        <br>
                                        <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                                    </td>
                                    <td class="price">&#8358;<?=$product['price']?></td>
                                    <td class="quantity">
                                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                                    </td>
                                    <td class="price">&dollar;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                                </tr>
                                <?php endforeach; ?>
                                <?php endif; ?>
                        </tbody>
                    </table>

                    <div class="subtotal">
                        <span class="text">Subtotal</span>
                        <span class="price">&#8358;<?=$subtotal?></span>
                    </div>
                    <div class="buttons">
                        <input type="submit" value="update" name="update" class="get-started-btn">
                        <input type="submit" value="Place Order" name="placeorder" class="get-started-btn">
                    </div>
                </form>
            </div>
    </div>
</body>
</html>

