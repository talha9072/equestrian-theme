/* ============================================================
   THE EQUESTRIAN DAD — shared interactivity
   ============================================================ */
(function () {
  'use strict';

  /* ---- mock audio player (works for any .player on the page) ---- */
  function fmt(t) {
    const m = Math.floor(t / 60), s = Math.floor(t % 60);
    return m + ':' + String(s).padStart(2, '0');
  }

  document.querySelectorAll('.player').forEach(function (player) {
    const btn = player.querySelector('.play-btn');
    const fill = player.querySelector('.progress .fill');
    const knob = player.querySelector('.progress .knob');
    const bar = player.querySelector('.progress');
    const cur = player.querySelector('[data-cur]');
    const dur = player.querySelector('[data-dur]');
    const audioEl = player.querySelector('.player-audio');

    const PLAY = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>';
    const PAUSE = '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M6 5h4v14H6zM14 5h4v14h-4z"/></svg>';

    if (audioEl) {
      /* ---- real audio playback ---- */
      function renderReal() {
        const total = audioEl.duration || 0;
        const pos = audioEl.currentTime || 0;
        const pct = total ? Math.max(0, Math.min(100, (pos / total) * 100)) : 0;
        if (fill) fill.style.width = pct + '%';
        if (knob) knob.style.left = pct + '%';
        if (cur) cur.textContent = fmt(pos);
        if (dur) dur.textContent = fmt(total);
      }
      audioEl.addEventListener('loadedmetadata', renderReal);
      audioEl.addEventListener('timeupdate', renderReal);
      audioEl.addEventListener('play', function () { if (btn) btn.innerHTML = PAUSE; });
      audioEl.addEventListener('pause', function () { if (btn) btn.innerHTML = PLAY; });
      audioEl.addEventListener('ended', function () { if (btn) btn.innerHTML = PLAY; });
      if (btn) btn.addEventListener('click', function () {
        audioEl.paused ? audioEl.play() : audioEl.pause();
      });
      if (bar) bar.addEventListener('click', function (e) {
        const r = bar.getBoundingClientRect();
        const total = audioEl.duration || 0;
        audioEl.currentTime = ((e.clientX - r.left) / r.width) * total;
        renderReal();
      });
      renderReal();
      return;
    }

    /* ---- mock progress demo (no audio file uploaded yet) ---- */
    const total = parseInt(player.dataset.dur || '2730', 10); // seconds
    let pos = total * 0.34, playing = false, timer = null;

    function render() {
      const pct = Math.max(0, Math.min(100, (pos / total) * 100));
      if (fill) fill.style.width = pct + '%';
      if (knob) knob.style.left = pct + '%';
      if (cur) cur.textContent = fmt(pos);
      if (dur) dur.textContent = fmt(total);
    }
    function tick() {
      pos += 1;
      if (pos >= total) { pos = total; stop(); }
      render();
    }
    function play() {
      playing = true; if (btn) btn.innerHTML = PAUSE;
      timer = setInterval(tick, 1000 / 8); // sped up so the demo feels alive
    }
    function stop() {
      playing = false; if (btn) btn.innerHTML = PLAY;
      clearInterval(timer);
    }
    if (btn) btn.addEventListener('click', function () { playing ? stop() : play(); });
    if (bar) bar.addEventListener('click', function (e) {
      const r = bar.getBoundingClientRect();
      pos = ((e.clientX - r.left) / r.width) * total;
      render();
    });
    render();
  });

  /* ---- episode share buttons ---- */
  document.querySelectorAll('.share-fb').forEach(function (b) {
    b.addEventListener('click', function () {
      window.open('https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(b.dataset.url), '_blank', 'noopener,width=600,height=500');
    });
  });
  document.querySelectorAll('.share-x').forEach(function (b) {
    b.addEventListener('click', function () {
      const text = encodeURIComponent(b.dataset.title || '');
      window.open('https://twitter.com/intent/tweet?url=' + encodeURIComponent(b.dataset.url) + '&text=' + text, '_blank', 'noopener,width=600,height=500');
    });
  });
  function copyText(text) {
    if (navigator.clipboard && window.isSecureContext) {
      return navigator.clipboard.writeText(text);
    }
    return new Promise(function (resolve, reject) {
      const ta = document.createElement('textarea');
      ta.value = text;
      ta.style.position = 'fixed';
      ta.style.left = '-9999px';
      document.body.appendChild(ta);
      ta.focus();
      ta.select();
      try {
        document.execCommand('copy') ? resolve() : reject();
      } catch (err) {
        reject(err);
      }
      document.body.removeChild(ta);
    });
  }
  document.querySelectorAll('.share-copy').forEach(function (b) {
    b.addEventListener('click', function () {
      copyText(b.dataset.url).then(function () {
        toast('Link copied to clipboard');
      }).catch(function () {
        toast('Could not copy link');
      });
    });
  });

  /* ---- compact "ep-play" buttons just toggle a pressed look ---- */
  document.querySelectorAll('.ep-play').forEach(function (b) {
    b.addEventListener('click', function (e) {
      e.preventDefault();
      const playing = b.classList.toggle('is-playing');
      b.innerHTML = playing
        ? '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M6 5h4v14H6zM14 5h4v14h-4z"/></svg>'
        : '<svg viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>';
    });
  });

  /* ---- fix navigation links dynamically (safety layer for Gutenberg database cache) ---- */
  document.querySelectorAll('.site-header a').forEach(function (link) {
    var href = link.getAttribute('href') || '';
    if (href === 'index.html' || href === 'http://index.html') {
      link.setAttribute('href', '/');
    } else if (href === 'index.html#about' || href === 'http://index.html#about') {
      link.setAttribute('href', '/#about');
    } else if (href === 'index.html#listen' || href === 'http://index.html#listen') {
      link.setAttribute('href', '/#listen');
    } else if (href === 'episode.html' || href === 'http://episode.html') {
      link.setAttribute('href', '/wp-content/themes/equestrian-theme/episode.html');
    } else if (href === 'store.html' || href === 'http://store.html') {
      link.setAttribute('href', '/wp-content/themes/equestrian-theme/store.html');
    }

    /* ---- mark the standard 'Listen' text link to hide on tablets/mobiles ---- */
    if (href === '/#listen' || href === 'index.html#listen' || href === 'http://index.html#listen') {
      if (!link.classList.contains('mobile-listen-btn')) {
        const parentLi = link.closest('.wp-block-navigation-item');
        if (parentLi) {
          parentLi.classList.add('desktop-only-listen');
        }
      }
    }
  });

  /* ---- append professional mobile listen link ---- */
  const navContainer = document.querySelector('.site-header .wp-block-navigation__container');
  if (navContainer) {
    if (!navContainer.querySelector('.mobile-only-listen')) {
      const mobileLi = document.createElement('li');
      mobileLi.className = 'wp-block-navigation-item wp-block-navigation-link mobile-only-listen';
      
      const mobileA = document.createElement('a');
      mobileA.className = 'wp-block-navigation-item__content mobile-listen-btn';
      mobileA.href = '/#listen';
      mobileA.innerText = 'Listen';
      
      mobileLi.appendChild(mobileA);
      navContainer.appendChild(mobileLi);
    }
  }

  /* ---- close burger menu on click of any links ---- */
  const toggle = document.querySelector('.menu-toggle');
  const nav = document.querySelector('.main-nav');

  document.querySelectorAll('.site-header .wp-block-navigation-item__content').forEach(function (link) {
    link.addEventListener('click', function () {
      if (nav) {
        nav.classList.remove('open');
      }
      if (toggle) {
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  });

  /* ---- mobile menu toggle ---- */
  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      const open = nav.classList.toggle('open');
      toggle.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  }

  /* ---- toast ---- */
  let toastEl = null, toastTimer = null;
  function toast(msg) {
    if (!toastEl) {
      toastEl = document.createElement('div');
      toastEl.style.cssText =
        'position:fixed;left:50%;bottom:26px;transform:translateX(-50%) translateY(20px);' +
        'background:#283238;color:#F6EEE0;padding:13px 22px;border-radius:999px;' +
        'font:600 14px/1 "Hanken Grotesk",system-ui,sans-serif;z-index:9999;opacity:0;' +
        'transition:all .25s ease;box-shadow:0 18px 40px -16px rgba(0,0,0,.5);pointer-events:none';
      document.body.appendChild(toastEl);
    }
    toastEl.textContent = msg;
    requestAnimationFrame(function () {
      toastEl.style.opacity = '1';
      toastEl.style.transform = 'translateX(-50%) translateY(0)';
    });
    clearTimeout(toastTimer);
    toastTimer = setTimeout(function () {
      toastEl.style.opacity = '0';
      toastEl.style.transform = 'translateX(-50%) translateY(20px)';
    }, 2200);
  }

  /* ---- add to cart ---- */
  let cart = 0;
  document.querySelectorAll('.add').forEach(function (b) {
    b.addEventListener('click', function () {
      cart += 1;
      const badge = document.querySelector('[data-cart-count]');
      if (badge) { badge.textContent = cart; badge.style.display = 'grid'; }
      const name = b.dataset.name || 'Item';
      toast('Added ' + name + ' to your basket');
    });
  });

  /* ---- newsletter ---- */
  document.querySelectorAll('.news-form, .nl-form').forEach(function (form) {
    form.addEventListener('submit', function (e) {
      e.preventDefault();
      const input = form.querySelector('input');
      if (input && input.value.trim()) {
        toast('You\u2019re in the saddle \u2014 welcome to the yard!');
        input.value = '';
      }
    });
  });

  /* ---- expose toast for inline use ---- */
  window.edToast = toast;
})();
