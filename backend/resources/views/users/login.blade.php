<form method="post" action="{{ route('post_login') }}">
    @csrf
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">

        @error('email')
            <p class="text-danger">{{ $errors->first('email') }}</p>
        @enderror

        <label>Password</label>
        <input type="text" name="password" class="form-control">

        @error('password')
            <p class="text-danger">{{ $errors->first('password') }}</p>
        @enderror

        <button type="submit">Login</button>
    </div>
</form>
