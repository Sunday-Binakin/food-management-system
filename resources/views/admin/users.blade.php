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
        <div class="main-panel">    

        {{-- creating a table to display username and email --}}
    {{-- <div style="position: relative;  right:-160px"> --}}
        <div class="table-responsive"> 
           <table class="table">
                <thead>
                    <tr align="center ">
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($userData as $data )
                    
                    
                    <tr align="center">
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        {{-- condition on which user can be deleted --}}
                        @if($data->usertype=="0")
                        <td><a type="button" class="btn btn-danger" href="{{url('/delete_user',$data->id)}}">Delete</a></td>
                        @else
                        <td><a type="button" class="btn btn-warning" >Not Allowed</a></td>
                        @endif
                    
                    </tr>
                    @endforeach
                    </tbody> 
            </table>
        </div>
          </div>
    {{-- </div> --}}
    </div>
    @include('admin.admin_script')
</body>

</html>