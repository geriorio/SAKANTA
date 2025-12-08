<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Sakanta</title>
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
        .container { max-width: 1200px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: white; border-radius: 10px; padding: 2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin-bottom: 2rem; }
        .card h2 { color: #333; margin-bottom: 1rem; }
        .stats { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; }
        .stat-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 1.5rem; border-radius: 10px; text-align: center; }
        .stat-card h3 { font-size: 2rem; margin-bottom: 0.5rem; }
        .stat-card p { font-size: 1rem; opacity: 0.9; }
    </style>
</head>
<body>
    <div class="header">
        <h1>🏠 Admin Dashboard - Sakanta</h1>
        <div class="nav">
            <span>Welcome, {{ Auth::user()->name }}</span>
            <a href="{{ route('admin.properties.index') }}">Properties</a>
            <a href="{{ route('admin.locations.index') }}">Locations</a>
            <a href="{{ route('admin.faqs.index') }}">FAQs</a>
            <a href="{{ route('admin.articles.index') }}">Articles</a>
            <a href="{{ route('admin.users.index') }}">Users</a>
            <a href="{{ route('admin.authorized-users.index') }}">Access Codes</a>
            <a href="/">View Website</a>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <h2>Overview</h2>
            <div class="stats">
                <div class="stat-card">
                    <h3>{{ \App\Models\Property::count() }}</h3>
                    <p>Total Properties</p>
                </div>
                <div class="stat-card">
                    <h3>{{ \App\Models\Property::where('status', 'available')->count() }}</h3>
                    <p>Available Properties</p>
                </div>
                <div class="stat-card">
                    <h3>{{ \App\Models\Yacht::count() }}</h3>
                    <p>Total Yachts</p>
                </div>
                <div class="stat-card">
                    <h3>{{ \App\Models\Location::count() }}</h3>
                    <p>Total Locations</p>
                </div>
                <div class="stat-card">
                    <h3>{{ \App\Models\LocationArticle::count() }}</h3>
                    <p>Location Articles</p>
                </div>
                <div class="stat-card">
                    <h3>{{ \App\Models\User::count() }}</h3>
                    <p>Registered Users</p>
                </div>
            </div>
        </div>

        <div class="card">
            <h2>Quick Actions</h2>
            <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                <a href="{{ route('admin.properties.create') }}" 
                   style="display: inline-block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 5px; text-decoration: none; font-weight: 600;">
                    + Add New Property
                </a>
                <a href="{{ route('admin.yachts.create') }}" 
                   style="display: inline-block; background: linear-gradient(135deg, #5f72bd 0%, #9b23ea 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 5px; text-decoration: none; font-weight: 600;">
                    ⚓ Add New Yacht
                </a>
                <a href="{{ route('admin.locations.create') }}" 
                   style="display: inline-block; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 5px; text-decoration: none; font-weight: 600;">
                    + Add New Location
                </a>
                <a href="{{ route('admin.faqs.create') }}" 
                   style="display: inline-block; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 5px; text-decoration: none; font-weight: 600;">
                    + Add New FAQ
                </a>
                <a href="{{ route('admin.articles.create') }}" 
                   style="display: inline-block; background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 5px; text-decoration: none; font-weight: 600;">
                    + Add New Article
                </a>
                <a href="{{ route('admin.users.index') }}" 
                   style="display: inline-block; background: linear-gradient(135deg, #30cfd0 0%, #330867 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 5px; text-decoration: none; font-weight: 600;">
                    👥 Manage Users
                </a>
                <a href="{{ route('admin.authorized-users.create') }}" 
                   style="display: inline-block; background: linear-gradient(135deg, #ffa751 0%, #ffe259 100%); color: white; padding: 0.75rem 1.5rem; border-radius: 5px; text-decoration: none; font-weight: 600;">
                    🔑 Generate Access Code
                </a>
            </div>
        </div>
    </div>
</body>
</html>


