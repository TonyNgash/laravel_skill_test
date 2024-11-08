<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/sass/app.scss','resources/js/app.js'])
    
</head>
<body>
    
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Change Information below</h3>
        </div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="/save-edited-form" method="POST">
                @csrf 
                <input name="product_id" type="hidden" value="{{ $id }}">
                <div class="form-group">
                    <label for="prod_name" class="form-label" >Edit Product name</label>
                    <input name="prod_name" type="text" class="form-control" value="{{ $data['prod_name'] }}" />
                </div>
                <div class="form-group">
                    <label for="qty" class="form-label" >Edit Quantity in Stock</label>
                    <input name="qty" type="number" class="form-control" value="{{ $data['qty'] }}" />
                </div>
                <div class="form-group">
                    <label for="price" class="form-label" >Edit Price Per Item</label>
                    <input name="price" type="number" class="form-control" value="{{ $data['price'] }}"/>
                </div>
                <div class="form-group my-5">
                    <input type="submit" value="Make Changes" class="btn btn-primary">
                    <a class="btn btn-secondary" href="/">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    
</div>
    
</body>
</html>