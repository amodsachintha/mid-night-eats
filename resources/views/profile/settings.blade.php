<div class="card shadow">
    <div class="card-header bg-white">
        Account Settings
    </div>
    <div class="card-body" align="center">
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <h5>Profile Picture</h5>
                <form action="{{route('profile.uploadAvatar')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="file" id="avatar" name="filepond">
                    </div>
                    <button type="submit" class="btn btn-success d-none btn-block" id="avatarSaveChanges">Save changes</button>
                </form>
            </div>
        </div>

        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h5>Change Password</h5>
                <div style="text-align: left">
                    <form action="{{route('profile.updatePassword')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="current_password">Password</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Current password" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label for="password">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="New password" required>
                            </div>
                            <div class="col-sm-6">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="card shadow-sm mb-3">
            <div class="card-body">
                <h5>Account Settings</h5>
                <div style="text-align: left">
                    <form method="POST" action="{{route('profile.updateUserDetails')}}">
                        <fieldset>
                            @csrf
                            <div class="form-group">
                                <label for="staticEmail" class="col-form-label">Email</label>
                                <input type="text" readonly="" class="form-control-plaintext" id="staticEmail" value="{{$user->email}}">
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="fname">First Name</label>
                                    <input type="text" class="form-control" id="fname" name="fname" value="{{$user->fname}}">
                                </div>
                                <div class="col-sm-6">
                                    <label for="lname">Last Name</label>
                                    <input type="text" class="form-control" id="lname" name="lname" value="{{$user->lname}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control selectpicker" id="gender" name="gender">
                                    <option value="male" data-icon="far fa-male" {{$user->gender === 'male' ? 'selected' : ''}}>Male</option>
                                    <option value="female" data-icon="far fa-female" {{$user->gender === 'female' ? 'selected' : ''}}>Female</option>
                                </select>
                            </div>
                        </fieldset>
                        <button type="submit" class="btn btn-success btn-block">Save Changes</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>