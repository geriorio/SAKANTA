<!-- WhatsApp Contact Icon -->
<a href="https://wa.me/6281234567890?text=Hi%20admin%2C%20Saya%20mau%20menjadi%20Co-Owner%20di%20Sakanta" 
   target="_blank" 
   class="whatsapp-contact-icon"
   title="Contact us on WhatsApp">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
        <polyline points="22,6 12,13 2,6"></polyline>
    </svg>
</a>

<style>
    .whatsapp-contact-icon {
        position: fixed;
        left: 50px;
        bottom: 50px;
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.9);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 100;
        cursor: pointer;
        text-decoration: none;
        color: #2c3e50;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .whatsapp-contact-icon:hover {
        background: rgba(255, 255, 255, 1);
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
    }

    .whatsapp-contact-icon svg {
        color: #2c3e50;
    }

    @media (max-width: 968px) {
        .whatsapp-contact-icon {
            width: 48px;
            height: 48px;
            left: 30px;
            bottom: 30px;
        }

        .whatsapp-contact-icon svg {
            width: 22px;
            height: 22px;
        }
    }

    @media (max-width: 768px) {
        .whatsapp-contact-icon {
            width: 46px;
            height: 46px;
            left: 25px;
            bottom: 25px;
        }

        .whatsapp-contact-icon svg {
            width: 20px;
            height: 20px;
        }
    }

    @media (max-width: 480px) {
        .whatsapp-contact-icon {
            width: 44px;
            height: 44px;
            left: 20px;
            bottom: 20px;
        }

        .whatsapp-contact-icon svg {
            width: 18px;
            height: 18px;
        }
    }
</style>
