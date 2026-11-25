/**
 * Hero: Schriftzug "GRAZDOING" füllt immer die volle Breite (Figma-Annotation).
 * Die CSS-Größe (20vw) passt für Norman; hier wird nach dem Laden der
 * Schrift exakt auf die Breite des Hero-Bereichs skaliert.
 */
const fitHeroTitles = () => {
  document.querySelectorAll('.hero__title').forEach((title) => {
    const box = title.parentElement;
    if (!box) return;
    title.style.fontSize = '';
    const available = box.clientWidth;
    const current = title.scrollWidth;
    if (!available || !current) return;
    const size = parseFloat(getComputedStyle(title).fontSize);
    title.style.fontSize = `${(size * available) / current}px`;
  });
};

document.addEventListener('DOMContentLoaded', () => {
  if (!document.querySelector('.hero__title')) return;
  fitHeroTitles();
  if (document.fonts && document.fonts.ready) {
    document.fonts.ready.then(fitHeroTitles);
  }
  let frame;
  window.addEventListener('resize', () => {
    cancelAnimationFrame(frame);
    frame = requestAnimationFrame(fitHeroTitles);
  });
});
