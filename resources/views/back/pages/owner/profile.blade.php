@extends('back.layouts.dash_owner')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        <div class="dashboard-title fl-wrap">
            <div class="dashboard-title-item"><span>Edit Profile</span></div>
            @livewire('admin-owner-client-header-profile-info')
        </div>
        @livewire('owner.owner-profile')
    </div>
@endsection
@push('scripts')
    <script>
        $('input[type="file"][id="ownerProfilePictureFile"]').Kropify({
            preview: '#ownerProfilePicture',
            viewMode: 1,
            aspectRatio: 1,
            cancelButtonText: 'Cancel',
            resetButtonText: 'Reset',
            cropButtonText: 'Crop & update',
            processURL: '{{ route('owner.change-profile-picture') }}',
            maxSize: 2097152,
            showLoader: true,
            success: function(data) {
                if (data.status == 1) {
                    toastr.success(data.msg);
                    Livewire.dispatch('updateAdminOwnerClientHeaderInfo');
                    Livewire.dispatch('updateOwnerProfilePage');
                } else {
                    toastr.error(data.msg);
                }
            },
            errors: function(error, text) {
                console.log(text);
            },
        });
    </script>
@endpush
