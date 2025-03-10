@extends('font_end.layout.authowner')

@section('content')
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="assets/images/logo-icon.png" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3">Sign Up</div>
            <form>
                <div class="form-group">
                    <label for="exampleInputName" class="sr-only">Name</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputName" class="form-control input-shadow"
                            placeholder="Enter Your Name">
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmailId" class="sr-only">Email ID</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputEmailId" class="form-control input-shadow"
                            placeholder="Enter Your Email ID">
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputPassword" class="form-control input-shadow"
                            placeholder="Choose Password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputPassword" class="form-control input-shadow"
                            placeholder="Choose Password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>



                <button type="button" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Already have an account? <a href="login.html"> Sign In here</a></p>
    </div>
@endsection
