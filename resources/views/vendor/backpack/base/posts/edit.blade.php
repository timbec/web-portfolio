@extends('backpack::layout')

@section('content')

   <h1>Edit Post</h1>

          <script src="//cloud.tinymce.com/stable/tinymce.min.js"></script>

  <script>
  var editor_config = {
    path_absolute : "/",
    selector: "textarea.form-control",
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table contextmenu directionality",
      "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>

 <div class="row">
    <div class="col-sm-3">
      <img src="{{ $post->photo ? $post->photo->file : 'http://placeholder.it' }}" alt="" class="img-responsive">
    </div>

    {!! Form::model($post, ['method'=>'PATCH','action'=>['AdminControllers\PostsController@update', $post->id], 'files'=>true]) !!}
         <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('category_id', 'Category:') !!}
            {!! Form::select('category_id', $categories, null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('body', 'Content:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
         </div>


         <div class="form-group">
            {!! Form::label('photo_id', 'Thumbnail:') !!}
            {!! Form::file('photo_id', null, ['class'=>'form-control', 'rows'=>5])!!}
         </div>

         <div class="form-group">
            {!! Form::label('excerpt', 'Excerpt:') !!}
            {!! Form::textarea('excerpt', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::submit('Edit Post', ['class'=>'btn btn-primary']) !!}
         </div>

      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminControllers\PostsController@destroy', $post->id], 'class'=>'pull-right']) !!}

         <div class="form-group">
            {!!Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
         </div>
      {!! Form::close() !!}
 </div>

      @if(count($errors)>0)
      <div class="alert alert-danger">
         <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
         </ul>
      </div>
      @endif

@stop
