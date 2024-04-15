<style>
    .navbar {
        background: #333;
        color: #fff;
        padding: 15px;
        text-align: center;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar-brand {
        font-size: 24px;
    }

    .navbar-toggler {
        display: none;
    }

    .navbar-nav {
        display: flex;
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        margin-right: 20px;
        position: relative;
        /* Added */
    }

    .nav-link {
        color: #fff;
        text-decoration: none;
    }

    /* Dropdown styles */
    .dropdown {
        position: absolute;
        top: 100%;
        left: 0;
        background-color: #333;
        padding: 10px;
        display: none;
        list-style: none;
        margin: 0;
    }

    .nav-item:hover .dropdown {
        display: block;
        z-index: 2;
    }

    .dropdown li {
        margin: 5px 0;

    }

    .dropdown li a {
        color: white;
        text-decoration: none;
    }

    /* Media query for responsive navbar */
    @media only screen and (max-width: 768px) {
        .navbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .navbar-toggler {
            display: block;
            font-size: 24px;
            cursor: pointer;
        }

        .navbar-nav {
            display: none;
            width: 100%;
        }

        .nav-item {
            margin: 10px 0;
        }

        .nav-item.active {
            background: #555;
        }
    }

    nav a:hover {
        color: green;
    }
</style>
<nav class="navbar">
    <div class="navbar-brand">Joueur</div>
    <div class="navbar-toggler" onclick="toggleNavbar()">
        <i class="fas fa-bars"></i>
    </div>
    <ul class="navbar-nav" id="navbarNav">
        <li class="nav-item active">
            <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Catégories</a>
            <ul class="dropdown">
                <li><a href="#">Joueurs</a></li>
                <li><a href="#">Clubs</a></li>
                <li><a href="#">Agents</a></li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Services</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('Publier.index') }}" class="nav-link">Publier une annonce</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Se connecter</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">S'inscrire</a>
        </li>
    </ul>
</nav>
