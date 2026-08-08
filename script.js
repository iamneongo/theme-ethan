document.addEventListener("DOMContentLoaded", () => {
  // 1. Mobile Menu
  const menuBtn = document.querySelector('[data-open-menu]');
  const closeBtn = document.querySelector('[data-close-menu]');
  const sideMenu = document.querySelector('[data-side-menu]');
  const overlay = document.querySelector('[data-menu-overlay]');
  
  const toggleMenu = (forceClose = false) => {
    if (!sideMenu || !overlay) return;
    const isOpening = !forceClose && !sideMenu.classList.contains('open');
    
    if (isOpening) {
      sideMenu.classList.add('open');
      overlay.classList.add('open');
      document.body.style.overflow = 'hidden';
    } else {
      sideMenu.classList.remove('open');
      overlay.classList.remove('open');
      document.body.style.overflow = '';
    }
  };

  if(menuBtn) menuBtn.addEventListener('click', () => toggleMenu(false));
  if(closeBtn) closeBtn.addEventListener('click', () => toggleMenu(true));
  if(overlay) overlay.addEventListener('click', () => toggleMenu(true));

  // 2. Reveal animations
  const reveals = document.querySelectorAll('.reveal');
  const revealObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if(entry.isIntersecting) {
        entry.target.classList.add('active');
        revealObserver.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  reveals.forEach(r => revealObserver.observe(r));

  // 3. Parallax
  const parallaxImg = document.querySelector('[data-parallax-image]');
  const parallaxCopy = document.querySelector('[data-parallax-copy]');
  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    if(parallaxImg) parallaxImg.style.transform = `translateY(${scrollY * 0.2}px)`;
    if(parallaxCopy) parallaxCopy.style.transform = `translateY(${scrollY * 0.1}px)`;
  });

  // 4. Forms
  const forms = document.querySelectorAll('[data-static-form]');
  forms.forEach(form => {
    form.addEventListener('submit', e => {
      e.preventDefault();
      const successMsg = form.querySelector('.form-success');
      if(successMsg) successMsg.removeAttribute('hidden');
      form.reset();
    });
  });

  // 5. Sales track carousels
  const tracks = document.querySelectorAll('[data-sales-track], [data-flickity-carousel]');
  tracks.forEach(track => {
    if (typeof Flickity !== 'undefined') {
      const flkty = new Flickity(track, {
        cellAlign: 'left',
        contain: true,
        prevNextButtons: false,
        pageDots: false,
        groupCells: '80%'
      });
      
      const container = track.closest('.container') || track.parentElement;
      const prevBtn = container.querySelector('[data-scroll-sales="-1"], .flkty-btn-prev');
      const nextBtn = container.querySelector('[data-scroll-sales="1"], .flkty-btn-next');
      
      if (prevBtn) prevBtn.addEventListener('click', () => flkty.previous());
      if (nextBtn) nextBtn.addEventListener('click', () => flkty.next());

      flkty.on('staticClick', (event, pointer, cellElement) => {
        if (!cellElement) return;
        const article = cellElement.matches('article[data-href]')
          ? cellElement
          : cellElement.querySelector('article[data-href]');
        if (article) window.location.href = article.dataset.href;
      });
    }
  });

  // 5b. Video carousel (mobile) — dùng Flickity như sales-track để kéo MƯỢT (có quán tính),
  //     không nút chuyển slide. watchCSS: chỉ bật khi CSS khai báo (mobile, xem styles.css).
  document.querySelectorAll('.vcm-track').forEach(track => {
    if (typeof Flickity === 'undefined') return;
    new Flickity(track, {
      cellSelector: '.vcm-card',
      cellAlign: 'left',
      contain: true,
      prevNextButtons: false,
      pageDots: false,
      dragThreshold: 6,
      watchCSS: true
    });
  });

  // 6. Nav property search
  const navSearchToggle = document.querySelector('[data-nav-search-toggle]');
  const navSearchPanel  = document.querySelector('.nav-search-panel');
  const navSearchInput  = document.querySelector('.nav-search-input');
  const navSearchResults = document.querySelector('.nav-search-results');

  if (navSearchToggle && navSearchPanel) {
    const openSearch = () => {
      navSearchPanel.setAttribute('aria-hidden', 'false');
      navSearchToggle.setAttribute('aria-expanded', 'true');
      navSearchInput.focus();
    };
    const closeSearch = () => {
      navSearchPanel.setAttribute('aria-hidden', 'true');
      navSearchToggle.setAttribute('aria-expanded', 'false');
    };

    navSearchToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      navSearchPanel.getAttribute('aria-hidden') === 'false' ? closeSearch() : openSearch();
    });

    document.addEventListener('click', (e) => {
      if (!navSearchToggle.closest('.nav-search-wrap').contains(e.target)) closeSearch();
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') closeSearch();
    });

    navSearchInput.addEventListener('input', () => {
      const q = navSearchInput.value.trim().toLowerCase();
      if (!q || !window.ethanProperties || window.ethanProperties.length === 0) {
        navSearchResults.innerHTML = '';
        return;
      }
      const matches = window.ethanProperties.filter(p =>
        (p.address + ' ' + p.city).toLowerCase().includes(q)
      ).slice(0, 7);

      if (matches.length === 0) {
        navSearchResults.innerHTML = '<p class="nav-search-empty">Không tìm thấy kết quả</p>';
        return;
      }
      navSearchResults.innerHTML = matches.map(p => {
        const isSale = p.status === 'for sale';
        const label  = isSale ? (p.price || 'Đang bán') : 'Đã bán';
        const tag    = isSale ? 'sale' : 'sold';
        return `<a href="${p.url}" class="nav-search-item">
          <img src="${p.image}" alt="" loading="lazy" />
          <div><strong>${p.address}</strong><span>${p.city}</span></div>
          <em class="${tag}">${label}</em>
        </a>`;
      }).join('');
    });
  }

  // 6b. Property tabs (Search/Hero)
  const searchTabs = document.querySelectorAll('.search-tabs button');
  searchTabs.forEach(btn => {
    btn.addEventListener('click', () => {
      searchTabs.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
    });
  });

  // 7. Property filters (Browse properties)
  const propFilters = document.querySelectorAll('[data-property-filter]');
  const propItems = document.querySelectorAll('.property-list article');
  const propSearch = document.querySelector('[data-property-search]');
  
  function filterProperties() {
    const activeFilter = document.querySelector('[data-property-filter].active')?.getAttribute('data-property-filter') || 'all';
    const query = propSearch ? propSearch.value.trim().toLowerCase() : '';
    propItems.forEach(item => {
      const status = item.getAttribute('data-status') || '';
      const city = item.getAttribute('data-city') || '';
      const text = (item.textContent + ' ' + city).toLowerCase();
      const matchStatus = activeFilter === 'all' || status === activeFilter;
      const matchQuery = query === '' || text.includes(query);
      const show = matchStatus && matchQuery;
      // Target the parent <a> card so the grid collapses properly
      const card = item.closest('a') || item;
      card.style.setProperty('display', show ? '' : 'none', 'important');
    });
  }

  if(propFilters.length) {
    propFilters.forEach(btn => {
      btn.addEventListener('click', () => {
        propFilters.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        filterProperties();
      });
    });
  }
  if(propSearch) {
    propSearch.addEventListener('input', filterProperties);
  }

  // 8. Map
  const mapEl = document.getElementById('ethan-profile-map');
  if(mapEl && typeof L !== 'undefined') {
    const map = L.map('ethan-profile-map', {
      zoomControl: true,
      scrollWheelZoom: false
    }).setView([32.820, -96.860], 8);

    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; OpenStreetMap &copy; CARTO',
      subdomains: 'abcd',
      maxZoom: 19
    }).addTo(map);

    const locations = [
      { coords: [33.166350, -96.684352], status: 'sale',  title: '3508 Almond Ln',          city: 'McKinney, TX 75070',      price: '$474,900' },
      { coords: [32.224000, -98.202000], status: 'sale',  title: 'LOT 156 Bison Ridge Dr',   city: 'Stephenville, TX 76401',  price: '$99,000'  },
      { coords: [32.913000, -96.639000], status: 'sold',  title: '2610 Dodson St',            city: 'Garland, TX 75042',       price: 'Đã bán'   },
      { coords: [32.975446, -96.583163], status: 'sold',  title: '5816 Mandarin Ln',          city: 'Sachse, TX 75048',        price: 'Đã bán'   },
      { coords: [32.664928, -97.078593], status: 'sold',  title: '1729 Duster Cir',           city: 'Arlington, TX 76018',     price: 'Đã bán'   },
      { coords: [33.001064, -96.448097], status: 'sold',  title: '697 Poppy Ln',              city: 'Lavon, TX 75166',         price: 'Đã bán'   },
      { coords: [33.210000, -96.608000], status: 'sold',  title: '604 Tidal Dr',              city: 'McKinney, TX 75071',      price: 'Đã bán'   },
      { coords: [32.880000, -96.608000], status: 'sold',  title: '7013 Birdwatch Dr',         city: 'Garland, TX 75043',       price: 'Đã bán'   },
      { coords: [32.491918, -96.936630], status: 'sold',  title: '4438 Verbena St',           city: 'Midlothian, TX 76065',    price: 'Đã bán'   },
      { coords: [33.003980, -96.452196], status: 'sold',  title: '815 Sunflower Rd',          city: 'Lavon, TX 75166',         price: 'Đã bán'   },
      { coords: [32.810991, -96.676071], status: 'sold',  title: '2325 Park Vista Dr',        city: 'Dallas, TX 75228',        price: 'Đã bán'   },
      { coords: [32.954006, -96.675050], status: 'sold',  title: '3101 Gayle Dr',             city: 'Garland, TX 75044',       price: 'Đã bán'   },
      { coords: [33.006645, -96.838832], status: 'sold',  title: '4247 Millview Ln',          city: 'Dallas, TX 75287',        price: 'Đã bán'   },
      { coords: [32.953017, -96.670338], status: 'sold',  title: '2814 Esquire Ln',           city: 'Garland, TX 75044',       price: 'Đã bán'   },
      { coords: [33.007834, -96.442699], status: 'sold',  title: '569 Sierra Rdg',            city: 'Lavon, TX 75166',         price: 'Đã bán'   },
      { coords: [33.009000, -96.447000], status: 'sold',  title: '463 Yellowstar Ln',         city: 'Lavon, TX 75166',         price: 'Đã bán'   },
      { coords: [32.880185, -96.614438], status: 'sold',  title: '3001 Jeremes Lndg',         city: 'Garland, TX 75043',       price: 'Đã bán'   },
      { coords: [32.879095, -96.754503], status: 'sold',  title: '7510 Holly Hill Dr',        city: 'Dallas, TX 75231',        price: 'Đã bán'   },
      { coords: [32.308000, -95.481000], status: 'sold',  title: '23010 McFadden Ln',         city: 'Chandler, TX 75758',      price: 'Đã bán'   },
      { coords: [32.942231, -96.609424], status: 'sold',  title: '1715 Lordsburg Dr',         city: 'Garland, TX 75040',       price: 'Đã bán'   },
      { coords: [32.699235, -97.129711], status: 'sold',  title: '1306 Ashbury Dr',           city: 'Arlington, TX 76015',     price: 'Đã bán'   },
      { coords: [32.632516, -97.106133], status: 'sold',  title: '6926 Snowy Owl St',         city: 'Arlington, TX 76002',     price: 'Đã bán'   },
      { coords: [32.910215, -96.523714], status: 'sold',  title: '8006 Luna Dr',              city: 'Rowlett, TX 75088',       price: 'Đã bán'   },
      { coords: [32.948493, -96.681326], status: 'sold',  title: '3525 Rockcrest Dr',         city: 'Garland, TX 75044',       price: 'Đã bán'   },
      { coords: [32.965889, -96.580599], status: 'sold',  title: '4635 Jackson Meadows Dr',   city: 'Sachse, TX 75048',        price: 'Đã bán'   },
      { coords: [32.934354, -96.676355], status: 'sold',  title: '2202 Moss Trl',             city: 'Garland, TX 75044',       price: 'Đã bán'   },
      { coords: [32.971797, -96.870068], status: 'sold',  title: '2522 Melissa Ln',           city: 'Carrollton, TX 75006',    price: 'Đã bán'   },
      { coords: [32.941199, -96.603205], status: 'sold',  title: '2810 Deer Creek Ct',        city: 'Garland, TX 75040',       price: 'Đã bán'   },
      { coords: [32.615076, -97.360138], status: 'sold',  title: '2541 Prospect Hill Dr',     city: 'Fort Worth, TX 76123',    price: 'Đã bán'   },
      { coords: [32.995792, -96.869569], status: 'sold',  title: '2613 Silverthorne Dr',      city: 'Dallas, TX 75287',        price: 'Đã bán'   },
      { coords: [32.957943, -96.681044], status: 'sold',  title: '3413 Janwood Ln',           city: 'Garland, TX 75044',       price: 'Đã bán'   },
      { coords: [32.867898, -97.272188], status: 'sold',  title: '7001 Deer Run Dr',          city: 'Watauga, TX 76137',       price: 'Đã bán'   },
      { coords: [32.596730, -97.084540], status: 'sold',  title: '9214 Wild River Dr',        city: 'Arlington, TX 76002',     price: 'Đã bán'   },
      { coords: [32.658883, -97.022646], status: 'sold',  title: '4687 Sarum Ct',             city: 'Grand Prairie, TX 75052', price: 'Đã bán'   },
      { coords: [32.912328, -96.684620], status: 'sold',  title: '3606 Norma Dr',             city: 'Garland, TX 75042',       price: 'Đã bán'   },
      { coords: [32.901618, -96.939118], status: 'sold',  title: '6826 Deseo',                city: 'Irving, TX 75039',        price: 'Đã bán'   },
      { coords: [32.609146, -97.115948], status: 'sold',  title: '115 Fort Edward Dr',        city: 'Arlington, TX 76002',     price: 'Đã bán'   },
      { coords: [32.656000, -97.021000], status: 'sold',  title: '5820 Tory Dr',              city: 'Grand Prairie, TX 75052', price: 'Đã bán'   },
      { coords: [32.653988, -96.897358], status: 'sold',  title: '618 Flamingo Way',          city: 'Duncanville, TX 75116',   price: 'Đã bán'   }
    ];

    const markers = locations.map(loc => {
      const isSale = loc.status === 'sale';
      const icon = L.divIcon({
        className: `custom-map-pin pin-${loc.status}`,
        html: `<span class="pin-dot-only ${loc.status}"></span>`,
        iconSize: [14, 14],
        iconAnchor: [7, 7]
      });

      const marker = L.marker(loc.coords, { icon }).addTo(map);
      marker.bindPopup(`
        <div class="map-popup-card">
          <span class="popup-tag ${loc.status}">${isSale ? 'Đang bán' : 'Đã bán'}</span>
          <strong>${loc.title}</strong>
          <small>${loc.city}</small>
          ${isSale ? `<div class="popup-price">${loc.price}</div>` : ''}
        </div>
      `);
      marker.status = loc.status;
      return marker;
    });

    const mapFilters = document.querySelectorAll('[data-profile-map-filter]');
    mapFilters.forEach(btn => {
      btn.addEventListener('click', () => {
        mapFilters.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.getAttribute('data-profile-map-filter');
        markers.forEach(marker => {
          if(filter === 'all' || marker.status === filter) {
            if(!map.hasLayer(marker)) map.addLayer(marker);
          } else {
            if(map.hasLayer(marker)) map.removeLayer(marker);
          }
        });
      });
    });

    // Re-render map tiles when viewport size changes (e.g. device rotation or DevTools responsive mode)
    var resizeTimer;
    window.addEventListener('resize', function() {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function() { map.invalidateSize(); }, 200);
    });
  }

  // 7. Animated Counters for Stats Section
  const statElements = document.querySelectorAll('.stats-grid strong');
  if(statElements.length > 0) {
    const animateCounter = (el) => {
      const originalText = el.textContent.trim();
      const prefixMatch = originalText.match(/^[^\d]+/);
      const suffixMatch = originalText.match(/[^\d]+$/);
      const prefix = prefixMatch ? prefixMatch[0] : '';
      const suffix = suffixMatch ? suffixMatch[0] : '';
      const numMatch = originalText.match(/\d+/);
      if(!numMatch) return;
      const targetNum = parseInt(numMatch[0], 10);
      const duration = 1600;
      const startTime = performance.now();

      const updateCount = (currentTime) => {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easeProgress = 1 - Math.pow(1 - progress, 4);
        const currentNum = Math.floor(easeProgress * targetNum);
        el.textContent = `${prefix}${currentNum}${suffix}`;
        if(progress < 1) {
          requestAnimationFrame(updateCount);
        } else {
          el.textContent = originalText;
        }
      };
      requestAnimationFrame(updateCount);
    };

    const statsObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if(entry.isIntersecting) {
          const strongs = entry.target.querySelectorAll('strong');
          strongs.forEach(s => animateCounter(s));
          statsObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.2 });

    const statsSection = document.querySelector('.stats');
    if(statsSection) statsObserver.observe(statsSection);
  }
  // FAQ Accordion
  document.querySelectorAll('.faq-q').forEach(q => {
    q.addEventListener('click', () => {
      const item = q.parentElement;
      const isOpen = item.classList.contains('is-open');
      // Close all siblings
      item.closest('.faq-list').querySelectorAll('.faq-item.is-open').forEach(i => i.classList.remove('is-open'));
      // Toggle clicked
      if (!isOpen) item.classList.add('is-open');
    });
  });

  // Custom Select
  const customSelects = document.querySelectorAll('[data-custom-select]');
  customSelects.forEach(select => {
    const trigger = select.querySelector('[data-select-trigger]');
    const options = select.querySelectorAll('[data-select-options] div');
    const input = select.querySelector('input[type="hidden"]');
    
    trigger.addEventListener('click', (e) => {
      e.stopPropagation();
      const isOpen = select.classList.contains('is-open');
      document.querySelectorAll('[data-custom-select].is-open').forEach(s => s.classList.remove('is-open'));
      if(!isOpen) select.classList.add('is-open');
    });
    
    options.forEach(opt => {
      opt.addEventListener('click', (e) => {
        e.stopPropagation();
        trigger.innerHTML = opt.innerHTML + ' <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4.5l3 3 3-3"/></svg>';
        trigger.classList.add('has-value');
        input.value = opt.getAttribute('data-value');
        select.classList.remove('is-open');
      });
    });
  });

  document.addEventListener('click', () => {
    document.querySelectorAll('[data-custom-select].is-open').forEach(s => s.classList.remove('is-open'));
  });

  // Testimonial mini — infinite marquee on mobile, no library
  (function initTestimonialMarquee() {
    if (window.innerWidth > 767) return;
    document.querySelectorAll('.testimonial-mini').forEach(function(mini) {
      var cards = Array.prototype.slice.call(mini.querySelectorAll('article'));
      if (!cards.length) return;

      var track = document.createElement('div');
      track.className = 'tst-marquee';

      // Original set
      cards.forEach(function(c) { track.appendChild(c); });
      // Cloned set — makes -50% loop seamless
      cards.forEach(function(c) { track.appendChild(c.cloneNode(true)); });

      mini.classList.add('tst-marquee-wrap');
      mini.appendChild(track);

      // Pause while finger is down
      mini.addEventListener('touchstart', function() {
        track.classList.add('is-paused');
      }, { passive: true });
      mini.addEventListener('touchend', function() {
        track.classList.remove('is-paused');
      }, { passive: true });
      mini.addEventListener('touchcancel', function() {
        track.classList.remove('is-paused');
      }, { passive: true });
    });
  })();

  // Platforms marquee on mobile
  if (window.innerWidth <= 767) {
    const platformsSection = document.querySelector('.platforms');
    if (platformsSection) {
      const links = [...platformsSection.querySelectorAll('a')];
      if (links.length) {
        const wrap = document.createElement('div');
        wrap.className = 'platforms-marquee-wrap';
        const track = document.createElement('div');
        track.className = 'platforms-marquee-track';
        [...links, ...links.map(l => l.cloneNode(true))].forEach(l => track.appendChild(l));
        wrap.appendChild(track);
        links.forEach(l => l.remove());
        platformsSection.appendChild(wrap);
      }
    }
  }
});

