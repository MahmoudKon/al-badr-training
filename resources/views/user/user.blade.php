<!DOCTYPE html>
<html lang="en">

    @include('layouts.includes.dashboard.head')


<body>

<div class="container">
    <div class="row">
    <div class="col-12">
                <div class="card">
                  <div class="table-responsive">
                  <a class="btn btn-success " href="{{route('create-user')}}" >
                                 Add User
                                  </a>
                    <table class="table table-vcenter table-mobile-md card-table">
                      <thead>
                        <tr>
                          <th class="text-center">Name</th>
                          <th class="text-center">email</th>
                          <th class="text-center">actions</th>


                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($users as $user )
                        <tr>
                          <td class="text-center" data-label="Name">
                            <div class="d-flex py-1 align-items-center">
                              <span class="avatar me-2" style="background-image: url(./static/avatars/010m.jpg)"></span>
                              <div class="flex-fill">
                                <div class="font-weight-medium">{{$user->name}}</div>
                              </div>
                            </div>
                          </td>
                          <td class="text-center" data-label="Email">
                            <div class="d-flex py-1 align-items-center">
                              <span class="avatar me-2" style="background-image: url(./static/avatars/010m.jpg)"></span>
                              <div class="flex-fill">
                                <div class="font-weight-medium">{{$user->email}}</div>
                              </div>
                            </div>
                          </td>


                          <td>
                            <div class="btn-list flex-nowrap justify-content-center">
                                <a href="{{route('edit-user',$user->id)}}" class="btn btn-primary">Edit</a>
                                <a class="btn btn-danger " href="{{route('delete-user',$user->id)}}" >
                                   Block
                                  </a>

                            </div>
                          </td>
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



@include('layouts.includes.dashboard.scripts')
</body>
</html>
