@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Upload a file</div>

                <div class="card-body">
                    <form method="POST" action="post/upload"  enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="media" name="media">
                              <label class="custom-file-label" for="media">Choose file</label>
                            </div>                    
                        </div>
                        @error('media')
                            <div class=" row alert alert-danger">{{ $message }}</div>
                         @enderror   
                        <div class="row">
                            <input type="submit" class="btn btn-primary" value="Upload" name="submit">
                        </div> 
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
</div>
    

@endsection