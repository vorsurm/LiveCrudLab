@extends('crud.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create Page</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('crud.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Warning!</strong> Please check your input code<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('crud.update', $personal_info->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{$personal_info->name ?: '' }}" class="form-control @error('name') is-invalid @enderror" placeholder="Name">

                @error('name')
                <span class="invalid-feedback">
                    <strong> {{ $message }}</strong>
                </span>
                @enderror

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
               <select name="country" id="country" class="form-control @error('country') is-invalid @enderror">
                <option selected disabled >Select Country * ...</option>
                @foreach($countries as $country)
                <option value="{{$country->name}}" data-country="{{$country->id}}" {{ $personal_info->country == $country->name ? 'selected' : null }}  >{{ $country->name }}</option>

                @endforeach
            </select>

            @error('country')
            <span class="invalid-feedback">
                <strong> {{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <select name="city" id="city" class="form-control">

             @foreach($cities as $city)
             <option value="{{$city->name}}" data-city="{{$city->id}}" {{ $personal_info->city == $country->city ? 'selected' : null }}  >{{ $city->name }}</option>
             @endforeach

         </select>
     </div>
 </div>

 <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Language Skills:</strong>

        <div class="form-control @error('skills') is-invalid @enderror">

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="C#" name="skills[]" {{ array_key_exists('C#', $skills) ? 'checked' : null }}  @if(is_array(old('skills')) && in_array('C#', old('skills'))) checked @endif >
              <label class="form-check-label" for="inlineCheckbox2">C#</label>
          </div>

          <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="C++" name="skills[]" {{ array_key_exists('C++', $skills) ? 'checked' : null }}  @if(is_array(old('skills')) && in_array('C++', old('skills'))) checked @endif>
              <label class="form-check-label" for="inlineCheckbox2">C++</label>
          </div>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="Java" name="skills[]" {{ array_key_exists('Java', $skills) ? 'checked' : null }}  @if(is_array(old('skills')) && in_array('Java', old('skills'))) checked @endif>
              <label class="form-check-label" for="inlineCheckbox2">Java</label>
          </div>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="PHP" name="skills[]" {{ array_key_exists('PHP', $skills) ? 'checked' : null }}  @if(is_array(old('skills')) && in_array('PHP', old('skills'))) checked @endif>
              <label class="form-check-label" for="inlineCheckbox2">PHP</label>
          </div>
          <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="SQL" name="skills[]" {{ array_key_exists('SQL', $skills) ? 'checked' : null }}  @if(is_array(old('skills')) && in_array('SQL', old('skills'))) checked @endif>
              <label class="form-check-label" for="inlineCheckbox2">SQL</label>
          </div>

      </div>

        @error('skills')
          <span class="invalid-feedback">
            <strong> {{ $message }}</strong>
        </span>
        @enderror

  </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Date of Birth:</strong>
        <input type="date" name="birthday" value="{{$personal_info->birthday}}" class="form-control"> 

    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Uploaded Resume:</strong>
        <div class="form-control">

            <input type="hidden" name="resume" value="{{ $personal_info->resume }}">

            <a href="{{ '/uploads/'.$personal_info->resume }}" download><i class="fa fa-download" aria-hidden="true"></i>&nbsp;{{ $personal_info->resume }}</a>

        </div>

    </div>
    <div class="form-group">
        <strong>New Upload:</strong>

        <input type="file" class="form-control-file" name="resume" id="resume_upload" aria-describedby="fileHelp" value="{{ '/uploads/'.$personal_info->resume }}">
        <small id="fileHelp" class="form-text text-muted">Please upload a valid doc or pdf file. Size of file should not be more than 2MB.</small>
    </div>

</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-right">
    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
</div>
</div>

</form>

<script type="text/javascript">
    $('input[name=resume]').on('change', function(){
        var self = $('#resume_upload');
        if (this.files[0].size/1024/1024 >= 2) {
            self.after('<div class="invalid-feedback checksize resume"><strong> File size must be leass  than 2MB.</strong></div>');
        }else{
            $('.resume').remove();
        }

        toggleSubmit();

    });

    function toggleSubmit() {
        var error = $('.checksize ');
    // console.log(error);

    if (error.html() != undefined) {
        $('#submit').prop('disabled', true);
    }else{
        $('#submit').prop('disabled', false);
    }
}

$(document).ready(function() {
    $('select[name="country"]').on('change', function() {
            // var countryID = $(this).val();
            // alert($(this).find(':selected').data("country"));
            var countryID = $(this).find(':selected').data("country");

            if(countryID) {
                $.ajax({
                    url: '/citycall/'+countryID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {

                        // console.log(data);

                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ value.name +'">'+ value.name +'  {{ old('city') }}' +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });
});
</script>

@endsection