<!-- Navbar primary -->


<!-- Header -->
<header class="fixed top-0" id="header-main">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg navbar-dark bg-red navbar-fixed-top z-40 fixed top-0" id="navbar-main">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="/">
                {{config('app.name')}}
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-main-collapse"
                aria-controls="navbar-main-collapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse -->
            <div class="collapse navbar-collapse navbar-collapse-overlay" id="navbar-main-collapse">

                <!-- Toggler -->
                <div class="position-relative">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbar-main-collapse" aria-controls="navbar-main-collapse" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i data-feather="x"></i>
                    </button>
                </div>

                <!-- Main navigation -->
                <ul class="navbar-nav ml-lg-auto">

                    <!-- Overview -->
                    <li class="nav-item nav-item-spaced d-none d-lg-block">
                        <a class="nav-link" href="/">
                            Home
                        </a>
                    </li>
                    <li class="nav-item nav-item-spaced d-none d-lg-block">
                        <a class="nav-link" href="../../overview.html">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item nav-item-spaced d-none d-lg-block">
                        <a class="nav-link" href="../../overview.html">
                            Contact Us?
                        </a>
                    </li>
                    <li class="nav-item nav-item-spaced d-none d-lg-block">
                        <a class="nav-link" href="../../overview.html">
                            Why Us?
                        </a>
                    </li>

                </ul>


                <!-- Right navigation -->
                <ul class="navbar-nav align-items-lg-center d-none d-lg-flex ml-lg-auto">
                    <li class="nav-item">
                        <a href="{{route('quotation')}}"
                            class="btn btn-sm btn-light btn-icon ml-3">
                            <span class="btn-inner--icon"><i data-feather="shopping-bag"></i></span>
                            <span class="btn-inner--text"> Request a quotation</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
