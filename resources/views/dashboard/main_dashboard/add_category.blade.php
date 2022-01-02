@extends('dashboard.master_dashboard.app')
=@section('main')
<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Category</h3>
    </div>
    <div class="page-content">
        <section class="row">
            <div class="col-12 col-lg-6">
                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Input Categories</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <form action="category" method="post">
                                    @csrf
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="basicInput">Name Category</label>
                                            <input type="text" class="form-control" name="name_category" id="basicInput" placeholder="Input Category">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-primary">Add</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </div>

    <footer>
        <div class="footer clearfix mb-0 text-muted">
            <div class="float-start">
                <p>2021 &copy; Mazer</p>
            </div>
            <div class="float-end">
                <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                        href="http://ahmadsaugi.com">A. Saugi</a></p>
            </div>
        </div>
    </footer>
</div>
@endsection
