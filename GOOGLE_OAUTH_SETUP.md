# Setup Google OAuth untuk Sakanta

## Fitur Yang Sudah Dibuat ✅

1. **Google Sign In** - User bisa login dengan akun Google
2. **Profile Page** - Halaman profile user dengan avatar dan informasi
3. **Like/Unlike Property** - User bisa menyimpan property favorit mereka
4. **Navbar Conditional** - Menampilkan "SIGN IN" atau "PROFILE" berdasarkan status login

## Cara Setup Google OAuth

### 1. Buat Google Cloud Project

1. Buka [Google Cloud Console](https://console.cloud.google.com/)
2. Klik **"Select a project"** → **"New Project"**
3. Beri nama project (contoh: "Sakanta Auth")
4. Klik **"Create"**

### 2. Enable Google+ API

1. Di sidebar, pilih **"APIs & Services"** → **"Library"**
2. Cari **"Google+ API"**
3. Klik dan enable API tersebut

### 3. Buat OAuth 2.0 Credentials

1. Di sidebar, pilih **"APIs & Services"** → **"Credentials"**
2. Klik **"Create Credentials"** → **"OAuth client ID"**
3. Jika belum setup OAuth consent screen:
   - Klik **"Configure Consent Screen"**
   - Pilih **"External"**
   - Isi:
     - App name: **Sakanta**
     - User support email: **email Anda**
     - Developer contact: **email Anda**
   - Klik **"Save and Continue"**
   - Di Scopes, klik **"Add or Remove Scopes"**
   - Pilih: `email`, `profile`, `openid`
   - Klik **"Save and Continue"**
   - Di Test users, tambahkan email Anda untuk testing
   - Klik **"Save and Continue"**

4. Kembali ke **Credentials**, klik **"Create Credentials"** → **"OAuth client ID"**
5. Pilih **"Web application"**
6. Isi:
   - Name: **Sakanta Web Client**
   - Authorized JavaScript origins:
     - `http://localhost:8000`
     - `http://127.0.0.1:8000`
   - Authorized redirect URIs:
     - `http://localhost:8000/auth/google/callback`
     - `http://127.0.0.1:8000/auth/google/callback`
7. Klik **"Create"**

### 4. Copy Credentials ke .env

Setelah OAuth client dibuat, Anda akan mendapat:
- **Client ID** (contoh: `123456789-abc...xyz.apps.googleusercontent.com`)
- **Client Secret** (contoh: `GOCSPX-abc...xyz`)

Buka file `.env` di root project dan update:

```env
GOOGLE_CLIENT_ID=paste-client-id-disini
GOOGLE_CLIENT_SECRET=paste-client-secret-disini
GOOGLE_REDIRECT_URI=http://localhost:8000/auth/google/callback
```

### 5. Clear Config Cache

```bash
php artisan config:clear
php artisan cache:clear
```

### 6. Testing

1. Jalankan server: `php artisan serve`
2. Buka browser: `http://localhost:8000`
3. Klik button **"SIGN IN"** di navbar
4. Klik **"Continue with Google"**
5. Pilih akun Google Anda
6. Setelah berhasil, Anda akan redirect ke homepage dan navbar berubah jadi **"PROFILE"**

## Struktur Database

### Table: `users`
```
- id
- name
- email
- google_id (nullable)
- avatar (nullable)
- password (nullable)
- phone (nullable)
- created_at
- updated_at
```

### Table: `property_likes`
```
- id
- user_id (foreign key to users)
- property_id (foreign key to properties)
- created_at
- updated_at
- unique constraint: user_id + property_id
```

## Routes Yang Tersedia

```php
// Public routes
GET  /signin                    - Halaman sign in
GET  /auth/google               - Redirect ke Google OAuth
GET  /auth/google/callback      - Handle callback dari Google

// Protected routes (harus login)
GET  /profile                   - Halaman profile user
POST /logout                    - Logout user
POST /property/{id}/like        - Like/unlike property (AJAX)
```

## Cara Menggunakan

### 1. Sign In
- User klik "SIGN IN" di navbar
- Redirect ke halaman signin
- Klik "Continue with Google"
- Login dengan akun Google
- Redirect kembali ke homepage
- Navbar berubah jadi "PROFILE" dengan avatar

### 2. Like Property
- User harus login dulu
- Di halaman listings atau detail property, ada heart icon
- Klik heart icon untuk like/unlike
- Property yang dilike tersimpan di database
- Bisa dilihat di halaman profile

### 3. Profile Page
- Klik "PROFILE" di navbar
- Menampilkan:
  - Avatar user
  - Nama user
  - Email user
  - List property yang dilike
  - Button "Sign Out"

## Troubleshooting

### Error: redirect_uri_mismatch
**Solusi:** Pastikan redirect URI di Google Cloud Console sama persis dengan yang ada di `.env`

### Error: Access blocked: This app's request is invalid
**Solusi:** 
1. Pastikan Google+ API sudah dienable
2. Pastikan OAuth consent screen sudah dikonfigurasi
3. Tambahkan email Anda sebagai test user

### Error: Class 'Laravel\Socialite\Facades\Socialite' not found
**Solusi:** 
```bash
composer require laravel/socialite
php artisan config:clear
```

## File Yang Dibuat/Dimodifikasi

### Controllers
- `app/Http/Controllers/AuthController.php` - Handle Google OAuth
- `app/Http/Controllers/ProfileController.php` - Handle profile page
- `app/Http/Controllers/PropertyLikeController.php` - Handle like/unlike

### Models
- `app/Models/User.php` - Tambah google_id, avatar, relationships
- `app/Models/PropertyLike.php` - Model untuk likes table

### Migrations
- `2025_10_27_095920_create_property_likes_table.php`
- `2025_10_28_011545_add_google_fields_to_users_table.php`

### Views
- `resources/views/signin.blade.php` - Halaman sign in
- `resources/views/profile.blade.php` - Halaman profile
- `resources/views/layouts/navbar.blade.php` - Update dengan conditional auth
- `resources/views/layouts/navbar-simple.blade.php` - Update dengan conditional auth

### Routes
- `routes/web.php` - Tambah routes untuk auth, profile, likes

### Config
- `config/services.php` - Tambah Google OAuth config
- `.env` - Tambah Google credentials

## Next Steps (Opsional)

1. **Production Setup:**
   - Update redirect URI di Google Cloud Console dengan domain production
   - Update `.env` production dengan credentials yang berbeda

2. **Email Verification:**
   - Tambahkan email verification setelah sign in
   
3. **Social Sharing:**
   - Tambahkan fitur share property ke social media

4. **Notifications:**
   - Email notification saat property baru tersedia
   - Push notifications untuk property updates

## Support

Jika ada pertanyaan atau masalah, silakan hubungi developer atau buat issue di repository.

---
**Sakanta Co-Ownership Platform**
Built with ❤️ using Laravel & Google OAuth
