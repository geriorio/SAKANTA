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
                <label>Title (Name) *</label>
                <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group">
                <label>Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle') }}" placeholder="Optional subtitle">
            </div>
        </div>

        <div class="form-group">
            <label>Description (Desc) *</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
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

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
            <div class="form-group">
                <label>Price (Rp) *</label>
                <input type="number" name="price" class="form-control" value="{{ old('price') }}" step="0.01" required>
            </div>

            <div class="form-group">
                <label>Ownership (e.g: 1/4 Ownership)</label>
                <input type="text" name="ownership" class="form-control" value="{{ old('ownership') }}" placeholder="1/4 Ownership">
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

            <div class="form-group">
                <label>Built In (Year)</label>
                <input type="number" name="built_in" class="form-control" value="{{ old('built_in') }}" min="1900" max="2100" placeholder="e.g. 2020">
            </div>

            <div class="form-group">
                <label>Distance from Airport</label>
                <input type="text" name="distance_from_airport" class="form-control" value="{{ old('distance_from_airport') }}" placeholder="e.g. 15 min or 1h 30m">
                <small class="form-text text-muted">Format: "15 min" or "1h 30m" or "2.5 km"</small>
            </div>
        </div>

        <!-- Map Section -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">🗺️ Map Location</h3>
            <p style="color: #666; margin-bottom: 15px; font-size: 14px;">Choose ONE of the following options to display the map:</p>
            
            <div class="form-group">
                <label><strong>Option 1: Google Maps Embed URL</strong> (Recommended - Easier)</label>
                <textarea name="map_embed_url" class="form-control" rows="3" placeholder="Paste Google Maps embed URL here">{{ old('map_embed_url') }}</textarea>
                <small class="form-text text-muted">
                    📌 How to get: Go to Google Maps → Search location → Click "Share" → "Embed a map" → Copy the URL from src="..."<br>
                    Example: https://www.google.com/maps/embed?pb=!1m18!1m12...
                </small>
            </div>

            <div style="text-align: center; margin: 15px 0; color: #999; font-weight: 600;">— OR —</div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div class="form-group">
                    <label><strong>Option 2: Latitude</strong></label>
                    <input type="text" name="latitude" class="form-control" value="{{ old('latitude') }}" placeholder="e.g. -8.6705" step="any">
                    <small class="form-text text-muted">Example: -8.6705</small>
                </div>

                <div class="form-group">
                    <label><strong>Longitude</strong></label>
                    <input type="text" name="longitude" class="form-control" value="{{ old('longitude') }}" placeholder="e.g. 115.2126" step="any">
                    <small class="form-text text-muted">Example: 115.2126</small>
                </div>
            </div>

            <div style="background: #e7f3ff; padding: 12px; border-left: 4px solid #0066cc; margin-top: 10px; border-radius: 4px;">
                <small style="color: #004085;">
                    <strong>💡 Tip:</strong> Right-click on any location in Google Maps and copy the coordinates (Latitude, Longitude)
                </small>
            </div>
        </div>

        <div class="form-group">
            <label>Status *</label>
            <select name="status" class="form-control" required>
                <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Available</option>
                <option value="fully_owned" {{ old('status') == 'fully_owned' ? 'selected' : '' }}>Fully Owned</option>
                <option value="coming_soon" {{ old('status') == 'coming_soon' ? 'selected' : '' }}>Coming Soon</option>
            </select>
        </div>

        <!-- Facilities Section -->
        <div class="form-group">
            <label>🌟 Facilities</label>
            <div id="facilities-container">
                <div class="facility-item" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 5px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr auto; gap: 10px; align-items: end;">
                        <div>
                            <label style="font-size: 12px; color: #666;">Facility Name</label>
                            <input type="text" name="facilities[0][name]" class="form-control" placeholder="e.g. Swimming Pool">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: #666;">Description</label>
                            <input type="text" name="facilities[0][description]" class="form-control" placeholder="e.g. 25m infinity pool">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: #666;">Image</label>
                            <input type="file" name="facilities[0][image]" class="form-control" accept="image/*">
                        </div>
                        <button type="button" class="btn" onclick="removeFacility(this)" style="background: #dc3545; color: white; padding: 8px 15px;">Remove</button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn" onclick="addFacility()" style="background: #28a745; color: white; margin-top: 10px;">+ Add Facility</button>
        </div>

        <!-- Surroundings Section -->
        <div class="form-group">
            <label>📍 Surroundings</label>
            <div id="surroundings-container">
                <div class="surrounding-item" style="border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 5px;">
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr auto; gap: 10px; align-items: end;">
                        <div>
                            <label style="font-size: 12px; color: #666;">Place Name</label>
                            <input type="text" name="surroundings[0][name]" class="form-control" placeholder="e.g. Beach">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: #666;">Distance/Details</label>
                            <input type="text" name="surroundings[0][description]" class="form-control" placeholder="e.g. 5 minutes walk">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: #666;">Image</label>
                            <input type="file" name="surroundings[0][image]" class="form-control" accept="image/*">
                        </div>
                        <button type="button" class="btn" onclick="removeSurrounding(this)" style="background: #dc3545; color: white; padding: 8px 15px;">Remove</button>
                    </div>
                </div>
            </div>
            <button type="button" class="btn" onclick="addSurrounding()" style="background: #28a745; color: white; margin-top: 10px;">+ Add Surrounding</button>
        </div>

        <div class="form-group">
            <label>👥 Perfect For</label>
            <textarea name="perfect_for" class="form-control" rows="3" placeholder="Families, couples, remote workers...">{{ old('perfect_for') }}</textarea>
            <small style="color: #666;">Text description of who this property is perfect for</small>
        </div>

        <script>
            let facilityCount = 1;
            let surroundingCount = 1;

            function addFacility() {
                const container = document.getElementById('facilities-container');
                const newItem = document.createElement('div');
                newItem.className = 'facility-item';
                newItem.style.cssText = 'border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 5px;';
                newItem.innerHTML = `
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr auto; gap: 10px; align-items: end;">
                        <div>
                            <label style="font-size: 12px; color: #666;">Facility Name</label>
                            <input type="text" name="facilities[${facilityCount}][name]" class="form-control" placeholder="e.g. Swimming Pool">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: #666;">Description</label>
                            <input type="text" name="facilities[${facilityCount}][description]" class="form-control" placeholder="e.g. 25m infinity pool">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: #666;">Image</label>
                            <input type="file" name="facilities[${facilityCount}][image]" class="form-control" accept="image/*">
                        </div>
                        <button type="button" class="btn" onclick="removeFacility(this)" style="background: #dc3545; color: white; padding: 8px 15px;">Remove</button>
                    </div>
                `;
                container.appendChild(newItem);
                facilityCount++;
            }

            function removeFacility(button) {
                const container = document.getElementById('facilities-container');
                if (container.children.length > 1) {
                    button.closest('.facility-item').remove();
                } else {
                    alert('At least one facility item is required');
                }
            }

            function addSurrounding() {
                const container = document.getElementById('surroundings-container');
                const newItem = document.createElement('div');
                newItem.className = 'surrounding-item';
                newItem.style.cssText = 'border: 1px solid #ddd; padding: 15px; margin-bottom: 10px; border-radius: 5px;';
                newItem.innerHTML = `
                    <div style="display: grid; grid-template-columns: 1fr 1fr 1fr auto; gap: 10px; align-items: end;">
                        <div>
                            <label style="font-size: 12px; color: #666;">Place Name</label>
                            <input type="text" name="surroundings[${surroundingCount}][name]" class="form-control" placeholder="e.g. Beach">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: #666;">Distance/Details</label>
                            <input type="text" name="surroundings[${surroundingCount}][description]" class="form-control" placeholder="e.g. 5 minutes walk">
                        </div>
                        <div>
                            <label style="font-size: 12px; color: #666;">Image</label>
                            <input type="file" name="surroundings[${surroundingCount}][image]" class="form-control" accept="image/*">
                        </div>
                        <button type="button" class="btn" onclick="removeSurrounding(this)" style="background: #dc3545; color: white; padding: 8px 15px;">Remove</button>
                    </div>
                `;
                container.appendChild(newItem);
                surroundingCount++;
            }

            function removeSurrounding(button) {
                const container = document.getElementById('surroundings-container');
                if (container.children.length > 1) {
                    button.closest('.surrounding-item').remove();
                } else {
                    alert('At least one surrounding item is required');
                }
            }
        </script>

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


