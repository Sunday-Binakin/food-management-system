<x-app-layout>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">
<base href="/public">

<head>
    @include('admin.admin_css')
</head>

<body>

    <div class="container-scroller">
        @include('admin.navbar')
        <div class="main-panel">
            <form action="{{ url('/update-chef-food',$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Chef's Name</label>
                    <input style="color: rgb(96, 96, 170);" type="text" name="name" value="{{ $data->name }}">
                </div>
                <div>
                    <label>Speciality</label>
                    <input style="color: rgb(71, 71, 143);" type="text" name="speciality"
                        value="{{ $data->speciality }}">
                </div>
                <div>
                    <label>Old Image</label>
                    <img height="200" width="200" src="/chefImage/{{ $data->image }}">
                </div>
                <div>
                    <label>New Image</label>
                    <input type="file" name="image" required>

                </div>
                <div>

                    <input type="submit" class="btn btn-primary" value="Update Chef" required>

                </div>
            </form>
        </div>
    </div>
    @include('admin.admin_script')
</body>

</html>