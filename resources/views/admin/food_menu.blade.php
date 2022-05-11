{{-- RGB (4, 7, 32) --}}
<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.admin_css')
</head>

<body>
    <div class="container-scroller">
       @include('admin.navbar')
      {{-- <div class="panel panel-default"> --}}
        <div class="main-panel">    

    <div style="padding-top: 0px; " align="left" >
        <form  action="{{ url('upload_food') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class  style="padding: 10px">
                <label>Title</label>
                <input  style="color:blue;"  type="text" name="title" required>
            </div>
            <div class style="padding: 10px">
                <label>Price</label>
                <input style="color:blue;" type="text" name="price" required>
            </div>
          
            <div class style="padding: 10px">
                <label>image</label>
                <input  style="color:rgb(83, 83, 150);" type="file" name="image" required>
            </div>
            <div style="padding: 10px">
                <label>Description</label>
                <input  style="color:blue;" type="text" name="description" >
            </div>
            <div>
                <input class="btn btn-primary" type="submit" value="save">
            </div>
        </form>
        <div style="padding-top: 50px">
         <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr align="center ">
                            <th scope="col">No</th>
                            <th scope="col">Food Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data )
            
            
                        <tr align="center">
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->price}}</td>
                            <td>{{ $data->description }}</td>
                            <td><img  height="200" width="300" src="/foodImage/{{ $data->image }}"></td>
                            <td><a class="btn btn-danger" href="{{ url('/delete-food-menu',$data->id) }}">Delete</td>
                                <td><a class="btn btn-primary" href="{{ url('/update-food-menu',$data->id) }}">Update</td>
                            
            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
             </div>
               </div>
        </div>
</div>
      </div>
    </div>
    @include('admin.admin_script')
</body>

</html>