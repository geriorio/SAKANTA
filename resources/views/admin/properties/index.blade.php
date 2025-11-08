@extends('admin.layouts.app')

@section('title', 'Manage Properties')

@section('content')
<div class="card">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
        <h2>All Properties</h2>
        <a href="{{ route('admin.properties.create') }}" class="btn btn-primary">+ Add New Property</a>
    </div>

    @if($properties->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Location</th>
                    <th>Location ID</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Shares</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($properties as $property)
                <tr>
                    <td>
                        @if($property->main_image)
                            <img src="{{ asset($property->main_image) }}" alt="{{ $property->title }}" style="width: 80px; height: 60px; object-fit: cover;">
                        @else
                            <div style="width: 80px; height: 60px; background: #ddd; display: flex; align-items: center; justify-content: center; border-radius: 5px;">No Image</div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $property->title }}</strong><br>
                        <small style="color: #666;">{{ $property->property_type }}</small>
                    </td>
                    <td>{{ $property->location->name ?? $property->city }}</td>
                    <td><strong style="color: #667eea;">#{{ $property->location_id ?? '-' }}</strong></td>
                    <td>{{ $property->formatted_price }}</td>
                    <td>
                        @if($property->status == 'available')
                            <span style="background: #28a745; color: white; padding: 0.25rem 0.5rem; border-radius: 3px; font-size: 0.875rem;">Available</span>
                        @elseif($property->status == 'sold_out')
                            <span style="background: #dc3545; color: white; padding: 0.25rem 0.5rem; border-radius: 3px; font-size: 0.875rem;">Sold Out</span>
                        @else
                            <span style="background: #ffc107; color: #000; padding: 0.25rem 0.5rem; border-radius: 3px; font-size: 0.875rem;">Coming Soon</span>
                        @endif
                    </td>
                    <td>{{ $property->ownership ?? 'N/A' }}</td>
                    <td>
                        <div style="display: flex; gap: 0.5rem;">
                            <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-warning" style="padding: 0.25rem 0.75rem; font-size: 0.875rem;">Edit</a>
                            <form method="POST" action="{{ route('admin.properties.destroy', $property->id) }}" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this property?');">
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
            {{ $properties->links() }}
        </div>
    @else
        <p style="text-align: center; padding: 2rem; color: #666;">No properties found. <a href="{{ route('admin.properties.create') }}">Add your first property</a></p>
    @endif
</div>
@endsection


