<h1>Send Mail</h1>

<form method="POST" enctype="multipart/form-data" action="{{route('mail.send')}}">
    <div>
        <label for="mail">Send Email</label>
        <input id="mail" name="mail" type="email"  />
    </div>

    @error('mail')
        <p>{{$errors->first('mail')}}</p>
    @enderror

    @csrf
    <button type="submit">Send</button>
</form>
