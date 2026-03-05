<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CineManage | Modern Cinema Management System</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #0A0A0B;
            --card-bg: #161618;
            --accent-red: #E50914;
            --accent-gold: #D4AF37;
            --text-primary: #F5F5F7;
            --text-secondary: #A1A1A6;
            --glass-bg: rgba(22, 22, 24, 0.7);
            --transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-primary);
            overflow-x: hidden;
            line-height: 1.6;
        }

        /* --- Animations --- */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade {
            animation: fadeIn 0.8s forwards;
        }

        /* --- Navigation --- */
        nav {
            position: fixed;
            top: 0;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 5%;
            background: var(--glass-bg);
            backdrop-filter: blur(15px);
            z-index: 1000;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent-red);
            text-decoration: none;
            letter-spacing: -1px;
        }

        .logo span {
            color: var(--text-primary);
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            text-decoration: none;
            color: var(--text-secondary);
            font-weight: 400;
            transition: var(--transition);
            font-size: 1rem;
        }

        .nav-links a:hover {
            color: var(--text-primary);
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.6rem 1.5rem;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            cursor: pointer;
            font-size: 0.95rem;
        }

        .btn-outline {
            border: 1px solid var(--accent-red);
            color: var(--text-primary);
        }

        .btn-outline:hover {
            background: var(--accent-red);
        }

        .btn-primary {
            background: var(--accent-red);
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: #b2070f;
            transform: scale(1.05);
        }

        /* --- Hero Section --- */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(10, 10, 11, 0.6), rgba(10, 10, 11, 1)), url('/images/hero.png');
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 10%;
        }

        .hero h1 {
            font-size: 4.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            line-height: 1.1;
            background: linear-gradient(135deg, #fff 0%, #a1a1a6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 1.25rem;
            color: var(--text-secondary);
            max-width: 700px;
            margin-bottom: 2.5rem;
        }

        /* --- Sections --- */
        .section {
            padding: 8rem 10%;
        }

        .section-header {
            margin-bottom: 4rem;
            text-align: center;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .section-header p {
            color: var(--text-secondary);
            font-size: 1.1rem;
        }

        /* --- Movie Grid --- */
        .movie-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2.5rem;
        }

        .movie-card {
            background: var(--card-bg);
            border-radius: 16px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: var(--transition);
        }

        .movie-card:hover {
            transform: translateY(-10px);
            border-color: var(--accent-red);
            box-shadow: 0 20px 40px rgba(229, 9, 20, 0.1);
        }

        .movie-poster {
            width: 100%;
            height: 400px;
            background: #252529;
            position: relative;
        }

        .movie-poster::before {
            content: 'POSTER';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #3f3f46;
            font-weight: 700;
            font-size: 1.5rem;
        }

        .movie-info {
            padding: 1.5rem;
        }

        .movie-info h3 {
            margin-bottom: 0.5rem;
        }

        .movie-info p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* --- Features --- */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-item {
            padding: 2.5rem;
            background: var(--card-bg);
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.03);
            transition: var(--transition);
        }

        .feature-item:hover {
            background: rgba(229, 9, 20, 0.05);
            border-color: var(--accent-red);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            color: var(--accent-red);
        }

        /* --- Footer --- */
        footer {
            padding: 4rem 10%;
            background: #050505;
            text-align: center;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-logo {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: block;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin: 2rem 0;
            list-style: none;
        }

        .footer-links a {
            color: var(--text-secondary);
            text-decoration: none;
        }

        .copyright {
            color: #555;
            font-size: 0.85rem;
        }

        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.8rem;
            }

            .nav-links {
                display: none;
            }

            .section {
                padding: 4rem 5%;
            }
        }
    </style>
</head>

