<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Linker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
<div class="form-page">
    <div class="box col-4">
        @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
        <div class="alert alert-success"><b>Your link: </b><a target="_blank" href="{{ session('success') }}">{{ session('success') }} </a></div>
        @endif
            @if(session('warning'))
                <div class="alert alert-warning">{{ session('warning') }}</div>
            @endif
        <div class="card">
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mb-3 required">
                        <label for="link" class="form-label">{{ __('Link') }} ({{ __('only https') }})</label>
                        <input name="link" type="text" class="form-control @error('link') is-invalid @enderror" id="link" value="{{ old('link') }}">
                        @error('link')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">{{ __('Transfer limit') }}</label>
                        <input name="limit" type="text" class="form-control @error('limit') is-invalid @enderror" id="limit" value="{{ old('linit') }}">
                        @error('limit')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3 required">
                        <label for="link" class="form-label">{{ __('Lifetime in hours') }} ({{ __('max: 24h') }})</label>
                        <input name="lifetime" type="text" class="form-control @error('lifetime') is-invalid @enderror" id="lifetime" value="{{ old('lifetime') }}">
                        @error('lifetime')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3 required">
                        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
