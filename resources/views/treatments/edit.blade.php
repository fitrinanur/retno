@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-md-3">
            <div class="card">
                <div class="card-header" style="color: #636b6f;
                        padding: 10 25px;
                        font-size: 13px;
                        font-weight: 600;
                        letter-spacing: .1rem;
                        text-decoration: none;
                        text-transform: uppercase;">
                    <h3>Form Data Treatment</h3>
                </div>
                <div class="card-body" style="padding:30px">
                    <form action="{{ route('treatment.update', $treatment) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputAddress">Nama</label>
                            <input type="text" class="form-control" id="inputName" name="name"
                                placeholder="Coloring Hair" value="{{ $treatment->name }}">
                        </div>
                        <div class="form-group">
                            <label for="inputState">Kategori</label>
                            <select id="inputState" class="form-control" name="category">
                                @foreach ($types as $key => $type)
                                <option value="{{ $type }}" @if (old('type')==$type) selected @endif>{{ $type }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Harga</label>
                            <input type="text" class="form-control" id="inputName" name="price" placeholder="54000"
                                value="{{ $treatment->price }}" />
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
