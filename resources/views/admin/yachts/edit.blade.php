@extends('admin.layouts.app')

@section('title', 'Edit Yacht')

@section('content')
<div class="card">
    <h2 style="margin-bottom: 1.5rem;">Edit Yacht</h2>

    @if ($errors->any())
        <div style="background: #fee; border: 1px solid #fcc; color: #c33; padding: 0.75rem; border-radius: 5px; margin-bottom: 1rem;">
            <ul style="margin: 0; padding-left: 1.25rem;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('admin.yachts.update', $yacht->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Basic Information Section -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">⚓ Basic Information</h3>
            
            <div class="form-group">
                <label>Name *</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $yacht->name) }}" required>
            </div>

            <div class="form-group">
                <label>Desc *</label>
                <input type="text" name="description" class="form-control" value="{{ old('description', $yacht->description) }}" required>
            </div>

            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div class="form-group">
                    <label>Price *</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $yacht->price) }}" step="0.01" required>
                </div>

                <div class="form-group">
                    <label>Ownership *</label>
                    <input type="text" name="ownership" class="form-control" value="{{ old('ownership', $yacht->ownership) }}" placeholder="e.g. 1/10" required>
                </div>

                <div class="form-group">
                    <label>Shares Committed</label>
                    <input type="text" name="shares_committed" class="form-control" value="{{ old('shares_committed', $yacht->shares_committed ?? '0') }}">
                </div>

                <div class="form-group">
                    <label>Brand *</label>
                    <input type="text" name="brand" class="form-control" value="{{ old('brand', $yacht->brand) }}" required>
                </div>

                <div class="form-group">
                    <label>Brand Logo</label>
                    <input type="file" name="brand_logo" class="form-control" accept="image/*">
                    @if($yacht->brand_logo)
                        <small class="form-text text-muted">Current: <a href="{{ asset($yacht->brand_logo) }}" target="_blank">View Logo</a></small>
                    @endif
                    <small class="form-text text-muted">Upload new brand logo image (optional, leave empty to keep current)</small>
                </div>

                <div class="form-group">
                    <label>Status *</label>
                    <input type="text" name="status" class="form-control" value="{{ old('status', $yacht->status) }}" placeholder="e.g. Available, Sold Out, Coming Soon" required>
                </div>

                <div class="form-group">
                    <label>Show *</label>
                    <select name="show" class="form-control" required>
                        <option value="show" {{ old('show', $yacht->show) == 'show' ? 'selected' : '' }}>Show</option>
                        <option value="hide" {{ old('show', $yacht->show) == 'hide' ? 'selected' : '' }}>Hide</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Specifications -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">📏 Specifications</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                <div class="form-group">
                    <label>Length Overall (LOA) *</label>
                    <input type="text" name="length_overall" class="form-control" value="{{ old('length_overall', $yacht->length_overall) }}" required>
                </div>

                <div class="form-group">
                    <label>Beam *</label>
                    <input type="text" name="beam" class="form-control" value="{{ old('beam', $yacht->beam) }}" required>
                </div>

                <div class="form-group">
                    <label>Height *</label>
                    <input type="text" name="height" class="form-control" value="{{ old('height', $yacht->height) }}" required>
                </div>

                <div class="form-group">
                    <label>Draft *</label>
                    <input type="text" name="draft" class="form-control" value="{{ old('draft', $yacht->draft) }}" required>
                </div>

                <div class="form-group">
                    <label>Loaded Displacement *</label>
                    <input type="text" name="loaded_displacement" class="form-control" value="{{ old('loaded_displacement', $yacht->loaded_displacement) }}" required>
                </div>

                <div class="form-group">
                    <label>Cruising Speed *</label>
                    <input type="text" name="cruising_speed" class="form-control" value="{{ old('cruising_speed', $yacht->cruising_speed) }}" required>
                </div>

                <div class="form-group">
                    <label>Max Speed *</label>
                    <input type="text" name="max_speed" class="form-control" value="{{ old('max_speed', $yacht->max_speed) }}" required>
                </div>

                <div class="form-group">
                    <label>Main Engine *</label>
                    <input type="text" name="main_engine" class="form-control" value="{{ old('main_engine', $yacht->main_engine) }}" required>
                </div>

                <div class="form-group">
                    <label>Range *</label>
                    <input type="text" name="range" class="form-control" value="{{ old('range', $yacht->range) }}" required>
                </div>

                <div class="form-group">
                    <label>Stabilizer *</label>
                    <input type="text" name="stabilizer" class="form-control" value="{{ old('stabilizer', $yacht->stabilizer) }}" required>
                </div>

                <div class="form-group">
                    <label>Hull Material *</label>
                    <input type="text" name="hull_material" class="form-control" value="{{ old('hull_material', $yacht->hull_material) }}" required>
                </div>

                <div class="form-group">
                    <label>Generator</label>
                    <input type="text" name="generator" class="form-control" value="{{ old('generator', $yacht->generator) }}">
                    <small class="form-text text-muted">Optional</small>
                </div>

                <div class="form-group">
                    <label>Solar Panels</label>
                    <input type="text" name="solar_panels" class="form-control" value="{{ old('solar_panels', $yacht->solar_panels) }}">
                    <small class="form-text text-muted">Optional</small>
                </div>
            </div>
        </div>

        <!-- Accommodations -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">🛏️ Accommodations</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr; gap: 1.5rem;">
                <div class="form-group">
                    <label>Maximum Passengers *</label>
                    <input type="number" name="maximum_passengers" class="form-control" value="{{ old('maximum_passengers', $yacht->maximum_passengers) }}" min="1" required>
                </div>

                <div class="form-group">
                    <label>Cabins *</label>
                    <input type="text" name="cabins" class="form-control" value="{{ old('cabins', $yacht->cabins) }}" required>
                </div>

                <div class="form-group">
                    <label>Berths *</label>
                    <input type="text" name="berths" class="form-control" value="{{ old('berths', $yacht->berths) }}" required>
                </div>

                <div class="form-group">
                    <label>Heads *</label>
                    <input type="text" name="heads" class="form-control" value="{{ old('heads', $yacht->heads) }}" required>
                </div>
            </div>
        </div>

        <!-- Tankage -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">⛽ Tankage</h3>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1.5rem;">
                <div class="form-group">
                    <label>Fuel Capacity *</label>
                    <input type="text" name="fuel_capacity" class="form-control" value="{{ old('fuel_capacity', $yacht->fuel_capacity) }}" required>
                </div>

                <div class="form-group">
                    <label>Freshwater Capacity *</label>
                    <input type="text" name="freshwater_capacity" class="form-control" value="{{ old('freshwater_capacity', $yacht->freshwater_capacity) }}" required>
                </div>

                <div class="form-group">
                    <label>Holding Tank *</label>
                    <input type="text" name="holding_tank" class="form-control" value="{{ old('holding_tank', $yacht->holding_tank) }}" required>
                </div>
            </div>
        </div>

        <!-- Warranties -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">🔧 Warranties</h3>
            
            <div class="form-group">
                <label>Hull Structure *</label>
                <input type="text" name="hull_structure" class="form-control" value="{{ old('hull_structure', $yacht->hull_structure) }}" required>
            </div>

            <div class="form-group">
                <label>Equipment *</label>
                <input type="text" name="equipment" class="form-control" value="{{ old('equipment', $yacht->equipment) }}" required>
            </div>
        </div>

        <!-- Project -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">📋 Project</h3>
            
            <div class="form-group">
                <label>Certifications *</label>
                <input type="text" name="certifications" class="form-control" value="{{ old('certifications', $yacht->certifications) }}" required>
            </div>
        </div>

        <!-- Details -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">📝 Details</h3>
            <p style="color: #666; margin-bottom: 15px; font-size: 14px;">Add custom details with title and subtitle (optional, can add multiple)</p>
            
            <div id="details-container">
                @if(old('details'))
                    @foreach(old('details') as $index => $detail)
                        <div class="detail-item" style="background: white; padding: 15px; border-radius: 5px; margin-bottom: 10px; border: 1px solid #ddd; position: relative;">
                            <button type="button" onclick="this.parentElement.remove()" style="position: absolute; top: 10px; right: 10px; background: #dc3545; color: white; border: none; border-radius: 3px; padding: 5px 10px; cursor: pointer; font-size: 12px;">Remove</button>
                            
                            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1rem; margin-top: 10px;">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="details[{{ $index }}][title]" class="form-control" value="{{ $detail['title'] ?? '' }}" placeholder="e.g. Builder">
                                </div>
                                <div class="form-group">
                                    <label>Subtitle</label>
                                    <input type="text" name="details[{{ $index }}][subtitle]" class="form-control" value="{{ $detail['subtitle'] ?? '' }}" placeholder="e.g. Sunseeker International">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @elseif($yacht->details)
                    @foreach($yacht->details as $index => $detail)
                        <div class="detail-item" style="background: white; padding: 15px; border-radius: 5px; margin-bottom: 10px; border: 1px solid #ddd; position: relative;">
                            <button type="button" onclick="this.parentElement.remove()" style="position: absolute; top: 10px; right: 10px; background: #dc3545; color: white; border: none; border-radius: 3px; padding: 5px 10px; cursor: pointer; font-size: 12px;">Remove</button>
                            
                            <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1rem; margin-top: 10px;">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="details[{{ $index }}][title]" class="form-control" value="{{ $detail['title'] ?? '' }}" placeholder="e.g. Builder">
                                </div>
                                <div class="form-group">
                                    <label>Subtitle</label>
                                    <input type="text" name="details[{{ $index }}][subtitle]" class="form-control" value="{{ $detail['subtitle'] ?? '' }}" placeholder="e.g. Sunseeker International">
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            
            <button type="button" onclick="addDetail()" class="btn btn-info btn-sm" style="margin-top: 10px;">+ Add Detail</button>
        </div>

        <!-- Brochure -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">📄 Brochure</h3>
            
            <div class="form-group">
                <label>Brochure URL</label>
                <input type="url" name="brochure_url" class="form-control" value="{{ old('brochure_url', $yacht->brochure_url) }}" placeholder="https://example.com/brochure.pdf">
                <small class="form-text text-muted">Optional: Link to downloadable PDF brochure</small>
            </div>
        </div>

        <script>
        let detailIndex = {{ old('details') ? count(old('details')) : ($yacht->details ? count($yacht->details) : 0) }};

        function addDetail() {
            const container = document.getElementById('details-container');
            const detailHtml = `
                <div class="detail-item" style="background: white; padding: 15px; border-radius: 5px; margin-bottom: 10px; border: 1px solid #ddd; position: relative;">
                    <button type="button" onclick="this.parentElement.remove()" style="position: absolute; top: 10px; right: 10px; background: #dc3545; color: white; border: none; border-radius: 3px; padding: 5px 10px; cursor: pointer; font-size: 12px;">Remove</button>
                    
                    <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 1rem; margin-top: 10px;">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="details[` + detailIndex + `][title]" class="form-control" placeholder="e.g. Builder">
                        </div>
                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" name="details[` + detailIndex + `][subtitle]" class="form-control" placeholder="e.g. Sunseeker International">
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', detailHtml);
            detailIndex++;
        }
        </script>

        <!-- Images Section -->
        <div style="background: #f8f9fa; padding: 20px; border-radius: 8px; margin-bottom: 20px;">
            <h3 style="margin-bottom: 15px; color: #064852; font-size: 18px;">📸 Images</h3>
            
            <div class="form-group">
                <label>Main Image</label>
                <input type="file" name="main_image" class="form-control" accept="image/*">
                <small class="form-text text-muted">Recommended: High-quality yacht exterior image (JPEG, PNG, WEBP, AVIF - Max 2MB)</small>
            </div>

            <div class="form-group">
                <label>Gallery Images</label>
                <input type="file" name="gallery_images[]" class="form-control" accept="image/*" multiple>
                <small class="form-text text-muted">Multiple images: Interior, deck, amenities, etc. (Max 2MB each)</small>
            </div>
        </div>

        <div style="display: flex; gap: 1rem; justify-content: flex-end;">
            <a href="{{ route('admin.yachts.index') }}" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update Yacht</button>
        </div>
    </form>
</div>
@endsection

