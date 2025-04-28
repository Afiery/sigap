<x-authlayout title="Lupa password">
    <div class="row justify-content-center">
        <div class="col-md-6 text-center mb-5">
            {{-- <h2 class="heading-section"></h2> --}}
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="img" style="background-image: url(/images/forgot-pass.png);">
                
            </div>
                <div class="login-wrap p-4 p-md-5">
              <div class="d-flex">
                  <div class="w-100">
                      <h5 class="mb-4">Lupa Password</h5>
                  </div>
                        <div class="w-100">
                            
                        </div>
                  </div>
                <form action="reset-password-email" method="POST" class="signin-form">
                    @csrf
                  <div class="form-group mb-3">
                      <label class="label" for="name">Email</label>
                      <input type="text" name="email" class="form-control" placeholder="Email" required>
                  </div>
            <div class="form-group">
                <button type="submit" class="form-control btn btn-primary rounded submit px-3 login-button">Kirim link reset password</button>
            </div>
            
          </form>
          {{-- <p class="text-center">Lupa Password? <a data-toggle="tab" href="#signup">Reset password</a></p> --}}
        </div>
      </div>
        </div>
    </div>
</x-authlayout>