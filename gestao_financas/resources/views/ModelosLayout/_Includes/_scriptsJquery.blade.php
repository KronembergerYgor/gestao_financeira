<script>
    // Aguarda 5 segundos e então faz o fade out do elemento
    $(document).ready(function() {
        setTimeout(function() {
            $('#alert-message').fadeOut('slow');
        }, 1000); // 5000 milissegundos = 5 segundos
    });
</script>