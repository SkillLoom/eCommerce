<?php
    shuffle($product_shuffle);

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["new_phones_submit"])){
            //call method add to cart
            $Cart->addToCart( $_POST['user_id'],$_POST['item_id']);
        }
    }
?>
<!-- !New Phones-->
<section id="new-phones">
    <div class="container py-5">
        <h4 class="font-rubik font-size-20">New Phones</h4>
        <hr />
        <!-- !Owl-carousel -->
        <div class="owl-carousel owl-theme">
            <?php
                foreach ($product_shuffle as $item) {
        ?>
            <div class="item py-2 bg-light">
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
                                    <button name="new_phones_submit" type="submit" class="btn btn-warning font-size-12">
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
<!-- !New Phones-->