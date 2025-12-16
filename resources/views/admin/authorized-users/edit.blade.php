@extends('layouts.admin')

@section('title', 'Edit Authorized User')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    
    <div class="mb-6">
        <a href="{{ route('admin.authorized-users.index') }}" class="text-indigo-600 hover:text-indigo-800 flex items-center">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
            </svg>
            Back to Authorized Users
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm p-8 border border-gray-100">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Edit Authorized User</h1>

        <form action="{{ route('admin.authorized-users.update', $authorizedUser) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-6">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email', $authorizedUser->email) }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                    required
                    autofocus
                >
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Access Code</label>
                <div class="flex items-center gap-3">
                    <code class="flex-1 px-4 py-3 bg-gray-100 border border-gray-300 rounded-lg font-mono">
                        {{ $authorizedUser->access_code }}
                    </code>
                    <button type="button" onclick="copyToClipboard('{{ $authorizedUser->access_code }}')" class="px-4 py-3 bg-gray-200 hover:bg-gray-300 rounded-lg">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Status</label>
                <div class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                    @if($authorizedUser->is_used)
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-gray-100 text-gray-800">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Used - {{ $authorizedUser->used_at->format('M d, Y') }}
                        </span>
                        @if($authorizedUser->user)
                            <p class="text-sm text-gray-600 mt-2">Registered by: <strong>{{ $authorizedUser->user->name }}</strong></p>
                        @endif
                    @else
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-green-100 text-green-800">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Active - Not Used
                        </span>
                    @endif
                </div>
            </div>

            <div class="mb-6">
                <label for="referral_code" class="block text-sm font-semibold text-gray-700 mb-2">
                    Referral Code (Optional)
                </label>
                <div class="flex gap-2">
                    <input 
                        type="text" 
                        id="referral_code" 
                        name="referral_code" 
                        value="{{ old('referral_code', $authorizedUser->referral_code) }}"
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('referral_code') border-red-500 @enderror"
                        placeholder="SKTREFXXXXX"
                        maxlength="20"
                        {{ $authorizedUser->referral_code ? 'readonly' : '' }}
                    >
                    @if(!$authorizedUser->referral_code)
                    <button 
                        type="button" 
                        onclick="generateReferralCode()"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold whitespace-nowrap"
                    >
                        Generate Code
                    </button>
                    @endif
                </div>
                @error('referral_code')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-gray-500">
                    Assign a unique referral code for this user. This allows them to refer up to 5 users.
                    @if($authorizedUser->referral_code)
                        <br><span class="text-amber-600 font-semibold">Note: Referral code cannot be changed once set.</span>
                    @endif
                </p>
            </div>

            @if($authorizedUser->referral_code && $authorizedUser->referred_users)
            <div class="mb-6">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Referred Users</label>
                <div class="px-4 py-3 bg-gray-50 border border-gray-200 rounded-lg">
                    @php
                        $referredCount = is_array($authorizedUser->referred_users) ? count($authorizedUser->referred_users) : 0;
                    @endphp
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-sm font-medium text-gray-700">
                            Total Referred: {{ $referredCount }}/5
                        </span>
                        @if($referredCount >= 5)
                            <span class="px-2 py-1 text-xs bg-red-100 text-red-700 rounded-full">Quota Full</span>
                        @else
                            <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">{{ 5 - $referredCount }} Slots Available</span>
                        @endif
                    </div>
                    @if($referredCount > 0)
                        <ul class="space-y-2 mt-3">
                            @foreach($authorizedUser->referred_users as $referredEmail)
                                <li class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $referredEmail }}
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-gray-500 mt-2">No users referred yet</p>
                    @endif
                </div>
            </div>
            @endif

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.authorized-users.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">
                    Update User
                </button>
            </div>
        </form>
    </div>

</div>

<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Access code copied to clipboard!');
    }, function(err) {
        console.error('Could not copy text: ', err);
    });
}

function generateReferralCode() {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let code = 'SKTREF';
    for (let i = 0; i < 5; i++) {
        code += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    document.getElementById('referral_code').value = code;
}
</script>
@endsection
