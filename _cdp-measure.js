const CDP_URL = 'http://127.0.0.1:9222/json/list';
async function main() {
  const list = await (await fetch(CDP_URL)).json();
  const page = list.find(t => t.type === 'page');
  const ws = new WebSocket(page.webSocketDebuggerUrl);
  let id = 0; const pending = new Map();
  const send = (method, params = {}) => new Promise((res, rej) => { const mid = ++id; pending.set(mid, { res, rej }); ws.send(JSON.stringify({ id: mid, method, params })); });
  ws.onmessage = (ev) => { const msg = JSON.parse(ev.data); if (msg.id && pending.has(msg.id)) { const p = pending.get(msg.id); pending.delete(msg.id); msg.error ? p.rej(new Error(msg.error.message)) : p.res(msg.result); } };
  await new Promise((res, rej) => { ws.onopen = res; ws.onerror = rej; });
  await send('Runtime.enable');
  await send('Page.enable');

  await send('Page.navigate', { url: 'http://ethandao.local/' });
  for (let i = 0; i < 40; i++) { await new Promise(r => setTimeout(r, 500)); const st = await send('Runtime.evaluate', { expression: 'document.readyState', returnByValue: true }); if (st.result.value === 'complete') break; }
  await new Promise(r => setTimeout(r, 3000));

  const measure = (label) => send('Runtime.evaluate', {
    expression: `(() => {
      const q = (s) => document.querySelector(s);
      const r = (el) => el ? Math.round(el.getBoundingClientRect().height) : null;
      return JSON.stringify({ label: ${JSON.stringify(label)}, vh: window.innerHeight,
        htmlClass: document.documentElement.className,
        bodyClass: document.body.className,
        recentWrapper: r(q('#recent .swiper-wrapper.sales-track')),
        listingsWrapper: r(q('.listings .swiper-wrapper.sales-track')) });
    })()`,
    returnByValue: true
  }).then(res => console.log(res.result.value));

  await measure('FRESH');

  // remove page-transition + scroll classes from html
  await send('Runtime.evaluate', { expression: `document.documentElement.className = '';` });
  await new Promise(r => setTimeout(r, 300));
  await measure('html classes removed');

  // restore via reload; then remove body classes only
  await send('Page.navigate', { url: 'http://ethandao.local/' });
  for (let i = 0; i < 40; i++) { await new Promise(r => setTimeout(r, 400)); const st = await send('Runtime.evaluate', { expression: 'document.readyState', returnByValue: true }); if (st.result.value === 'complete') break; }
  await new Promise(r => setTimeout(r, 3000));
  await send('Runtime.evaluate', { expression: `document.body.className = 'x';` });
  await new Promise(r => setTimeout(r, 300));
  await measure('body classes removed');

  ws.close();
}
main().catch(e => { console.error('ERR', e.message); process.exit(1); });
