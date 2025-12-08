@extends('admin.layouts.app')

@section('title', 'Manage Yachts')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2>All Yachts</h2>
        <a href="{{ route('admin.yachts.create') }}" class="btn btn-primary">+ Add New Yacht</a>
    </div>

    @if($yachts->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Passengers</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($yachts as $yacht)
                <tr>
                    <td>
                        @if($yacht->main_image)
                            <img src="{{ asset($yacht->main_image) }}" alt="{{ $yacht->name }}" style="width: 80px; height: 60px; object-fit: cover;">
                        @else
                            <div style="width: 80px; height: 60px; background: #ddd; display: flex; align-items: center; justify-content: center; border-radius: 5px;">No Image</div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $yacht->name }}</strong><br>
                        <small style="color: #666;">{{ $yacht->length_overall }}</small>
                    </td>
                    <td>{{ $yacht->brand }}</td>
                    <td>{{ $yacht->formatted_price }}</td>
                    <td>
                        <span style="background: #667eea; color: white; padding: 0.25rem 0.5rem; border-radius: 3px; font-size: 0.875rem;">{{ $yacht->status }}</span>
                    </td>
                    <td>{{ $yacht->maximum_passengers }} pax</td>
                    <td>
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('admin.yachts.edit', $yacht->id) }}" class="btn btn-warning" style="padding: 0.25rem 0.75rem; font-size: 0.875rem;">Edit</a>
                            <form method="POST" action="{{ route('admin.yachts.destroy', $yacht->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this yacht?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 0.25rem 0.75rem; font-size: 0.875rem;">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div style="margin-top: 1.5rem;">
            {{ $yachts->links() }}
        </div>
    @else
        <p style="text-align: center; padding: 2rem; color: #666;">No yachts found. <a href="{{ route('admin.yachts.create') }}">Add your first yacht</a></p>
    @endif
</div>
@endsection
