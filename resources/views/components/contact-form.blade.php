<section class="contact-form-section" id="contactFormSection">
    <div class="contact-form-container">
        <div class="contact-form-header">
            <h2>{{ $title ?? "We're here to help" }}</h2>
            <p>{{ $subtitle ?? "Want to learn more about co-ownership or how Sakanta works? Ask us anything." }}</p>
        </div>

        <form action="{{ route('contact.submit') }}" method="POST" class="contact-form" id="contactForm">
            @csrf
            <input type="hidden" name="page_source" value="{{ $pageSource ?? request()->path() }}">

            <!-- User Type Selection -->
            <div class="form-group-radio">
                <label class="form-label-main">Select one of the following</label>
                <div class="radio-group">
                    <label class="radio-option">
                        <input type="radio" name="user_type" value="buyer" {{ old('user_type') == 'buyer' || !old('user_type') ? 'checked' : '' }} required>
                        <span>I am a buyer</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="user_type" value="seller" {{ old('user_type') == 'seller' ? 'checked' : '' }} required>
                        <span>I am a seller</span>
                    </label>
                    <label class="radio-option">
                        <input type="radio" name="user_type" value="agent" {{ old('user_type') == 'agent' ? 'checked' : '' }} required>
                        <span>I'm an agent or broker</span>
                    </label>
                </div>
                @error('user_type')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Full Name and Email -->
            <div class="form-row">
                <div class="form-group">
                    <label for="full_name">Full Name <span class="required">*</span></label>
                    <input type="text" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                    @error('full_name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="required">*</span></label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Message -->
            <div class="form-group">
                <label for="message">Message (optional)</label>
                <textarea id="message" name="message" rows="5" placeholder="Tell us how we can help you...">{{ old('message') }}</textarea>
                @error('message')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="contact-form-btn">{{ $buttonText ?? 'SUBMIT' }}</button>
        </form>
    </div>
</section>

<!-- Pop-up Notification -->
@if(session('success') || session('info') || $errors->any())
<div class="popup-overlay" id="popupOverlay">
    <div class="popup-container">
        <div class="popup-icon {{ session('success') ? 'success' : ($errors->any() ? 'error' : 'info') }}">
            @if(session('success'))
                <img src="{{ asset('images/success.png') }}" alt="Success">
            @elseif($errors->any())
                <img src="{{ asset('images/fail.png') }}" alt="Error">
            @else
                <img src="{{ asset('images/wait.png') }}" alt="Info">
            @endif
        </div>
        <h3 class="popup-title">
            @if(session('success'))
                Success!
            @elseif($errors->any())
                Validation Error
            @else
                Already Registered
            @endif
        </h3>
        <p class="popup-message">
            @if(session('success'))
                {{ session('success') }}
            @elseif(session('info'))
                {{ session('info') }}
            @else
                @foreach($errors->all() as $error)
                    {{ $error }}@if(!$loop->last)<br>@endif
                @endforeach
            @endif
        </p>
        <button class="popup-btn" onclick="closePopup()">OK</button>
    </div>
</div>
@endif

<style>
    .contact-form-section {
        background: #F7EFE2;
        padding: 100px 60px;
    }

    .contact-form-container {
        max-width: 700px;
        margin: 0 auto;
    }

    .contact-form-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .contact-form-header h2 {
        font-size: 42px;
        font-weight: 400;
        color: #064852;
        margin-bottom: 20px;
        font-family: 'Esther', serif;
        line-height: 1.3;
    }

    .contact-form-header p {
        font-size: 16px;
        color: #064852;
        font-family: 'Work Sans', sans-serif;
        line-height: 1.6;
    }

    .contact-form {
        background: transparent;
        padding: 0;
        border-radius: 0;
        box-shadow: none;
    }

    .form-label-main {
        display: block;
        font-size: 14px;
        color: #064852;
        margin-bottom: 15px;
        font-family: 'Work Sans', sans-serif;
        font-weight: 500;
    }

    .form-group-radio {
        margin-bottom: 30px;
    }

    .radio-group {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .radio-option {
        display: flex;
        align-items: center;
        cursor: pointer;
        font-family: 'Work Sans', sans-serif;
        font-size: 15px;
        color: #064852;
    }

    .radio-option input[type="radio"] {
        width: 20px;
        height: 20px;
        margin-right: 10px;
        cursor: pointer;
        accent-color: #064852;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 25px;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        color: #064852;
        margin-bottom: 8px;
        font-family: 'Work Sans', sans-serif;
        font-weight: 500;
    }

    .required {
        color: #e74c3c;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border: 1px solid rgba(6, 72, 82, 0.2);
        border-radius: 6px;
        font-size: 15px;
        font-family: 'Work Sans', sans-serif;
        color: #064852;
        transition: all 0.3s;
        background: rgba(255, 255, 255, 0.5);
    }

    .form-group input:focus,
    .form-group textarea:focus {
        outline: none;
        border-color: #064852;
        background: rgba(255, 255, 255, 0.7);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .contact-form-btn {
        width: 100%;
        padding: 15px 40px;
        background: #064852;
        color: white;
        border: none;
        font-size: 13px;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 600;
        transition: all 0.3s;
        font-family: 'Work Sans', sans-serif;
        cursor: pointer;
        border-radius: 6px;
    }

    .contact-form-btn:hover {
        background: #053640;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(6, 72, 82, 0.3);
    }

    /* Pop-up Notification Styles */
    .popup-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes fadeOut {
        from { opacity: 1; }
        to { opacity: 0; }
    }

    .popup-container {
        background: white;
        border-radius: 16px;
        padding: 40px;
        max-width: 450px;
        width: 90%;
        text-align: center;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        animation: slideUp 0.4s ease;
        position: relative;
    }

    @keyframes slideUp {
        from {
            transform: translateY(50px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .popup-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 25px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .popup-icon img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .popup-icon.success {
        /* No background needed, using image */
    }

    .popup-icon.info {
        /* No background needed, using image */
    }

    .popup-icon.error {
        /* No background needed, using image */
    }

    .popup-title {
        font-size: 28px;
        font-weight: 400;
        color: #064852;
        margin-bottom: 15px;
        font-family: 'Esther', serif;
    }

    .popup-message {
        font-size: 16px;
        color: #064852;
        line-height: 1.6;
        margin-bottom: 30px;
        font-family: 'Work Sans', sans-serif;
    }

    .popup-btn {
        background: #064852;
        color: white;
        border: none;
        padding: 12px 40px;
        font-size: 14px;
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 600;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s;
        font-family: 'Work Sans', sans-serif;
    }

    .popup-btn:hover {
        background: #053640;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(6, 72, 82, 0.3);
    }

    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 25px;
        font-family: 'Work Sans', sans-serif;
        font-size: 15px;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .error-message {
        display: block;
        color: #e74c3c;
        font-size: 13px;
        margin-top: 5px;
        font-family: 'Work Sans', sans-serif;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .contact-form-section {
            padding: 60px 30px;
        }

        .contact-form-header h2 {
            font-size: 32px;
        }

            .contact-form {
                padding: 0;
            }

            .form-row {
                grid-template-columns: 1fr;
                gap: 0;
            }

        .popup-container {
            padding: 30px 25px;
            max-width: 90%;
        }

        .popup-icon {
            width: 80px;
            height: 80px;
        }

        .popup-title {
            font-size: 24px;
        }

        .popup-message {
            font-size: 15px;
        }
        }

        @media (max-width: 480px) {
            .contact-form-section {
                padding: 40px 20px;
            }

            .contact-form-header h2 {
                font-size: 28px;
            }

            .contact-form {
                padding: 0;
            }
        }
        }
</style>

<script>
    function closePopup() {
        const overlay = document.querySelector('.popup-overlay');
        if (overlay) {
            overlay.style.animation = 'fadeOut 0.3s ease';
            setTimeout(() => {
                overlay.style.display = 'none';
            }, 300);
        }
    }

    // Close on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closePopup();
        }
    });

    // Close when clicking outside the popup container
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('popup-overlay')) {
            closePopup();
        }
    });
</script>