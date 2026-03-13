lucide.createIcons();

  // Mobile menu toggle
  const mobileToggle = document.getElementById('mobile-toggle');
  const mobileMenu = document.getElementById('mobile-menu');
  mobileToggle.addEventListener('click', () => {
    mobileMenu.classList.toggle('open');
  });

  // Close mobile menu on link click
  mobileMenu.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => mobileMenu.classList.remove('open'));
  });

  // FAQ accordion
  document.querySelectorAll('.faq-question').forEach((btn, idx) => {
    btn.addEventListener('click', () => {
      const answer = btn.nextElementSibling;
      const chevron = btn.querySelector('.faq-chevron');
      const isOpen = answer.classList.contains('open');
      // Close all
      document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
      document.querySelectorAll('.faq-chevron').forEach(c => c.classList.remove('open'));
      if (!isOpen) {
        answer.classList.add('open');
        chevron.classList.add('open');
      }
    });
  });

  // Scroll animations
  const fadeEls = document.querySelectorAll('.fade-up');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('visible');
        observer.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  fadeEls.forEach(el => observer.observe(el));

  // Element SDK
  const defaultConfig = {
    hero_title: "The Smarter POS for Modern Business",
    hero_subtitle: "Sell faster, manage smarter. WebPOS brings real-time sales tracking, inventory control, and powerful analytics to your browser — no installation needed.",
    cta_button_text: "Start Free Trial",
    pricing_title: "Simple, Transparent Pricing",
    footer_tagline: "Join 500+ businesses across Sri Lanka already using WebPOS to sell smarter every day.",
    primary_color: "#0047FF",
    background_color: "#0D0D0D",
    surface_color: "#FFFFFF",
    text_color: "#0D0D0D",
    secondary_color: "#F4F4F0",
    font_family: "DM Sans",
    font_size: 15
  };

  window.elementSdk.init({
    defaultConfig,
    onConfigChange: async (config) => {
      // Text updates
      const heroTitle = document.getElementById('hero-title-el');
      if (heroTitle) heroTitle.textContent = config.hero_title || defaultConfig.hero_title;

      const heroSubtitle = document.getElementById('hero-subtitle-el');
      if (heroSubtitle) heroSubtitle.textContent = config.hero_subtitle || defaultConfig.hero_subtitle;

      const ctaText = config.cta_button_text || defaultConfig.cta_button_text;
      ['hero-cta-btn', 'nav-cta-btn', 'final-cta-btn'].forEach(id => {
        const el = document.getElementById(id);
        if (el && id !== 'final-cta-btn') el.textContent = ctaText;
        if (el && id === 'final-cta-btn') el.textContent = ctaText + ' — 14 Days Free';
      });

      const pricingTitle = document.getElementById('pricing-title-el');
      if (pricingTitle) pricingTitle.textContent = config.pricing_title || defaultConfig.pricing_title;

      const footerTagline = document.getElementById('footer-tagline-el');
      if (footerTagline) footerTagline.textContent = config.footer_tagline || defaultConfig.footer_tagline;

      // Color updates
      const accent = config.primary_color || defaultConfig.primary_color;
      const bg = config.background_color || defaultConfig.background_color;
      const surface = config.surface_color || defaultConfig.surface_color;
      const textColor = config.text_color || defaultConfig.text_color;
      const muted = config.secondary_color || defaultConfig.secondary_color;

      document.documentElement.style.setProperty('--accent', accent);
      document.documentElement.style.setProperty('--ink', bg);
      document.documentElement.style.setProperty('--surface', surface);
      document.documentElement.style.setProperty('--muted', muted);

      // Font updates
      const font = config.font_family || defaultConfig.font_family;
      const size = config.font_size || defaultConfig.font_size;
      document.body.style.fontFamily = `'${font}', sans-serif`;
      document.body.style.fontSize = `${size}px`;
      document.querySelectorAll('h1,h2,h3,h4').forEach(h => {
        h.style.fontFamily = `'${font}', 'Syne', sans-serif`;
      });
    },
    mapToCapabilities: (config) => ({
      recolorables: [
        {
          get: () => config.background_color || defaultConfig.background_color,
          set: (v) => { config.background_color = v; window.elementSdk.setConfig({ background_color: v }); }
        },
        {
          get: () => config.surface_color || defaultConfig.surface_color,
          set: (v) => { config.surface_color = v; window.elementSdk.setConfig({ surface_color: v }); }
        },
        {
          get: () => config.text_color || defaultConfig.text_color,
          set: (v) => { config.text_color = v; window.elementSdk.setConfig({ text_color: v }); }
        },
        {
          get: () => config.primary_color || defaultConfig.primary_color,
          set: (v) => { config.primary_color = v; window.elementSdk.setConfig({ primary_color: v }); }
        },
        {
          get: () => config.secondary_color || defaultConfig.secondary_color,
          set: (v) => { config.secondary_color = v; window.elementSdk.setConfig({ secondary_color: v }); }
        }
      ],
      borderables: [],
      fontEditable: {
        get: () => config.font_family || defaultConfig.font_family,
        set: (v) => { config.font_family = v; window.elementSdk.setConfig({ font_family: v }); }
      },
      fontSizeable: {
        get: () => config.font_size || defaultConfig.font_size,
        set: (v) => { config.font_size = v; window.elementSdk.setConfig({ font_size: v }); }
      }
    }),
    mapToEditPanelValues: (config) => new Map([
      ["hero_title", config.hero_title || defaultConfig.hero_title],
      ["hero_subtitle", config.hero_subtitle || defaultConfig.hero_subtitle],
      ["cta_button_text", config.cta_button_text || defaultConfig.cta_button_text],
      ["pricing_title", config.pricing_title || defaultConfig.pricing_title],
      ["footer_tagline", config.footer_tagline || defaultConfig.footer_tagline]
    ])
  });

  function openModal(type) {
    const modal = document.getElementById('modal');
    const title = document.getElementById('modal-title');
    const content = document.getElementById('modal-content');

    if(type === 'privacy') {
      title.innerText = 'Privacy Policy';
      content.innerHTML = `
        <p>Your privacy is important to us. We collect minimal information needed to operate the system. Data will not be shared with third parties without your consent. By using our services, you agree to our data collection and usage policy.</p>
      `;
    } else if(type === 'terms') {
      title.innerText = 'Terms of Service';
      content.innerHTML = `
        <p>By using this service, you agree to our terms including responsible usage, payment policies, and service limitations. We reserve the right to modify terms at any time. Continued use of the system constitutes acceptance of the terms.</p>
      `;
    }

    modal.style.display = 'flex';
  }

  function closeModal() {
    document.getElementById('modal').style.display = 'none';
  }

  // Close modal when clicking outside
  window.onclick = function(e) {
    const modal = document.getElementById('modal');
    if(e.target === modal) closeModal();
  }