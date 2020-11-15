@extends("layout.layout")

@section("content")
    <div class="row justify-content-center mt-4">
        <h1>
            EDIT POST
        </h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-8">
            {{--        @if($errors->any())--}}
            {{--            @foreach($errors->all() as $error)--}}
            {{--                <li>{{ $error }}</li>--}}
            {{--            @endforeach--}}
            {{--        @endif--}}
            <form method="post" enctype="multipart/form-data" action="{{route('posts.update', $post->id)}}">
                @csrf
                @method('PUT')
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post Title</label>
                        <label>
                            <input type="text" class="form-control"  placeholder="Title" name="title" value="{{old('title', $post->title)}}">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post Content</label>
                        <label>
                            <input type="text" class="form-control"  placeholder="Content" name="content" value="{{old('content', $post->content)}}">
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Post Likes</label>
                        <label>
                            <input type="text" class="form-control"  placeholder="Likes" name="likes" value="{{old('likes', $post->likes)}}">
                        </label>
                    </div>
                </div>
                <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection
