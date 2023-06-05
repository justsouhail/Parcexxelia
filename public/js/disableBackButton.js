document.addEventListener('DOMContentLoaded', function() {
window.addEventListener('load', function () {
    if (window.history && window.history.pushState) {
      window.history.pushState('', null, '');
      window.addEventListener('popstate', function () {
        window.history.pushState('', null, '');
      });
    }
  });
  
});