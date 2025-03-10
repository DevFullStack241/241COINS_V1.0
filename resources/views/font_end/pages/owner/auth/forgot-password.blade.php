@extends('font_end.layout.authowner')

@section('content')
    <div class="card-body">
        <div class="card-content p-2">
            <div class="card-title text-uppercase pb-2">Reset Password</div>
            <p class="pb-2">Please enter your email address. You will receive a link to create a new password via
                email.</p>
            <form>
                <div class="form-group">
                    <label for="exampleInputEmailAddress" class="">Email Address</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" id="exampleInputEmailAddress" class="form-control input-shadow"
                            placeholder="Email Address">
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-light btn-block mt-3">Reset Password</button>
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Return to the <a href="login.html"> Sign In</a></p>
    </div>
@endsection
