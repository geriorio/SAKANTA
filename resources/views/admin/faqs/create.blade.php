@extends('admin.layouts.app')

@section('content')
<style>
    .page-title { font-size: 1.75rem; font-weight: bold; color: #333; margin-bottom: 0.5rem; }
    .back-link { color: #667eea; text-decoration: none; font-weight: 600; margin-bottom: 2rem; display: inline-block; }
    .back-link:hover { text-decoration: underline; }
    .error-list { list-style: none; padding: 0; margin: 0; }
    .error-list li { padding: 0.5rem 0; }
    .form-section { margin-bottom: 2rem; }
    .form-section-title { font-size: 1.25rem; font-weight: bold; color: #333; margin-bottom: 1.5rem; border-bottom: 2px solid #667eea; padding-bottom: 0.5rem; }
    .question-item { margin-bottom: 1.5rem; padding: 1.5rem; background: #f9f9f9; border: 1px solid #ddd; border-radius: 5px; }
    .question-item h4 { margin-bottom: 0.5rem; font-weight: 600; color: #333; }
    .btn-group { display: flex; gap: 1rem; margin-top: 2rem; }
    .add-question-btn { background: #28a745; color: white; padding: 0.75rem 1rem; border: none; border-radius: 5px; cursor: pointer; font-weight: 600; margin-top: 1rem; }
    .add-question-btn:hover { background: #218838; }
    .remove-question-btn { background: #dc3545; color: white; padding: 0.5rem 1rem; border: none; border-radius: 5px; cursor: pointer; font-weight: 600; margin-top: 1rem; }
    .remove-question-btn:hover { background: #c82333; }
</style>

<h2 class="page-title">Create New FAQ Category</h2>
<a href="{{ route('admin.faqs.index') }}" class="back-link">← Back to FAQs</a>

@if($errors->any())
<div class="alert alert-danger" style="border-color: #dc3545; background: #f8d7da; color: #721c24;">
    <ul class="error-list">
        @foreach($errors->all() as $error)
        <li>• {{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('admin.faqs.store') }}" method="POST" class="card">
    @csrf

    <div class="form-section">
        <div class="form-group">
            <label class="form-control-label">FAQ Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="e.g., General Questions" required>
        </div>

        <div class="form-group">
            <label class="form-control-label">Description</label>
            <textarea name="description" class="form-control" rows="3" placeholder="Brief description for listing page" required></textarea>
        </div>

        <div class="form-group">
            <label class="form-control-label">Hero Section - Big Title (Esther Font)</label>
            <input type="text" name="hero_big_title" value="{{ old('hero_big_title') }}" class="form-control" placeholder="e.g., Frequently Asked Questions" required>
            <small style="color: #666;">Main title displayed large in detail page hero section</small>
        </div>

        <div class="form-group">
            <label class="form-control-label">Hero Section - Small Title (Subtitle)</label>
            <input type="text" name="hero_small_title" value="{{ old('hero_small_title') }}" class="form-control" placeholder="e.g., Find answers to your questions" required>
            <small style="color: #666;">Subtitle displayed below the main title in detail page</small>
        </div>

        <div class="form-group">
            <label class="form-control-label">Icon/Image (Optional)</label>
            <input type="file" name="icon" class="form-control" accept="image/*">
            <small style="color: #666;">Upload a small icon or image for this FAQ category (Max 2MB)</small>
        </div>
    </div>

    <div class="form-section">
        <h3 class="form-section-title">Questions & Answers</h3>
        
        <div id="questionsContainer">
            <div class="question-item">
                <h4>Question 1</h4>
                <div class="form-group">
                    <label class="form-control-label">Question Text</label>
                    <input type="text" name="questions[0][question]" value="{{ old('questions.0.question') }}" class="form-control" placeholder="Enter question" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Answer</label>
                    <textarea name="questions[0][answer]" class="form-control" rows="4" placeholder="Enter answer" required></textarea>
                </div>
                <button type="button" class="remove-question-btn removeQuestion">Remove Question</button>
            </div>
        </div>

        <button type="button" id="addQuestionBtn" class="add-question-btn">+ Add Question</button>
    </div>

    <div class="btn-group">
        <button type="submit" class="btn btn-primary">Create FAQ</button>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-warning" style="text-decoration: none;">Cancel</a>
    </div>
</form>

<script>
document.getElementById('addQuestionBtn').addEventListener('click', function() {
    const container = document.getElementById('questionsContainer');
    const count = container.children.length;
    
    const html = `
        <div class="question-item">
            <h4>Question ${count + 1}</h4>
            <div class="form-group">
                <label class="form-control-label">Question Text</label>
                <input type="text" name="questions[${count}][question]" class="form-control" placeholder="Enter question" required>
            </div>
            <div class="form-group">
                <label class="form-control-label">Answer</label>
                <textarea name="questions[${count}][answer]" class="form-control" rows="4" placeholder="Enter answer" required></textarea>
            </div>
            <button type="button" class="remove-question-btn removeQuestion">Remove Question</button>
        </div>
    `;
    
    container.insertAdjacentHTML('beforeend', html);
    attachRemoveListeners();
});

function attachRemoveListeners() {
    document.querySelectorAll('.removeQuestion').forEach(btn => {
        btn.onclick = function() {
            this.closest('.question-item').remove();
        };
    });
}

attachRemoveListeners();
</script>
@endsection


