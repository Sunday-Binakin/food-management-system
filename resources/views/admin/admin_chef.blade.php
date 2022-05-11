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
        <div class="main-panel">
            <form action="{{ url('/upload-chef') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Name</label>
                    <input style="color: blue;" name="name" type="text" placeholder="Name" required>
                </div>
                <div>
                    <label>Speciality</label>
                    <input style="color: blue;" name="speciality" type="text" placeholder="speciality" required>
                </div>
                <div>
                    <input type="file" name="image" required>

                </div>
                <div>
                    <input type="submit" value="Save" class="btn btn-primary">
                </div>
            </form>
                <div style="padding-top: 30px">
                <table class="table table-striped table-dark">
                    <thead>
                      <tr align="center">
                        <th scope="col">No</th> 
                        <th scope="col">Chef's Name</th>
                        <th scope="col">speciality</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                        <th scope="col">Action 2</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                        
                        <tr align="center">
                        <th scope="row">{{ $loop->iteration }}</th> 
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->speciality }}</td>
                        <td><img height="300px" width="300px" src="/chefImage/{{ $data->image }}"></td>
                       
                        <td><a class="btn btn-primary" href="{{ url('/update-chef',$data->id) }}">Update</td>
                            <td><a class="btn btn-danger" href="{{ url('/delete-chef-food',$data->id) }}">Delete</td>
                        
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
        </div>
        </div>
    </div>
    </div>
    @include('admin.admin_script')
</body>

</html>