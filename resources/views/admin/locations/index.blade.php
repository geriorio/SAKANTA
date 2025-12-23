<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Locations - Sakanta Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .header { background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { color: #333; font-size: 1.5rem; }
        .nav { display: flex; gap: 1rem; align-items: center; }
        .nav a { color: #667eea; text-decoration: none; padding: 0.5rem 1rem; border-radius: 5px; transition: background 0.3s; }
        .nav a:hover { background: #f0f0f0; }
        .container { max-width: 1200px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: white; border-radius: 10px; padding: 2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn { padding: 0.5rem 1rem; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: 600; cursor: pointer; border: none; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .btn-success { background: #28a745; color: white; }
        .btn-warning { background: #ffc107; color: #333; }
        .btn-danger { background: #dc3545; color: white; }
        .btn:hover { opacity: 0.9; }
        table { width: 100%; border-collapse: collapse; margin-top: 1rem; }
        th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #ddd; }
        th { background: #f8f9fa; font-weight: 600; }
        .actions { display: flex; gap: 0.5rem; }
        .alert { padding: 1rem; margin-bottom: 1rem; border-radius: 5px; }
        .alert-success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .image-preview { width: 100px; height: 60px; object-fit: cover; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>📍 Manage Locations</h1>
        <div class="nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.properties.index') }}">Properties</a>
            <a href="{{ route('admin.faqs.index') }}">FAQs</a>
        </div>
    </div>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
                <h2>All Locations</h2>
                <a href="{{ route('admin.locations.create') }}" class="btn btn-primary">+ Add New Location</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>Location ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($locations as $location)
                        <tr>
                            <td><strong style="color: #667eea;">#{{ $location->id }}</strong></td>
                            <td>
                                <img src="{{ asset('images/locations/' . $location->image) }}"alt="{{ $location->name }}"class="image-preview">
                            </td>
                            <td>{{ $location->name }}</td>
                            <td>{{ $location->slug }}</td>
                            <td>{{ Str::limit($location->description, 50) }}</td>
                            <td>
                                <div class="actions">
                                    <a href="{{ route('admin.locations.edit', $location) }}" class="btn btn-warning">Edit</a>
                                    <form method="POST" action="{{ route('admin.locations.destroy', $location) }}" style="display: inline;" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align: center; color: #999;">No locations found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div style="margin-top: 1.5rem;">
                {{ $locations->links() }}
            </div>
        </div>
    </div>
</body>
</html>
