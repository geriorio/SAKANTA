<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Sakanta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .container-fluid { max-width: 100%; padding: 0 2rem; }
        .card { background: white; border-radius: 10px; padding: 2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 1.5rem; }
        .card-header { background: #667eea; color: white; padding: 1rem 1.5rem; border-radius: 10px 10px 0 0; margin: -2rem -2rem 1.5rem -2rem; }
        .card-header h5 { margin: 0; font-size: 1.1rem; }
        .card-body { padding: 0; }
        .shadow { box-shadow: 0 2px 8px rgba(0,0,0,0.1) !important; }
        .alert { padding: 1rem; border-radius: 5px; margin-bottom: 1rem; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .alert-dismissible { position: relative; padding-right: 3rem; }
        .btn-close { position: absolute; right: 1rem; top: 50%; transform: translateY(-50%); background: transparent; border: none; font-size: 1.5rem; cursor: pointer; opacity: 0.5; }
        .btn-close:hover { opacity: 1; }
        .btn { display: inline-block; padding: 0.5rem 1rem; border-radius: 5px; text-decoration: none; font-weight: 600; transition: all 0.3s; border: none; cursor: pointer; font-size: 0.9rem; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn-danger { background: #dc3545; color: white; }
        .btn-warning { background: #ffc107; color: #000; }
        .btn-info { background: #17a2b8; color: white; }
        .btn-sm { padding: 0.35rem 0.75rem; font-size: 0.85rem; }
        .btn:hover { opacity: 0.9; transform: translateY(-1px); }
        .btn-group { display: inline-flex; gap: 0.25rem; }
        .d-flex { display: flex; }
        .justify-content-between { justify-content: space-between; }
        .justify-content-center { justify-content: center; }
        .align-items-center { align-items: center; }
        .gap-2 { gap: 0.5rem; }
        .mb-0 { margin-bottom: 0; }
        .mb-2 { margin-bottom: 0.5rem; }
        .mb-3 { margin-bottom: 1rem; }
        .mb-4 { margin-bottom: 1.5rem; }
        .mt-1 { margin-top: 0.25rem; }
        .mt-2 { margin-top: 0.5rem; }
        .py-4 { padding-top: 1.5rem; padding-bottom: 1.5rem; }
        .h3 { font-size: 1.75rem; font-weight: 500; }
        table { width: 100%; border-collapse: collapse; }
        table th, table td { padding: 0.75rem; text-align: left; border-bottom: 1px solid #ddd; }
        table th { background: #f8f9fa; font-weight: 600; }
        table img { border-radius: 5px; }
        .table-responsive { overflow-x: auto; }
        .table-hover tbody tr:hover { background: #f8f9fa; }
        .text-center { text-align: center; }
        .text-muted { color: #6c757d; }
        .text-danger { color: #dc3545; }
        .form-label { display: block; margin-bottom: 0.5rem; color: #555; font-weight: 500; }
        .form-control, .form-select { width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; }
        .form-control:focus, .form-select:focus { outline: none; border-color: #667eea; box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25); }
        textarea.form-control { min-height: 120px; resize: vertical; }
        .invalid-feedback { color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem; display: block; }
        .is-invalid { border-color: #dc3545; }
        .input-group { display: flex; }
        .input-group .form-control { border-radius: 5px 0 0 5px; }
        .input-group .btn { border-radius: 0 5px 5px 0; }
        .bg-primary { background: #667eea; }
        .text-white { color: white; }
        .d-inline { display: inline; }
        .d-inline-flex { display: inline-flex; }
        small { font-size: 0.875rem; }
        
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
            <a href="{{ route('admin.articles.index') }}">Articles</a>
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


