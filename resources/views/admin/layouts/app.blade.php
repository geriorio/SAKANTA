<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Sakanta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .header { background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { color: #333; font-size: 1.5rem; }
        .nav { display: flex; gap: 1rem; align-items: center; }
        .nav a { color: #667eea; text-decoration: none; padding: 0.5rem 1rem; border-radius: 5px; transition: background 0.3s; }
        .nav a:hover { background: #f0f0f0; }
        .logout-btn { background: #dc3545; color: white; border: none; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer; }
        .container { max-width: 1400px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: white; border-radius: 10px; padding: 2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .alert { padding: 1rem; border-radius: 5px; margin-bottom: 1rem; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .btn { display: inline-block; padding: 0.5rem 1rem; border-radius: 5px; text-decoration: none; font-weight: 600; transition: opacity 0.3s; border: none; cursor: pointer; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-warning { background: #ffc107; color: #000; }
        .btn:hover { opacity: 0.9; }
        table { width: 100%; border-collapse: collapse; }
        table th, table td { padding: 0.75rem; text-align: left; border-bottom: 1px solid #ddd; }
        table th { background: #f8f9fa; font-weight: 600; }
        table img { border-radius: 5px; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; color: #555; font-weight: 500; }
        .form-control { width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; }
        textarea.form-control { min-height: 120px; }
        
        /* Pagination Styling */
        .pagination { display: flex; gap: 0.5rem; list-style: none; margin-top: 2rem; justify-content: center; flex-wrap: wrap; }
        .pagination li { margin: 0; }
        .pagination li a, .pagination li span { display: inline-flex; align-items: center; justify-content: center; padding: 0.5rem 0.75rem; border: 1px solid #ddd; border-radius: 5px; text-decoration: none; color: #667eea; min-width: 40px; height: 40px; transition: all 0.3s; font-weight: 600; font-size: 1rem; }
        .pagination li a { cursor: pointer; }
        .pagination li a:hover { background: #667eea; color: white; border-color: #667eea; }
        .pagination li.active span { background: #667eea; color: white; border-color: #667eea; }
        .pagination li.disabled span { color: #ccc; cursor: not-allowed; border-color: #e0e0e0; }
        .pagination li.disabled span:hover { background: transparent; color: #ccc; }
    </style>
</head>
<body>
    <div class="header">
        <h1>🏠 Admin Panel - Sakanta</h1>
        <div class="nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.properties.index') }}">Properties</a>
            <a href="{{ route('admin.faqs.index') }}">FAQs</a>
            <a href="/">View Website</a>
            <span style="color: #666;">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>
</body>
</html>


