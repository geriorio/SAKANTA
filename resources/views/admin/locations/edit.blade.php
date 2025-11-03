<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Location - Sakanta Admin</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: Arial, sans-serif; background: #f5f5f5; }
        .header { background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 1rem 2rem; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { color: #333; font-size: 1.5rem; }
        .nav { display: flex; gap: 1rem; align-items: center; }
        .nav a { color: #667eea; text-decoration: none; padding: 0.5rem 1rem; border-radius: 5px; transition: background 0.3s; }
        .nav a:hover { background: #f0f0f0; }
        .container { max-width: 800px; margin: 2rem auto; padding: 0 1rem; }
        .card { background: white; border-radius: 10px; padding: 2rem; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; margin-bottom: 0.5rem; font-weight: 600; color: #333; }
        input, textarea { width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem; }
        textarea { min-height: 100px; resize: vertical; }
        .btn { padding: 0.75rem 1.5rem; border-radius: 5px; text-decoration: none; display: inline-block; font-weight: 600; cursor: pointer; border: none; margin-right: 0.5rem; }
        .btn-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
        .btn-secondary { background: #6c757d; color: white; }
        .btn:hover { opacity: 0.9; }
        .error { color: #dc3545; font-size: 0.875rem; margin-top: 0.25rem; }
        .image-preview { width: 200px; height: 120px; object-fit: cover; border-radius: 5px; margin-top: 0.5rem; }
    </style>
</head>
<body>
    <div class="header">
        <h1>✏️ Edit Location</h1>
        <div class="nav">
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.locations.index') }}">Back to Locations</a>
        </div>
    </div>

    <div class="container">
        <div class="card">
            <form method="POST" action="{{ route('admin.locations.update', $location) }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Location Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $location->name) }}" required>
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description">{{ old('description', $location->description) }}</textarea>
                    @error('description')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Image Filename *</label>
                    <input type="text" id="image" name="image" value="{{ old('image', $location->image) }}" placeholder="e.g., bali.jpg" required>
                    <small style="color: #666; display: block; margin-top: 0.5rem;">
                        Current image: {{ $location->image }}
                    </small>
                    @if($location->image)
                        <img src="/images/locations/{{ $location->image }}" alt="{{ $location->name }}" class="image-preview">
                    @endif
                    @error('image')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div style="margin-top: 2rem;">
                    <button type="submit" class="btn btn-primary">Update Location</button>
                    <a href="{{ route('admin.locations.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
