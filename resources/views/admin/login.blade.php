<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Sakanta</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <div style="background: white; padding: 2rem; border-radius: 10px; box-shadow: 0 10px 25px rgba(0,0,0,0.2); width: 100%; max-width: 400px;">
        <h2 style="text-align: center; margin-bottom: 1.5rem; color: #333;">Admin Login</h2>
        
        @if ($errors->any())
            <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 0.75rem; border-radius: 5px; margin-bottom: 1rem;">
                <ul style="margin: 0; padding-left: 1.25rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            
            <div style="margin-bottom: 1rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #555; font-weight: 500;">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" required 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
            </div>

            <div style="margin-bottom: 1.5rem;">
                <label style="display: block; margin-bottom: 0.5rem; color: #555; font-weight: 500;">Password</label>
                <input type="password" name="password" required 
                    style="width: 100%; padding: 0.75rem; border: 1px solid #ddd; border-radius: 5px; font-size: 1rem;">
            </div>

            <button type="submit" 
                style="width: 100%; padding: 0.75rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border: none; border-radius: 5px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: opacity 0.3s;">
                Login
            </button>
        </form>

        <p style="text-align: center; margin-top: 1rem; color: #888; font-size: 0.875rem;">
            <a href="/" style="color: #667eea; text-decoration: none;">← Back to Website</a>
        </p>
    </div>
</body>
</html>


