
  // Aguarde até que o documento esteja totalmente carregado
  $(document).ready(function() {
    // Selecione o elemento que deseja animar
    var mainContent = $('main');

    // Defina uma função para executar a animação
    function fadeInAnimation() {
      mainContent.addClass('fade-in'); // Adicione a classe CSS para iniciar a animação
      mainContent.css('opacity', 1); // Defina a opacidade para 1 após a animação ser concluída
    }

    // Execute a função de animação após um atraso de 1 segundo (1000 milissegundos)
    setTimeout(fadeInAnimation, 1000);
  });
