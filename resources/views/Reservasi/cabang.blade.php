yyyyyyyyy

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0">Pilih Cabang</h4>
                    <small class="text-muted">Step 1 of 4</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('pasien.reservasi.dokter') }}" method="POST">
                        @csrf
                        
                        <div class="row">
                            @foreach($cabangs as $cabang)
                            <div class="col-md-6 mb-4">
                                <div class="card h-100 cabang-card">
                                    <input type="radio" name="cabang_id" id="cabang_{{ $cabang->id }}" 
                                           value="{{ $cabang->id }}" class="d-none" 
                                           {{ old('cabang_id') == $cabang->id ? 'checked' : '' }}>
                                    <label for="cabang_{{ $cabang->id }}" class="card-body d-block cursor-pointer">
                                        <h5 class="card-title">{{ $cabang->nama }}</h5>
                                        <p class="card-text text-muted small">
                                            <i class="fas fa-map-marker-alt"></i> 
                                            {{ $cabang->alamat }}
                                        </p>
                                        <div class="text-primary mt-2">
                                            <small>Pilih cabang ini →</small>
                                        </div>
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        @error('cabang_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('pasien.dashboard') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Selanjutnya <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.cabang-card {
    border: 2px solid #e9ecef;
    transition: all 0.3s ease;
    cursor: pointer;
}

.cabang-card:hover {
    border-color: #007bff;
    transform: translateY(-2px);
}

.cabang-card input[type="radio"]:checked + label {
    background-color: #f8f9fa;
    border-radius: 0.375rem;
}

.cabang-card input[type="radio"]:checked + label .card-title {
    color: #007bff;
}

.cursor-pointer {
    cursor: pointer;
}
</style>
