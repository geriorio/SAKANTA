@extends('admin.layouts.app')

@section('content')
<style>
    .faq-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
    .faq-header h2 { font-size: 1.75rem; font-weight: bold; color: #333; }
    .action-links { display: flex; gap: 1rem; }
    .action-links a, .action-links button { color: #667eea; text-decoration: none; cursor: pointer; background: none; border: none; padding: 0; font-weight: 600; }
    .action-links a:hover, .action-links button:hover { text-decoration: underline; }
    .action-links .delete-btn { color: #dc3545; }
    .delete-form { display: inline; }
</style>

<div class="faq-header">
    <h2>FAQ Categories</h2>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">+ Create FAQ</a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if($faqs->count() > 0)
<div class="card">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Questions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faqs as $faq)
            <tr>
                <td><strong>{{ $faq->title }}</strong></td>
                <td>{{ substr($faq->description, 0, 60) }}...</td>
                <td>{{ $faq->questions->count() }} Q&A</td>
                <td>
                    <div class="action-links">
                        <a href="{{ route('admin.faqs.edit', $faq->id) }}">Edit</a>
                        <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" class="delete-form" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination" style="margin-top: 2rem;">
    {{ $faqs->links() }}
</div>
@else
<div class="card" style="text-align: center; padding: 3rem;">
    <p style="color: #999; margin-bottom: 1rem;">No FAQ categories yet</p>
    <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Create Your First FAQ</a>
</div>
@endif
@endsection


