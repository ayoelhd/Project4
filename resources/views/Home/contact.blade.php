@extends('layouts.home')

@section('content')
<div class="py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="row g-0">
                    <div class="col-md-5 bg-dark text-white p-5 d-flex flex-column justify-content-center border-start rounded-start">
                        <h3 class="fw-bold">Contact Info</h3>
                        <p class="mt-4"><i class="fas fa-map-marker-alt me-2 text-primary"></i> 123 University Street, City</p>
                        <p><i class="fas fa-phone me-2 text-primary"></i> +1 234 567 890</p>
                        <p><i class="fas fa-envelope me-2 text-primary"></i> info@uniportal.com</p>
                    </div>
                    <div class="col-md-7 p-5 bg-white rounded-end">
                        <h3 class="fw-bold mb-4">Send a Message</h3>
                        <form>
                            <div class="mb-3">
                                <label class="form-label">Full Name</label>
                                <input type="text" class="form-control" placeholder="Enter your name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" placeholder="Email@example.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Message</label>
                                <textarea class="form-control" rows="4" placeholder="How can we help?"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection