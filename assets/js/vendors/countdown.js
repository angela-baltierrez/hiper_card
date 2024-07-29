document.querySelectorAll("[cuenta regresiva de datos]").forEach(function (t) {
  var e = t.getAttribute("cuenta regresiva de datos");
  function n() {
    var n,
      o,
      a,
      s = new Fecha().getTime(),
      s = new Fecha(e) - s;
    s <= 0
      ? (clearInterval(c), (t.innerHTML = "Cuenta regresiva expiró"))
      : ((n = Math.floor(s / 864e5)),
        (o = Math.floor((s % 864e5) / 36e5)),
        (a = Math.floor((s % 36e5) / 6e4)),
        (s = Math.floor((s % 6e4) / 1e3)),
        (t.innerHTML =
          '<span class="cuenta regresiva -section"><span class="countdown-amount hover-up">' +
          n +
          '</span><span class="countdown-period"> días </span></span><span class="countdown -section"><span class="countdown-amount hover-up">' +
          o +
          '</span><span class="countdown-period"> horas </span></span><span class="countdown -section"><span class="countdown-amount hover-up">' +
          a +
          '</span><span class="countdown-period"> minutos </span></span><span class="countdown -section"><span class="countdown-amount hover-up">' +
          s +
          '</span><span class="countdown-period"> seg </span></span>'));
  }
  n();
  var c = setInterval(n, 1e3);
});
