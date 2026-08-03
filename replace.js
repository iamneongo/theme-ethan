const fs = require('fs');
const path = require('path');
const templatesDir = 'templates';
const files = fs.readdirSync(templatesDir).filter(f => f.endsWith('.php'));

const customSelectHTML = `
<div class="custom-select" data-custom-select>
  <div class="select-selected" data-select-trigger>BẠN QUAN TÂM ĐẾN...
    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 4.5l3 3 3-3"/></svg>
  </div>
  <div class="select-items" data-select-options>
    <div data-value="Mua nhà">MUA NHÀ</div>
    <div data-value="Bán nhà">BÁN NHÀ</div>
    <div data-value="Đầu tư">ĐẦU TƯ</div>
    <div data-value="Hợp tác đại lý">HỢP TÁC ĐẠI LÝ</div>
  </div>
  <input type="hidden" name="interest" value="">
</div>
`.trim().replace(/\n/g, '');

for (const file of files) {
  const filePath = path.join(templatesDir, file);
  let content = fs.readFileSync(filePath, 'utf8');
  
  // Catch all select with 5 options
  const selectRegexCatchAll = /<select><option>[^<]+<\/option><option>[^<]+<\/option><option>[^<]+<\/option><option>[^<]+<\/option><option>[^<]+<\/option><\/select>/g;
  
  if (content.match(selectRegexCatchAll)) {
     content = content.replace(selectRegexCatchAll, customSelectHTML);
     fs.writeFileSync(filePath, content, 'utf8');
     console.log('Updated ' + file);
  }
}
