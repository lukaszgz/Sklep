<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Sklep On-Line</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!-- Bootstrap -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">   
                    <a class="navbar-brand" href="#">Warzywa On-Line</a>
                </div>
               
                
                <ul id="selectCategory" class="nav navbar-nav hidden-xs">
                    <li id="item_name" class="active"><a href="#">Wszystko</a></li>
                    <li id="vegetable"><a href="#">Warzywa</a></li>
                    <li id="fruit"><a href="#">Owoce</a></li>
                </ul>
                
                <form class="navbar-form navbar-left">                  
                      <div class="form-group has-feedback">
                          <input id="searchInput" type="text" class="form-control" placeholder="Szukaj">
                          <span class="glyphicon glyphicon-search form-control-feedback" aria-hidden="true"></span>
                      </div>   
                </form>
                
                <form class="navbar-form navbar-right">
                    <button type="button" id="basket" class="btn btn-default" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> KOSZYK <span class="simpleCart_quantity badge"></span></button>
                </form>
           
                
            </div>
        </nav>

        
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Koszyk</h4>
                    </div>
                    <div class="modal-body">
                        <h3 class="showIfEmpty">Koszyk jest pusty, dodaj produkty...</h3>
                        <div class="hideIfEmpty">
                            <!-- show the cart -->
                            <div class="simpleCart_items"></div>
                            
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Łącznie</th>
                                        <th>Koszt dostawy</th>
                                        <th>Do zapłaty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><div class="simpleCart_total"></div></td>
                                        <td><div class="simpleCart_shipping"></div></td>
                                        <td><div class="simpleCart_grandTotal"></div></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                            <div class="modal-footer">
                                
                                <a href="javascript:;" class="simpleCart_empty btn btn-default" data-dismiss="modal">Opróżnij koszyk</a>
                                <a href="javascript:;" class="simpleCart_checkout btn btn-primary">Złóż zamównie</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- <div id="alertAddProduct" class="alert alert-success fixed" role="alert" hidden="true"></div> -->
        
        
        <?php
            if(isset($_SESSION['finish_ER']))
            {
                echo '<div class="alert alert-danger dissmisible fade in fixed" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>'.$_SESSION['finish_ER'].'</p>
                    </div>';
            }
            if(isset($_SESSION['finish_OK']))
            {
                echo '<div id="alertOK" class="alert alert-success dissmisible fade in fixed" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <p>'.$_SESSION['finish_OK'].'</p>
                    </div>';
            }
        ?>
        
        
        <div class="container">                       

            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                <div class="simpleCart_shelfItem">
                    <h2 class="item_name vegetable">Burak 10kg</h2>
                    <div class="photoDiv">
                        <img class="productPhoto" src="products/burak.jpg" alt="burak">
                    </div>
                    <h3 class="item_price text-success">5.99 €</h3>
                    <div class="col-xs-6">
                        <div class="input-group pull-right">
                            <input type="number" min="1" max="99" value="1" class="item_Quantity form-control">
                            <div class="input-group-addon">szt.</div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <a class="item_add btn btn-primary pull-left" href="javascript:;">Do Koszyka</a>
                    </div>
                </div>
            </div><!--item-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                <div class="simpleCart_shelfItem">
                    <h2 class="item_name vegetable">Cebula 10kg</h2>
                    <div class="photoDiv">
                        <img class="productPhoto" src="products/cebula.jpg" alt="cebula">
                    </div>
                    <h3 class="item_price text-success">9.99 €</h3>
                    <div class="col-xs-6">
                        <div class="input-group pull-right">
                            <input type="number" min="1" max="99" value="1" class="item_Quantity form-control">
                            <div class="input-group-addon">szt.</div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <a class="item_add btn btn-primary pull-left" href="javascript:;">Do Koszyka</a>
                    </div>
                </div>
            </div><!--item-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                <div class="simpleCart_shelfItem">
                    <h2 class="item_name fruit">Jabłka 13kg</h2>
                    <div class="photoDiv">
                        <img class="productPhoto" src="products/jablka.jpg" alt="jablka">
                    </div>
                    <h3 class="item_price text-success">11.99 €</h3>
                    <div class="col-xs-6">
                        <div class="input-group pull-right">
                            <input type="number" min="1" max="99" value="1" class="item_Quantity form-control">
                            <div class="input-group-addon">szt.</div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <a class="item_add btn btn-primary pull-left" href="javascript:;">Do Koszyka</a>
                    </div>
                </div>
            </div><!--item-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                <div class="simpleCart_shelfItem">
                    <h2 class="item_name vegetable">Burak 10kg</h2>
                    <div class="photoDiv">
                        <img class="productPhoto" src="products/burak.jpg" alt="burak">
                    </div>
                    <h3 class="item_price text-success">35.99 €</h3>
                    <div class="col-xs-6">
                        <div class="input-group pull-right">
                            <input type="number" min="1" max="99" value="1" class="item_Quantity form-control">
                            <div class="input-group-addon">szt.</div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <a class="item_add btn btn-primary pull-left" href="javascript:;">Do Koszyka</a>
                    </div>
                </div>
            </div><!--item-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                <div class="simpleCart_shelfItem">
                    <h2 class="item_name vegetable">Burak 10kg</h2>
                    <div class="photoDiv">
                        <img class="productPhoto" src="products/burak.jpg" alt="burak">
                    </div>
                    <h3 class="item_price text-success">35.99 €</h3>
                    <div class="col-xs-6">
                        <div class="input-group pull-right">
                            <input type="number" min="1" max="99" value="1" class="item_Quantity form-control">
                            <div class="input-group-addon">szt.</div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <a class="item_add btn btn-primary pull-left" href="javascript:;">Do Koszyka</a>
                    </div>
                </div>
            </div><!--item-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                <div class="simpleCart_shelfItem">
                    <h2 class="item_name vegetable">Burak 10kg</h2>
                    <div class="photoDiv">
                        <img class="productPhoto" src="products/burak.jpg" alt="burak">
                    </div>
                    <h3 class="item_price text-success">35.99 €</h3>
                    <div class="col-xs-6">
                        <div class="input-group pull-right">
                            <input type="number" min="1" max="99" value="1" class="item_Quantity form-control">
                            <div class="input-group-addon">szt.</div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <a class="item_add btn btn-primary pull-left" href="javascript:;">Do Koszyka</a>
                    </div>
                </div>
            </div><!--item-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                <div class="simpleCart_shelfItem">
                    <h2 class="item_name vegetable">Burak 10kg</h2>
                    <div class="photoDiv">
                        <img class="productPhoto" src="products/burak.jpg" alt="burak">
                    </div>
                    <h3 class="item_price text-success">35.99 €</h3>
                    <div class="col-xs-6">
                        <div class="input-group pull-right">
                            <input type="number" min="1" max="99" value="1" class="item_Quantity form-control">
                            <div class="input-group-addon">szt.</div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <a class="item_add btn btn-primary pull-left" href="javascript:;">Do Koszyka</a>
                    </div>
                </div>
            </div><!--item-->
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 item">
                <div class="simpleCart_shelfItem">
                    <h2 class="item_name vegetable">Burak 10kg</h2>
                    <div class="photoDiv">
                        <img class="productPhoto" src="products/burak.jpg" alt="burak">
                    </div>
                    <h3 class="item_price text-success">35.99 €</h3>
                    <div class="col-xs-6">
                        <div class="input-group pull-right">
                            <input type="number" min="1" max="99" value="1" class="item_Quantity form-control">
                            <div class="input-group-addon">szt.</div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <a class="item_add btn btn-primary pull-left" href="javascript:;">Do Koszyka</a>
                    </div>
                </div>
            </div><!--item-->

        </div>
        <!--/container-->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <!-- SimleCard -->
        <script src="js/simpleCart.js"></script>
        <script src="js/myJs.js"></script>
        <script>         
        simpleCart({
        // array representing the format and columns of the cart,
        // see the cart columns documentation
        cartColumns: [
        { attr: "name", label: "Nazwa"},
        { view: "currency", attr: "price", label: "Cena"},
        { view: "decrement", text: '<span class="glyphicon glyphicon-minus" aria-hidden="true"></span>', label: false},
        { attr: "quantity", label: "Ilość"},
        { view: "increment", text: '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>', label: false},
        { view: "currency", attr: "total", label: "Wartość" },
        { view: "remove", text: '<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Usuń"></span>', label: false}
        ],
        // "div" or "table" - builds the cart as a
        // table or collection of divs
        cartStyle: "table",
        // how simpleCart should checkout, see the
        // checkout reference for more info
        checkout: {
        type: "SendForm" ,
        url: "form.php"
        },
        // set the currency, see the currency
        // reference for more info
        currency: "EUR",
        // collection of arbitrary data you may want to store
        // with the cart, such as customer info
        data: {},
        // set the cart langauge
        // (may be used for checkout)
        language: "english-us",
        // array of item fields that will not be
        // sent to checkout
        excludeFromCheckout: [],
        // custom function to add shipping cost
        shippingCustom: null,
        // flat rate shipping option
        shippingFlatRate: 0,
        // added shipping based on this value
        // multiplied by the cart quantity
        shippingQuantityRate: 0,
        // added shipping based on this value
        // multiplied by the cart subtotal
        shippingTotalRate: 0,
        // tax rate applied to cart subtotal
        taxRate: 0,
        // true if tax should be applied to shipping
        taxShipping: false,
        // event callbacks
        beforeAdd           : null,
        afterAdd            : function( item )
        {
        //$("#alertAddProduct").html(item.get("name") + ": dodano do koszyka!");
        //$("#alertAddProduct").fadeIn(500).delay(1000).fadeOut(500);
        $("#basket").slideUp(300).slideDown(300);
        },
        load                : null,
        beforeSave          : null,
        afterSave           : null,
        update              : function()
        {
        if(simpleCart.quantity() != 0)
        {
        $("#basket").removeClass("btn-default");
        $("#basket").addClass("btn-success");
        $(".hideIfEmpty").show();
        $(".showIfEmpty").hide();
        }
        else
        {
        $("#basket").removeClass("btn-success");
        $("#basket").addClass("btn-default");
        $(".hideIfEmpty").hide();
        $(".showIfEmpty").show();
        }
        },
        ready               : null,
        checkoutSuccess     : null,
        checkoutFail        : null,
        beforeCheckout      : null,
        beforeRemove        : null
        });
        </script>
        <?php
            if(isset($_SESSION['finish_OK']))
                echo '<script> simpleCart.update(); simpleCart.empty(); </script>';
            
            $_SESSION = array();
        ?>
    </body>
</html>