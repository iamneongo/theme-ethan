const fs = require('fs');
const path = require('path');

const dir = 'C:/Users/Asus/Local Sites/ethandao/app/public/wp-content/themes/ethan-dao-vanilla/templates';

const files = fs.readdirSync(dir).filter(f => f.endsWith('.php'));

for (const file of files) {
    const filePath = path.join(dir, file);
    let content = fs.readFileSync(filePath, 'utf8');
    let original = content;

    // 1. Replace button class for "Gửi thông tin"
    content = content.replace(/<button class="btn-gold">Gửi thông tin<\/button>/g, '<button class="btn-ink">Gửi thông tin</button>');

    // 2. Remove the disclaimer label
    content = content.replace(/<label>\s*<input type="checkbox" \/>\s*(?:<span>)?Tôi đồng ý để Ethan Dao liên hệ.*?<\/span>\s*<\/label>/gs, '');
    content = content.replace(/<label>\s*<input type="checkbox" \/>\s*Tôi đồng ý để Ethan Dao liên hệ về dịch vụ bất động sản\.\s*<\/label>/gs, '');

    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log(`Updated ${file}`);
    }
}
