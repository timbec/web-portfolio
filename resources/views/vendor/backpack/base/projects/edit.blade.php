@extends('backpack::layout')

@section('content')
      <h1>Edit Project</h1>

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
 
      {!! Form::model($project, ['method'=>'PATCH','action'=>['AdminControllers\ProjectsController@update', $project->id], 'files'=>true]) !!}


         <div class="form-group">
            {!! Form::label('title', 'Title:') !!}
            {!! Form::text('title', null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('project_category_id', 'Category:') !!}
            {!! Form::select('project_category_id', array('' => 'Choose Categories') + $project_categories, null, ['class'=>'form-control'])!!}
         </div>

         <div class="form-group">
            {!! Form::label('body', 'Content:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control'])!!}
         </div>


         <div class="form-group">
            {!! Form::label('thumbnail_id', 'Thumbnail:') !!}
            {!! Form::file('thumbnail_id', null, ['class'=>'form-control', 'rows'=>5])!!}
         </div>

         <div class="form-group">
            {!! Form::submit('Edit Project', ['class'=>'btn btn-primary']) !!}
         </div>
      {!! Form::close() !!}

      {!! Form::open(['method'=>'DELETE', 'action'=>['AdminControllers\ProjectsController@destroy', $project->id], 'class'=>'pull-right']) !!}

         <div class="form-group">
            {!!Form::submit('Delete Post', ['class'=>'btn btn-danger']) !!}
         </div>
      {!! Form::close() !!}

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
