<?php include_once(ROOT . '/views/layouts/header.php'); ?>

        <section>
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Каталог</h2>
                            <div class="panel-group category-products">
                                
                                <?php foreach ($categories as $categoryItem): ?>
                                
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/super_mag/category/<?php echo $categoryItem['id'];?>"
                                               <?php if($categoryId[0] == $categoryItem['id']):?> 
                                                   class = "active" 
                                               <?php endif; ?> >
                                                
                                                <?php echo $categoryItem['name'] ?>
                                            </a></h4>
                                    </div>
                                </div>
                                <?php endforeach;?>
                                
                            </div>

                        </div>
                    </div>
                               
                    <div class="col-sm-9 padding-right">
                        <div class="features_items"><!--features_items-->
                            <h2 class="title text-center">Последние товары</h2>
                            
                             
                             <?php foreach ($categoryProducts as $product): ?>                   
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="/super_mag/template/images/home/<?php echo $product['image']; ?>" />
                                            <h2><?php echo $product['price']; ?></h2>
                                            <p>
                                                <a href="/super_mag/product/<?php echo $product['id'];?>">
                                                    <?php echo $product['name']; ?>
                                                </a>
                                            </p>
                                            <a href="/super_mag/cart/addAjax/<?php echo $product['id'];?>" class="btn btn-default add-to-cart" data-id = "<?php echo $product['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                        <?php if($product['is_new']): ?>
                                            <img src="/super_mag/template/images/home/new.png" class="new" alt=""/>
                                        <?php endif;?>
                                    </div>
                                </div>
                             </div>
                            <?php endforeach;?>
                            
                            <?php echo $pagination->get(); ?>
                            
                        </div>
                    </div>
                    </div>
                </section>
<?php include_once(ROOT . '/views/layouts/footer.php'); ?>
                        
                    