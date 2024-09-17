<script>
    // Usado para tempo do alert na tela 
    $(document).ready(function() { 
        setTimeout(function() {
            $('#alert-message').fadeOut('slow');
        }, 3000); // 3000 milissegundos = 3 segundos
    });

    $(document).ready(function() {
        $('.toggle-btn').click(function() {
            $('#sidebar').toggleClass('collapsed');
            $('#content').toggleClass('expanded');
        });
    });
</script>