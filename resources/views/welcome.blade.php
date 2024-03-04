<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Navbar with Dropdown and Search Icon</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .navbar .search-icon {
            cursor: pointer;
        }

        .search-bar {
            display: none;
        }

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
            font-size: 14px;
            color: #666;
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
            font-size: 12px;
        }

        .card-details {
            font-size: 10px;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
            <form
                class="d-flex align-items-center ms-md-auto ms-lg-auto ms-xl-auto ms-xxl-auto me-0 me-md-2 me-lg-2 me-xl-2 me-xxl-2">
                <div class="search-bar" id="searchBar">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                </div>
                <i class="ms-2 fas fa-search search-icon" id="searchIcon"></i>
            </form>
        </div>
    </nav>
    <div class="container my-4">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-name text-center">emicats</div>
                <div class="tagline text-center">Emirates Catalysts Recycling - Scrap at the right price</div>
            </div>
        </div>
    </div>
    <div class="container my-2">
        <div class="row gx-1">
            <div class="col-4 my-1">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Platinum</h5>
                        <p class="card-details"><small>(913 S/Oz t)</small></p>
                    </div>
                </div>
            </div>
            <div class="col-4 my-1">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Palladium</h5>
                        <p class="card-details"><small>(913 S/Oz t)</small></p>
                    </div>
                </div>
            </div>
            <div class="col-4 my-1">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Rhodium</h5>
                        <p class="card-details"><small>(913 S/Oz t)</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchIcon').click(function() {
                $('.search-bar').toggleClass('active');
            });
        });
    </script>
</body>

</html>
