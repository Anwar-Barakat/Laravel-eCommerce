<div class="row g-4">
    <div class="col-2">
        <form action="./" method="get" autocomplete="off" novalidate>
            <div class="subheader mb-2">Category</div>
            <div class="list-group list-group-transparent mb-3">
                <a class="list-group-item list-group-item-action d-flex align-items-center active" href="#">
                    Games
                    <small class="text-muted ms-auto">24</small>
                </a>
                <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                    Clothing
                    <small class="text-muted ms-auto">149</small>
                </a>
                <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                    Jewelery
                    <small class="text-muted ms-auto">88</small>
                </a>
                <a class="list-group-item list-group-item-action d-flex align-items-center" href="#">
                    Toys
                    <small class="text-muted ms-auto">54</small>
                </a>
            </div>
            <div class="subheader mb-2">Rating</div>
            <div class="mb-3">
                <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-stars" value="5 stars" checked>
                    <span class="form-check-label">5 stars</span>
                </label>
                <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-stars" value="4 stars">
                    <span class="form-check-label">4 stars</span>
                </label>
                <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-stars" value="3 stars">
                    <span class="form-check-label">3 stars</span>
                </label>
                <label class="form-check">
                    <input type="radio" class="form-check-input" name="form-stars" value="2 and less stars">
                    <span class="form-check-label">2 and less stars</span>
                </label>
            </div>
            <div class="subheader mb-2">Tags</div>
            <div class="mb-3">
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="form-tags[]" value="business" checked>
                    <span class="form-check-label">business</span>
                </label>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="form-tags[]" value="evening">
                    <span class="form-check-label">evening</span>
                </label>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="form-tags[]" value="leisure">
                    <span class="form-check-label">leisure</span>
                </label>
                <label class="form-check">
                    <input type="checkbox" class="form-check-input" name="form-tags[]" value="party">
                    <span class="form-check-label">party</span>
                </label>
            </div>
            <div class="subheader mb-2">Price</div>
            <div class="row g-2 align-items-center mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">
                            $
                        </span>
                        <input type="text" class="form-control" placeholder="from" value="3" autocomplete="off">
                    </div>
                </div>
                <div class="col-auto">—</div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">
                            $
                        </span>
                        <input type="text" class="form-control" placeholder="to" autocomplete="off">
                    </div>
                </div>
            </div>
            <div class="subheader mb-2">Shipping</div>
            <div>
                <select name="" class="form-select">
                    <option>United Kingdom</option>
                    <option>USA</option>
                    <option>Germany</option>
                    <option>Poland</option>
                    <option>Other…</option>
                </select>
            </div>
            <div class="mt-5">
                <button class="btn btn-primary w-100">
                    Confirm changes
                </button>
                <a href="#" class="btn btn-link w-100">
                    Reset to defaults
                </a>
            </div>
        </form>
    </div>
    <div class="col-10">
        <div class="row row-cards">
            @forelse ($products as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body p-4 text-center">
                            <span class="avatar avatar-xl mb-3 rounded" style="background-image: url(./static/avatars/000m.jpg)"></span>
                            <h3 class="m-0 mb-1"><a href="">{{ $product->name }}</a></h3>
                            <div class="text-muted">{{ $product->code }}</div>
                            <div class="mt-3">
                                <span class="badge bg-purple-lt">{{ $product->brand->name }}</span>
                            </div>
                        </div>
                        <div class="d-flex">
                            <a href="#" class="card-btn">
                                <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M3 5m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z" />
                                    <path d="M3 7l9 6l9 -6" />
                                </svg>
                                Add Images
                            </a>
                            <a href="#" class="card-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                </svg>
                                Call
                            </a>
                        </div>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
    </div>
</div>
