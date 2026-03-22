<x-guest-layout>

    <style>
        /* *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; } */

        body { background: #f8f7f4; }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .pricing-header {
            text-align: center;
            padding: 72px 24px 52px;
            animation: fadeUp 0.6s ease forwards;
        }

        .logo-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 48px;
            background: #fff;
            border: 1px solid #e5e3de;
            border-radius: 100px;
            padding: 8px 20px;
        }
        .logo-pill .dot { width: 8px; height: 8px; border-radius: 50%; background: oklch(79.5% 0.184 86.047); }
        .logo-pill span { font-size: 13px; font-weight: 600; color: #0f172a; letter-spacing: 0.04em; }

        .pricing-h1 {
            font-family: 'Fraunces', serif;
            font-size: clamp(38px, 6vw, 62px);
            font-weight: 700;
            color: #0f172a;
            line-height: 1.1;
            max-width: 640px;
            margin: 0 auto 18px;
        }
        .pricing-h1 em { color: oklch(79.5% 0.184 86.047); font-style: italic; }

        .pricing-subtitle {
            font-size: 17px;
            color: #64748b;
            line-height: 1.65;
            max-width: 420px;
            margin: 0 auto 40px;
        }

        .toggle-wrap {
            display: inline-flex;
            background: #fff;
            border: 1px solid #e5e3de;
            border-radius: 12px;
            padding: 4px;
        }
        .toggle-btn {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 9px 20px;
            border-radius: 9px;
            border: none;
            background: transparent;
            color: #64748b;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        .toggle-btn.active { background: #0f172a; color: #fff; }
        .badge-descuento {
            font-size: 11px;
            background: #dcfce7;
            color: #16a34a;
            padding: 2px 7px;
            border-radius: 20px;
            font-weight: 600;
        }

        .cards-grid {
            display: flex;
            gap: 20px;
            justify-content: center;
            padding: 0 24px 80px;
            flex-wrap: wrap;
            align-items: flex-start;
        }

        .plan-card {
            width: 100%;
            max-width: 360px;
            border-radius: 24px;
            padding: 36px 32px;
            position: relative;
            overflow: hidden;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            animation: fadeUp 0.6s ease forwards;
            opacity: 0;
        }
        .plan-card:hover { transform: translateY(-4px); }

        .plan-card.plus {
            background: #fff;
            border: 2px solid #e5e3de;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            animation-delay: 0.2s;
        }
        .plan-card.plus.selected { border-color: oklch(79.5% 0.184 86.047); }

        .plan-card.pro {
            background: #0f172a;
            border: 2px solid #0f172a;
            box-shadow: 0 24px 60px rgba(15,23,42,0.18);
            animation-delay: 0.32s;
        }

        .pro-glow {
            position: absolute;
            top: -60px; right: -60px;
            width: 200px; height: 200px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(37,99,235,0.15) 0%, transparent 70%);
            pointer-events: none;
        }

        .plan-badge {
            display: inline-block;
            margin-bottom: 20px;
            background: linear-gradient(135deg, oklch(79.5% 0.184 86.047), #7c3aed);
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.08em;
            padding: 5px 14px;
            border-radius: 20px;
            text-transform: uppercase;
        }

        .plan-name-row { display: flex; align-items: center; gap: 10px; margin-bottom: 8px; }
        .plan-dot { width: 10px; height: 10px; border-radius: 50%; background: oklch(79.5% 0.184 86.047); }
        .plan-name { font-family: 'Fraunces', serif; font-size: 22px; font-weight: 600; }
        .plus .plan-name { color: #0f172a; }
        .pro  .plan-name { color: #f8f7f4; }

        .plan-desc { font-size: 14px; line-height: 1.5; margin-bottom: 28px; }
        .plus .plan-desc { color: #64748b; }
        .pro  .plan-desc { color: #94a3b8; }

        .price-wrap { margin-bottom: 32px; }
        .price-row { display: flex; align-items: baseline; gap: 4px; margin-bottom: 4px; }
        .price-currency { font-size: 15px; font-weight: 400; }
        .price-amount { font-family: 'Fraunces', serif; font-size: 52px; font-weight: 700; line-height: 1; }
        .price-period { font-size: 14px; }

        .plus .price-currency, .plus .price-period { color: #64748b; }
        .plus .price-amount { color: #0f172a; }
        .pro  .price-currency, .pro  .price-period { color: #94a3b8; }
        .pro  .price-amount { color: #f8f7f4; }

        .price-saving { font-size: 13px; color: #16a34a; font-weight: 500; min-height: 20px; }

        .cta-btn {
            width: 100%;
            padding: 15px;
            border-radius: 12px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            border: none;
            margin-bottom: 32px;
            transition: all 0.2s ease;
        }
        .cta-btn:hover  { filter: brightness(1.08); transform: translateY(-1px); }
        .cta-btn:active { transform: scale(0.98); }
        .plus.selected .cta-btn { box-shadow: 0 0 0 3px #94a3b8; }
        .pro.selected  .cta-btn { box-shadow: 0 0 0 3px #93c5fd; }

        .divider { height: 1px; margin-bottom: 24px; }
        .plus .divider { background: #f1f0ed; }
        .pro  .divider { background: rgba(255,255,255,0.08); }

        .features { list-style: none; display: flex; flex-direction: column; gap: 12px; }
        .features li { display: flex; gap: 10px; align-items: flex-start; }
        .feat-icon {
            width: 18px; height: 18px; border-radius: 50%; flex-shrink: 0;
            display: flex; align-items: center; justify-content: center;
            font-size: 10px; margin-top: 1px;
        }
        .plus .feat-icon { background: #dbeafe; color: #2563eb; }
        .pro  .feat-icon { background: rgba(37,99,235,0.2); color: #60a5fa; }
        .feat-inherited .feat-icon { background: transparent; }

        .feat-text { font-size: 14px; line-height: 1.5; }
        .plus .feat-text { color: #374151; }
        .pro  .feat-text { color: #cbd5e1; }
        .feat-inherited .feat-text { color: #94a3b8; font-style: italic; }

        .bottom-bar {
            display: none;
            position: fixed;
            bottom: 0; left: 0; right: 0;
            background: #fff;
            border-top: 1px solid #e5e3de;
            padding: 16px 24px;
            align-items: center;
            justify-content: center;
            gap: 16px;
            z-index: 100;
            box-shadow: 0 -8px 32px rgba(0,0,0,0.08);
            animation: fadeUp 0.3s ease;
        }
        .bottom-bar.visible { display: flex; }
        .bottom-bar span { font-size: 15px; color: #64748b; }
        .bottom-bar strong { color: #0f172a; }
        .pay-btn {
            background: oklch(79.5% 0.184 86.047); color: #fff; border: none;
            padding: 12px 28px; border-radius: 10px;
            font-size: 14px; font-weight: 600; cursor: pointer;
            transition: all 0.2s ease;
        }
        .pay-btn:hover { filter: brightness(1.08); transform: translateY(-1px); }

        .trust {
            display: flex;
            justify-content: center;
            gap: 32px;
            flex-wrap: wrap;
            padding: 0 24px 120px;
            text-align: center;
        }
        .trust span { font-size: 13px; color: #94a3b8; }
    </style>

    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,600;0,700;1,600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    {{-- ── HEADER ── --}}
    <header class="pricing-header">
        <div class="logo-pill">
            <div class="dot"></div>
            <span>MEXI PRO</span>
        </div>

        <h1 class="pricing-h1">
            Elige el plan<br>
            <em>perfecto para ti</em>
        </h1>

        <p class="pricing-subtitle">
            Sin contratos forzosos. Cancela cuando quieras.<br>
            Precio en pesos mexicanos.
        </p>

        {{-- <div class="toggle-wrap">
            <button class="toggle-btn active" id="btn-mensual" onclick="setBilling('monthly')">
                Mensual
            </button>
            <button class="toggle-btn" id="btn-anual" onclick="setBilling('annual')">
                Anual
                <span class="badge-descuento">-17%</span>
            </button>
        </div> --}}
    </header>

    {{-- ── CARDS ── --}}
    <div class="cards-grid">

        {{-- Plan Plus --}}
        <div class="plan-card plus" id="card-plus">
            <div class="plan-name-row">
                <div class="plan-dot"></div>
                <span class="plan-name">Plus</span>
            </div>
            <p class="plan-desc">Todo lo que necesitas para tus inversiones.</p>

            <div class="price-wrap">
                <div class="price-row">
                    <span class="price-currency">$</span>
                    <span class="price-amount" id="price-plus">499</span>
                    <span class="price-period">MXN/mes</span>
                </div>
                <p class="price-saving" id="saving-plus"></p>
            </div>

            <form id="postCart" action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="qty" value="1" >
                <input type="hidden" name="id" value="13018701">
                <input type="hidden" name="name" value="Membresía Plus">
                <input type="hidden" name="price" value="499">
                <input type="hidden" name="image" value="{{ asset('assets/plans/plus.png') }}">

                <button class="cta-btn bg-yellow-500/80" id="cta-plus" onclick="selectPlan('plus')">
                    Comenzar con Plus
                </button>
            </form>

            <div class="divider"></div>

            <ul class="features">
                <li><div class="feat-icon">✓</div><span class="feat-text">Acceso a todas las funciones básicas</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Generas puntos por tus compras</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Soporte por WhatsApp en máximo 24 hrs</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Promociones especiales</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Envío gratis a todo México</span></li>
                {{-- <li><div class="feat-icon">✓</div><span class="feat-text">Actualizaciones incluidas</span></li> --}}
            </ul>
        </div>

        {{-- Plan Pro --}}
        <div class="plan-card pro" id="card-pro">
            <div class="pro-glow"></div>
            <div class="plan-badge">Más popular</div>

            <div class="plan-name-row">
                <div class="plan-dot"></div>
                <span class="plan-name">Pro</span>
            </div>
            <p class="plan-desc">Para quienes buscan lo mejor.</p>

            <div class="price-wrap">
                <div class="price-row">
                    <span class="price-currency">$</span>
                    <span class="price-amount" id="price-pro">999</span>
                    <span class="price-period">MXN/mes</span>
                </div>
                <p class="price-saving" id="saving-pro"></p>
            </div>

            <form id="postCart" action="{{ route('cart.add') }}" method="POST">
                @csrf
                <input type="hidden" name="qty" value="1" >
                <input type="hidden" name="id" value="13018702">
                <input type="hidden" name="name" value="Membresía Pro">
                <input type="hidden" name="price" value="999">
                <input type="hidden" name="image" value="{{ asset('assets/plans/pro.png') }}">

                <button class="cta-btn bg-yellow-400" id="cta-pro" onclick="selectPlan('pro')">
                    Comenzar con Pro
                </button>
            </form>

            <div class="divider"></div>

            <ul class="features">
                <li class="feat-inherited"><div class="feat-icon"></div><span class="feat-text">Todo lo de Plus, y además:</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Puntos dobles por tus compras</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Soporte prioritario 24/7</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Promociones exclusivas</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Acceso anticipado a piezas raras/limitadas</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Shoutout de tu marca en nuestra página</span></li>
                <li><div class="feat-icon">✓</div><span class="feat-text">Acceso anticipado a nuevas publicaciones en libros y revistas al permanecer 3 meses consecutivos con el plan.</span></li>
                {{--<li><div class="feat-icon">✓</div><span class="feat-text">API access incluido</span></li> --}}
            </ul>
        </div>

    </div>

    {{-- ── TRUST BADGES ── --}}
    {{-- <div class="trust">
        <span>🔒 Pago 100% seguro</span>
        <span>🇲🇽 Precios en MXN</span>
        <span>↩️ Cancela cuando quieras</span>
    </div> --}}

    {{-- ── BARRA INFERIOR ── --}}
    <div class="bottom-bar" id="bottom-bar">
        <span id="bottom-text"></span>
        <button class="pay-btn">Continuar al pago →</button>
    </div>

    <script>
        const PRICES   = { plus: 499, pro: 999 };
        const DISCOUNT = 0.17;
        let billing      = 'monthly';
        let selectedPlan = null;

        function setBilling(type) {
            billing = type;
            document.getElementById('btn-mensual').classList.toggle('active', type === 'monthly');
            document.getElementById('btn-anual').classList.toggle('active',   type === 'annual');
            updatePrices();
        }

        function updatePrices() {
            ['plus', 'pro'].forEach(plan => {
                const base   = PRICES[plan];
                const final  = billing === 'annual' ? Math.round(base * (1 - DISCOUNT)) : base;
                const saving = base - final;
                document.getElementById('price-'  + plan).textContent = final.toLocaleString('es-MX');
                document.getElementById('saving-' + plan).textContent =
                    billing === 'annual' ? 'Ahorra $' + saving.toLocaleString('es-MX') + ' MXN al mes' : '';
            });
            if (selectedPlan) updateBottomBar();
        }

        function selectPlan(plan) {
            selectedPlan = plan;
            ['plus', 'pro'].forEach(p => {
                document.getElementById('card-' + p).classList.remove('selected');
                document.getElementById('cta-'  + p).textContent =
                    p === 'plus' ? 'Comenzar con Plus' : 'Comenzar con Pro';
            });
            document.getElementById('card-' + plan).classList.add('selected');
            document.getElementById('cta-'  + plan).textContent = '✓ Plan seleccionado';
            updateBottomBar();
            document.getElementById('bottom-bar').classList.add('visible');
        }

        function updateBottomBar() {
            const names  = { plus: 'Plus', pro: 'Pro' };
            const base   = PRICES[selectedPlan];
            const final  = billing === 'annual' ? Math.round(base * (1 - DISCOUNT)) : base;
            const period = billing === 'annual' ? 'mes (anual)' : 'mes';
            document.getElementById('bottom-text').innerHTML =
                'Plan <strong>' + names[selectedPlan] + '</strong> — ' +
                '<strong>$' + final.toLocaleString('es-MX') + ' MXN/' + period + '</strong>';
        }
    </script>

</x-guest-layout>