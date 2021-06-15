@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="fade-in">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="card">
                        <form action="{{ route('admin.pages.update', [$page]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-header">{{ __('Edit Page') }}</div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="title">{{ __('Title') }}</label>
                                            <input class="form-control" id="title" name="title" type="text"
                                                value="{{ $page->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="content">{{ __('Content') }}</label>
                                            <textarea name="content" id="content" cols="30" rows="5"
                                                class="form-control">{{ $page->content }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button class="btn btn-sm btn-primary" type="submit"> {{ __('Save Page') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#content'))
            .catch(error => {
                console.error(error);
            });

    </script>
@endsection
