<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <title>{{'Repository Design Pattern CRUD'}}</title>
    </head>
    <body>
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">{{'Repository Design Pattern CRUD'}}</h1>
				<!--header--component--include--here-->
                <x-Header message="All" url="add" name="Add" />
                <hr />
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
				<!--products--listing--table--start-->
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>{{'PId'}}</th>
                            <th>{{'User Name'}}</th>
                            <th>{{'Product Name'}}</th>
                            <th>{{'Price'}}</th>
                            <th>{{'Description'}}</th>
                            <th>{{'Actions'}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $key => $product)
                        <tr>
                            <td>{{$product->id}}</td>
                            <td>{{$product->title .' '.$product->user_name}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <a href="{{route('view',$product->id)}}" class="btn btn-sm btn-info">{{'Edit'}}</a>
                                <a href="{{route('delete',$product->id)}}" class="btn btn-sm btn-danger">{{'Trash'}}</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td>{{'Products Are Not Available!'}}</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
				<!--products--listing--table--end-->
            </div>
        </div>
    </body>
</html>
