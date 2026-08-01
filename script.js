document.addEventListener("DOMContentLoaded", () => {
  // 1. Mobile Menu
  const menuBtn = document.querySelector('[data-open-menu]');
  const navbar = document.querySelector('[data-navbar]');
  const overlay = document.querySelector('[data-menu-overlay]');
  if(menuBtn && navbar) {
    menuBtn.addEventListener('click', () => {
      const isOpen = navbar.classList.toggle('menu-open');
      document.body.style.overflow = isOpen ? 'hidden' : '';
      if(overlay) overlay.style.display = isOpen ? 'block' : 'none';
    });
    if(overlay) overlay.addEventListener('click', () => {
      navbar.classList.remove('menu-open');
      document.body.style.overflow = '';
      overlay.style.display = 'none';
    });
  }

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
  const tracks = document.querySelectorAll('[data-sales-track]');
  tracks.forEach(track => {
    const container = track.closest('.container') || track.parentElement;
    const scrollBtns = container ? container.querySelectorAll('[data-scroll-sales]') : [];
    const gap = parseInt(window.getComputedStyle(track).gap) || 18;

    if (scrollBtns) {
      scrollBtns.forEach(btn => {
        btn.addEventListener('click', () => {
          const dir = parseInt(btn.getAttribute('data-scroll-sales'));
          const firstArticle = track.querySelector('article');
          const scrollAmount = firstArticle ? firstArticle.offsetWidth + gap : 320;
          track.scrollBy({ left: dir * scrollAmount, behavior: 'smooth' });
        });
      });
    }

    // Mouse Drag to Scroll
    let isDown = false;
    let startX;
    let scrollLeft;

    track.addEventListener('mousedown', (e) => {
      isDown = true;
      track.classList.add('active');
      startX = e.pageX - track.offsetLeft;
      scrollLeft = track.scrollLeft;
    });

    track.addEventListener('mouseleave', () => {
      isDown = false;
      track.classList.remove('active');
    });

    track.addEventListener('mouseup', () => {
      isDown = false;
      track.classList.remove('active');
    });

    track.addEventListener('mousemove', (e) => {
      if(!isDown) return;
      e.preventDefault();
      const x = e.pageX - track.offsetLeft;
      const walk = (x - startX) * 2;
      track.scrollLeft = scrollLeft - walk;
    });
  });

  // 6. Property tabs (Search/Hero)
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
    const query = propSearch ? propSearch.value.toLowerCase() : '';
    propItems.forEach(item => {
      const status = item.getAttribute('data-status');
      const text = item.textContent.toLowerCase();
      const matchStatus = activeFilter === 'all' || status === activeFilter;
      const matchQuery = text.includes(query);
      item.style.display = matchStatus && matchQuery ? '' : 'none';
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
    }).setView([32.9000, -96.7970], 9);

    L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
      attribution: '&copy; OpenStreetMap &copy; CARTO',
      subdomains: 'abcd',
      maxZoom: 19
    }).addTo(map);

    const locations = [
      { coords: [33.1976, -96.6154], status: 'sale', title: '3508 Almond Ln', city: 'McKinney, TX 75070', price: '$495,000' },
      { coords: [32.9126, -96.6389], status: 'sold', title: '2610 Dodson St', city: 'Garland, TX 75042', price: 'Đã bán' },
      { coords: [32.9771, -96.5906], status: 'sold', title: '5816 Mandarin Ln', city: 'Sachse, TX 75048', price: 'Đã bán' },
      { coords: [32.6565, -97.1089], status: 'sold', title: '1729 Duster Cir', city: 'Arlington, TX 76018', price: 'Đã bán' },
      { coords: [33.0298, -96.4355], status: 'sold', title: '697 Poppy Ln', city: 'Lavon, TX 75166', price: 'Đã bán' },
      { coords: [33.2084, -96.6146], status: 'sold', title: '604 Tidal Dr', city: 'McKinney, TX 75071', price: 'Đã bán' },
      { coords: [32.2207, -98.2023], status: 'sale', title: 'LOT 156 Bison Ridge Dr', city: 'Stephenville, TX 76401', price: '$99,000' }
    ];

    const markers = locations.map(loc => {
      const isSale = loc.status === 'sale';
      const icon = L.divIcon({
        className: `custom-map-pin pin-${loc.status}`,
        html: `<div class="pin-badge ${loc.status}"><span class="pin-dot"></span><span class="pin-text">${loc.price}</span></div>`,
        iconSize: [90, 34],
        iconAnchor: [45, 17]
      });

      const marker = L.marker(loc.coords, { icon }).addTo(map);
      marker.bindPopup(`
        <div class="map-popup-card">
          <span class="popup-tag ${loc.status}">${isSale ? 'Đang bán' : 'Đã bán'}</span>
          <strong>${loc.title}</strong>
          <small>${loc.city}</small>
          <div class="popup-price">${loc.price}</div>
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
});

