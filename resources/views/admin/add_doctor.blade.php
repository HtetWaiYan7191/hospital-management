<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->
            @include('admin.navbar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <div class="container mt-10">
                    <form style="width:50%" action="{{url('/upload_doctor')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control bg-black " name="name" id="name"
                                aria-describedby="emailHelp" placeholder="Enter Doctor Name">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control bg-black "  placeholder="123-456-7890" required name="phone" id="phone"
                                aria-describedby="" placeholder="Enter Phone Number">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label mr-3">Speciality</label>
                            <select class="form-select bg-black" name="speciality" aria-label="Default select example">
                                <option selected>Select</option>
                                <option value="eye">Eye</option>
                                <option value="heart">Heart</option>
                                <option value="lung">Lung</option>
                              </select>
                        </div>

                        <div class="mb-3">
                            <label for="room" class="form-label ">Room Number</label>
                            <input type="text" class="form-control bg-black" name="room" id=""
                                aria-describedby="" placeholder="Write The Room Number">
                        </div>

                        <div class="mb-3">
                            <label for="room" class="form-label ">Image</label>
                            <input type="file" class="form-control" name="file" id=""
                                aria-describedby="" >
                        </div>


                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.script')
</body>

</html>
