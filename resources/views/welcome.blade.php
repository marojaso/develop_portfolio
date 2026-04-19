<!DOCTYPE html>
<html lang="es" style="scroll-behavior: smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Marcelo | Analista de Sistemas TI</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        .fade-in { opacity: 0; transform: translateY(30px); transition: opacity 0.6s ease-out, transform 0.6s ease-out; }
        .fade-in.visible { opacity: 1; transform: translateY(0); }
        .fade-in-delay-1 { transition-delay: 0.1s; }
        .fade-in-delay-2 { transition-delay: 0.2s; }
        .fade-in-delay-3 { transition-delay: 0.3s; }
        .fade-in-delay-4 { transition-delay: 0.4s; }
        .scale-in { opacity: 0; transform: scale(0.9); transition: opacity 0.5s ease-out, transform 0.5s ease-out; }
        .scale-in.visible { opacity: 1; transform: scale(1); }
        .hero-animate { opacity: 0; animation: heroFadeIn 1s ease-out forwards; }
        @keyframes heroFadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* Nav menu */
        .nav-links { display: flex; gap: 1.25rem; }
        .nav-links a { color: #9ca3af; font-size: 0.75rem; transition: color 0.2s; }
        .nav-links a:hover { color: #fff; }
        .menu-btn { display: none; }

        /* Mobile menu */
        .mobile-menu { display: none; position: fixed; top: 48px; left: 0; right: 0; background: #111827; padding: 1rem; flex-direction: column; gap: 0.5rem; }
        .mobile-menu.show { display: flex; }
        .mobile-menu a { color: #9ca3af; font-size: 0.875rem; padding: 0.5rem 0; border-bottom: 1px solid #374151; }

        /* Timeline */
        .timeline { position: relative; margin-left: 1.5rem; padding-left: 2.5rem; }
        .timeline::before { content: ''; position: absolute; left: 0; top: 1rem; bottom: 1rem; width: 3px; background: linear-gradient(to bottom, #3b82f6, #60a5fa, #3b82f6); border-radius: 2px; }
        .timeline-item { position: relative; margin-bottom: 2rem; }
        .timeline-dot { position: absolute; left: -2.75rem; top: 0.75rem; width: 1.25rem; height: 1.25rem; background: #111827; border: 3px solid #3b82f6; border-radius: 50%; box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2), 0 0 15px rgba(59, 130, 246, 0.4); transition: all 0.3s; animation: dotPulse 2s ease-in-out infinite; }
        .timeline-item:hover .timeline-dot { background: #3b82f6; box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.3), 0 0 25px rgba(59, 130, 246, 0.6); transform: scale(1.1); animation: none; }
        @keyframes dotPulse {
            0%, 100% { box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.2), 0 0 15px rgba(59, 130, 246, 0.4); }
            50% { box-shadow: 0 0 0 6px rgba(59, 130, 246, 0.1), 0 0 20px rgba(59, 130, 246, 0.5); }
        }
        .timeline-card { background: linear-gradient(145deg, #1f2937, #111827); padding: 1.25rem; border-radius: 0.75rem; border: 1px solid #374151; transition: all 0.3s ease; position: relative; overflow: hidden; }
        .timeline-card:hover { border-color: #3b82f6; transform: translateX(8px); box-shadow: 0 4px 25px rgba(59, 130, 246, 0.25); }
        .timeline-date { font-size: 0.7rem; color: #60a5fa; font-weight: 500; letter-spacing: 0.05em; text-transform: uppercase; }
        .timeline-title { font-size: 1.1rem; font-weight: 700; color: #fff; margin-top: 0.5rem; }
        .timeline-company { color: #3b82f6; font-size: 0.85rem; margin-top: 0.25rem; font-weight: 500; }
        .timeline-card::before { content: ''; position: absolute; left: 0; top: 0; height: 100%; width: 4px; background: #3b82f6; opacity: 0; transition: opacity 0.3s; }
        .timeline-card:hover::before { opacity: 1; }
        .timeline-item::after { content: ''; position: absolute; left: -2.75rem; top: 1.25rem; width: 1.25rem; height: 1px; background: #374151; }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .menu-btn { display: block; background: none; border: none; color: #9ca3af; cursor: pointer; }
            .menu-btn:hover { color: #fff; }
        }

        /* General animations */
        /* Dynamic background */
        body {
            background: #0f172a;
            background-image:
                radial-gradient(ellipse at 20% 20%, rgba(59, 130, 246, 0.08) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 80%, rgba(99, 102, 241, 0.06) 0%, transparent 50%),
                radial-gradient(ellipse at 50% 50%, rgba(14, 165, 233, 0.04) 0%, transparent 70%);
            position: relative;
            overflow-x: hidden;
        }
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 400 400' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
            opacity: 0.03;
            pointer-events: none;
            z-index: 0;
        }
        .bg-glow {
            position: fixed;
            width: 600px;
            height: 600px;
            border-radius: 50%;
            filter: blur(100px);
            opacity: 0.15;
            pointer-events: none;
            z-index: 0;
            animation: moveGlow 20s ease-in-out infinite;
        }
        .bg-glow-1 { top: -200px; left: -200px; background: #3b82f6; }
        .bg-glow-2 { bottom: -200px; right: -200px; background: #6366f1; animation-delay: -10s; }
        @keyframes moveGlow {
            0%, 100% { transform: translate(0, 0); }
            50% { transform: translate(50px, 30px); }
        }

        /* Floating shapes */
        .floating-shapes { position: fixed; inset: 0; overflow: hidden; pointer-events: none; z-index: 0; }
        .shape {
            position: absolute;
            border: 2px solid rgba(59, 130, 246, 0.4);
            border-radius: 8px;
            animation: floatShape 15s ease-in-out infinite;
            background: rgba(59, 130, 246, 0.05);
        }
        .shape-1 { width: 70px; height: 70px; top: 15%; left: 5%; animation-delay: 0s; }
        .shape-2 { width: 50px; height: 50px; top: 65%; left: 85%; animation-delay: -5s; border-radius: 50%; }
        .shape-3 { width: 90px; height: 90px; top: 35%; left: 75%; animation-delay: -10s; border-radius: 50%; background: rgba(99, 102, 241, 0.05); border-color: rgba(99, 102, 241, 0.4); }
        .shape-4 { width: 40px; height: 40px; top: 75%; left: 15%; animation-delay: -3s; }
        .shape-5 { width: 55px; height: 55px; top: 5%; left: 55%; animation-delay: -8s; border-radius: 50%; background: rgba(14, 165, 233, 0.05); border-color: rgba(14, 165, 233, 0.4); }
        .shape-6 { width: 35px; height: 35px; top: 85%; left: 50%; animation-delay: -12s; }
        .shape-7 { width: 45px; height: 45px; top: 25%; left: 85%; animation-delay: -7s; border-radius: 50%; }
        @keyframes floatShape {
            0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.5; }
            25% { transform: translateY(-25px) rotate(5deg); opacity: 0.8; }
            50% { transform: translateY(0) rotate(0deg); opacity: 0.5; }
            75% { transform: translateY(25px) rotate(-5deg); opacity: 0.8; }
        }

        /* Floating particles */
        .particle {
            position: absolute;
            width: 6px;
            height: 6px;
            background: rgba(59, 130, 246, 0.7);
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
            animation: particleFloat 18s linear infinite;
        }
        .particle:nth-child(1) { left: 8%; animation-delay: 0s; animation-duration: 14s; }
        .particle:nth-child(2) { left: 18%; animation-delay: -2s; animation-duration: 16s; }
        .particle:nth-child(3) { left: 28%; animation-delay: -4s; animation-duration: 18s; }
        .particle:nth-child(4) { left: 38%; animation-delay: -6s; animation-duration: 15s; }
        .particle:nth-child(5) { left: 48%; animation-delay: -8s; animation-duration: 17s; }
        .particle:nth-child(6) { left: 58%; animation-delay: -10s; animation-duration: 19s; }
        .particle:nth-child(7) { left: 68%; animation-delay: -12s; animation-duration: 14s; }
        .particle:nth-child(8) { left: 78%; animation-delay: -14s; animation-duration: 16s; }
        .particle:nth-child(9) { left: 88%; animation-delay: -16s; animation-duration: 18s; }
        @keyframes particleFloat {
            0% { transform: translateY(100vh) scale(0); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(-100px) scale(1); opacity: 0; }
        }
        .content-wrapper { position: relative; z-index: 1; }
        .parallax-section { position: relative; }
        .parallax-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            z-index: 0;
        }

        @keyframes float { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-5px); } }
        @keyframes shimmer { 0% { background-position: -200% 0; } 100% { background-position: 200% 0; } }
        @keyframes pulse-glow { 0%, 100% { box-shadow: 0 0 5px rgba(59, 130, 246, 0.3); } 50% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.6); } }

        /* Hero section */
        .hero-subtitle { animation: heroFadeIn 1s ease-out 0.2s forwards; opacity: 0; }
        .hero-cta { animation: heroFadeIn 1s ease-out 0.4s forwards; opacity: 0; }
        .hero-social { animation: heroFadeIn 1s ease-out 0.6s forwards; opacity: 0; }
        .hero-badge { animation: float 3s ease-in-out infinite; }

        /* Buttons */
        .btn-primary { transition: all 0.3s ease; position: relative; overflow: hidden; }
        .btn-primary::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.5s; }
        .btn-primary:hover::before { left: 100%; }
        .btn-primary:hover { transform: translateY(-2px); box-shadow: 0 5px 20px rgba(59, 130, 246, 0.4); }
        .btn-secondary { transition: all 0.3s ease; }
        .btn-secondary:hover { border-color: #60a5fa; color: #fff; transform: translateY(-2px); }

        /* Cards */
        .card-hover { transition: all 0.3s ease; }
        .card-hover:hover { transform: translateY(-5px); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); }

        /* Skills section */
        .skill-card { transition: all 0.3s ease; }
        .skill-card:hover { transform: translateY(-3px) scale(1.02); border-color: #3b82f6; }
        .skill-icon { transition: transform 0.3s ease; }
        .skill-card:hover .skill-icon { transform: scale(1.1) rotate(5deg); }

        /* About section */
        .stat-card { transition: all 0.3s ease; }
        .stat-card:hover { transform: scale(1.05) translateY(-5px); border-color: #3b82f6; box-shadow: 0 20px 40px rgba(59, 130, 246, 0.2); }
        .stat-number { transition: all 0.3s ease; }
        .stat-card:hover .stat-number { color: #60a5fa; }

        /* Parallax scroll sections */
        .parallax-speed-1 { will-change: transform; transition: transform 0.1s ease-out; }
        .parallax-speed-2 { will-change: transform; transition: transform 0.15s ease-out; }
        .parallax-speed-3 { will-change: transform; transition: transform 0.2s ease-out; }

        /* Section titles */
        .section-title { position: relative; display: inline-block; }
        .section-title::after { content: ''; position: absolute; bottom: -8px; left: 50%; transform: translateX(-50%); width: 0; height: 2px; background: #3b82f6; transition: width 0.3s ease; }
        .section-title:hover::after { width: 100%; }

        /* Links */
        .link-hover { position: relative; }
        .link-hover::after { content: ''; position: absolute; bottom: -2px; left: 0; width: 0; height: 1px; background: #3b82f6; transition: width 0.3s ease; }
        .link-hover:hover::after { width: 100%; }

        /* Social icons */
        .social-icon { transition: all 0.3s ease; }
        .social-icon:hover { transform: translateY(-3px); color: #3b82f6; }

        /* Education cards */
        .edu-card { transition: all 0.3s ease; }
        .edu-card:hover { border-color: #3b82f6; transform: translateX(5px); }

        /* Contact form */
        form input, form textarea {
            font-family: 'Inter', sans-serif;
        }
        form input:focus, form textarea:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });
        document.querySelectorAll('.fade-in, .scale-in').forEach(el => observer.observe(el));

        const menuToggle = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');
        menuToggle.addEventListener('click', function() {
            menu.classList.toggle('show');
        });
        document.querySelectorAll('#menu a').forEach(link => {
            link.addEventListener('click', () => menu.classList.remove('show'));
        });

        // Parallax effect
        window.addEventListener('scroll', function() {
            const scrolled = window.pageYOffset;

            // Parallax shapes and particles
            const shapes = document.querySelectorAll('.shape, .particle, .bg-glow');
            shapes.forEach((shape, index) => {
                const speed = (index % 3 + 1) * 0.15;
                shape.style.transform = `translateY(${scrolled * speed}px)`;
            });

            // Parallax for sections
            document.querySelectorAll('section').forEach((section, index) => {
                const rect = section.getBoundingClientRect();
                const speed = (index % 2 === 0) ? 0.05 : -0.05;
                if (rect.top < window.innerHeight && rect.bottom > 0) {
                    section.style.backgroundPositionY = `${(rect.top - window.innerHeight / 2) * speed}px`;
                }
            });
        });

        // 3D tilt effect on cards
        document.querySelectorAll('.skill-card, .stat-card, .edu-card, .timeline-card').forEach(card => {
            card.addEventListener('mousemove', (e) => {
                const rect = card.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const rotateX = (y - centerY) / 10;
                const rotateY = (centerX - x) / 10;
                card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-5px)`;
            });
            card.addEventListener('mouseleave', () => {
                card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
            });
        });
    });
</script>
<body class="text-gray-100 antialiased">
    <div class="bg-glow bg-glow-1"></div>
    <div class="bg-glow bg-glow-2"></div>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>
    <div class="content-wrapper">
    <!-- Navigation -->
    <nav style="position: fixed; width: 100%; z-index: 50; background: rgba(17, 24, 39, 0.9); backdrop-filter: blur(8px); border-bottom: 1px solid #1f2937;">
        <div style="max-width: 64rem; margin: 0 auto; padding: 0.75rem 1rem; display: flex; justify-content: space-between; align-items: center;">
            <a href="#" style="font-size: 1.125rem; font-weight: 700; color: #fff;"></a>
            <div class="nav-links">
                <a href="#about" class="link-hover">Sobre mí</a>
                <a href="#skills" class="link-hover">Habilidades</a>
                <a href="#experience" class="link-hover">Experiencia</a>
                <a href="#education" class="link-hover">Educación</a>
                <a href="#contact" class="link-hover">Contacto</a>
            </div>
            <button id="menu-toggle" class="menu-btn">
                <svg style="width: 1.5rem; height: 1.5rem;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div id="menu" class="mobile-menu">
                <a href="#about">Sobre mí</a>
                <a href="#skills">Habilidades</a>
                <a href="#experience">Experiencia</a>
                <a href="#education">Educación</a>
                <a href="#contact">Contacto</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center pt-20">
        <div class="max-w-4xl mx-auto px-6 text-center hero-animate">
            <div class="mb-6 hero-subtitle">
               
            </div>
            <h1 class="text-5xl md:text-7xl font-bold mb-6 leading-tight">
                Hola, soy <span class="text-blue-500">Marcelo Rojas Solano</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-400 mb-8 max-w-2xl mx-auto">
                Analista de Sistemas TI con experiencia en gestión de infraestructura, administración de bases de datos, desarrollo de automatizaciones y ciberseguridad. Apasionado por crear soluciones tecnológicas robustas y eficientes.
            </p>
            <div class="flex gap-4 justify-center hero-cta">
               
                <a href="#contact" class="btn-secondary px-8 py-3 border border-gray-600 hover:border-gray-400 text-gray-300 hover:text-white font-semibold rounded-lg">
                    Contactar
                </a>
            </div>
            <!-- Social Links -->
            <div class="flex gap-6 justify-center mt-8 hero-social">
                <a href="https://www.linkedin.com/in/marcelo-rojas-914810124/" target="_blank" class="social-icon text-gray-400 hover:text-white" aria-label="LinkedIn">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                
            </div>
            <p class="text-gray-500 mt-4">San José, Costa Rica</p>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-800/50">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="section-title text-3xl font-bold text-center mb-12 fade-in">
                <span class="text-blue-500">/</span> Sobre mí
            </h2>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-4 text-gray-300 leading-relaxed fade-in fade-in-delay-1">
                    <p>
                        Analista de Sistemas de TI con experiencia en gestión de infraestructura, administración de bases de datos, desarrollo de automatizaciones y ciberseguridad. Sólida trayectoria en entornos Linux/Windows Server, PHP (Laravel), SQL Server y procesos ETL.
                    </p>
                    <p>
                        Capacidad comprobada para alinear las operaciones de TI con la estrategia empresarial y generar mejoras medibles en eficiencia y confiabilidad del sistema.
                    </p>
                    <p>
                        Mi enfoque combina buenas prácticas de desarrollo con una mentalidad de mejora continua. Disfruto resolver problemas complejos y transformar ideas en realidad digital.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="stat-card bg-gray-800 p-6 rounded-xl border border-gray-700 fade-in">
                        <div class="stat-number text-3xl font-bold text-blue-500">5+</div>
                        <div class="text-gray-400">Años de experiencia</div>
                    </div>
                  
                    <div class="stat-card bg-gray-800 p-6 rounded-xl border border-gray-700 fade-in fade-in-delay-2">
                        <div class="stat-number text-3xl font-bold text-blue-500">15+</div>
                        <div class="text-gray-400">Tecnologías</div>
                    </div>
                    <div class="stat-card bg-gray-800 p-6 rounded-xl border border-gray-700 fade-in fade-in-delay-3">
                        <div class="stat-number text-3xl font-bold text-blue-500">B2</div>
                        <div class="text-gray-400">Inglés</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="py-20">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="section-title text-3xl font-bold text-center mb-12 fade-in">
                <span class="text-blue-500">/</span> Habilidades
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Backend -->
                <div class="skill-card bg-gray-800/50 p-4 rounded-lg border border-gray-700 fade-in scale-in">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="skill-icon w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <span class="font-medium">PHP</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 90%"></div>
                    </div>
                </div>
                <div class="skill-card bg-gray-800/50 p-4 rounded-lg border border-gray-700 fade-in scale-in">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="skill-icon w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <span class="font-medium">Laravel</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
                <div class="skill-card bg-gray-800/50 p-4 rounded-lg border border-gray-700 fade-in scale-in">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="skill-icon w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 7v10c0 2.21 3.582 4 8 4s8-1.79 8-4V7M4 7c0 2.21 3.582 4 8 4s8-1.79 8-4M4 7c0-2.21 3.582-4 8-4s8 1.79 8 4"/></svg>
                        </div>
                        <span class="font-medium">MySQL</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 80%"></div>
                    </div>
                </div>
                <div class="skill-card bg-gray-800/50 p-4 rounded-lg border border-gray-700 fade-in scale-in">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="skill-icon w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg>
                        </div>
                        <span class="font-medium">REST API</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-blue-500 h-2 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
                <!-- Frontend -->
                <div class="skill-card bg-gray-800/50 p-4 rounded-lg border border-gray-700 fade-in scale-in">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-yellow-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/></svg>
                        </div>
                        <span class="font-medium">JavaScript</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 85%"></div>
                    </div>
                </div>
                <div class="skill-card bg-gray-800/50 p-4 rounded-lg border border-gray-700 fade-in scale-in">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-cyan-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-cyan-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <span class="font-medium">React</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-cyan-500 h-2 rounded-full" style="width: 75%"></div>
                    </div>
                </div>
                <div class="skill-card bg-gray-800/50 p-4 rounded-lg border border-gray-700 fade-in scale-in">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-teal-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
                        </div>
                        <span class="font-medium">Tailwind</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-teal-500 h-2 rounded-full" style="width: 80%"></div>
                    </div>
                </div>
                <div class="skill-card bg-gray-800/50 p-4 rounded-lg border border-gray-700 fade-in scale-in">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>
                        </div>
                        <span class="font-medium">HTML/CSS</span>
                    </div>
                    <div class="w-full bg-gray-700 rounded-full h-2">
                        <div class="bg-purple-500 h-2 rounded-full" style="width: 95%"></div>
                    </div>
                </div>
            </div>
            <!-- Tech Stack -->
            <div class="mt-12 flex flex-wrap justify-center gap-3">
                <span class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 text-sm border border-gray-700">SQL Server</span>
                <span class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 text-sm border border-gray-700">MySQL</span>
                <span class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 text-sm border border-gray-700">Pentaho</span>
                <span class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 text-sm border border-gray-700">C#</span>
                <span class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 text-sm border border-gray-700">jQuery</span>
                <span class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 text-sm border border-gray-700">Ajax</span>
                <span class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 text-sm border border-gray-700">Apache</span>
                <span class="px-4 py-2 bg-gray-800 rounded-lg text-gray-300 text-sm border border-gray-700">OpenMediaVault</span>
            </div>
        </div>
    </section>

    <!-- Experience Section -->
    <section id="experience" style="padding: 5rem 0; background: rgba(31, 41, 55, 0.5);">
        <div style="max-width: 56rem; margin: 0 auto; padding: 0 1.5rem;">
            <h2 style="font-size: 1.875rem; font-weight: 700; text-align: center; margin-bottom: 3rem;" class="fade-in">
                <span style="color: #3b82f6;">/</span> Experiencia
            </h2>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-card">
                        <span class="timeline-date">Agosto 2023 - Junio 2025</span>
                        <h3 class="timeline-title">Analista de Sistemas TI</h3>
                        <p class="timeline-company">Flexográfica de Exportación S.A.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-card">
                        <span class="timeline-date">Octubre 2022 - Agosto 2023</span>
                        <h3 class="timeline-title">Programador de Sistemas Junior</h3>
                        <p class="timeline-company">Renaware de Costa Rica</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-card">
                        <span class="timeline-date">Marzo 2020 - Abril 2022</span>
                        <h3 class="timeline-title">Asistente de TI</h3>
                        <p class="timeline-company">Flexográfica de Exportación S.A.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Education Section -->
    <section id="education" class="py-20">
        <div class="max-w-4xl mx-auto px-6">
            <h2 class="section-title text-3xl font-bold text-center mb-12 fade-in">
                <span class="text-blue-500">/</span> Educación
            </h2>
            <div class="grid md:grid-cols-2 gap-6">
                <div class="edu-card bg-gray-800/50 p-6 rounded-xl border border-gray-700 fade-in">
                    <h3 class="text-xl font-semibold text-white mb-2">Bachillerato en Ingeniería en Sistemas</h3>
                    <p class="text-blue-400">Universidad Fidélitas | San José, Costa Rica</p>
                    <p class="text-gray-400 text-sm mt-2">2023</p>
                </div>
                <div class="edu-card bg-gray-800/50 p-6 rounded-xl border border-gray-700 fade-in fade-in-delay-1">
                    <h3 class="text-xl font-semibold text-white mb-2">Diplomado en Tecnologías de Información</h3>
                    <p class="text-blue-400">Colegio Universitario de Cartago | Cartago, Costa Rica</p>
                    <p class="text-gray-400 text-sm mt-2">2019</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20">
        <div class="max-w-2xl mx-auto px-6">
            <h2 class="section-title text-3xl font-bold text-center mb-4 fade-in">
                <span class="text-blue-500">/</span> Contacto
            </h2>
            <p class="text-gray-400 mb-8 text-center">
                ¿Tienes un proyecto en mente? ¿Necesitas ayuda con tu aplicación web? Envíame un mensaje y te respondo pronto.
            </p>
           <form id="contactForm" class="space-y-4">
    <div>
        <input type="text" name="name" placeholder="Tu nombre" required
            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100">
    </div>

    <div>
        <input type="email" name="email" placeholder="Tu correo electrónico" required
            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100">
    </div>

    <div>
        <textarea name="message" rows="5" placeholder="Describe tu proyecto..." required
            class="w-full px-4 py-3 bg-gray-800 border border-gray-700 rounded-lg text-gray-100"></textarea>
    </div>

    <button type="submit" class="w-full px-8 py-3 bg-blue-500 text-white rounded-lg">
        Enviar mensaje
    </button>
</form>
            <div class="flex justify-center gap-6 mt-8">
                <a href="https://linkedin.com/in/marcelo-rojas" target="_blank" class="social-icon text-gray-400 hover:text-white" aria-label="LinkedIn">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                <a href="mailto:marojas13@live.com.ar" class="social-icon text-gray-400 hover:text-white" aria-label="Email">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 border-t border-gray-800">
        <div class="max-w-7xl mx-auto px-6 text-center text-gray-500 text-sm">
            <p>&copy; {{ date('Y') }} Marcelo Rojas Solano. Todos los derechos reservados.</p>
            <p class="mt-2">Desarrollado con <span class="text-red-500">❤</span> y Laravel</p>
        </div>
    </footer>
</div>
</body>
</html>

<script>
document.getElementById("contactForm").addEventListener("submit", async function(e) {
    e.preventDefault();

    const formData = {
        name: this.name.value,
        email: this.email.value,
        message: this.message.value
    };

    try {
       const response = await fetch("/contact", {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
    },
    body: JSON.stringify(formData)
});

if (!response.ok) {
    throw new Error("Error HTTP: " + response.status);
}

const data = await response.json();

        alert("Mensaje enviado correctamente ✅");
        this.reset();

    } catch (error) {
        alert("Error al enviar ❌");
        console.error(error);
    }
});
</script>