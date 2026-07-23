<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">

        <a class="navbar-brand" href="{{ url('/') }}">
            eTicket Online
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kategori.index') }}">
                        Kategori
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('event.index') }}">
                        Event
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tiket.index') }}">
                        Tiket
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('transaksi.index') }}">
                        Transaksi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('eticket.index') }}">
                        E-Ticket
                    </a>
                </li>

            </ul>

        </div>

    </div>
</nav>