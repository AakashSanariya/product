<html>
<head>
    <title>Product</title>

    <!--Bootstrap 4-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- //Bootstrap 4-->

    <!--Jquery Validator-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <!--//Jquery Validator-->

    <!-- date Picker-->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <!--//date Picker-->
</head>
<body>
<div class="container">
    <div style="text-align: center"><h3 class="register-heading">Product Details</h3></div>
    <!-- Form-->
    <div class="float-right"><button class="btn btn-outline-success btn-lg" id="add">+</button></div>
    <form action="con_addproduct.php" method="POST">
        <div class="row mt-5" id="dynamic">
                <div class="col">
                    <label for="Name">Product Name:</label>
                    <input type="text" class="form-control" id="productName" placeholder="Enter Product Name" name="productName[]"
                           data-validation="custom required"
                           data-validation-regexp="^([A-Za-z]+)$"
                           data-validation-error-msg="Only Alphabetic Character Allow"
                    >
                </div>
                <div class="col">
                    <label for="sku">Product SKU:</label>
                    <input type="text" class="form-control" id="sku" placeholder="Enter Product sku" name="sku[]"
                           data-validation="number required"
                    >
                </div>
                <div class="col form-group">
                    <label for="date">Product Batch_Date:</label>
                    <input type="text" class="form-control" id="batchDate" placeholder="Enter batch date" name="batchDate[]"
                           data-validation="required"
                           data-validation-help="yyyy-mm-dd"
                    >

                </div>
                <div class="col">
                    <label for="price">Product price:</label>
                    <input type="number" class="form-control" id="price" placeholder="Enter price" name="price[]"
                           data-validation="number required"
                           data-validation-allowing="float"
                           data-validation-error-msg="Price can not be negative"
                    >
                </div>
        </div>
        <div class="mt-3">
            <button class="btn btn-lg btn-outline-primary btn-block" id="submit">Submit</button>
        </div>
    </form>
    <!--//Form-->
</div>
</body>
</html>

<!--Date Picker-->
<script type="text/javascript">
    $('#batchDate').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });
</script>
<!--//Date Picker-->

<!--Jquery Validator-->
<script type="text/javascript">
    $.validate({
        modules: 'date'
    });
    $("#batchDate").keydown(function(e){
        e.preventDefault();
    });
</script>
<!--//Jquery Validator-->

<!-- add more field-->
<script type="text/javascript">
    var plus = "0";
    $("#add").click(function () {
        plus++;
        $("#dynamic").append(
            '<div class="row" id="number">'+
                '<div class="col">'+
                    '<label for="Name">Product Name:</label>'+
                    '<input type="text" class="form-control" id="productName" placeholder="Enter Product Name" name="productName['+plus+']"data-validation="custom required" data-validation-regexp="^([A-Za-z]+)$" data-validation-error-msg="Only Alphabetic Character Allow" >'+
                '</div>' +
                '<div class="col">'+
                    '<label for="sku">Product SKU:</label>'+
                    '<input type="text" class="form-control" id="sku" placeholder="Enter Product sku" name="sku['+plus+']" data-validation="number required" >'+
                '</div>' +
                '<div class="col form-group">'+
                    '<label for="date">Product Batch_Date:</label>'+
                    '<input type="text" class="form-control" id="batchDate" placeholder="Enter batch date" name="batchDate['+plus+']" data-validation="required" data-validation-help="yyyy-mm-dd">'+
                '</div>'+
                '<div class="col">'+
                    '<label for="price">Product price:</label>'+
                    '<input type="number" class="form-control" id="price" placeholder="Enter price" name="price['+plus+']" data-validation="number required" data-validation-allowing="float" data-validation-error-msg="Price can not be negative" >'+
                '</div>'+
                '<div class="col mt-4">'+
                    '<label></label>'+
                    '<button type="button" name="remove" id="'+plus+'" class="btn btn-outline-danger removeProduct">X</button>'+
                '</div>'+
            '</div>'
        );

        /* For Remove Add field Button */
        $(".removeProduct").click(function(){
            $(this).parents("#number").remove();
        });
        $('form').on('keydown', "#batchDate", function (e) {
                e.preventDefault();
        });
        $('form').on('focus',"#batchDate", function(){
            $(this).datepicker({
                uiLibrary: 'bootstrap4',
                format: 'yyyy-mm-dd'
            });
        });
        $.validate({
            modules: 'date',
        });
    });


</script>
<!-- //add more field-->

