@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 offset-md-3">
            <div class="card">
                <ul class="nav nav-tabs" id="lodgingTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="general-tab" data-toggle="tab" href="#member" role="tab"
                            aria-controls="general" aria-selected="true">Member</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="image-tab" data-toggle="tab" href="#general" role="tab"
                            aria-controls="image" aria-selected="false">Umum</a>
                    </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content" id="lodgingTabContent">
                        <div class="tab-pane fade show active" id="member" role="tabpanel" aria-labelledby="member-tab">
                            <form method="post" action="{{ route('transaction.store') }}">
                                @csrf
                                <input type="hidden" name="type" required value="member">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Code</label>
                                        <input type="text" name="code" required value="{{ $code }}"
                                            class="form-control {{ $errors->has('code') ? ' is-invalid' : '' }}"
                                            id="code" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">User</label>
                                        <input type="hidden" name="user" required value="{{ auth()->user()->id }}"
                                            class="form-control {{ $errors->has('user') ? ' is-invalid' : '' }}"
                                            id="user">
                                        <input type="text" name="user" required value="{{ auth()->user()->name }}"
                                            class="form-control {{ $errors->has('user') ? ' is-invalid' : '' }}"
                                            id="user" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Member ID</label>
                                    <select id="member_id" name="member_id" class="form-control">
                                        @foreach ($members as $key => $member)
                                        <option value="{{ $member->id }}" @if (old('member_id')==$member->id) selected
                                            @endif>{{ $member->no_member }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nameInput">Member Name</label>
                                    <input type="text" name="name" required
                                        class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                                        id="member_name">
                                    @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="">Treatment</label>
                                    <select id="treatment_id" name="category" class="form-control">
                                        <option selected> Pilih Treatment</option>
                                        @foreach ($treatments as $key => $treatment)
                                        <option value="{{ $treatment->id }}" @if (old('treatment_id')==$treatment->id)
                                            selected @endif>{{ $treatment->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nameInput">Harga</label>
                                    <input type="text" name="price" required
                                        class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                        id="treatment_price" disabled>
                                    @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="nameInput">Biaya Tambahan<small></small></label>
                                    <input type="text" name="extra" required
                                        class="form-control {{ $errors->has('extra') ? ' is-invalid' : '' }}"
                                        id="extra"> 
                                        <small>* Isi dengan angka 0 jika tidak ada biaya tambahan</small>
                                    @if ($errors->has('extra'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('extra') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="nameInput">Catatan</label>
                                    <textarea class="form-control" rows="3" name="notes"></textarea>
                                    @if ($errors->has('notes'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="nameInput">Total</label>
                                    <input type="text" name="total" required
                                        class="form-control {{ $errors->has('total') ? ' is-invalid' : '' }}"
                                        id="total">
                                    @if ($errors->has('total'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('total') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-primary mb-0">Kirim</button>
                            </form>
                        </div>

                        <div class="tab-pane fade show" id="general" role="tabpanel" aria-labelledby="general-tab">
                            <form method="post" action="{{ route('transaction.store') }}">
                                @csrf
                                <input type="hidden" name="type" required value="general">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="">Code</label>
                                        <input type="text" name="code" required value="{{ $code }}"
                                            class="form-control {{ $errors->has('code') ? ' is-invalid' : '' }}"
                                            id="code" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">User</label>
                                        <input type="hidden" name="user" required value="{{ auth()->user()->id }}"
                                            class="form-control {{ $errors->has('user') ? ' is-invalid' : '' }}"
                                            id="user">
                                        <input type="text" required value="{{ auth()->user()->name }}"
                                            class="form-control" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nameInput">Name</label>
                                    <input type="text" name="member_name" required
                                        class="form-control {{ $errors->has('member_name') ? ' is-invalid' : '' }}"
                                        id="member_name">
                                    @if ($errors->has('member_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('member_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Nomor Handphone</label>
                                    <input type="text" class="form-control" id="inputName" name="phone_number"
                                        placeholder="085768192xxx">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Email</label>
                                    <input type="text" class="form-control" id="inputName" name="email"
                                        placeholder="raka@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="inputAddress">Alamat</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                                        name="address"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Treatment</label>
                                    <select id="treatment_id2" name="treatment_id" class="form-control">
                                        <option selected> Pilih Treatment</option>
                                        @foreach ($treatments as $key => $treatment)
                                        <option value="{{ $treatment->id }}" @if (old('treatment_id2')==$treatment->id)
                                            selected @endif>{{ $treatment->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nameInput">Harga</label>
                                    <input type="text" name="price" required
                                        class="form-control {{ $errors->has('price') ? ' is-invalid' : '' }}"
                                        id="treatment_price2">
                                    @if ($errors->has('price'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="nameInput">Biaya Tambahan<small></small></label>
                                    <input type="text" name="extra" required
                                        class="form-control {{ $errors->has('extra') ? ' is-invalid' : '' }}"
                                        id="extra2"> 
                                        <small>* Isi dengan angka 0 jika tidak ada biaya tambahan</small>
                                    @if ($errors->has('extra'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('extra') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="nameInput">Catatan</label>
                                    <textarea class="form-control" rows="3" name="notes"></textarea>
                                    @if ($errors->has('notes'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('notes') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="nameInput">Total</label>
                                    <input type="text" name="total" required
                                        class="form-control {{ $errors->has('total') ? ' is-invalid' : '' }}"
                                        id="total2">
                                    @if ($errors->has('total'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('total') }}</strong>
                                    </span>
                                    @endif
                                </div>
    
                                <button type="submit" class="btn btn-primary mb-0">Kirim</button>
                            </form>
                        </div>
                    </div>
                    <!-- End tab content -->
                </div>




            </div>
        </div>
    </div>

</div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#member_id').change(function () {
            $.get('/ajax-subcat/' + this.value + '/members.json', function (members) {
                $('#member_name').val(members.name);
            });
        });
        $('#treatment_id').change(function () {
            $.get('/ajax-subcat-treatment/' + this.value + '/treatments.json', function (treatments) {
                $('#treatment_price').val(treatments.price);
            });
        });
        $('#treatment_id2').change(function () {
            $.get('/ajax-subcat-treatment2/' + this.value + '/treatments2.json', function (treatments) {
                $('#treatment_price2').val(treatments.price);
            });
        });

        $('#extra').change(function () {
            var price = $('#treatment_price').val();
            var extra = $('#extra').val();

            var total = Number(price)+Number(extra);
            console.log(total);
            $('#total').val(total);
        });

        $('#extra2').change(function () {
            var price = $('#treatment_price2').val();
            var extra = $('#extra2').val();

            var total = Number(price)+Number(extra);
            console.log(total);
            $('#total2').val(total);
        });
     
        
    });

</script>

@endpush
