{{-- ── Sección CTA Suscripciones ── --}}
{{-- Pega este bloque donde quieras dentro de tu index --}}

<style>
    .cta-section {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 16px;
        padding: 32px 12px;
        text-align: center;
    }

    .cta-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #fdff7e17;
        border: 1px solid oklch(79.5% 0.184 86.047);
        border-radius: 100px;
        padding: 6px 16px;
        font-size: 16px;
        font-weight: 600;
        color: oklch(79.5% 0.184 86.047);
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }
    .cta-eyebrow::before {
        content: '';
        width: 6px; height: 6px;
        border-radius: 50%;
        background: oklch(79.5% 0.184 86.047);
        animation: pulse-dot 1.8s ease-in-out infinite;
    }
    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50%       { opacity: 0.4; transform: scale(0.7); }
    }

    .cta-title {
        font-family: 'Fraunces', serif;
        font-size: clamp(38px, 4vw, 42px);
        font-weight: 700;
        color: #0f172a;
        line-height: 1.15;
        max-width: 520px;
        margin: 0;
    }
    .cta-title em { color: oklch(79.5% 0.184 86.047); font-style: italic; }

    .cta-subtitle {
        font-size: 20px;
        color: #64748b;
        line-height: 1.6;
        max-width: 500px;
        margin: 0;
    }

    .cta-buttons {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        justify-content: center;
        margin-top: 8px;
    }

    .btn-primary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #0f172a;
        color: #fff;
        border: none;
        padding: 14px 28px;
        border-radius: 12px;
        font-size: 17px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
        box-shadow: 0 4px 16px rgba(15,23,42,0.18);
    }
    .btn-primary:hover {
        background: #1e293b;
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(15,23,42,0.22);
    }
    .btn-primary:active { transform: scale(0.98); }

    .btn-secondary {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #fff;
        color: #0f172a;
        border: 1.5px solid #e2e8f0;
        padding: 14px 28px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .btn-secondary:hover {
        border-color: oklch(79.5% 0.184 86.047);
        color: oklch(79.5% 0.184 86.047);
        transform: translateY(-2px);
        box-shadow: 0 4px 16px rgba(37,99,235,0.1);
    }
    .btn-secondary:active { transform: scale(0.98); }

    .btn-ghost {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: transparent;
        color: oklch(79.5% 0.184 86.047);
        border: none;
        padding: 12px 20px;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .btn-ghost:hover {
        background: #eff6ff;
        gap: 10px;
    }

    .cta-social-proof {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 13px;
        color: #94a3b8;
        margin-top: 4px;
    }
    .avatars {
        display: flex;
    }
    .avatars span {
        width: 28px; height: 28px;
        border-radius: 50%;
        border: 2px solid #fff;
        display: flex; align-items: center; justify-content: center;
        font-size: 11px; font-weight: 600; color: #fff;
        margin-left: -8px;
    }
    .avatars span:first-child { margin-left: 0; }
</style>

<link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,700;1,700&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

<section class="cta-section">

    <div class="cta-eyebrow">Planes disponibles</div>

    <h2 class="cta-title">
        Lleva tu experiencia<br>
        al <em>siguiente nivel</em>
    </h2>

    <p class="cta-subtitle">
        Accede a funciones avanzadas desde $499 MXN/mes.<br>
        Sin contratos, cancela cuando quieras.
    </p>

    <div class="cta-buttons">
        {{-- Botón principal --}}
        <a href="{{ route('subs') }}" class="btn-primary">
            Ver planes y precios
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
        </a>

        {{-- Botón secundario (opcional: enlace a sección de features) --}}
        {{-- <a href="#features" class="btn-secondary">
            <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/></svg>
            ¿Qué incluye cada plan?
        </a> --}}
    </div>

    {{-- Enlace ghost opcional --}}
    {{-- <a href="{{ route('subs') }}" class="btn-ghost">
        Comparar planes
        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
    </a> --}}

    {{-- Social proof (personaliza los colores y número) --}}
    {{-- <div class="cta-social-proof">
        <div class="avatars">
            <span style="background:#2563eb;">A</span>
            <span style="background:#7c3aed;">B</span>
            <span style="background:#0891b2;">C</span>
            <span style="background:#059669;">D</span>
        </div>
        <span>+200 usuarios ya tienen su plan activo</span>
    </div> --}}

</section>