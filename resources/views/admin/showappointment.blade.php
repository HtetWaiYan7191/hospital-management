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
            <div class="appointment-container d-block mt-10">   
                <h2 class="text-center text-white my-10">{{$userName}}</h2>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Doctor</th>
                            <th>Status</th>
                            <th>Approve</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment )
                            <tr>
                                <td>{{$appointment->name}}</td>
                                <td>{{$appointment->email}}</td>
                                <td>{{$appointment->phone}}</td>
                                <td>{{$appointment->date}}</td>
                                <td>{{$appointment->doctor}}</td>
                                <td>
                                  @if ($appointment->status == 0)
                                      Progress
                                  @else
                                      Approve
                                  @endif
                              </td>
                              <td><a href="{{url('approve', $appointment->id)}}" class="btn btn-success">Approve</a></td>
                              <td><a href="{{url('cancel', $appointment->id)}}" class="btn btn-danger">Cancel</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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