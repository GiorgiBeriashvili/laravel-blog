@extends("layout.layout")

@section("content")
    <div>
        <form  method="post" enctype="multipart/form-data" action="{{route('posts.save')}}">
            <div class="box-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Title</label>
                    <label>
                        <input type="text" class="form-control"  placeholder="Name" name="title">
                    </label>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Content</label>
                    <label>
                        <input type="text" class="form-control"  placeholder="Name" name="content">
                    </label>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Post Likes</label>
                    <label>
                        <input type="text" class="form-control"  placeholder="Name" name="likes">
                    </label>
                </div>
            </div>
            <input type="hidden" name="_token"  id='csrf_toKen' value="{{ csrf_toKen() }}">
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
@endsection
