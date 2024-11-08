<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite(['resources/sass/app.scss','resources/js/app.js','resources/js/myscript.js'])
    
</head>
<body>
    
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>My Form</h3>
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
            <form action="/save-form" method="POST">
                @csrf 
                <div class="form-group">
                    <label for="prod_name" class="form-label" >Product name</label>
                    <input name="prod_name" type="text" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="qty" class="form-label" >Quantity in Stock</label>
                    <input name="qty" type="number" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="price" class="form-label" >Price Per Item</label>
                    <input name="price" type="number" class="form-control" />
                </div>
                <div class="form-group my-5">
                    <input type="submit" value="Submit" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h3>My Data</h3>
        </div>
        <div class="card-body">
            <table class="table">
                @isset($data)
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Quantity in Stock</th>
                            <th scope="col">Price Per Item</th>
                            <th scope="col">Date Submited</th>
                            <th scope="col">Total Value</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row['prod_name'] }}</td>
                            <td>{{ $row['qty'] }}</td>
                            <td>${{ $row['price'] }}</td>
                            <td>{{ $row['created'] }}</td>
                            <td class="total_value">${{ $row['price'] * $row['qty'] }}</td>
                            <td><a href="/show-edit-form/{{ $key }}">Edit</a></td>
                        </tr>
                        @endforeach
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td id="totalTatalValues"></td>
                        </tr>
                    </tbody>
                @else 
                    <div class="alert alert-warning">
                        No Records Found
                    </div>
                @endisset
                
            </table>
        </div>
    </div>
</div>
    
</body>
</html>