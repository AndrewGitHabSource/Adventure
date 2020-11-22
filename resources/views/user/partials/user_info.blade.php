<div class="col-md-3">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle" src="{{ $user->profile_photo_path }}" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{ $user->name }}</h3>

            <p class="text-muted text-center">{{ $user->login }}</p>

            <p class="text-muted text-center">{{ $user->email }}</p>
        </div>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">About Me</h3>
        </div>

        <div class="card-body">
            {{ $user->info }}
        </div>
    </div>
</div>