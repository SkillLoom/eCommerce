<?php
    shuffle($product_shuffle);

    //request method post
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["top_sale_submit"])){
            //call method add to cart
            $Cart->addToCart( $_POST['user_id'],$_POST['item_id']);
        }
    }
?>

<!-- !Top Sale -->
<section id="top-sale">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">Top Sale</h4>
        <hr />
        <!-- !Owl-carousel -->
        <div class="owl-carousel owl-theme">
        <?php
                foreach ($product_shuffle as $item) {
        ?>
            <div class="item py-2">
                <div class="product font-rale">
                    <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>">
                        <img src="<?php echo $item['item_image']?? "../assets/products/1.png" ?>" alt="product1" class="img-fluid" />
                    </a>
                    <div class="text-center">
                        <h6><?php echo $item['item_name']?? "Unknown" ?></h6>
                        <div class="rating text-warning font-size-12">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2">
                            <span>$<?php echo $item['item_price']?? "O" ?> </span>
                        </div>
                        <div>
                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id']?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; /*echo $item['user_id']?? '1'*/ ?>">
                                <button name="top_sale_submit" type="submit" class="btn btn-warning font-size-12">
                                    Add to cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php } //closing foreach?>
        </div>
        <!-- !Owl-carousel -->
    </div>
</section>
<!-- !Top Sale -->