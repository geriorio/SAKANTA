@extends('admin.layouts.app')

@section('title', 'Add New Property')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 1.5rem;">Add New Property</h2>

    @if ($errors->any())
        <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 0.75rem; border-radius: 5px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
        @csrf

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Title *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label>Property Type *</label>
                <select name="property_type" class="form-control" required>
                    <option value="">Select Type</option>
                    <option value="Villa" {{ old('property_type') == 'Villa' ? 'selected' : '' }}>Villa</option>
                    <option value="House" {{ old('property_type') == 'House' ? 'selected' : '' }}>House</option>
                    <option value="Apartment" {{ old('property_type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
                    <option value="Commercial" {{ old('property_type') == 'Commercial' ? 'selected' : '' }}>Commercial</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Description *</label>
            <textarea name="description" class="form-control" required>{{ old('description') }}</textarea>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Address *</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
            </div>

            <div class="form-group">
                <label>City *</label>
                <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
            </div>

            <div class="form-group">
                <label>Province *</label>
                <input type="text" name="province" class="form-control" value="{{ old('province') }}" required>
            </div>
        </div>

        <div class="form-group">
            <label>Location *</label>
            <select name="location_id" class="form-control" required>
                <option value="">Select Location</option>
                @foreach(\App\Models\Location::all() as $location)
                    <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                @endforeach
            </select>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Price (Rp) *</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Total Shares *</label>
                <input type="number" name="total_shares" class="form-control" value="{{ old('total_shares') }}" required>
            </div>

            <div class="form-group">
                <label>Price Per Share (Rp) *</label>
                <input type="number" name="price_per_share" class="form-control" value="{{ old('price_per_share') }}" step="0.01" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Bedrooms *</label>
                <input type="number" name="bedrooms" class="form-control" value="{{ old('bedrooms') }}" required>
            </div>

            <div class="form-group">
                <label>Bathrooms *</label>
                <input type="number" name="bathrooms" class="form-control" value="{{ old('bathrooms') }}" required>
            </div>

            <div class="form-group">
                <label>Land Area (m²) *</label>
                <input type="number" name="land_area" class="form-control" value="{{ old('land_area') }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Building Area (m²) *</label>
                <input type="number" name="building_area" class="form-control" value="{{ old('building_area') }}" step="0.01" required>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Status *</label>
                <select name="status" class="form-control" required>
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                    <option value="sold_out" {{ old('status') == 'sold_out' ? 'selected' : '' }}>Sold Out</option>
                    <option value="coming_soon" {{ old('status') == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
                </select>
            </div>

            <div class="form-group">
                <label>Expected Rental Yield (%)</label>
                <input type="number" name="expected_rental_yield" class="form-control" value="{{ old('expected_rental_yield') }}" step="0.01" min="0" max="100">
            </div>

            <div class="form-group">
                <label style="display: flex; align-items: center; gap: 0.5rem;">
                    <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                    Featured Property
                </label>
            </div>
        </div>

        <div class="form-group">
            <label>Amenities (comma separated, e.g: Swimming Pool, Garden, Gym)</label>
            <input type="text" name="amenities" class="form-control" value="{{ old('amenities') }}" placeholder="Swimming Pool, Garden, Gym">
        </div>

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Main Image</label>
                <input type="file" name="main_image" class="form-control" accept="image/*">
                <small style="color: #666;">Main image for the property listing</small>
            </div>

            <div class="form-group">
                <label>Additional Images</label>
                <input type="file" name="images[]" class="form-control" accept="image/*" multiple>
                <small style="color: #666;">You can select multiple images</small>
            </div>
        </div>

        <div style="display: flex; gap: 1rem; margin-top: 2rem;">
            <button type="submit" class="btn btn-primary">Create Property</button>
            <a href="{{ route('admin.properties.index') }}" class="btn" style="background: #6c757d; color: white;">Cancel</a>
        </div>
    </form>
</div>
@endsection


