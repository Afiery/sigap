<x-authlayout title="Login">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            <h2 class="heading-section">SIGAP-App</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="img" style="background-image: url(/images/login-1.jpg);">
          </div>
                <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                  <div class="w-100">
                      <h3 class="mb-4">Daftar</h3>
                  </div>
                        <div class="w-100">
                            
                        </div>
                  </div>
                <form action="regis-admnew" method="POST" class="signin-form">
                    @csrf
                    <div class="form-group mb-3">
                        <label class="label" for="name">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="name">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary rounded submit px-3 login-button">Daftar</button>
                    </div>
                </form>
          {{-- <p class="text-center">Lupa Password? <a data-toggle="tab" href="#signup">Reset password</a></p> --}}
        </div>
      </div>
        </div>
    </div>
</x-authlayout>