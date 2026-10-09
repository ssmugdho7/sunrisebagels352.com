(function(){
  const root=document.getElementById('menuEditor'); if(!root||!window.SUNRISE_MENU)return;
  let data=JSON.parse(JSON.stringify(window.SUNRISE_MENU));
  const out=document.getElementById('menu_json');
  function esc(v=''){return String(v).replace(/[&<>"']/g,s=>({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#039;'}[s]))}
  function sync(){out.value=JSON.stringify(data)}
  function render(){root.innerHTML=''; ['breakfast','lunch'].forEach(secKey=>{const sec=data[secKey];const secEl=document.createElement('section');secEl.className='editor-section';secEl.innerHTML=`<div class="editor-sec-head"><div><span>${secKey.toUpperCase()}</span><h2>${esc(sec.title)}</h2></div><button type="button" class="add-cat">+ Add Category</button></div><div class="cats"></div>`; const cats=secEl.querySelector('.cats');
    sec.categories.forEach((cat,ci)=>{const c=document.createElement('article');c.className='editor-cat';c.innerHTML=`<div class="editor-cat-head"><input class="cat-name" value="${esc(cat.name)}"><div><button type="button" class="add-item">+ Item</button><button type="button" class="danger remove-cat">Remove Category</button></div></div><div class="editor-items"></div><label class="cat-note">Category Note<textarea>${esc(cat.note||'')}</textarea></label>`;const items=c.querySelector('.editor-items');
      cat.items.forEach((it,ii)=>{const row=document.createElement('div');row.className='editor-item';row.innerHTML=`<div class="drag">⋮⋮</div><label>Item Name<input class="it-name" value="${esc(it.name)}"></label><label class="desc">Description<textarea class="it-desc">${esc(it.description||'')}</textarea></label><label class="price">Price $<input inputmode="decimal" class="it-price" value="${esc(it.price||'0.00')}"></label><label class="check"><input type="checkbox" class="it-featured" ${it.featured?'checked':''}> Featured</label><button type="button" class="danger remove-item">×</button>`;items.appendChild(row);
        row.querySelector('.it-name').oninput=e=>{it.name=e.target.value;sync()};row.querySelector('.it-desc').oninput=e=>{it.description=e.target.value;sync()};row.querySelector('.it-price').oninput=e=>{it.price=e.target.value.replace(/[^0-9.]/g,'');sync()};row.querySelector('.it-featured').onchange=e=>{it.featured=e.target.checked;sync()};row.querySelector('.remove-item').onclick=()=>{if(confirm('Remove this menu item?')){cat.items.splice(ii,1);sync();render()}};
      });
      c.querySelector('.cat-name').oninput=e=>{cat.name=e.target.value;sync()};c.querySelector('.cat-note textarea').oninput=e=>{cat.note=e.target.value;sync()};c.querySelector('.add-item').onclick=()=>{cat.items.push({name:'New Item',description:'',price:'0.00',featured:false});sync();render()};c.querySelector('.remove-cat').onclick=()=>{if(confirm('Remove this entire category?')){sec.categories.splice(ci,1);sync();render()}};cats.appendChild(c);
    });
    secEl.querySelector('.add-cat').onclick=()=>{sec.categories.push({name:'New Category',items:[{name:'New Item',description:'',price:'0.00',featured:false}],note:''});sync();render()};root.appendChild(secEl);
  });sync()}
  render();
})();
