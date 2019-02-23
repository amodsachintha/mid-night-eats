<div class="card mb-3 shadow">
    <div class="pt-4 pl-4 pr-4">
        <img class="card-img-top img-thumbnail shadow" style="border-radius: 50%" src="/img/avatars/thumbnails/{{$user->avatar}}" alt="Card image">
    </div>
    <div class="card-body profile-usertitle">
        <p class="profile-usertitle-name">{{$user->fname . ' ' . $user->lname}}</p>
        <p class="profile-usertitle-email">{{$user->email}}</p>
        <p><small>Member since {{$user->created_at->toFormattedDateString()}}</small></p>
    </div>
    <div align="center" class="mb-3">
        <a href="{{route('profile.index')}}" class="btn btn-primary btn-block w-75">Overview</a>
        <a href="{{route('profile.orders')}}" class="btn btn-primary btn-block w-75">My Orders <span class="badge badge-pill badge-warning">3</span></a>
        <a href="{{route('profile.settings')}}" class="btn btn-primary btn-block w-75">Account Settings</a>
        <a href="{{route('profile.help')}}" class="btn btn-primary btn-block w-75">Help</a>
    </div>
</div>