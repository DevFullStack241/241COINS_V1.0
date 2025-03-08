@extends('back.layouts.dashboard')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')
@section('content')
    <div class="dashboard-menu-btn color-bg"><span><i class="fas fa-bars"></i></span>Dasboard Menu</div>
    <div class="container dasboard-container">
        <!-- dashboard-title -->
        @livewire('client.client-profile')
    </div>
@endsection
@push('scripts')
    <script>
        $('input[type="file"][id="clientProfilePictureFile"]').Kropify({
            preview: '#clientProfilePicture',
            viewMode: 1,
            aspectRatio: 1,
            cancelButtonText: 'Cancel',
            resetButtonText: 'Reset',
            cropButtonText: 'Crop & update',
            processURL: '{{ route('client.change-profile-picture') }}',
            maxSize: 2097152,
            showLoader: true,
            success: function(data) {
                if (data.status == 1) {
                    toastr.success(data.msg);
                    Livewire.dispatch('updateAdminClientClientHeaderInfo');
                    Livewire.dispatch('updateClientProfilePage');
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
