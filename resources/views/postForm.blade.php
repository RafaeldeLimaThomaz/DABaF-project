@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center; color: blue">
                {{ __('New Post') }}
                </div>

                <div class="card-body">
                <form method="POST" action="{{ route('post.create') }}">
                @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control " name="title" value="" required="" autocomplete="" autofocus="">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control " name="description" value="" required="" autocomplete="" autofocus="">

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">Age</label>

                            <div class="col-md-6">
                                <input id="age" type="number" class="form-control " name="age" value="" required="" autocomplete="" autofocus="">

                            </div>
                        </div>

                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>

                                                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
