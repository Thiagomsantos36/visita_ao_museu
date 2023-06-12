function atualizarRelogio() {
  var dataHoraAtual = new Date();
  var horas = dataHoraAtual.getHours();
  var minutos = dataHoraAtual.getMinutes();
  var segundos = dataHoraAtual.getSeconds();

  // Formatação dos números para exibição com dois dígitos
  horas = ("0" + horas).slice(-2);
  minutos = ("0" + minutos).slice(-2);
  segundos = ("0" + segundos).slice(-2);

  // Atualiza o conteúdo do elemento com o relógio
  document.getElementById("relogio").innerHTML = horas + ":" + minutos + ":" + segundos;
}

// Atualiza o relógio a cada segundo
setInterval(atualizarRelogio, 1000);
