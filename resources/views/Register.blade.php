<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Multi Auth</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6 col-xxl-5">
                <div class="card border border-light-subtle rounded-4">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5">
                                    <h4 class="text-center">Register Here</h4>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('account.ProcessRegister') }}" method="POST">
                            @csrf
                            <div class="row gy-3 overflow-hidden">
                                <!-- Name -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input 
                                            type="text" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            name="name" 
                                            value="{{ old('name') }}" 
                                            id="name" 
                                            placeholder="Your Name"  
                                            required
                                        >
                                        <label for="name" class="form-label">Name</label>
                                    </div>
                                    @error('name')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input 
                                            type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            name="email" 
                                            value="{{ old('email') }}"  
                                            id="email" 
                                            placeholder="name@example.com"  
                                            required
                                        >
                                        <label for="email" class="form-label">Email</label>
                                    </div>
                                    @error('email')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input 
                                            type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            name="password" 
                                            id="password" 
                                            placeholder="Password" 
                                            required
                                        >
                                        <label for="password" class="form-label">Password</label>
                                    </div>
                                    @error('password')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-12">
                                    <div class="form-floating mb-3">
                                        <input 
                                            type="password" 
                                            class="form-control @error('password_confirmation') is-invalid @enderror" 
                                            name="password_confirmation" 
                                            id="password_confirmation" 
                                            placeholder="Confirm Password" 
                                            required
                                        >
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    </div>
                                    @error('password_confirmation')
                                        <p class="invalid-feedback">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn btn-primary btn-xl py-3" type="submit">Register Now</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <!-- Login Link -->
                        <div class="row">
                            <div class="col-12">
                                <hr class="mt-5 mb-4 border-secondary-subtle">
                                <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-center">
                                    <a href="{{ route('account.login') }}" class="link-secondary text-decoration-none">Click here to login</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
