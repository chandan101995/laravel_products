<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />

    <title>{{"Repository Design Pattern CRUD"}}</title>
    <style>
        label.error {
            color: #dc3545;
            font-size: 14px;
        }
    </style>
  </head>
  <body>
    <div class="row justify-content-center">
        <div class="col-6">
            <h1 class="text-center">{{"Repository Design Pattern CRUD"}}</h1>
            <!--header--component--include--here-->
            <x-Header  message="Add"  url="index" name="All" />
            <hr>
            <!--sucess--message-->
            @if(session()->has('success'))
              <div class="alert alert-success">
                {{ session()->get('success') }}
              </div>
            @endif
            <!--error--message-->
            @if(session()->has('error'))
              <div class="alert alert-danger">
                {{ session()->get('error') }}
              </div>
            @endif
            <!--add--form--start-->
            <form action="{{route('store')}}" method="post" class="form-data">
                @csrf
                <div class="form-group">
                  <select class="form-select" id="title" name="title">
                    <option value="">Open this select title</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Miss">Miss</option>
                    <option value="Unknown">Unknown</option>
                  </select>
                  @error('title')
						        <div class="alert alert-danger">{{ $message }}</div>
				          @enderror
                </div>
                <div class="form-group">
                    User Name: <input type="text" class="form-control @error('user_name') is-invalid @enderror" name="user_name" autocomplete="off">
                    @error('user_name')
						          <div class="alert alert-danger">{{ $message }}</div>
				          	@enderror
                </div>
                <div class="form-group">
                    Product Name: <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="off">
                    @error('name')
						          <div class="alert alert-danger">{{ $message }}</div>
				          	@enderror
                </div>
                <div class="form-group">
                    Price: <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" autocomplete="off">
                    @error('price')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group  mb-3">
                    Description: <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" autocomplete="off">
                    @error('description')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                  <button type="submit" class="btn btn-block btn-success">add Products</button>
                </div>
            </form>
            <!--add--form--end -->
        </div>
    </div>
    <!--add--page--script--js-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
          /* jquery form validation code here */
            $(".form-data").validate({
                rules: {
                    title:"required",
                    user_name: "required",
                    name: "required",
                    price: "required",
                    description: "required",
                },
                messages: {
                    title: "Please select one option",
                    user_name: "User Name is required",
                    name: "Product Name is required",
                    price: "Price is required",
                    description: "Description is required",
                }
            });
        });
    </script>
  </body>
</html>
