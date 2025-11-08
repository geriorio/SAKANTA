@extends('admin.layouts.app')

@section('title', 'Edit Location Article')

@section('content')
<div class="container-fluid px-4">
    <div class="mb-4">
        <h1 class="h3 mb-2">Edit Location Article</h1>
        <p class="text-muted">Update sections for {{ $article->location->name }}</p>
    </div>

    <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Location Selection -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Location</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="location_id" class="form-label">Select Location *</label>
                    <select name="location_id" id="location_id" class="form-select @error('location_id') is-invalid @enderror" required>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}" {{ (old('location_id', $article->location_id) == $location->id) ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('location_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Section 1 -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Section 1: Hero</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="section1_title" class="form-label">Title (Esther Font) *</label>
                    <input type="text" name="section1_title" id="section1_title" class="form-control @error('section1_title') is-invalid @enderror" value="{{ old('section1_title', $article->section1_title) }}" required>
                    @error('section1_title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="section1_image" class="form-label">Hero Image</label>
                    @if($article->section1_image)
                        <div class="mb-2">
                            <img src="{{ asset($article->section1_image) }}" alt="Current" style="max-width: 300px; height: auto; border-radius: 8px;">
                            <p class="text-muted small mt-1">Current image (upload new to replace)</p>
                        </div>
                    @endif
                    <input type="file" name="section1_image" id="section1_image" class="form-control @error('section1_image') is-invalid @enderror" accept="image/*">
                    <small class="text-muted">Recommended size: 1200x600px. Max 2MB.</small>
                    @error('section1_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="section1_desc" class="form-label">Description (Work Sans Font) *</label>
                    <textarea name="section1_desc" id="section1_desc" rows="4" class="form-control @error('section1_desc') is-invalid @enderror" required>{{ old('section1_desc', $article->section1_desc) }}</textarea>
                    @error('section1_desc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Section 2 -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Section 2: Story Behind</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="section2_subtitle" class="form-label">Subtitle (Esther Font) *</label>
                    <input type="text" name="section2_subtitle" id="section2_subtitle" class="form-control @error('section2_subtitle') is-invalid @enderror" value="{{ old('section2_subtitle', $article->section2_subtitle) }}" required>
                    @error('section2_subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Paragraphs (Work Sans Font) *</label>
                    <div id="paragraphs-container">
                        @php
                            $paragraphs = old('section2_paragraphs', $article->section2_paragraphs);
                        @endphp
                        @foreach($paragraphs as $index => $paragraph)
                            <div class="paragraph-item mb-2">
                                <div class="input-group">
                                    <textarea name="section2_paragraphs[]" rows="3" class="form-control" required placeholder="Paragraph {{ $index + 1 }}">{{ $paragraph }}</textarea>
                                    <button type="button" class="btn btn-danger remove-paragraph" onclick="removeParagraph(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm mt-2" onclick="addParagraph()">
                        <i class="fas fa-plus"></i> Add Paragraph
                    </button>
                </div>
            </div>
        </div>

        <!-- Section 3 -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Section 3: Punchline</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="section3_punchline" class="form-label">Punchline (Esther Font) *</label>
                    <textarea name="section3_punchline" id="section3_punchline" rows="3" class="form-control @error('section3_punchline') is-invalid @enderror" required>{{ old('section3_punchline', $article->section3_punchline) }}</textarea>
                    @error('section3_punchline')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Section 4 -->
        <div class="card shadow mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Section 4: Take Away Points</h5>
            </div>
            <div class="card-body">
                <div id="points-container">
                    @php
                        $points = old('section4_points', $article->section4_points);
                    @endphp
                    @foreach($points as $index => $point)
                        <div class="point-item card mb-3">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <strong>Point {{ $index + 1 }}</strong>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="removePoint(this)">
                                        <i class="fas fa-trash"></i> Remove
                                    </button>
                                </div>
                                <div class="mb-2">
                                    <input type="text" name="section4_points[{{ $index }}][title]" class="form-control" required placeholder="Point Title" value="{{ $point['title'] ?? '' }}">
                                </div>
                                <div>
                                    <textarea name="section4_points[{{ $index }}][explanation]" rows="2" class="form-control" required placeholder="Point Explanation">{{ $point['explanation'] ?? '' }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-secondary btn-sm" onclick="addPoint()">
                    <i class="fas fa-plus"></i> Add Point
                </button>
            </div>
        </div>

        <!-- Submit Buttons -->
        <div class="d-flex gap-2 mb-4">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Update Article
            </button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">
                <i class="fas fa-times"></i> Cancel
            </a>
        </div>
    </form>
</div>

<script>
let paragraphIndex = {{ count($article->section2_paragraphs) }};

function addParagraph() {
    paragraphIndex++;
    const container = document.getElementById('paragraphs-container');
    const div = document.createElement('div');
    div.className = 'paragraph-item mb-2';
    div.innerHTML = `
        <div class="input-group">
            <textarea name="section2_paragraphs[]" rows="3" class="form-control" required placeholder="Paragraph ${paragraphIndex}"></textarea>
            <button type="button" class="btn btn-danger remove-paragraph" onclick="removeParagraph(this)">
                <i class="fas fa-trash"></i>
            </button>
        </div>
    `;
    container.appendChild(div);
}

function removeParagraph(button) {
    const container = document.getElementById('paragraphs-container');
    if (container.children.length > 1) {
        button.closest('.paragraph-item').remove();
    } else {
        alert('At least one paragraph is required');
    }
}

let pointIndex = {{ count($article->section4_points) }};

function addPoint() {
    pointIndex++;
    const container = document.getElementById('points-container');
    const div = document.createElement('div');
    div.className = 'point-item card mb-3';
    div.innerHTML = `
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <strong>Point ${pointIndex}</strong>
                <button type="button" class="btn btn-danger btn-sm" onclick="removePoint(this)">
                    <i class="fas fa-trash"></i> Remove
                </button>
            </div>
            <div class="mb-2">
                <input type="text" name="section4_points[${pointIndex - 1}][title]" class="form-control" required placeholder="Point Title">
            </div>
            <div>
                <textarea name="section4_points[${pointIndex - 1}][explanation]" rows="2" class="form-control" required placeholder="Point Explanation"></textarea>
            </div>
        </div>
    `;
    container.appendChild(div);
}

function removePoint(button) {
    const container = document.getElementById('points-container');
    if (container.children.length > 1) {
        button.closest('.point-item').remove();
    } else {
        alert('At least one point is required');
    }
}
</script>
@endsection
