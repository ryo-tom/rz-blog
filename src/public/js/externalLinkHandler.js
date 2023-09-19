/**
 * LaravelのStr::markdown()によってコンバートしたaタグに対して、
 * 外部リンクの場合は別タブで開くようにtarget属性を追加。
 */
document.addEventListener('DOMContentLoaded', function() {
  const currentDomain = window.location.host;
  document.querySelectorAll('a[href^="http://"], a[href^="https://"]').forEach(function(link) {
      const linkDomain = new URL(link.getAttribute('href')).host;
      if (linkDomain !== currentDomain) {
          link.setAttribute('target', '_blank');
          link.setAttribute('rel', 'noopener noreferrer');
      }
  });
});
