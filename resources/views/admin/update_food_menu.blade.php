{{-- RGB (4, 7, 32) --}}
<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">


<head>
    <base href="/public">
    @include('admin.admin_css')
</head>

<body>

    <div class="container-scroller">
        @include('admin.navbar')
        <div class="main-panel">    

            <div style="padding-top: 0px; " align="left" >
                <form  action="{{ url('update-food-item',$data->id ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class  style="padding: 10px">
                        <label>Title</label>
                        <input  style="color:blue;"  type="text" name="title" value="{{ $data->title }}" required>
                    </div>
                    <div class style="padding: 10px">
                        <label>Price</label>
                        <input style="color:blue;" type="text" name="price" value="{{ $data->price }}" required>
                    </div>
                  
                    
                    <div style="padding: 10px">
                        <label>Description</label>
                        <input  style="color:blue;" type="text" name="description"  value="{{ $data->description }}" required>
                    </div>
                    <div class style="padding: 10px">
                        <label>Old image</label>
                        <img height="200" width="200" src="/foodImage/{{ $data->image }}">
                    </div>
                    <div class style="padding: 10px">
                        <label> New image</label>
                        <input  style="color:rgb(83, 83, 150);" type="file" name="image" value="{{ $data->image }}" >
                    </div>
                    <div>
                        <input class="btn btn-primary" type="submit" value="save">
                    </div>
                </form>
     </div>
    @include('admin.admin_script')
</body>

</html>