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
            <table class="table table-striped table-dark">
                <thead>
                  <tr align="center">
                    <th scope="col">No</th> 
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">date</th>
                    <th scope="col">time</th>
                    <th scope="col">message</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $data)
                    
                    <tr align="center">
                    <th scope="row">{{ $loop->iteration }}</th> 
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->date }}</td>
                    <td>{{ $data->time }}</td>
                    <td>{{ $data->message }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
     </div>
    @include('admin.admin_script')
</body>

</html>