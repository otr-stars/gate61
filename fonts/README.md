<!-- Zabezpieczenie przed brakiem zawartości strony w przypadku nie załadowania fontu: -->
Przy dodawaniu fontów należy pamiętać aby nadawać swap na wyświetlanie tego fonta (style CSS). Dzięki temu jeśli ktoś ma np wolny internet, albo był błąd załadowania fonta to podmieni font na domyślny wgrany.

<!-- Przykład użycia: -->
@font-face {
  font-family: "Lato";
  font-style: normal;
  font-weight: 400;
  src: url("../fonts/lato-v17-latin-ext-regular.woff2") format("woff2"), url("../fonts/lato-v17-latin-ext-regular.woff") format("woff");
  font-display: swap; <!-- zabezpieczenie przed nie załadowaniem fotna -->
}