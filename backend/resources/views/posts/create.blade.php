@extends("layout.layout")

@section("content")
    <div>
{{--        @if($errors->any())--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{ $error }}</li>--}}
{{--            @endforeach--}}
{{--        @endif--}}
        <form  method="post" enctype="multipart/form-data" action="{{route('posts.save')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <label>
{{--                        <input type="text" class="form-control {{$errors->first('title') ? 'is-invalid' : ''}}"  placeholder="Name" name="title">--}}
                        <input type="text" class="form-control @error('title') 'is-invalid' @enderror"  placeholder="Name" name="title" value="{{old('title')}}">
                    </label>
{{--                    <p>{{ $errors->has('title') }}</p>--}}

{{--                    @if($errors->has('title'))--}}
{{--                        <p class="text-danger">{{ $errors->first('title') }}</p>--}}
{{--                    @endif--}}

                    @error('title')
                        <p class="text-danger">{{ $errors->first('title') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Content</label>
                    <label>
                        <input type="text" class="form-control @error('content') 'is-invalid' @enderror"  placeholder="Name" name="content"  value="{{old('content')}}">
                    </label>

                    @error('content')
                    <p class="text-danger">{{ $errors->first('content') }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Likes</label>
                    <label>
                        <input type="text" class="form-control @error('likes') 'is-invalid' @enderror"  placeholder="Name" name="likes"  value="{{old('likes')}}">
                    </label>

                    @error('likes')
                    <p class="text-danger">{{ $errors->first('likes') }}</p>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
