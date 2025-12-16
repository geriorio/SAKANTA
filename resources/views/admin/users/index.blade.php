<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Sakanta Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        .header { background: white; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 1rem 2rem; margin-bottom: 2rem; }
        .header h1 { color: #333; font-size: 1.5rem; margin: 0; }
        .nav { display: flex; gap: 1rem; align-items: center; margin-top: 1rem; }
        .nav a { color: #667eea; text-decoration: none; padding: 0.5rem 1rem; border-radius: 5px; transition: background 0.3s; }
        .nav a:hover { background: #f0f0f0; }
        .logout-btn { background: #dc3545; color: white; border: none; padding: 0.5rem 1rem; border-radius: 5px; cursor: pointer; }
    </style>
</head>
<body class="bg-light">
    <div class="header">
        <h1>🏠 Admin Dashboard - Sakanta</h1>
        <div class="nav">
            <span>Welcome, {{ Auth::user()->name }}</span>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <a href="{{ route('admin.properties.index') }}">Properties</a>
            <a href="{{ route('admin.locations.index') }}">Locations</a>
            <a href="{{ route('admin.faqs.index') }}">FAQs</a>
            <a href="{{ route('admin.articles.index') }}">Articles</a>
            <a href="{{ route('admin.users.index') }}" style="background: #667eea; color: white;">Users</a>
            <form method="POST" action="{{ route('admin.logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card shadow-sm">
            <div class="card-header bg-white py-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h5 class="mb-0 text-dark fw-bold">User Management</h5>
                        <p class="text-muted small mb-0">Manage registered users who can access the website</p>
                    </div>
                    <div class="col-auto">
                        <a href="{{ route('admin.authorized-users.index') }}" class="btn btn-warning">
                            <i class="bi bi-key-fill me-1"></i> Access Codes & Referral
                        </a>
                    </div>
                </div>
            </div>                <div class="card-body">
                    <!-- Add New User Form -->
                    <div class="card mb-4 border-primary">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0">Add New User</h6>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.users.store') }}" method="POST">
                                @csrf
                                <div class="row align-items-end">
                                    <div class="col-md-8">
                                        <label for="email" class="form-label">Email Address</label>
                                        <input 
                                            type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            id="email" 
                                            name="email" 
                                            placeholder="user@example.com"
                                            value="{{ old('email') }}"
                                            required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                        <small class="text-muted">User will be able to sign in with this Google account</small>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-plus-circle me-1"></i> Add User
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Success/Error Messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <!-- Search Form -->
                    <div class="mb-3">
                        <form action="{{ route('admin.users.index') }}" method="GET" class="d-flex gap-2">
                            <input 
                                type="text" 
                                name="search" 
                                class="form-control" 
                                placeholder="Search by email or name..." 
                                value="{{ $search ?? '' }}">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-search"></i>
                            </button>
                            @if($search)
                                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Clear</a>
                            @endif
                        </form>
                    </div>

                    <!-- Users Table -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Google ID</th>
                                    <th>Registered</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center gap-2">
                                            @if($user->avatar)
                                                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="rounded-circle" width="32" height="32">
                                            @else
                                                <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white" style="width: 32px; height: 32px;">
                                                    {{ strtoupper(substr($user->email, 0, 1)) }}
                                                </div>
                                            @endif
                                            <span>{{ $user->email }}</span>
                                            @if($user->is_admin)
                                                <span class="badge bg-warning text-dark">Admin</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{ $user->name ?? '-' }}</td>
                                    <td>
                                        @if($user->is_active)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($user->google_id)
                                            <span class="badge bg-info">Connected</span>
                                        @else
                                            <span class="badge bg-secondary">Not Connected</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                    <td class="text-center">
                                        <div class="btn-group btn-group-sm">
                                            <!-- Toggle Active -->
                                            <form action="{{ route('admin.users.toggle', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button 
                                                    type="submit" 
                                                    class="btn btn-sm {{ $user->is_active ? 'btn-warning' : 'btn-success' }}"
                                                    onclick="return confirm('Are you sure?')"
                                                    {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                                    <i class="bi bi-{{ $user->is_active ? 'pause' : 'play' }}-circle"></i>
                                                    {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                                </button>
                                            </form>

                                            <!-- Delete -->
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button 
                                                    type="submit" 
                                                    class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Delete this user? This action cannot be undone.')"
                                                    {{ $user->id === auth()->id() ? 'disabled' : '' }}>
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                                        <p class="mt-3">No users found</p>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
