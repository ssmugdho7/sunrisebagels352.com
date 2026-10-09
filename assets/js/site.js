const header=document.getElementById('siteHeader');
const toggle=document.getElementById('navToggle'); const nav=document.getElementById('mainNav');
if(toggle) toggle.addEventListener('click',()=>{toggle.classList.toggle('open');nav.classList.toggle('open')});
window.addEventListener('scroll',()=>header?.classList.toggle('scrolled',window.scrollY>18));
document.querySelectorAll('a[href^="#"]').forEach(a=>a.addEventListener('click',e=>{const id=a.getAttribute('href');if(id&&id.length>1){const el=document.querySelector(id);if(el){e.preventDefault();el.scrollIntoView({behavior:'smooth',block:'start'});nav?.classList.remove('open')}}}));
const panel=document.getElementById('aiPanel'), open=document.getElementById('aiOpen'), close=document.getElementById('aiClose'), form=document.getElementById('aiForm'), input=document.getElementById('aiInput'), body=document.getElementById('aiBody');
open?.addEventListener('click',()=>{panel.classList.add('open');panel.setAttribute('aria-hidden','false');setTimeout(()=>input.focus(),150)}); close?.addEventListener('click',()=>{panel.classList.remove('open');panel.setAttribute('aria-hidden','true')});
function msg(text,who){const d=document.createElement('div');d.className='ai-msg '+who;d.textContent=text;body.appendChild(d);body.scrollTop=body.scrollHeight;return d}
form?.addEventListener('submit',async e=>{e.preventDefault();const q=input.value.trim();if(!q)return;msg(q,'user');input.value='';const wait=msg('Thinking…','bot loading');try{const r=await fetch('api/chat.php',{method:'POST',headers:{'Content-Type':'application/json'},body:JSON.stringify({message:q})});const j=await r.json();wait.remove();msg(j.reply||j.error||'Please try again.','bot')}catch(err){wait.remove();msg('The concierge is temporarily unavailable.','bot')}});
