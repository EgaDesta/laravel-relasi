<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Relasi</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <style>
        body {
            display: flex;
        }
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            min-width: 250px;
            transition: all 0.3s;
        }
        .sidebar.collapsed {
            min-width: 80px;
        }
        .sidebar .nav-link {
            color: #495057;
            font-size: 1rem;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
            border-radius: 5px;
        }
        .sidebar .nav-item i {
            font-size: 1.2rem;
        }
        .sidebar.collapsed .nav-link span {
            display: none;
        }
        .sidebar-footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
        }
        .search-box {
            margin: 15px;
        }
    </style>
</head>
<body>

<div class="sidebar d-flex flex-column p-3 bg-light" id="sidebar">
    <div class="d-flex align-items-center justify-content-start">
        {{-- <h4 class="text-primary">CRUD</h4> --}}
        <button class="btn btn-link p-0" id="toggleSidebar">
            <i class="fas fa-bars"></i>
        </button>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="fas fa-home"></i> <span>Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/book') }}">
                <i class="fas fa-book"></i> <span>Book</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/author') }}">
                <i class="fas fa-users"></i> <span>Author</span>
            </a>
        </li>
    </ul>
</div>

<div class="content p-4" style="flex: 1;">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('toggleSidebar').onclick = function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
    };
</script>

</body>
</html>
