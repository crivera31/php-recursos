      <div class="row">
          <div class="col-md-9">
              <div class="category-product">
              </div>
              <div class="bestsell-pro">
                  <div class="slider-items-products">
                      <div class="bestsell-block">
                          <div class="category-products">
                              <ul class="products-grid" id="galeria">
                                  <?php
                                    foreach ($galeria as $fila) {
                                    ?>
                                      <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                          <div class="item-inner">
                                              <div class="item-img">
                                                  <div class="item-img-info"><a target="_blank" href="detalle_producto/<?php echo $fila['codigo']; ?>" title="<?php echo $fila['codigo']; ?>" class="product-image"><img src="images/productos/<?php echo $fila['foto']; ?>" style="width: 214px; height: 214px;"></a>
                                                  </div>
                                              </div>
                                              <div class="item-info">
                                                  <div class="info-inner">
                                                      <div class="item-title"> <a target="_blank" title="" href="detalle_producto/<?php echo $fila['codigo']; ?>"> <?php echo $fila['codigo']; ?> </a> </div>
                                                      <div class="item-content">
                                                          <div class="item-price">
                                                              <?php //if(isset($_SESSION['active'])){ 
                                                                ?>
                                                              <!-- <div class="price-box"> -->
                                                              <!-- <p class="old-price"><span class="price-label">Regular
                                                                          Price:</span> <span class="price">$100.00 </span>
                                                                  </p> -->
                                                              <!-- <p class="special-price"><span class="price-label"></span>  -->
                                                              <!-- <span class="price">S/ <strong><?php //echo $fila['precio_venta']; 
                                                                                                    ?></strong>
                                                                  </span> -->
                                                              <!-- </p> -->
                                                              <!-- </div> -->
                                                              <?php //}
                                                                ?>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </li>
                                  <?php
                                    }
                                    ?>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="featured-pro">
                  <div class="slider-items-products">
                      <div class="featured-block">
                          <div class="block-title">
                              <h2>Nuevos productos</h2>
                          </div>
                          <div id="featured-slider" class="product-flexslider hidden-buttons">
                              <div class="slider-items slider-width-col4 products-grid block-content">
                                  <?php
                                    foreach ($result as $row) {
                                    ?>
                                      <div class="item">
                                          <div class="item-inner">
                                              <div class="item-img">
                                                  <div class="item-img-info"> <a target="_blank" class="product-image" title="<?php echo $row['codigo']; ?>" href="detalle_producto/<?php echo $row['codigo']; ?>">
                                                          <img alt="<?php echo $row['codigo']; ?>" src="images/productos/<?php echo $row['foto']; ?>"> </a>
                                                      <div class="new-label new-top-right">nuevo</div>
                                                  </div>
                                              </div>
                                              <div class="item-info">
                                                  <div class="info-inner">
                                                      <div class="item-title"> <a target="_blank" title="<?php echo $row['codigo']; ?>" href="detalle_producto/<?php echo $row['codigo']; ?>"><?php echo $row['codigo']; ?></a>
                                                      </div>
                                                      <div class="item-content">
                                                          <div class="item-price">
                                                              <?php //if(isset($_SESSION['active'])){ 
                                                                ?>
                                                              <!-- <div class="price-box"> <span class="regular-price"> <span class="price">S/ <strong><?php //echo $row['precio_venta']; 
                                                                                                                                                        ?></strong></span>
                                                                  </span>
                                                              </div> -->
                                                              <?php //} 
                                                                ?>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  <?php
                                    }
                                    ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-3">
              <div class="side-banner-img"> <a href="#" title=""> <img src="images/banners/img-04.webp" alt=""></a> </div>
              <div class="home-side-banner"> <img alt="" src="images/banners/img-01.webp"> </div>
              <div class="home-side-banner"> <img alt="" src="images/banners/img-03.webp"> </div>
              <!-- <div class="side-banner-img"> <a href="#" title=""> <img src="images/banners/home-banner-small.png" alt=""></a> </div> -->
          </div>
      </div>