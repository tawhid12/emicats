<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emicats</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Slick Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .navbar .search-icon {
            cursor: pointer;
        }

        /*.search-bar {
            display: none;
        }*/

        .search-bar.active {
            display: block;
        }

        @media (max-width: 767.98px) {
            .navbar-collapse {
                justify-content: flex-start;
            }
        }

        .brand-name {
            font-size: 28px;
            color: #333;
            font-weight: 900;
        }

        .tagline {
            font-size: 16px;
            color: #666;
            font-weight: bold;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #008D48;
            color: #fff;
            /* Text color for better contrast */
            transition: box-shadow 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            padding: 12px;
        }

        .card-title {
            font-size: 18px;
        }

        .card-details {
            font-size: 18px;
        }

        .btn-primary {
            background-color: #008D48;
        }

        /*===  Slick Carousel ===*/
        /* Custom styles */
        .slick-carousel {
            position: relative;
        }

        .slick-prev,
        .slick-next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.5);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            color: #333;
            font-size: 24px;
            cursor: pointer;
            z-index: 1;
        }

        .slick-prev {
            left: 10px;
        }

        .slick-next {
            right: 10px;
        }

        .slick-prev i,
        .slick-next i {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Custom styles */
        .slick-prev:before,
        .slick-next:before {
            color: #999 !important;
        }

        /* Custom styles */
        .slick-prev:hover,
        .slick-prev:focus,
        .slick-next:hover,
        .slick-next:focus {
            outline: none;
            /* Remove outline */
            background: transparent;
            /* Set background to transparent */
        }

        /* Custom styles */
        .product-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image img {
            width: 100%;
            height: auto;
            display: block;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .product-info {
            padding: 20px;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 14px;
            color: #6c757d;
        }

        .product-price {
            font-size: 18px;
            font-weight: bold;
            color: #008D48;
        }

        .product-field {
            font-size: 14px;
            color: #6c757d;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">

            <!-- Flex container for toggler and brand -->
            <div class="d-flex align-items-center">

                <!-- Navbar toggler button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar brand -->
                <a class="ms-2 navbar-brand brand-name" href="#">Emicats Recycling</a>

            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    {{-- <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li> --}}
                    @if (Auth::user())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </a></li>
                                </form>
                                {{-- <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container my-2">
        <div class="row gx-1">
            <div class="col-4 my-1">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pt</h5>
                        <h5 class="card-details m-0">$ {{ $setting->pt }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 my-1">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pd</h5>
                        <h5 class="card-details m-0">$ {{ $setting->pt }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 my-1">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Rh</h5>
                        <h5 class="card-details m-0">$ {{ $setting->rh }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container my-2">
        <div class="row">
            <div class="col-md-12">
                <div class="card p-2">
                    {{-- <div class="brand-name text-center" style="color: #fff">emicats</div> --}}
                    <div class="tagline text-center px-5" style="color: #fff">Emirates Catalysts Recycling - Scrap at
                        the
                        right price</div>
                </div>
            </div>
            <div class="col-md-12 my-2">
                <form class="d-flex justify-content-end" action="{{ route('welcome') }}">
                    @csrf
                    <div class="search-bar w-100" id="searchBar">
                        <input class="form-control me-2 search_bar" type="search"
                            placeholder="Search By Product Keyword Make" aria-label="Search" name="keyword">
                    </div>
                    {{-- <i class="ms-2 fas fa-search search-icon" id="searchIcon"></i> --}}
                    <button type="submit" class="ms-2 btn btn-primary search-icon"><i class="fas fa-search"
                            id="searchIcon"></i></button>
                </form>
            </div>
            <h4 class="text-center my-3">All</h4>
            @foreach ($products as $product)
                <div class="col-12 col-md-3 my-2">
                    <div class="product-card">
                        <div class="product-image">
                            @if (count($product->getImageUrlAttribute()) > 0)
                                <div class="slick-carousel">
                                    @foreach ($product->getImageUrlAttribute() as $image)
                                        <img src="{{ $image }}" alt="{{ $product->name }} Image">
                                    @endforeach
                                </div>
                            @else
                                {{-- <p>No images available for this product.</p> --}}
                                <img src="https://via.placeholder.com/300" alt="Product Image">
                            @endif
                        </div>
                        <div class="product-info">
                            <h5 class="product-title">{{ $product->title }}</h5>
                            <p class="product-description">{{ $product->description }}</p>
                            <p class="product-field"><strong>References:</strong> {{ $product->ref1 }},
                                {{ $product->ref2 }}</p>
                            <p class="product-field"><strong>Weight:</strong> {{-- $product->weight --}} *****</p>
                            <p class="product-field"><strong>Manufacturer:</strong></p>
                            <p class="product-field"><strong>Year:</strong> {{ $product->year }}</p>
                            <p class="product-field"><strong>Card Model:</strong></p>
                            @php
                                $ph =
                                    (($product->pt / 1000 / $setting->pt_value) *
                                        $setting->pt *
                                        $setting->exchange_rate *
                                        $setting->pt_per) /
                                    100;
                                $pd =
                                    (($product->pd / 1000 / $setting->pd_value) *
                                        $setting->pd *
                                        $setting->exchange_rate *
                                        $setting->pd_per) /
                                    100;
                                $rh =
                                    (($product->rh / 1000 / $setting->rh_value) *
                                        $setting->rh *
                                        $setting->exchange_rate *
                                        $setting->rh_per) /
                                    100;
                                $per_kilo_price = $ph + $pd + $rh;
                            @endphp

                            {{-- $per_kilo_price --}}
                            @if (Auth::user())
                                <p class="product-price">
                                    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'user')
                                        AED {{ round(($product->weight * $per_kilo_price) / 1000) }}
                                    @else
                                        *****
                                    @endif
                                </p>
                            @endif
                            {{-- <button class="btn btn-primary">Add to Cart</button> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Slick Carousel JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchIcon').click(function() {
                $('.search-bar').toggleClass('active');
            });
            $('.search_bar').on('keyup', function() {
                //console.log($(this).val());
            });
        });
        // Initialize Slick Carousel
        $(document).ready(function() {
            $('.slick-carousel').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: true,
                dots: false,
                prevArrow: '<button class="slick-prev" aria-label="Previous"><i class="bi bi-chevron-left"></i></button>',
                nextArrow: '<button class="slick-next" aria-label="Next"><i class="bi bi-chevron-right"></i></button>'
            });
        });
    </script>
</body>

</html>
