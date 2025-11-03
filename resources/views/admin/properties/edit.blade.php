@extends('admin.layouts.app')

@section('title', 'Edit Property')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 1.5rem;">Edit Property: {{ $property->title }}</h2>

    @if ($errors->any())
        <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 0.75rem; border-radius: 5px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.properties.update', $property->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Title *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $property->title) }}" required>
            </div>

            <div class="form-group">
                <label>Property Type *</label>
                <select name="property_type" class="form-control" required>
                    <option value="">Select Type</option>
                    <option value="Villa" {{ old('property_type', $property->property_type) == 'Villa' ? 'selected' : '' }}>Villa</option>
                    <option value="House" {{ old('property_type', $property->property_type) == 'House' ? 'selected' : '' }}>House</option>
                    <option value="Apartment" {{ old('property_type', $property->property_type) == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                    <option value="Commercial" {{ old('property_type', $property->property_type) == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Description *</label>
            <textarea name="description" class="form-control" required>{{ old('description', $property->description) }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Address *</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $property->address) }}" required>
            </div>

            <div class="form-group">
                <label>City *</label>
                <input type="text" name="city" class="form-control" value="{{ old('city', $property->city) }}" required>
            </div>

            <div class="form-group">
                <label>Province *</label>
                <input type="text" name="province" class="form-control" value="{{ old('province', $property->province) }}" required>
            </div>
        </div>

        <div class="form-group">
            <label>Location *</label>
            <select name="location_id" class="form-control" required>
                <option value="">Select Location</option>
                @foreach(\App\Models\Location::all() as $location)
                    <option value="{{ $location->id }}" {{ old('location_id', $property->location_id) == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Price (Rp) *</label>
                <input type="number" name="price" class="form-control" value="{{ old('price', $property->price) }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Total Shares *</label>
                <input type="number" name="total_shares" class="form-control" value="{{ old('total_shares', $property->total_shares) }}" required>
            </div>

            <div class="form-group">
                <label>Available Shares *</label>
                <input type="number" name="available_shares" class="form-control" value="{{ old('available_shares', $property->available_shares) }}" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Price Per Share (Rp) *</label>
                <input type="number" name="price_per_share" class="form-control" value="{{ old('price_per_share', $property->price_per_share) }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Bedrooms *</label>
                <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms', $property->bedrooms) }}" required>
            </div>

            <div class="form-group">
                <label>Bathrooms *</label>
                <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms', $property->bathrooms) }}" required>
            </div>

            <div class="form-group">
                <label>Land Area (m²) *</label>
                <input type="number" name="land_area" class="form-control" value="{{ old('land_area', $property->land_area) }}" step="0.01" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Building Area (m²) *</label>
                <input type="number" name="building_area" class="form-control" value="{{ old('building_area', $property->building_area) }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Status *</label>
                <select name="status" class="form-control" required>
                    <option value="available" {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="sold_out" {{ old('status', $property->status) == 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                    <option value="coming_soon" {{ old('status', $property->status) == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
                </select>
            </div>

            <div class="form-group">
                <label>Expected Rental Yield (%)</label>
                <input type="number" name="expected_rental_yield" class="form-control" value="{{ old('expected_rental_yield', $property->expected_rental_yield) }}" step="0.01" min="0" max="100">
            </div>
        </div>

        <div class="form-group">
            <label style="display: flex; align-items: center; gap: 0.5rem;">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $property->is_featured) ? 'checked' : '' }}>
                Featured Property
            </label>
        </div>

        <div class="form-group">
            <label>Amenities (comma separated)</label>
            <input type="text" name="amenities" class="form-control" value="{{ old('amenities', is_array($property->amenities) ? implode(', ', $property->amenities) : '') }}" placeholder="Swimming Pool, Garden, Gym">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Main Image</label>
                @if($property->main_image)
                    <img src="{{ asset($property->main_image) }}" alt="Current main image" style="width: 200px; height: 150px; object-fit: cover; border-radius: 5px; margin-bottom: 0.5rem; display: block;">
                @endif
                <input type="file" name="main_image" class="form-control" accept="image/*">
                <small style="color: #666;">Leave empty to keep current image</small>
            </div>

            <div class="form-group">
                <label>Additional Images</label>
                @if($property->images && count($property->images) > 0)
                    <div style="display: flex; gap: 0.5rem; flex-wrap: wrap; margin-bottom: 0.5rem;">
                        @foreach($property->images as $image)
                            <img src="{{ asset($image) }}" alt="Property image" style="width: 100px; height: 75px; object-fit: cover; border-radius: 5px;">
                        @endforeach
                    </div>
                @endif
                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                <small style="color: #666;">Select new images to add (will be added to existing images)</small>
            </div>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Update Property</button>
            <a href="{{ route('admin.properties.index') }}" class="btn" style="background: #6c757d; color: white;">Cancel</a>
        </div>
    </form>
</div>
@endsection


