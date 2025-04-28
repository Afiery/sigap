<x-app-layout title="Dashboard">
    <div class="row">
        <div class="col-lg-4 col-md-12 col-6 mb-6">
          <div class="card">
            <div class="card-body">
              <p class="mb-1">Jumlah Admin</p>
              <h4 class="card-title mb-3">{{$total_admin}}</h4>
              {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-6 mb-6">
          <div class="card">
            <div class="card-body">
              <p class="mb-1">Jumlah Pegawai</p>
              <h4 class="card-title mb-3">{{$total_pegawai}}</h4>
              {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +28.42%</small> --}}
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-12 col-6 mb-6">
          <div class="card">
            <div class="card-body">
              <p class="mb-1">Jumlah SIP Expired</p>
              <h4 class="card-title mb-3">{{$total_expired}}</h4>
              {{-- <small class="text-danger fw-medium"><i class="bx bx-down-arrow-alt"></i> -16.24%</small> --}}
            </div>
          </div>
        </div>
        {{-- <div class="col-md-6">
          <div class="card">
            <h5 class="card-header">Send Message</h5>
            <form action="#" method="post">
                @csrf
            <div class="card-body">
              <div>
                <label for="defaultFormControlInput" class="form-label">Number</label>
                <input type="text" class="form-control" id="nomor_wa">
                <label for="defaultFormControlInput" class="form-label">Message</label>
                <input type="text" class="form-control" id="pesan_wa">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div> --}}
        <div class="row">
          <div class="col-md-6">
            <div class="card mb-6">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Message</h5>
              </div>
              <div class="card-body">
                <form  action="{{ route('wa.send') }}" method="post">
                  @csrf
                  <div class="mb-6">
                    <label class="form-label" for="basic-default-fullname">Number</label>
                    <input type="text" class="form-control" id="nomor_wa" name="nomor_wa">
                  </div>
                  <div class="mb-6">
                    <label class="form-label" for="basic-default-company">Text</label>
                    <input type="text" class="form-control" id="teks_wa" name="teks_wa">
                  </div>
                  <button type="submit" class="btn btn-primary">Send</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
</x-app-layout>