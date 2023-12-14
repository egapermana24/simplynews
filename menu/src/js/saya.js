document.addEventListener("DOMContentLoaded", function () {
  // new TypeIt("#typing", {}).delete().go();

  new TypeIt("#home", {
    speed: 50,
    startDelay: 900,
  })
    .type("selamt", { delay: 100 })
    .move(-1, { delay: 100 })
    .type("a", { delay: 400 })
    .move(null, { to: "START", instant: true, delay: 300 })
    .move(1, { delay: 200 })
    .delete(1)
    .type("S", { delay: 225 })
    .pause(200)
    .move(6, { instant: true })
    .pause(200)
    .type(" Datang", { delay: 200 })
    .go();

  new TypeIt("#home2", {
    speed: 50,
    startDelay: 5000,
  })
    .type("Klik disini untuk membaca berita terbaru", { delay: 100 })
    .go();
});

// document.addEventListener("DOMContentLoaded", function () {
// });
