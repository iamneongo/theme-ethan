const fs = require('fs');
let content = fs.readFileSync('styles.css', 'utf8');

// The original stats-mini definition
content = content.replace(/\.stats-mini\{display:grid;grid-template-columns:auto 1fr;gap:6px 16px;margin-top:28px\}/g, '.stats-mini{display:grid;grid-template-columns:auto 1fr;gap:20px 16px;margin-top:48px}');

fs.writeFileSync('styles.css', content);
console.log('Fixed CSS gap');
