@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-12">
        @if(session('status')) {!! session('status') !!} @endif
        <div class="card">
            <div class="card-header d-flex">
                <a href="{{ url("/member") }}" class="btn btn-sm btn-round"><i class="fas fa-arrow-left"></i></a>
                <h4>Tambah Member</h4>
            </div>
            <div class="card-body">
                @if(session('msg')){!! session('msg') !!} @endif
                <form action="{{ url('/member') }}" method="post" enctype="multipart/form-data">@csrf 
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="nik" class="col-md-4 col-form-label text-md-end">{{ __('NIK')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="nik" type="text"
                                        class="form-control @error('nik') is-invalid @enderror" name="nik"
                                        value="{{ old("nik") }}" autocomplete="name"
                                        autofocus>
        
                                    @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="nama" type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        value="{{ old("nama") }}" autocomplete="name"
                                        autofocus>
        
                                    @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-end">{{ __('Jenis Kelamin')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select id="jenis_kelamin" type="text"
                                        class="form-control @error('jenis_kelamin') is-invalid @enderror" name="jenis_kelamin">
                                        <option {{ old('jenis_kelamin' == 'pria' ? 'selected' : '') }} value="pria">Pria</option>
                                        <option {{ old('jenis_kelamin' == 'wanita' ? 'selected' : '') }} value="wanita">Wanita</option>
                                    </select>
        
                                    @error('jenis_kelamin')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="tempat_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tempat Lahir')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="tempat_lahir" type="text"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir"
                                        value="{{ old("tempat_lahir") }}" autocomplete="name"
                                        autofocus>
        
                                    @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="tanggal_lahir" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Lahir')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="tanggal_lahir" type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir"
                                        value="{{ old("tanggal_lahir") }}" autocomplete="name"
                                        autofocus>
        
                                    @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old("email") }}" autocomplete="name"
                                        autofocus>
        
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="no_hp" class="col-md-4 col-form-label text-md-end">{{ __('Nomor HP')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="no_hp" type="text"
                                        class="form-control @error('no_hp') is-invalid @enderror" name="no_hp"
                                        value="{{ old("no_hp") }}" autocomplete="name"
                                        autofocus>
        
                                    @error('no_hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="no_wa" class="col-md-4 col-form-label text-md-end">{{ __('Nomor WA')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="no_wa" type="text"
                                        class="form-control @error('no_wa') is-invalid @enderror" name="no_wa"
                                        value="{{ old("no_wa") }}" autocomplete="name"
                                        autofocus>
        
                                    @error('no_wa')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <input id="username" type="text"
                                        class="form-control @error('username') is-invalid @enderror" name="username"
                                        value="{{ old("username") }}" autocomplete="name"
                                        autofocus>
        
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label for="verified" class="col-md-4 col-form-label text-md-end">{{ __('Verified')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select id="verified" type="text"
                                        class="form-control @error('verified') is-invalid @enderror" name="verified">
                                        <option {{ old('verified' == '1' ? 'selected' : '') }} value="1">Terverifikasi</option>
                                        <option {{ old('verified' == '0' ? 'selected' : '') }} value="0">Tidak Terverifikasi</option>
                                    </select>
        
                                    @error('verified')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row mb-3 justify-content-center">
                                <label for="is_aktif" class="col-md-4 col-form-label text-md-end">{{ __('Status')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <select id="is_aktif" type="text"
                                        class="form-control @error('is_aktif') is-invalid @enderror" name="is_aktif">
                                        <option {{ old('is_aktif' == '1' ? 'selected' : '') }} value="1">Aktif</option>
                                        <option {{ old('is_aktif' == '0' ? 'selected' : '') }} value="0">Tidak Aktif</option>
                                    </select>
        
                                    @error('is_aktif')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
        
                            <div class="row mb-3 justify-content-center">
                                <label for="icon" class="col-md-4 col-form-label text-md-end">{{
                                    __('icon')
                                    }}</label>
        
                                <div class="col-md-6">
                                    <div class="custom-file">
                                        <input type="file" name="icon" class="custom-file-input" id="icon">
                                        <label class="custom-file-label" for="icon">Pilih File</label>
                                    </div>
        
                                    @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <img src="" alt="{{ old("nama") }}" class="img img-thumbnail img-temporary d-none" style="width: 800px; height: auto"> 
                                </div>
                            </div>
                            
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4 d-flex align-items-end">
                                    <a type="button" href="{{ url("/member") }}" class="btn btn-primary mr-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn mx-2 btn-success"><i class="fas fa-pen"></i> Simpan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection