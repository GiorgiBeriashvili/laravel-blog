<form method="post" action="{{ route('post_register') }}">
    @csrf
    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">

        @error('name')
            <p class="text-danger">{{ $errors->first('name') }}</p>
        @enderror

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

        <button type="submit">Register</button>
    </div>
</form>
