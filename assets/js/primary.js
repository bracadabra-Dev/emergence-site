(function () {
  var links = document.querySelectorAll("[data-set-lang]");
  var api = document.body.getAttribute("data-lang-api");

  if (api && window.fetch) {
    for (var i = 0; i < links.length; i++) {
      links[i].addEventListener("click", function (event) {
        var href = this.href;
        var lang = this.getAttribute("data-set-lang");
        event.preventDefault();
        var moved = false;
        function go() {
          if (moved) return;
          moved = true;
          window.location.href = href;
        }
        setTimeout(go, 700);
        var body = "lang=" + encodeURIComponent(lang);
        fetch(api, {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          credentials: "same-origin",
          body: body
        }).then(go, go);
      });
    }
  }

  var drawer = document.querySelector(".drawer");
  if (drawer) {
    drawer.addEventListener("toggle", function () {
      document.body.style.overflow = drawer.open ? "hidden" : "";
    });
  }

  var box = document.getElementById("lightbox");
  if (!box) return;
  var pic = box.querySelector("img");
  var closeBtn = box.querySelector(".lightbox-close");

  function open(src, alt) {
    pic.src = src;
    pic.alt = alt || "";
    box.hidden = false;
    document.body.style.overflow = "hidden";
    closeBtn.focus();
  }

  function close() {
    box.hidden = true;
    pic.removeAttribute("src");
    document.body.style.overflow = "";
  }

  document.addEventListener("click", function (event) {
    var shot = event.target.closest ? event.target.closest("a.shot, a.sheet-link") : null;
    if (!shot) return;
    if (event.metaKey || event.ctrlKey || event.shiftKey || event.altKey || event.button !== 0) return;
    event.preventDefault();
    open(shot.href, shot.getAttribute("data-alt") || "");
  });

  closeBtn.addEventListener("click", close);
  box.addEventListener("click", function (event) {
    if (event.target === box) close();
  });
  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape" && !box.hidden) close();
  });
})();
