<html lang="en" dir="{{ app()->isLocale('ar') ? 'rtl' : 'ltr' }}">

    {{-- START HEAD SECTION --}}
    @include('layouts.includes.dashboard.head')
    {{-- END HEAD SECTION --}}
<body  class=" layout-fluid">
    <div class="container">
        <div class="row justify-content-center mt-5" >
            <div class="col-md-8 ">
            <form action="{{ route('create') }}" class="p-3" method="post" enctype="multipart/form-data" style='background:#fff;'>
        @csrf
            <div class="form-group">
                <label for="email" > email:</label>
                <input id=" email" class="form-control" name="email" >
            </div>

<div class="form-group mt-4">
    <label for="name"> name:</label>
    <input id="name"  name="name" class="form-control" >
</div>
<div class="form-group mt-4">
    <label for="password"> password:</label>
    <input id="password"  name="password" class="form-control" >
</div>
            </div>

<div class="text-center mt-4">
            <input type="submit" class="btn btn-primary w-50" value="Submit">
            </div>


    </form>
            </div>
        </div>
    </div>

    {{-- START FOOTER SECTION --}}
                    @include('layouts.includes.dashboard.footer')
                {{-- END FOOTER SECTION --}}
            </div>
        </div>

        {{-- START JAVASCRIPTS SECTION --}}
        @include('layouts.includes.dashboard.scripts')
        {{-- END JAVASCRIPTS SECTION --}}
        <!-- <script>
            $("#submit").click(function(e){
                e.preventDefault();
                let name = $('#name').val();
                let email = $('#email').val();
                let password = $('#password').val();

                var formData= {
                    email:email,
                    name:name,
                    password:password
                }
                $.ajaxSetup({
                    headers:{
                      'X-CSRF-TOKEN='
                    }
                })
            })
        </script> -->

    </body>
</html>
