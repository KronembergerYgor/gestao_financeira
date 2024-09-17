<script>
    // Aguarda 3 segundos e então faz o fade out do elemento
    $(document).ready(function() {
        setTimeout(function() {
            $('#alert-message').fadeOut('slow');
        }, 3000); // 3000 milissegundos = 3 segundos
    });
</script>