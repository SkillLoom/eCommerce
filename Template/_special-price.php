<?php
    $brand = array_map(function($pro){return $pro["item_brand"];
    }, $product_shuffle);
    $unique = array_unique($brand);
    sort($unique);
    shuffle($product_shuffle);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["special_price_submit"])){
            //call method add to cart
            $Cart->addToCart( $_POST['user_id'],$_POST['item_id']);
        }
    }
?>
<!-- !Special Price -->
<section id="special-price">
    <div class="container">
        <h4 class="font-rubik font-size-20">Special Price</h4>
        <div id="filters" class="button-group text-right">
            <button class="btn is-checked" data-filter="">All Brands</button>
            <?php 
                array_map(function($brand){
                printf('<button class="btn" data-filter=".%s">%s</button>',$brand,$brand);
                    }, $unique);?>
        </div>

        <div class="grid">
            <?php
                array_map(function($item){;
            ?>
            <div class="grid-items border <?php echo $item['item_brand']?? "Brand"?>">
                <div class="item py-2" style="width: 200px">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php', $item['item_id']) ?>">
                            <img src="<?php echo $item['item_image']?? "./assets/products/13.png"?>" alt="product13" class="img-fluid" />
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
                                <span>$<?php echo $item['item_price']?? "O" ?>  </span>
                            </div>
                            <div>
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']?? '1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; /*echo $item['user_id']?? '1'*/ ?>">
                                    <button name="special_price_submit" type="submit" class="btn btn-warning font-size-12">
                                        Add to cart
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php }, $product_shuffle)?>
        </div>
    </div>
</section>
<!-- !Special Price -->