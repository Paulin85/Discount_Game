@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Mes informations</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="card">
                            <div class="card-body">
                            <form action="{{ route('users.update',['user' => $user]) }}" method="POST">
                                <div class="form-group">
                                    <label for="name">Nom</label>
                                    <input type="text" name="name" id="name" class="form-control" required value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Adresse Email</label>
                                    <input type="email" name="email" id="email" class="form-control" required value="{{ Auth::user()->email }}">
                                </div>
                                @method('PUT')
                                @csrf()
                                <input type="submit" class="btn btn-success">
                            </form>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<div class="container">
        <div class="row">
            <div class="col-6 offset-3">

            </div>
        </div>
    </div>
