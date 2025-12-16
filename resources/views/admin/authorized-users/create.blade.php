@extends('layouts.admin')

@section('title', 'Create Authorized User')

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
        <h1 class="text-2xl font-bold text-gray-900 mb-6">Create New Access Code</h1>

        <form action="{{ route('admin.authorized-users.store') }}" method="POST">
            @csrf
            
            <div class="mb-6">
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror"
                    placeholder="user@example.com"
                    required
                    autofocus
                >
                @error('email')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-gray-500">An access code will be automatically generated for this email.</p>
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
                        value="{{ old('referral_code') }}"
                        class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('referral_code') border-red-500 @enderror"
                        placeholder="SKTREFXXXXX"
                        maxlength="20"
                        readonly
                    >
                    <button 
                        type="button" 
                        onclick="generateReferralCode()"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold whitespace-nowrap"
                    >
                        Generate Code
                    </button>
                </div>
                @error('referral_code')
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
                <p class="mt-2 text-sm text-gray-500">
                    Generate a unique referral code for this user. This allows them to refer up to 5 users. 
                    <br>Leave blank if you don't want to give referral privileges.
                </p>
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('admin.authorized-users.index') }}" class="px-6 py-3 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 font-semibold">
                    Cancel
                </a>
                <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 font-semibold">
                    Create Access Code
                </button>
            </div>
        </form>
    </div>

</div>

<script>
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
