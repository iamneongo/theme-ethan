const fs = require('fs');
const filename = 'styles.css';
let content = fs.readFileSync(filename, 'utf8');

const targetCSS = `.newsletter .nested-input button {
  border-radius: 999px !important;
  margin: 0 !important;
  padding: 0 28px !important;
  white-space: nowrap;
  height: 38px !important;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  flex: 0 0 auto;
  background-color: #0F2742 !important;
  color: #fff !important;
}`;

const hoverCSS = `.newsletter .nested-input button:hover {
  background-color: #1b3c63 !important;
  color: #fff !important;
}`;

content = content.replace(targetCSS, targetCSS + '\n' + hoverCSS);

fs.writeFileSync(filename, content);
console.log('Added hover state for newsletter button');