<body>

    <nav>
        <a href="/" class="logo">Cine<span>Manage</span></a>
        <ul class="nav-links">
            <li><a href="#movies">Movies</a></li>
            <li><a href="#features">Features</a></li>
            <li><a href="#about">About</a></li>
        </ul>
        <div class="auth-buttons">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <main>
        <section class="hero animate-fade">
            <h1>The Heart of Your <br> Cinema Experience</h1>
            <p>Streamline your operations, manage movie schedules, and deliver unforgettable experiences to your
                audience with CineManage – the ultimate management solution.</p>
            <div class="hero-btns">
                <a href="#features" class="btn btn-primary" style="padding: 1rem 2.5rem; font-size: 1.1rem;">Explore
                    Features</a>
            </div>
        </section>

        <section id="movies" class="section">
            <div class="section-header">
                <h2>Now Playing</h2>
                <p>Curated selection of current box office hits available at our theaters.</p>
            </div>
            <div class="movie-grid">
                <div class="movie-card">
                    <div class="movie-poster" style="background: linear-gradient(45deg, #1a1a1c, #2d2d30);"></div>
                    <div class="movie-info">
                        <h3>Galaxia: Echoes</h3>
                        <p>Sci-Fi • 2h 45m</p>
                    </div>
                </div>
                <div class="movie-card">
                    <div class="movie-poster" style="background: linear-gradient(45deg, #1d1414, #362828);"></div>
                    <div class="movie-info">
                        <h3>Velocity</h3>
                        <p>Action • 1h 58m</p>
                    </div>
                </div>
                <div class="movie-card">
                    <div class="movie-poster" style="background: linear-gradient(45deg, #14171d, #282f3a);"></div>
                    <div class="movie-info">
                        <h3>The Silent Echo</h3>
                        <p>Drama • 2h 12m</p>
                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="section" style="background: #0c0c0e;">
            <div class="section-header">
                <h2>Powerful CMS Features</h2>
                <p>Everything you need to run a high-performance cinema business efficiently.</p>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">🎟️</div>
                    <h3>Smart Ticketing</h3>
                    <p>Real-time seat selection and automated booking confirmations with QR integration.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📅</div>
                    <h3>Schedule Master</h3>
                    <p>Dynamic scheduling tools with conflict detection and automated theater allocation.</p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">📊</div>
                    <h3>Analytics Hub</h3>
                    <p>Detailed revenue reports, occupancy rates, and movie performance insights. </p>
                </div>
                <div class="feature-item">
                    <div class="feature-icon">🍿</div>
                    <h3>F&B Inventory</h3>
                    <p>Manage snacks and beverages inventory synced with point-of-sale systems.</p>
                </div>
            </div>
        </section>

        <!-- Pricing Tiers -->
        <section id="pricing" class="section">
            <div class="section-header">
                <h2>Membership Perks</h2>
                <p>Choose a plan that fits your movie-going lifestyle.</p>
            </div>
            <div class="features-grid">
                <div class="feature-item" style="border-top: 4px solid #555;">
                    <div style="font-size: 0.9rem; color: #555; text-transform: uppercase; margin-bottom: 0.5rem;">Basic
                    </div>
                    <h3>Cinema Fan</h3>
                    <p style="font-size: 2rem; color: white; margin: 1rem 0;">Free</p>
                    <ul style="list-style: none; color: var(--text-secondary); margin-bottom: 2rem;">
                        <li>• Standard Booking</li>
                        <li>• Email Newsletter</li>
                        <li>• Point Rewards</li>
                    </ul>
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-outline"
                        style="display: block; text-align: center;">Get Started</a>
                </div>
                <div class="feature-item"
                    style="border-top: 4px solid var(--accent-red); transform: scale(1.05); background: rgba(229, 9, 20, 0.05);">
                    <div
                        style="font-size: 0.9rem; color: var(--accent-red); text-transform: uppercase; margin-bottom: 0.5rem;">
                        Recommended</div>
                    <h3>Cinema Pro</h3>
                    <p style="font-size: 2rem; color: white; margin: 1rem 0;">Rp 49k<span
                            style="font-size: 1rem; color: #555;">/mo</span></p>
                    <ul style="list-style: none; color: var(--text-secondary); margin-bottom: 2rem;">
                        <li>• Priority Booking</li>
                        <li>• 10% F&B Discount</li>
                        <li>• Birthday Gifts</li>
                        <li>• Ad-free Browsing</li>
                    </ul>
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-primary"
                        style="display: block; text-align: center;">Go Pro</a>
                </div>
                <div class="feature-item" style="border-top: 4px solid var(--accent-gold);">
                    <div
                        style="font-size: 0.9rem; color: var(--accent-gold); text-transform: uppercase; margin-bottom: 0.5rem;">
                        Premium</div>
                    <h3>Cinema VIP</h3>
                    <p style="font-size: 2rem; color: white; margin: 1rem 0;">Rp 99k<span
                            style="font-size: 1rem; color: #555;">/mo</span></p>
                    <ul style="list-style: none; color: var(--text-secondary); margin-bottom: 2rem;">
                        <li>• All Pro Features</li>
                        <li>• VIP Lounge Access</li>
                        <li>• Free Popcorn Weekly</li>
                        <li>• Unlimited IMAX Upgrades</li>
                    </ul>
                    <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-outline"
                        style="display: block; text-align: center; border-color: var(--accent-gold); color: var(--accent-gold);">Join
                        VIP</a>
                </div>
            </div>
        </section>

        <!-- Locations Section -->
        <section id="locations" class="section" style="background: #0c0c0e;">
            <div class="section-header">
                <h2>Our Locations</h2>
                <p>Find a CineManage theater near you across major cities.</p>
            </div>
            <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 1rem;">
                <div style="padding: 1rem 2rem; background: var(--card-bg); border-radius: 50px;">Jakarta Grand Mall
                </div>
                <div style="padding: 1rem 2rem; background: var(--card-bg); border-radius: 50px;">Bandung Central</div>
                <div style="padding: 1rem 2rem; background: var(--card-bg); border-radius: 50px;">Surabaya Plaza</div>
                <div style="padding: 1rem 2rem; background: var(--card-bg); border-radius: 50px;">Yogyakarta Square
                </div>
                <div style="padding: 1rem 2rem; background: var(--card-bg); border-radius: 50px;">Bali Beachside</div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faq" class="section">
            <div class="section-header">
                <h2>Frequently Asked Questions</h2>
            </div>
            <div style="max-width: 800px; margin: 0 auto;">
                <details
                    style="padding: 1.5rem; background: var(--card-bg); border-radius: 12px; margin-bottom: 1rem; cursor: pointer;">
                    <summary style="font-weight: 600; font-size: 1.1rem;">How do I book tickets online?</summary>
                    <p style="margin-top: 1rem; color: var(--text-secondary);">You can book tickets by creating an
                        account, selecting your preferred movie and showtime, and choosing your seats on the interactive
                        map.</p>
                </details>
                <details
                    style="padding: 1.5rem; background: var(--card-bg); border-radius: 12px; margin-bottom: 1rem; cursor: pointer;">
                    <summary style="font-weight: 600; font-size: 1.1rem;">Can I cancel my booking?</summary>
                    <p style="margin-top: 1rem; color: var(--text-secondary);">Yes, cancellations are allowed up to 2
                        hours before the movie starts. Refunds will be processed back to your original payment method.
                    </p>
                </details>
                <details
                    style="padding: 1.5rem; background: var(--card-bg); border-radius: 12px; margin-bottom: 1rem; cursor: pointer;">
                    <summary style="font-weight: 600; font-size: 1.1rem;">What is CineManage Pro?</summary>
                    <p style="margin-top: 1rem; color: var(--text-secondary);">CineManage Pro is our subscription
                        service that offers exclusive discounts, priority booking, and complementary amenities.</p>
                </details>
            </div>
        </section>

        <section id="cta" class="section" style="text-align: center;">
            <h2 style="font-size: 3rem; margin-bottom: 2rem;">Ready to elevate your cinema?</h2>
            <a href="{{ Route::has('register') ? route('register') : '#' }}" class="btn btn-primary"
                style="padding: 1.2rem 3.5rem; font-size: 1.2rem; border-radius: 50px;">Join CineManage Today</a>
        </section>
    </main>

    <footer>
        <span class="footer-logo logo">Cine<span>Manage</span></span>
        <ul class="footer-links">
            <li><a href="#">Terms</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">Enterprise</a></li>
        </ul>
        <p class="copyright">&copy; {{ date('Y') }} CineManage System. Built for Cinema Professionals.</p>
    </footer>

</body>

</html>