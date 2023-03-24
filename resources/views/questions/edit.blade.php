@extends('layouts.app')

@section('title')
    Modification Question | Mini Stack
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center my-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white"><h2>{{ __('Modification Question') }}</h2></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('questions.update',$question) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group row mb-3">
                            <label for="collective_id" class="col-md-4 col-form-label text-md-right">{{ __('Collectif') }} </label>

                            <div class="col-md-6">
                                <select name="collective_id" id="category_id"
                                    class="form-select">
                                    <option disabled selected>Choisir une question</option>
                                    @foreach ($collectives as $collective)
                                        <option
                                            @if($collective->id === $question->collective_id) selected @endif
                                            value="{{$collective->id}}">
                                            {{$collective->title}}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">{{ __('Categorie') }} <span class="text-danger fw-bold">*</span> </label>

                            <div class="col-md-6">
                                <select name="category_id" id="category_id"
                                    class="form-select @error('category_id') is-invalid @enderror">
                                    <option disabled selected>Choisir une catégorie</option>
                                    @foreach ($categories as $category)
                                        <option
                                            @if($category->id === $question->category_id) selected @endif
                                            value="{{$category->id}}">
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>

                                @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Titre') }}<span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title',$question->title) }}" required autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Question') }}<span class="text-danger fw-bold">*</span></label>

                            <div class="col-md-6">
                                <textarea rows="5" cols="30"
                                    class="form-control @error('body') is-invalid @enderror"
                                    name="body"
                                    required autocomplete="body">{{ old('body',$question->body) }}</textarea>

                                @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Envoyer') }}
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
